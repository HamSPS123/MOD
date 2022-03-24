<?php
    session_start();
    $path = "../../";
    include ($path."oop/connect.php");

    if (isset($_POST['d_id']) != "") {
        $d_id=trim($_POST['d_id']);

        //get fac_id
        // $faculty = mysqli_query($conn, "SELECT c.fac_id
        // FROM adjustdetail ad
        // LEFT JOIN course c ON ad.course_id=c.course_id
        // LEFT JOIN faculty f ON c.fac_id=f.fac_id
        // WHERE adj_id='$adj_id'AND ad.course_id='$course_id';");
        // $fac_id = mysqli_fetch_array($faculty, MYSQLI_ASSOC);

        $result_course = mysqli_query($conn, "SELECT d_id,u.uni_id,uni_name,f.fac_id,fac_name,dept_name,ad.course_id,course_name,
        univer+prov+intv+ad_test+emp+std_handi+std_lan+ssk+std+emp_gov+test+std_con+std_2lan+std_inter+emp_private as total_course,level_name
        FROM adjustdetail ad
        LEFT JOIN course c ON ad.course_id=c.course_id
        LEFT JOIN faculty f ON c.fac_id=f.fac_id
        LEFT JOIN university u ON f.uni_id=u.uni_id
        LEFT JOIN department d ON u.dept_id=d.dept_id
        LEFT JOIN adjust a ON ad.adj_id=a.adj_id
        LEFT JOIN course_level lv ON c.level_id=lv.level_id
        WHERE d_id='$d_id' ORDER BY level_name ASC,course_name ASC;");

        $row_course = mysqli_fetch_array($result_course, MYSQLI_ASSOC);
        ?>
<div class="row mt-5">
    <div class="col-md-12">
        <h4>ລວມ: <label style="color:red;">
                <input class="quantity" min="0" name="total_plan" id="total_plan"
                    value="<?= $row_course['total_course'] ?>" type="number"
                    style="border:none;width:80px;text-align:center;font-weight: bold;color:red;" disabled>
            </label>&nbsp&nbsp<span class="fa fa-user"></span> &nbsp&nbsp
            ສາຂາ: <?= $row_course['course_name'] ?> &nbsp&nbsp <?= $row_course['level_name'] ?> &nbsp&nbsp
            <?= $row_course['fac_name'] ?> &nbsp&nbsp
            <?= $row_course['uni_name'] ?></h4>
    </div>
    <div class="col-md-6">
        <h4>ຈຳນວນທີແຈກຢາຍທັງໝົດ:
            <label style="color:red;">
                <input class="quantity" min="0" name="amount" id="amount" value="0" type="number"
                    style="border:none;width:80px;text-align:center;font-weight: bold;color:red;" disabled>
            </label>&nbsp&nbsp<span class="fa fa-user"></span>
        </h4>
    </div>
    <div class="col-md-6" style="text-align:right;">
        <button type="button" id="btnSend" class="btn btn-sm btn-primary" data-toggle="modal"
            data-target="#confirm"><span class="fa fa-paper-plane"> &nbsp&nbsp
            </span>ແຈກຢາຍທຶນການສຶກສາ</button>
    </div>
</div>
<div class="table-responsive2">
    <?php
        $result_quota = mysqli_query($conn, "SELECT id,qd.d_id,qd.p_m_id,p_m_name,qd.std_qty,qd.emp_qty,qd.std_qty+qd.emp_qty as total_qty,qd.user_id,hrd_name,surname,gender,u.stt_id
        FROM quota_distribute qd
        LEFT JOIN adjustdetail ad ON qd.d_id=ad.d_id
        LEFT JOIN province_ministry pm ON qd.p_m_id=pm.p_m_id
        LEFT JOIN `user` u ON qd.user_id=u.user_id
        LEFT JOIN hrd_user hu ON u.user_id=hu.user_id
        WHERE qd.d_id='$d_id';");
        if (mysqli_num_rows($result_quota) > 0) {
    ?>
    <input type="hidden" name="d_id" value="<?= $d_id ?>">
    <table id="detail_table" class="table-bordered" style="width: 1200px;">
        <tr class="text-center">
            <th rowspan="2" style="margin: 0 auto; width: 70px;">ລຳດັບ</th>
            <th rowspan="2" style="width: 450px;">ຜູ້ສະເໜີສ້າງ</th>
            <th rowspan="2" style="width: 150px;">ລວມ</th>
            <th colspan="2" style="width: 250px;">ອະນຸມັດ</th>
            <th rowspan="2">ຜູ້ແຈກຢາຍ</th>
        </tr>
        <tr style="text-align: center;">
            <th>ນ/ຮ</th>
            <th>ພ/ງ</th>
        </tr>
        <?php
        $i=0;
            foreach($result_quota as $row){
                $i++;

                if ($row['gender'] == "ຊາຍ") {
                    $row['gender'] = "ທ່ານ";
                }
                if ($row['gender'] == "ຍິງ") {
                    $row['gender'] = "ນາງ";
                }
            ?>
        <tr style="text-align:center" class="btnUpdate_distribute">
            <td style="text-align:center">
                <?= $i ?>
                <input type="hidden" name="id_<?= $row['p_m_id'] ?>" value="<?= $row['id'] ?>">
        </td>
            <td style="text-align: center;font-size:20px;"><?= $row['p_m_name'] ?></td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num_qty_<?= $row['p_m_id'] ?>" id="num_qty_<?= $row['p_m_id'] ?>"
                    value="<?= $row['total_qty'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only" style="margin:0 auto;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus btnQuota"></button>
                    <input class="quantity inputQuota" min="0" name="std_qty_<?= $row['p_m_id'] ?>"
                        id="std_qty_<?= $row['p_m_id'] ?>" value="<?= $row['std_qty'] ?>" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus btnQuota"></button>
                </div>
            </td>
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only" style="margin:0 auto;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus btnQuota"></button>
                    <input class="quantity inputQuota" min="0" name="emp_qty_<?= $row['p_m_id'] ?>"
                        id="emp_qty_<?= $row['p_m_id'] ?>" value="<?= $row['emp_qty'] ?>" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus btnQuota"></button>
                </div>
            </td>

            <td>
                
                <?php if($row["stt_id"] == "4"){ echo $row['hrd_name']." (Admin)";}else{ echo $row['gender']." ".$row['hrd_name']." ".$row['surname'];} ?>
            </td>
        </tr>
        <?php
                    }
                ?>
    </table>
    <?php
        }else{
            echo '<br>
                <hr size="1" width="90%">
                <p align="center">ບໍ່ມີຂໍ້ມູນການແຈກຢາຍ</p>
                <hr size="1" width="90%">';
        }
    ?>
</div>
<?php
    }else{
        echo '<br>
                <hr size="1" width="90%">
                <p align="center">ບໍ່ມີຂໍ້ມູນ</p>
                <hr size="1" width="90%">';
    }
?>



<script>
$(document).ready(function() {
    var intervalId = window.setInterval(function() {
        check_total();
    }, 500);

    function check_total() {
        var totalall = $('#amount').val();
        if (totalall == '' || totalall == '0') {
            $("#btnSend").attr("disabled", true);
        } else {
            $("#btnSend").attr("disabled", false);
        }
    }
});
</script>

<script>
$('.inputQuota').keyup(function() {

    var std_qty = 0;
    var emp_qty = 0;

    var total_qty = 0;
    <?php
            $count_dist = mysqli_query($conn, "SELECT id,qd.d_id,qd.p_m_id,p_m_name,qd.std_qty,qd.emp_qty,qd.std_qty+qd.emp_qty as total_qty,qd.user_id,hrd_name
            FROM quota_distribute qd
            LEFT JOIN adjustdetail ad ON qd.d_id=ad.d_id
            LEFT JOIN province_ministry pm ON qd.p_m_id=pm.p_m_id
            LEFT JOIN `user` u ON qd.user_id=u.user_id
            LEFT JOIN hrd_user hu ON u.user_id=hu.user_id
            WHERE qd.d_id='$d_id'");

            foreach ($count_dist as $cd) {
                ?>
    std_qty += parseInt($("#std_qty_<?= $cd['p_m_id'] ?>").val());
    emp_qty += parseInt($("#emp_qty_<?= $cd['p_m_id'] ?>").val());

    $("#num_qty_<?= $cd['p_m_id'] ?>").val(
        parseInt($("#std_qty_<?= $cd['p_m_id'] ?>").val()) +
        parseInt($("#emp_qty_<?= $cd['p_m_id'] ?>").val())
    );
    <?php
            }
        ?>
    total_qty = std_qty + emp_qty;

    $("#amount").val(total_qty);
});
</script>

<script>
$('.btnQuota').on('click', function() {

    var std_qty = 0;
    var emp_qty = 0;

    var total_qty = 0;
    <?php
            $count_dist = mysqli_query($conn, "SELECT id,qd.d_id,qd.p_m_id,p_m_name,qd.std_qty,qd.emp_qty,qd.std_qty+qd.emp_qty as total_qty,qd.user_id,hrd_name
            FROM quota_distribute qd
            LEFT JOIN adjustdetail ad ON qd.d_id=ad.d_id
            LEFT JOIN province_ministry pm ON qd.p_m_id=pm.p_m_id
            LEFT JOIN `user` u ON qd.user_id=u.user_id
            LEFT JOIN hrd_user hu ON u.user_id=hu.user_id
            WHERE qd.d_id='$d_id'");

            foreach ($count_dist as $cd) {
                ?>
    std_qty += parseInt($("#std_qty_<?= $cd['p_m_id'] ?>").val());
    emp_qty += parseInt($("#emp_qty_<?= $cd['p_m_id'] ?>").val());

    $("#num_qty_<?= $cd['p_m_id'] ?>").val(
        parseInt($("#std_qty_<?= $cd['p_m_id'] ?>").val()) +
        parseInt($("#emp_qty_<?= $cd['p_m_id'] ?>").val())
    );
    <?php
            }
        ?>
    total_qty = std_qty + emp_qty;

    $("#amount").val(total_qty);
});
</script>