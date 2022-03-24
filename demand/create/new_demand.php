<?php
  $title = "ສະເໜີແຜນສ້າງນັກຮຽນ";
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




<form action="new-demand" method="Post">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h2>ແຜນສ້າງນັກຮຽນ</h2>
            <h5>ກະລຸນາປ້ອນຈຳນວນນັກສຶກສາທີ່ຕ້ອງການຂໍທຶນ</h5>
        </div>
        <div class="col-xs-12 col-md-6" align="right">
            <h5>ລວມທັງໝົດ <input type="number" class="totalall" value="0" name="totalall" id="amount"
                    style="border: none;width:100px;font-weight: bold;" disabled></h5>
            <button type="button" name="send" id="btnSend" class="btn btn-sm btn-primary send" data-toggle="modal"
                data-target="#confirm"><span class="fa fa-paper-plane"> &nbsp&nbsp
                </span>ສົ່ງແຜນຂໍທຶນການສຶກສາ</button> <br> <br>
            <!-- <button type="submit" name="send" id="btnSend" class="btn btn-sm btn-primary send"><span
                    class="fa fa-paper-plane"> &nbsp&nbsp
                </span>ສົ່ງແຜນຂໍທຶນການສຶກສາ</button> <br> <br> -->
        </div>

        <div class="col-xs-12 col-md-3 dropdown">

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
                    echo '<option disabled >ສູນກາງຍັງບໍ່ເປີດສົກຮຽນ</option>';
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
    if (isset($_POST["btnConfirm"])) {
        $adj_id = $_POST["status"];
        $item = array();
        $fy2 = mysqli_query($conn, "select * from adjust where adj_id='$adj_id'");
        $row_fy2 = mysqli_fetch_array($fy2,MYSQLI_ASSOC);
        $id = $row_fy2["dept_id"];
        $unitversity = mysqli_query($conn,"select * from university where dept_id='$id';");
        foreach($unitversity as $uni){
            $unit_id = $uni["uni_id"];
            $faculty = mysqli_query($conn,"select * from faculty where uni_id='$unit_id'");
            foreach($faculty as $fac){
                $fac_id = $fac['fac_id'];
                $course = mysqli_query($conn,"select * from course where fac_id='$fac_id'");
                foreach($course as $cour){
                    $cour_id = $cour["course_id"];
                    if ((empty($_POST["std_$cour_id"]) || $_POST["std_$cour_id"] == 0) && (empty($_POST["emp_$cour_id"]) || $_POST["emp_$cour_id"] == 0)) {
                        
                    }else{
                        $item[] = ["adj_id" => $adj_id,"course_id" => $cour_id,"p_m_id" => $_SESSION["p_m_id"],"std_qty" => $_POST["std_$cour_id"],"emp_qty" => $_POST["emp_$cour_id"],"user_id" => $_SESSION["user_id"]];
                    }
                }
            }
        }
        // $item = json_encode($item,true);
        $obj->insert_createPlan(json_encode($item,true));
    }


     //check save
    if(isset($_GET['save'])=='fail'){
        echo'<script type="text/javascript">
        swal("", "ສົ່ງແຜນສ້າງຜິດພາດ ກະລຸນາລອງໃໝ່ອີກຄັ້ງ", "error");
        </script>';
    }
    if(isset($_GET['save2'])=='success'){
        echo'<script type="text/javascript">
        swal("", "ສົ່ງແຜນສ້າງສຳເລັດ", "success");
        </script>';
    }
?>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->

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
    $('tr.parent')
        .css("cursor", "pointer")
        .attr("title", "Click to expand/collapse")
        .click(function() {
            $(this).siblings('.child-' + this.id).toggle();
        });
    $('tr[@class^=child-]').hide().children('td');

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