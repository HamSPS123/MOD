<?php
  $title = "ສະຖິຕິປະຈຳປີ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");

  if(isset($_POST['btnSave'])){
    $obj->insert_statistic_detail($_POST['adj_id'],$_POST['st_ID'],$_POST['std_high_school'],$_POST['univer'],$_POST['univer_val'],$_POST['prov'],$_POST['intv'],$_POST['ad_test'],$_POST['std_pub'],$_POST['emp'],$_POST['std_handi'],$_POST['std_lan'],$_POST['ssk'],$_POST['std'],$_POST['emp_gov'],$_POST['test'],$_POST['std_con'],$_POST['std_2lan'],$_POST['std_inter'],$_POST['emp_private'],$_SESSION['user_id']);
    }
    if(isset($_POST['btnEdit'])){
        $obj->update_statistic_detail($_POST['as_id'],$_POST['std_high_school_update'],$_POST['univer_update'],$_POST['univer_val_update'],$_POST['prov_update'],$_POST['intv_update'],$_POST['ad_test_update'],$_POST['std_pub_update'],$_POST['emp_update'],$_POST['std_handi_update'],$_POST['std_lan_update'],$_POST['ssk_update'],$_POST['std_update'],$_POST['emp_gov_update'],$_POST['test_update'],$_POST['std_con_update'],$_POST['std_2lan_update'],$_POST['std_inter_update'],$_POST['emp_private_update'],$_SESSION['user_id']);
    }
    if(isset($_POST['btn_save_dis'])){
        $item = array();
        $p_m = mysqli_query($conn, "SELECT * FROM province_ministry");
        foreach($p_m as $post){
            $p_id = $post['p_m_id'];

            
            $item[] = ["as_id"=>$_POST['as_id'],"p_m_id"=>$p_id,"std_qty"=>$_POST["std_qty_$p_id"],"emp_qty"=>$_POST["emp_qty_$p_id"],"user_id" => $_SESSION['user_id']];
        }

        $item = json_encode($item,true);
        $obj->insert_statistic_distribute($item);
    }

    if(isset($_POST['btn_update_dis'])){
        $item = array();
        $p_m = mysqli_query($conn, "SELECT * FROM province_ministry");
        foreach($p_m as $post){
            $p_id = $post['p_m_id'];

            
            $item[] = ["sd_id"=>$_POST["sd_id_$p_id"],"as_id"=>$_POST['as_id'],"p_m_id"=>$p_id,"std_qty"=>$_POST["std_qty_$p_id"],"emp_qty"=>$_POST["emp_qty_$p_id"],"user_id" => $_SESSION['user_id']];
        }

        $item = json_encode($item,true);
        // echo "<script>
        //     console.log('$item');
        // </script>";
        $obj->update_statistic_distribute($item);
    }
?>



<style>
table {
    font-size: 20px;
    font-family: '10B Muc Zeit', 'Noto Sans Lao' !important;
    font-weight: bold !important;
}

/* Important part */
.modal-dialog {
    overflow-y: initial !important
}

.modal-body {
    height: 75vh;
    overflow-y: auto;
}
</style>





<div class="row">
    <div class="col-xs-12 col-md-6">
        <h2>ຕົວເລກສະຖິຕິນັກຮຽນແຕ່ລະປີ</h2>
        <h5>ກະລຸນາປ້ອນຈຳນວນຮອງຮັບນັກສຶກສາໃນສາຖາບັນຂອງທ່ານ</h5>
    </div>
    <div class="col-xs-12 col-md-6" align="right">
        <!-- <h5>ລວມທັງໝົດ <input type="number" class="totalall" value="0" name="totalall" id="amount"
                style="border: none;width:100px;font-weight: bold;" disabled></h5>
        <button type="button" name="send" id="btnSend" class="btn btn-sm btn-success send" data-toggle="modal"
            data-target="#confirm"> &nbsp&nbsp
            </span>ຢືນຢັນແຜນຮັບ</button> <br> <br> -->
    </div>


    <div class="col-xs-12 col-md-6 dropdown">
        <select name="status" id="status" style="width: 450px;text-align-last: center;" class="form-control status">
            <option value="" selected disabled>ເລືອກກົມ</option>
            <?php
                
                    $option = mysqli_query($conn, "SELECT adj_id,a.fy_id,a.dept_id,dept_name,accept FROM adjust a LEFT JOIN fy ON a.fy_id=fy.fy_id LEFT JOIN department d ON a.dept_id=d.dept_id WHERE `status`=0 ORDER BY adj_id");
                
                foreach($option as $row){
                  ?>
            <option value="<?= $row['adj_id'] ?>"><?= $row['dept_name'] ?> - <?= $row['fy_id'] ?></option>
            <?php
                }
              ?>
        </select>
    </div>
    <br>
    <br>
    <!-- endtable -->
</div>

<div class="waitload" id="waitload">
    <hr size="1" width="90%">
    <p align="center">ບໍ່ມີຂໍ້ມູນ</p>
    <hr size="1" width="90%">
</div>
<div id="result">
</div>

<!-- <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    ທ່ານຕ້ອງການສົ່ງແຜ່ນຮັບນັກຮຽນ ຫຼື ບໍ່ ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnConfirm" class="btn btn-outline-primary">ຢືນຢັນ</button>
                </div>
            </div>
        </div>
    </div> -->

<form action="statistic.php" method="post" class="needs-validation" novalidate>
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><span id="title-header">ເພີ່ມຂໍ້ມູນ</span> <span id="total">0</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="st_ID" id="st_ID">
                    <input type="hidden" name="adj_id" id="adj_id">
                    <h5 class="mt-3">ນັກຮຽນ ມ7: <span id="total-high" onchange="cal_total()">0</span></h5>
                    <hr>
                    <div class="col-md-12">
                        <label for="">ນັກຮຽນ ມ7</label>
                        <input type="number" name="std_high_school" id="std_high_school" class="form-control" onchange="cal_high()" value="0" min="0" required>
                    </div>

                    <h5 class="mt-3">ແບ່ງປັນ: <span id="total-dis" onchange="cal_total()">0</span></h5>
                    <hr>
                    <div class="col-md-12">
                        <label for="">ມະຫາໄລ</label>
                        <input type="number" name="univer" id="univer" class="form-control" onchange="cal_dis()" value="0" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ຄູອາສາສະໝັກ</label>
                        <input type="number" name="univer_val" id="univer_val" class="form-control" onchange="cal_dis()" value="0" min="0"
                            required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ແຂວງ</label>
                        <input type="number" name="prov" id="prov" class="form-control" onchange="cal_dis()" value="0" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ສຳພາດ</label>
                        <input type="number" name="intv" id="intv" class="form-control" onchange="cal_dis()" value="0" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ສອບເສັງ</label>
                        <input type="number" name="ad_test" id="ad_test" class="form-control" onchange="cal_dis()" value="0" min="0"
                            required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ພະນັກງານ</label>
                        <input type="number" name="emp" id="emp" class="form-control" onchange="cal_dis()" value="0" min="0"
                            required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ນັກຮຽນສາມັນ</label>
                        <input type="number" name="std_pub" id="std_pub" class="form-control" onchange="cal_dis()" value="0" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ນັກຮຽນພິການ</label>
                        <input type="number" name="std_handi" id="std_handi" class="form-control" onchange="cal_dis()" value="0" min="0"
                            required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ນັກຮຽນຫ້ອງ 2 ພາສາ</label>
                        <input type="number" name="std_lan" id="std_lan" class="form-control" onchange="cal_dis()" value="0" min="0"
                            required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ສສກ ແບ່ງ</label>
                        <input type="number" name="ssk" id="ssk" class="form-control" onchange="cal_dis()" value="0" min="0" required>
                    </div>

                    <h5 class="mt-3">ແຈກຢາຍ: <span id="total-quota" onchange="cal_total()">0</span></h5>
                    <hr>
                    <div class="col-md-12">
                        <label for="">ນັກຮຽນ</label>
                        <input type="number" name="std" id="std" class="form-control" onchange="cal_quota()" value="0" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ພະນັກງານລັດ</label>
                        <input type="number" name="emp_gov" id="emp_gov" class="form-control" onchange="cal_quota()" value="0" min="0"
                            required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ສອບເສັງ</label>
                        <input type="number" name="test" id="test" class="form-control" onchange="cal_quota()" value="0" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ນັກຮຽນຕໍ່ເນື່ອງ</label>
                        <input type="number" name="std_con" id="std_con" class="form-control" onchange="cal_quota()" value="0" min="0"
                            required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ນັກຮຽນຫ້ອງ 2 ພາສາ ລາວ-ຝລັ່ງ</label>
                        <input type="number" name="std_2lan" id="std_2lan" class="form-control" onchange="cal_quota()" value="0" min="0"
                            required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ນັກຮຽນຕ່າງປະເທດ</label>
                        <input type="number" name="std_inter" id="std_inter" class="form-control" onchange="cal_quota()" value="0" min="0"
                            required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ພະນັກງານເອກະຊົນ</label>
                        <input type="number" name="emp_private" id="emp_private" class="form-control" onchange="cal_quota()" value="0" min="0"
                            required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnSave" id="btnSave" class="btn btn-success">ບັນທຶກ</button>
                </div>
            </div>
        </div>
    </div>
</form>


<?php
    if (isset($_POST['btnConfirm'])) {
        $adj_id = $_POST['adj_id'];
        $dept_id = $_SESSION["dept_id"];
        $item = array();
        $unitversity = mysqli_query($conn,"SELECT u.uni_id,uni_name,sum(get_plan) AS total_uni FROM adjustdetail a LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id WHERE adj_id='$adj_id' AND u.dept_id='$dept_id' GROUP BY u.uni_id ORDER BY u.uni_id ASC;");
        foreach($unitversity as $uni){
            $uni_id = $uni['uni_id'];
            $faculty = mysqli_query($conn, "SELECT f.fac_id,fac_name,sum(get_plan) AS total_fac FROM adjustdetail a LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id WHERE u.uni_id='$uni_id' AND adj_id='$adj_id' GROUP BY f.fac_id;");
                foreach($faculty as $fac){
                    $course = mysqli_query($conn, "SELECT d_id,a.course_id,course_name,get_plan,sup_name FROM adjustdetail a LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id LEFT JOIN supply_user su ON a.user_id=su.user_id WHERE f.fac_id='$fac[fac_id]' AND adj_id='$adj_id' GROUP BY a.course_id;");
                    foreach($course as $crs){
                        $course_id = $crs['course_id'];
                        $d_id = $crs["d_id"];
                        if ($crs['get_plan'] != $_POST["get_plan_$course_id"]) {
                            $item[] = ["adj_id" => $adj_id,"course_id" => $course_id,"get_plan" => $_POST["get_plan_$course_id"],"user_id" => $_SESSION["user_id"],"d_id" => $_POST["d_id_$d_id"]];
                        }
                    }
                }
        }
        $item = json_encode($item, true);

        echo '<script>console.log(\''.$item.'\');</script>';
        $obj->dept_approve($item,$adj_id);
    }

     //check save
     if(isset($_GET['save'])=='fail'){
        echo'<script type="text/javascript">
        swal("", "ຢືນຢັນແຜນສ້າງຜິດພາດ ກະລຸນາລອງໃໝ່ອີກຄັ້ງ", "error");
        </script>';
    }
    if(isset($_GET['save2'])=='success'){
        echo'<script type="text/javascript">
        swal("", "ຢືນຢັນແຜນສ້າງສຳເລັດ", "success");
        </script>';
    }

    if(isset($_GET['msg'])){
        if($_GET['msg'] == 'success'){
            echo'<script type="text/javascript">
            swal("", "ສຳເລັດ", "success");
            </script>';
        }

        if($_GET['msg'] == 'fail'){
            echo'<script type="text/javascript">
            swal("", "ຜິດພາດ ກະລຸນາລອງໃໝ່ອີກຄັ້ງ", "success");
            </script>';
        }
    }
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
});
</script>

<?php
 include ("../../header-footer/footer.php");
?>


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
        });

        
    };
    $('.status').change(function() {
        // $('.status').on('change', function() {
        $("#amount").val(0);
        var status_id = $(this).val();
        if (status_id != '') {
            load_data(status_id);
        } else {
            load_data('0');
        }

        var adj_id = document.getElementById("status").value;
        document.getElementById("adj_id").value = adj_id;
    });
});
</script>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();



function cal_dis(){
    let total = 0;

    let univer = Number.parseInt(document.getElementById("univer").value);
    let univer_val = Number.parseInt(document.getElementById("univer_val").value);
    let prov = Number.parseInt(document.getElementById("prov").value);
    let intv = Number.parseInt(document.getElementById("intv").value);
    let ad_test = Number.parseInt(document.getElementById("ad_test").value);
    let std_pub = Number.parseInt(document.getElementById("std_pub").value);
    let emp = Number.parseInt(document.getElementById("emp").value);
    let std_handi = Number.parseInt(document.getElementById("std_handi").value);
    let std_lan = Number.parseInt(document.getElementById("std_lan").value);
    let ssk = Number.parseInt(document.getElementById("ssk").value);


    total = univer+univer_val+prov+intv+ad_test+std_pub+emp+std_handi+std_lan+ssk;
    
    document.getElementById("total-dis").innerHTML = total;
}

function cal_quota(){
    let total = 0;

    let std = Number.parseInt(document.getElementById("std").value);
    let emp_gov = Number.parseInt(document.getElementById("emp_gov").value);
    let test = Number.parseInt(document.getElementById("test").value);
    let std_con = Number.parseInt(document.getElementById("std_con").value);
    let std_2lan = Number.parseInt(document.getElementById("std_2lan").value);
    let std_inter = Number.parseInt(document.getElementById("std_inter").value);
    let emp_private = Number.parseInt(document.getElementById("emp_private").value);


    total = std+emp_gov+test+std_con+std_2lan+std_inter+emp_private;
    
    document.getElementById("total-quota").innerHTML = total;
}

function cal_high(){

    let std = Number.parseInt(document.getElementById("std_high_school").value);
    
    document.getElementById("total-high").innerHTML = std;
}

function cal_total(){
    let total = 0;

    let total_high = Number.parseInt(document.getElementById("total-high").value);
    let total_dis = Number.parseInt(document.getElementById("total-quota").value);
    let total_quota = Number.parseInt(document.getElementById("total-dis").value);


    total = total_high+total_dis+total_quota;

    document.getElementById("totat").innerHTML = total;
}


</script>