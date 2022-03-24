<?php
  $title = "ແຜນແບ່ງປັນທຶນການສຶກສາ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>



<div class="row">
    <div class="col-xs-12 col-md-6">
        <select name="status" id="status" style="width: 450px;text-align-last: center;" class="form-control">
            <option value="" selected disabled>ເລືອກກົມ</option>
            <?php
                if($_SESSION["uni_id"] == "HRD1"){
                    $option = mysqli_query($conn, "SELECT adj_id,a.fy_id,a.dept_id,dept_name FROM adjust a LEFT JOIN fy ON a.fy_id=fy.fy_id LEFT JOIN department d ON a.dept_id=d.dept_id LEFT JOIN university u ON d.dept_id=u.dept_id WHERE fy.`status`=0 AND accept=1 GROUP BY adj_id ORDER BY fy_id DESC");
                }
                else{
                    $option = mysqli_query($conn, "SELECT adj_id,a.fy_id,a.dept_id,dept_name FROM adjust a LEFT JOIN fy ON a.fy_id=fy.fy_id LEFT JOIN department d ON a.dept_id=d.dept_id LEFT JOIN university u ON d.dept_id=u.dept_id WHERE fy.`status`=0 AND u.uni_id='$_SESSION[uni_id]' AND accept=1 ORDER BY fy_id DESC");
                }
                foreach($option as $row){
                  ?>
            <option value="<?= $row['adj_id'] ?>"><?= $row['dept_name'] ?> - <?= $row['fy_id'] ?></option>
            <?php
                }
              ?>
        </select>
    </div>
    <div class="col-xs-12 col-md-6 text-right">
        <h5 class="float: right;">ລວມທັງໝົດ: <input type="number" name="amount" id="amount" class="totalall"
                style="border: none; background: transparent;width: 100px" value="0" disabled></h5>
        <button type="button" class="btn btn-sm btn-primary" name="btnSend" id="btnSend" data-toggle="modal"
            data-target="#confirm"><span class="fa fa-paper-plane"> &nbsp;&nbsp;
            </span>ແບ່ງປັນທຶນການສຶກສາ</button>
    </div>
</div>
<br>

<form action="share" method="post" id="form-check" class="needs-validation" novalidate>
    <div class="waitload" id="waitload">
        <hr size="1" width="90%">
        <p align="center">ກະລຸນາເລືອກກົມ</p>
        <hr size="1" width="90%">
    </div>
    <div id="result">
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
                    ທ່ານຕ້ອງການສົ່ງແຜ່ນຮັບນັກຮຽນ ຫຼື ບໍ່ ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnConfirm" class="btn btn-outline-primary">ຢືນຢັນ</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- endtable -->



<?php
    if (isset($_POST['btnConfirm'])) {
        $item = array();
        $adj_id = $_POST['adj_id'];
        $faculty = mysqli_query($conn, "SELECT * FROM adjust WHERE adj_id='$adj_id'");
        $fac = mysqli_fetch_array($faculty, MYSQLI_ASSOC);
        $dept_id = $fac['dept_id'];
    

    // $university = mysqli_query($conn, );
    $u = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_unit FROM adjustdetail ad
    LEFT JOIN course c ON ad.course_id=c.course_id
    LEFT JOIN faculty f ON c.fac_id=f.fac_id
    LEFT JOIN university u ON f.uni_id=u.uni_id
    LEFT JOIN department d ON u.dept_id=d.dept_id
    LEFT JOIN adjust a ON ad.adj_id=a.adj_id
    WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' GROUP BY u.uni_id");
    $no_ = 0;
    foreach($u as $un){
        $u_id = $un['uni_id'];
        $f = mysqli_query($conn,"SELECT u.uni_id,uni_name,f.fac_id,fac_name,dept_name,sum(get_plan) AS total_fac FROM adjustdetail ad
        LEFT JOIN course c ON ad.course_id=c.course_id
        LEFT JOIN faculty f ON c.fac_id=f.fac_id
        LEFT JOIN university u ON f.uni_id=u.uni_id
        LEFT JOIN department d ON u.dept_id=d.dept_id
        LEFT JOIN adjust a ON ad.adj_id=a.adj_id
        WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$u_id' GROUP BY f.fac_id");
        //Loop ຄະນະອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
        foreach($f as $fc){
            $f_id = $fc['fac_id'];
            $c = mysqli_query($conn,"SELECT u.uni_id,uni_name,f.fac_id,fac_name,dept_name,ad.course_id,course_name,get_plan FROM adjustdetail ad
            LEFT JOIN course c ON ad.course_id=c.course_id
            LEFT JOIN faculty f ON c.fac_id=f.fac_id
            LEFT JOIN university u ON f.uni_id=u.uni_id
            LEFT JOIN department d ON u.dept_id=d.dept_id
            LEFT JOIN adjust a ON ad.adj_id=a.adj_id
            WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$u_id' AND c.fac_id='$f_id'");
            // Loop ສາຂາວິຊາອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
            foreach($c as $cr){
                $course_id = $cr["course_id"];
                $remark = $_SESSION['user_id'] ." ". $_SESSION['hrd_name'];
                $d_id = "d_id_".$course_id;
                $item[] = ["d_id" => $_POST["$d_id"],
                "univer" => $_POST["num_course_univer_$course_id"],
                "univer_val" => $_POST["num_course_univer_val_$course_id"],
                "prov" => $_POST["num_course_prov_$course_id"],
                "intv" => $_POST["num_course_intv_$course_id"],
                "ad_test" => $_POST["num_course_ad_test_$course_id"],
                "std_pub" => $_POST["num_course_std_pub_$course_id"],
                "emp" => $_POST["num_course_emp_$course_id"],
                "std_handi" => $_POST["num_course_std_handi_$course_id"],
                "std_lan" => $_POST["num_course_std_lan_$course_id"],
                "ssk" => $_POST["num_course_ssk_$course_id"],
                "std" => $_POST["num_course_std_$course_id"],
                "emp_gov" => $_POST["num_course_emp_gov_$course_id"],
                "test" => $_POST["num_course_test_$course_id"],
                "std_con" => $_POST["num_course_std_con_$course_id"],
                "std_2lan" => $_POST["num_course_std_2lan_$course_id"],
                "std_inter" => $_POST["num_course_std_inter_$course_id"],
                "emp_private" => $_POST["num_course_emp_private_$course_id"],
                "remark_hrd" => $remark];
                // $result = mysqli_query($conn, "call adjust_detail('','','','','','','','','','','','','','','','','$remark')");
                // if (!$result) {
                //     echo "Fails!!!";
                // }
            }
        }
    }
        $item = json_encode($item, true);
        $obj->insert_adjust_detail($item);
    }


    //check save
    if(isset($_GET['save'])=='fail'){
        echo'<script type="text/javascript">
        swal("", "ແບ່ງປັນທຶນການສຶກສາຜິດພາດ ກະລຸນາລອງໃໝ່ອີກຄັ້ງ", "error");
        </script>';
    }
    if(isset($_GET['save2'])=='success'){
        echo'<script type="text/javascript">
        swal("", "ແບ່ງປັນທຶນການສຶກສາສຳເລັດ", "success");
        </script>';
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
            url: "fetch_share.php",
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
</script>