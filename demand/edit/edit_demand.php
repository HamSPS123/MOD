<?php
  $title = "ແກ້ໄຂແຜນສ້າງນັກຮຽນ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>


<style>
table {
    font-size: 20px;
    font-family: '10B Muc Zeit', 'Noto Sans Lao' !important;
    font-weight: bold !important;
}
</style>



<form action="edit-demand" method="Post">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h2>ແກ້ໄຂແຜນສ້າງນັກຮຽນ</h2>
            <h5>ກະລຸນາປ້ອນຈຳນວນນັກສຶກສາທີ່ຕ້ອງການຂໍທຶນ</h5>
        </div>
        <div class="col-xs-12 col-md-6" align="right">
            <h5>ລວມທັງໝົດ <input type="number" class="totalall" value="0" name="totalall" id="amount"
                    style="border: none;width:100px;font-weight: bold;" disabled></h5>
            <button type="button" name="send" id="btnSend" class="btn btn-sm btn-success send" data-toggle="modal"
                data-target="#confirm"><span class="fa fa-paper-plane"> &nbsp&nbsp
                </span>ແກ້ໄຂແຜນຂໍທຶນການສຶກສາ</button>
        </div>


        <div class="col-xs-12 col-md-3 dropdown">
            <br>
            <select name="status" id="status" style="width: 500px;text-align-last: center;" class="form-control">
                <option value="" disabled selected>ເລືອກກົມ</option>
                <?php
                    $fy = mysqli_query($conn, "SELECT adj_id,ad.fy_id,ad.dept_id,dept_name FROM adjust ad left JOIN fy ON ad.fy_id=fy.fy_id left JOIN department d ON ad.dept_id=d.dept_id WHERE fy.status=1 ORDER BY ad.dept_id");
                    
                    if (mysqli_num_rows($fy) > 0) {
                    while ($row = mysqli_fetch_array($fy)) {
                        ?>
                <option value="<?= $row['adj_id'] ?>"><?= $row['dept_name'] ." - ".$row['fy_id'] ?></option>
                <?php
                    }
                }else{
                    echo '<option disabled>ສູນກາງຍັງບໍ່ເປີດສົກຮຽນ</option>';
                }
                    mysqli_free_result($fy);
                    mysqli_next_result($conn);
                ?>
            </select>

        </div>
    </div>
    <br>

    <div class="waitload" id="waitload">
        <hr size="1" width="90%">
        <p align="center">ບໍ່ມີຂໍ້ມູນ</p>
        <hr size="1" width="90%">
    </div>
    <div id="result">
    </div>

    <!-- endtable -->
    <!-- Modal Confirm -->
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
                    ທ່ານຕ້ອງການສົ່ງແຜ່ນຂໍທືນ ຫຼື ບໍ່ ?
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

    if (isset($_POST['btnConfirm'])) {
        $p_m_id = $_SESSION['p_m_id'];
        $adj_id = $_POST['adj_id'];
        $item = array();

        $university = mysqli_query($conn,"SELECT cre_id,adj_id,cp.course_id,course_name,fac_name,f.uni_id,uni_name,p_m_id,sum(std_qty) as std_qty,sum(emp_qty) as emp_qty,
        sum(std_qty) + sum(emp_qty) as total
        FROM create_plan cp
        LEFT JOIN course c ON cp.course_id=c.course_id
        LEFT JOIN faculty f ON c.fac_id=f.fac_id
        LEFT JOIN university u ON f.uni_id=u.uni_id
        WHERE adj_id='$adj_id' AND p_m_id='$p_m_id' AND `user_id`='$_SESSION[user_id]'
        GROUP BY f.uni_id;");
        foreach($university as $uni){
            $uni_id = $uni['uni_id'];

            $faculty = mysqli_query($conn,"SELECT cre_id,adj_id,cp.course_id,course_name,c.fac_id,fac_name,p_m_id,
                    sum(std_qty) as std_qty,sum(emp_qty) as emp_qty, sum(std_qty)+ sum(emp_qty) as total
                    FROM create_plan cp
                    LEFT JOIN course c ON cp.course_id=c.course_id
                    LEFT JOIN faculty f ON c.fac_id=f.fac_id
                    WHERE adj_id='$adj_id' AND p_m_id='$p_m_id' AND uni_id='$uni_id' AND `user_id`='$_SESSION[user_id]'
                    GROUP BY c.fac_id;");
            foreach ($faculty as $fac) {
                $fac_id = $fac['fac_id'];

                $course = mysqli_query($conn,"SELECT cre_id,adj_id,cp.course_id,c.fac_id,course_name,p_m_id,sum(std_qty) as std_qty,sum(emp_qty) as emp_qty, sum(std_qty)+ sum(emp_qty) as total
                    FROM create_plan cp
                    LEFT JOIN course c ON cp.course_id=c.course_id
                    LEFT JOIN faculty f ON c.fac_id=f.fac_id
                    WHERE adj_id='$adj_id' AND p_m_id='$p_m_id' AND uni_id='$uni_id' AND c.fac_id='$fac_id' AND `user_id`='$_SESSION[user_id]'
                    GROUP BY cp.course_id;");
                    foreach ($course as $cour) {
                        $cre_id = $cour['cre_id'];
                        $course_id = $cour['course_id'];

                        $item[] = ["cre_id" => $cre_id,"std_qty" => $_POST["std_$course_id"],"emp_qty" => $_POST["emp_$course_id"]];
                    }
            }
        }
        $item = json_encode($item, true);
        $obj->update_createPlan($item);
    }


     //check save
     if(isset($_GET['save'])=='fail'){
        echo'<script type="text/javascript">
        swal("", "ແກ້ໄຂແຜນສ້າງຜິດພາດ ກະລຸນາລອງໃໝ່ອີກຄັ້ງ", "error");
        </script>';
    }
    if(isset($_GET['save2'])=='success'){
        echo'<script type="text/javascript">
        swal("", "ແກ້ໄຂແຜນສ້າງສຳເລັດ", "success");
        </script>';
    }
?>

<!-- modal update -->
<!-- <form action="edit-demand" id="formUpdate" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂແຜນສ້າງນັກຮຽນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" align="left">
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ນ/ຮ</label>
                            <input type="hidden" name="student_update" id="id_update" placeholder="ລະຫັດປະເພດສິນຄ້າ">
                            <input type="text" name="province_id_update" id="student_update" placeholder=""
                                class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ພ/ງ</label>
                            <input type="text" name="employee_update" id="employee_update" placeholder=""
                                class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small class="">Error message</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnUpdate" id="Update" class="btn btn-outline-success"
                        onclick="">ແກ້ໄຂ</button>
                </div>
            </div>
        </div>
    </div>
</form> -->
<!-- end modal update -->






<script>
$(window).load(function() {
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

    // $('tr.parent')
    //     .css("cursor", "pointer")
    //     .attr("title", "Click to expand/collapse")
    //     .click(function() {
    //         $(this).siblings('.child-' + this.id).toggle();
    //     });
    // $('tr[@class^=child-]').hide().children('td');

});
</script>

<script>
$(document).ready(function() {

    function load_data(query) {
        $.ajax({
            url: "fetch.php",
            method: "POST",
            data: {
                query: query
            },
            beforeSend: function() {
                $(".waitload").css({
                    display: "block"
                });
                // $("#result").hide();
                $("#result").empty();
                $(".waitload").html(
                    "<br><br><div style='text-align: center;'><img src='<?= $path ?>image/loading.gif' style='width: 150px; height: 150px;' /></div>"
                );
            },
            complete: function(data) {
                $(".waitload").css({
                    display: "none"
                });
                $("#result").show();
            },
            error: function(data) {
                $('.waitload').html(
                    "<div class='waitload'><hr size='1' width='90%'><p align='center'>ເກີດຂໍ້ຜິດພາດ ມີຟາຍເສາຍຫາຍ ຫຼື ໂຄດໂປຼແກຼມຂາດຫາຍ</p><hr size='1' width='90%'></div>"
                );
            },
            success: function(data) {
                $("#result").html(data);
            }
        })
    };
    $('#status').change(function() {
        var page = "0";
        $("#amount").val(0);
        var status_id = $(this).val();
        if (status_id != '') {
            load_data(status_id);
        } else {
            load_data('%%');
        }
    });

});
</script>


<?php
 include ("../../header-footer/footer.php");
?>