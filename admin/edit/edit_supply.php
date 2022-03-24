<?php
  $title = "ແກ້ໄຂແຜນຮັບນັກຮຽນ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>



<style>
table {
    font-size: 20px;
    font-family: '10B Muc Zeit', 'Noto Sans Lao' !important;
    font-weight: bold !important;
}
</style>




<form action="edit-supply" method="Post">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h2>ແກ້ໄຂແຜນຮັບນັກຮຽນ</h2>
            <h5>ກະລຸນາປ້ອນຈຳນວນຮອງຮັບນັກສຶກສາໃນສາຖາບັນຂອງທ່ານ</h5>
        </div>
        <div class="col-xs-12 col-md-6" align="right">
            <h5>ລວມທັງໝົດ <input type="number" class="totalall" value="0" name="totalall" id="amount"
                    style="border: none;width:100px;font-weight: bold;" disabled></h5>
            <button type="button" name="send" id="btnSend" class="btn btn-sm btn-success send" data-toggle="modal"
                data-target="#confirm"> &nbsp&nbsp
                </span>ແກ້ໄຂແຜນຮັບນັກສຶກສາ</button> <br> <br>
        </div>


        <div class="col-xs-12 col-md-6 dropdown">
            <select name="status" id="status" style="width: 250px;text-align-last: center;" class="form-control status">
                <option value="" selected disabled> ເລືອກສົກຮຽນ </option>
                <?php
                        $fy = mysqli_query($conn, "SELECT * FROM fy");
                        foreach($fy as $row){
                            ?>
                <option value="<?= $row['fy_id'] ?>"><?= $row['fy_id'] ?></option>
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


<?php
    if (isset($_POST['btnConfirm'])) {
        $fy_id = $_POST['status'];
        $fy2 = mysqli_query($conn, "select dept_id from  adjust where fy_id='$fy_id' group by dept_id");
        if(mysqli_num_rows($fy2) > 0){
            $dept_id = array();
            foreach($fy2 as $row_dept_id){
                $dept_id[] = "\"".$row_dept_id['dept_id']."\"";
            }
            $dept_id = implode(",", $dept_id);
        }
        $unitversity = mysqli_query($conn,"SELECT u.uni_id,uni_name,sum(get_plan) AS total_uni FROM adjustdetail a LEFT JOIN adjust ad ON a.adj_id=ad.adj_id LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id WHERE u.dept_id in ($dept_id) AND ad.fy_id='$fy_id' GROUP BY u.uni_id;");
        foreach($unitversity as $uni){
            $faculty = mysqli_query($conn, "SELECT f.fac_id,fac_name,sum(get_plan) AS total_fac FROM adjustdetail a LEFT JOIN adjust ad ON a.adj_id=ad.adj_id LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id WHERE f.uni_id='$uni[uni_id]' AND ad.fy_id='$fy_id' GROUP BY f.fac_id;");
            foreach($faculty as $fac){
                $course = mysqli_query($conn, "SELECT d_id,a.course_id,course_name,get_plan,sup_name,surname FROM adjustdetail a LEFT JOIN adjust ad ON a.adj_id=ad.adj_id LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id LEFT JOIN supply_user su ON a.user_id=su.user_id WHERE f.fac_id='$fac[fac_id]' AND ad.fy_id='$fy_id' GROUP BY a.course_id;");
                foreach($course as $crs){
                    $course_id = $crs['course_id'];
                    if ($crs['get_plan'] != $_POST["get_plan_$course_id"]) {
                        $item[] = ["course_id" => $course_id,"get_plan" => $_POST["get_plan_$course_id"],"user_id" => $_SESSION["user_id"],"d_id" => $crs["d_id"]];
                    }
                }
            }
        }
        $item = json_encode($item, true);
        $obj->update_get_plan($item);
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
            url: "fetch_edit_supply.php",
            method: "POST",
            data: {
                query: query
            },
            beforeSend: function() {
                $(".waitload").css({ display: "block" });
                // $("#result").hide();
                $("#result").empty();
                $(".waitload").html(
                    "<br><br><div style='text-align: center;'><img src='<?= $path ?>image/loading.gif' style='width: 150px; height: 150px;' /></div>"
                );
            },
            complete: function(data) {
                $(".waitload").css({ display: "none" });
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
    });
});
</script>