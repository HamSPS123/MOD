<?php
  session_start();
  include ("../../oop/connect.php");
  $amount = 0;
  if (isset($_POST['adj'])) {
    $adj_id = $_POST['adj'];
    $course_id = trim($_POST['course']);

    //get fac_id
    $faculty = mysqli_query($conn, "SELECT c.fac_id
    FROM adjustdetail ad
    LEFT JOIN course c ON ad.course_id=c.course_id
    LEFT JOIN faculty f ON c.fac_id=f.fac_id
    WHERE adj_id='$adj_id'AND ad.course_id='$course_id';");
    $fac_id = mysqli_fetch_array($faculty, MYSQLI_ASSOC);

    $result_course = mysqli_query($conn, "SELECT d_id,u.uni_id,uni_name,f.fac_id,fac_name,dept_name,ad.course_id,course_name,
    univer+prov+intv+ad_test+emp+std_handi+std_lan+ssk+std+emp_gov+test+std_con+std_2lan+std_inter+emp_private as total_course,level_name
    FROM adjustdetail ad
    LEFT JOIN course c ON ad.course_id=c.course_id
    LEFT JOIN faculty f ON c.fac_id=f.fac_id
    LEFT JOIN university u ON f.uni_id=u.uni_id
    LEFT JOIN department d ON u.dept_id=d.dept_id
    LEFT JOIN adjust a ON ad.adj_id=a.adj_id
    LEFT JOIN course_level lv ON c.level_id=lv.level_id
    WHERE ad.adj_id='$adj_id' AND c.fac_id='$fac_id[fac_id]' AND ad.course_id='$course_id' ORDER BY level_name ASC,course_id ASC;");

    $row_course = mysqli_fetch_array($result_course, MYSQLI_ASSOC);
?>
<div class="row">
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
<form action="distribute" method="POST">
    <input type="hidden" name="adj_id2" value="<?= $adj_id ?>">
    <input type="hidden" name="course_id2" value="<?= $course_id ?>">
    <input type="hidden" name="fac_id2" value="<?= $fac_id["fac_id"] ?>">
    <div class="table-responsive tscroll" style="height: 100%">
        <table id="detail_table" class="table-bordered" style="width: 100%;">
            <tr>
                <th rowspan="2" style="text-align: center;margin: 0 auto; width: 70px;">ລຳດັບ</th>
                <th rowspan="2" style="text-align: center;width: 450px;">ຜູ້ສະເໜີສ້າງ</th>
                <th rowspan="2" style="text-align: center;width: 120px;">ແຜນສະເໜີສ້າງ</th>
                <th colspan="2" style="text-align: center;width: 250px;">ອະນຸມັດ</th>
                <th rowspan="2" style="text-align: center;width: 150px;">ລວມ</th>
            </tr>
            <tr style="text-align: center;">
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
            </tr>
            <tr>
                <td class="text-center">
                    <button type="button" data-toggle="collapse" data-target=".multi-collapse-province" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2" class="btn btn-outline-success btn-sm" id="click-col-1">
                        <i class="fas fa-plus" id="icon-click-1"></i>
                    </button>
                </td>
                <td colspan="5" class="h4">ແຂວງຕ່າງໆ</td>
            </tr>
            <?php
    
            $result_dist = mysqli_query($conn, "SELECT cre_id,adj_id,cp.course_id,course_name,fac_name,uni_name,cp.p_m_id,p_m_name,sum(std_qty) + sum(emp_qty) as total,user_id
            FROM create_plan cp
            LEFT JOIN province_ministry pm ON cp.p_m_id=pm.p_m_id
            LEFT JOIN course c ON cp.course_id=c.course_id
            LEFT JOIN faculty f ON c.fac_id=f.fac_id
            LEFT JOIN university u ON f.uni_id=u.uni_id
            WHERE cp.course_id='$course_id' AND adj_id='$adj_id' AND p_stt=1
            GROUP BY cp.p_m_id ORDER BY cp.p_m_id ASC");
            $i=0;
            if (mysqli_num_rows($result_dist) > 0) {
                foreach($result_dist as $dist){
                    $i++;
                    $amount += $dist["total"];
            ?>
            <tr style="text-align:center" class="collapse multi-collapse-province">
                <td style="text-align:center"><?= $i ?></td>
                <td style="text-align: center;font-size:20px;"><?= $dist['p_m_name'] ?></td>
                <td style="text-align:center">
                    <input class="quantity get_plan" min="0" name="num1" id="num_<?= $dist['p_m_id'] ?>"
                        value="<?= $dist['total'] ?>" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only" style="margin:0 auto;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnQuota"></button>
                        <input class="quantity inputQuota" min="0" name="std_qty_<?= $dist['p_m_id'] ?>"
                            id="std_qty_<?= $dist['p_m_id'] ?>" value="0" type="number"
                            style="font-weight:bold!important;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnQuota"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only" style="margin:0 auto;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnQuota"></button>
                        <input class="quantity inputQuota" min="0" name="emp_qty_<?= $dist['p_m_id'] ?>"
                            id="emp_qty_<?= $dist['p_m_id'] ?>" value="0" type="number"
                            style="font-weight:bold!important;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnQuota"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num_qty_<?= $dist['p_m_id'] ?>"
                        id="num_qty_<?= $dist['p_m_id'] ?>" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
                </td>
            </tr>
            <?php
                }
            }else{
                echo '  <tr class="collapse multi-collapse-province">
                            <td colspan="6" class="text-center text-danger"><p class="h6 m2">ບໍ່ມີຂໍ້ມູນການສະເໜີສ້າງ</p></td>
                        <tr>';
            }
            ?>
            <tr>
                <td class="text-center">
                    <button type="button" data-toggle="collapse" data-target=".multi-collapse-ministry" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2" class="btn btn-outline-success btn-sm" id="click-col-2">
                        <i class="fas fa-plus" id="icon-click-2"></i>
                    </button>
                </td>
                <td colspan="5" class="h4">ກະຊວງຕ່າງໆ</td>
            </tr>

            <?php
    
            $result_dist = mysqli_query($conn, "SELECT cre_id,adj_id,cp.course_id,course_name,fac_name,uni_name,cp.p_m_id,p_m_name,sum(std_qty) + sum(emp_qty) as total,user_id
            FROM create_plan cp
            LEFT JOIN province_ministry pm ON cp.p_m_id=pm.p_m_id
            LEFT JOIN course c ON cp.course_id=c.course_id
            LEFT JOIN faculty f ON c.fac_id=f.fac_id
            LEFT JOIN university u ON f.uni_id=u.uni_id
            WHERE cp.course_id='$course_id' AND adj_id='$adj_id' AND p_stt=2
            GROUP BY cp.p_m_id ORDER BY cp.p_m_id ASC");
            $i=0;
            if (mysqli_num_rows($result_dist) > 0) {
                foreach($result_dist as $dist){
                    $i++;
                    $amount += $dist["total"];
            ?>
            <tr style="text-align:center" class="collapse multi-collapse-ministry">
                <td style="text-align:center"><?= $i ?></td>
                <td style="text-align: center;font-size:20px;"><?= $dist['p_m_name'] ?></td>
                <td style="text-align:center">
                    <input class="quantity get_plan" min="0" name="num1" id="num_<?= $dist['p_m_id'] ?>"
                        value="<?= $dist['total'] ?>" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only" style="margin:0 auto;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnQuota"></button>
                        <input class="quantity inputQuota" min="0" name="std_qty_<?= $dist['p_m_id'] ?>"
                            id="std_qty_<?= $dist['p_m_id'] ?>" value="0" type="number"
                            style="font-weight:bold!important;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnQuota"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only" style="margin:0 auto;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnQuota"></button>
                        <input class="quantity inputQuota" min="0" name="emp_qty_<?= $dist['p_m_id'] ?>"
                            id="emp_qty_<?= $dist['p_m_id'] ?>" value="0" type="number"
                            style="font-weight:bold!important;">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnQuota"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num_qty_<?= $dist['p_m_id'] ?>"
                        id="num_qty_<?= $dist['p_m_id'] ?>" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
                </td>
            </tr>
            <?php
                }
            }else{
                echo '  <tr class="collapse multi-collapse-ministry">
                            <td colspan="6" class="text-center text-danger"><p class="h6 m2">ບໍ່ມີຂໍ້ມູນການສະເໜີສ້າງ</p></td>
                        <tr>';
            }
            ?>
            <tr style="font-size: 18px;background-color: #C8F3FC;" align="center">
                <td colspan="2">ລວມທັງໝົດ</td>
                <td colspan="4"><?= $amount ?></td>
            </tr>
        </table>
    </div>


    <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ຢືນຢັນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" align="center">
                    ທ່ານຕ້ອງການແຈກຢາຍທຶນການສຶກສາ ຫຼື ບໍ່ ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnConfirm" class="btn btn-outline-primary">ຢືນຢັນ</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
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
            $count_dist = mysqli_query($conn, "SELECT cp.p_m_id
            FROM create_plan cp
            LEFT JOIN province_ministry pm ON cp.p_m_id=pm.p_m_id
            LEFT JOIN course c ON cp.course_id=c.course_id
            LEFT JOIN faculty f ON c.fac_id=f.fac_id
            LEFT JOIN university u ON f.uni_id=u.uni_id
            WHERE cp.course_id='$course_id' AND adj_id='$adj_id'
            GROUP BY cp.p_m_id ORDER BY cp.p_m_id ASC");

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
            $count_dist = mysqli_query($conn, "SELECT cp.p_m_id
            FROM create_plan cp
            LEFT JOIN province_ministry pm ON cp.p_m_id=pm.p_m_id
            LEFT JOIN course c ON cp.course_id=c.course_id
            LEFT JOIN faculty f ON c.fac_id=f.fac_id
            LEFT JOIN university u ON f.uni_id=u.uni_id
            WHERE cp.course_id='$course_id' AND adj_id='$adj_id'
            GROUP BY cp.p_m_id ORDER BY cp.p_m_id ASC");

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
$("#click-col-1").click(function(){
    // $("#icon-click").removeClass("");
    $("#icon-click-1").toggleClass("fa-plus fa-minus");
    $("#click-col-1").toggleClass("btn-outline-success btn-outline-danger");
    // $("#click-col").addClass("btn-outline-danger");
});
$("#click-col-2").click(function(){
    // $("#icon-click").removeClass("");
    $("#icon-click-2").toggleClass("fa-plus fa-minus");
    $("#click-col-2").toggleClass("btn-outline-success btn-outline-danger");
    // $("#click-col").addClass("btn-outline-danger");
});
</script>