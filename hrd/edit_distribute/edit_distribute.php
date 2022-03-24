<?php
  $title = "ແກ້ໄຂການແຈກຢາຍ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>



<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="dropdown">
            <select name="status" id="status" style="width: 450px;text-align-last: center;" class="form-control">
                <option value="" selected disabled>ເລືອກກົມ </option>
                <?php
                if($_SESSION["uni_id"] == "HRD1"){
                    $option = mysqli_query($conn, "SELECT adj_id,a.fy_id,a.dept_id,dept_name FROM adjust a LEFT JOIN fy ON a.fy_id=fy.fy_id LEFT JOIN department d ON a.dept_id=d.dept_id LEFT JOIN university u ON d.dept_id=u.dept_id WHERE fy.`status`=0 AND accept=1 GROUP BY a.adj_id ORDER BY fy_id DESC");
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
    </div>
</div>


<br>




<div class="waitload" id="waitload">
    <hr size="1" width="90%">
    <p align="center">ກະລຸນາເລືອກກົມ</p>
    <hr size="1" width="90%">
</div>
<div id="result">
</div>




<!-- modal update -->
<form action="edit-distribute" id="formUpdate" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂການແບ່ງປັນ</h5>
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
</form>
<!-- end modal update -->
</div>

<?php
    if (isset($_POST['btnConfirm'])) {
        $d_id = $_POST['d_id'];

        $result = mysqli_query($conn, "SELECT id,qd.d_id,qd.p_m_id,p_m_name,qd.std_qty,qd.emp_qty,qd.std_qty+qd.emp_qty as total_qty,qd.user_id,hrd_name
        FROM quota_distribute qd
        LEFT JOIN adjustdetail ad ON qd.d_id=ad.d_id
        LEFT JOIN province_ministry pm ON qd.p_m_id=pm.p_m_id
        LEFT JOIN `user` u ON qd.user_id=u.user_id
        LEFT JOIN hrd_user hu ON u.user_id=hu.user_id
        WHERE qd.d_id='$d_id'");
        foreach ($result as $row) {
            $id = "id_".$row["p_m_id"];
            $p_m_id = $row["p_m_id"];
            $std_qty = $_POST["std_qty_$p_m_id"];
            $emp_qty = $_POST["emp_qty_$p_m_id"];
            

            $item[] = ["id" => $_POST["$id"], "std_qty" => $std_qty, "emp_qty" => $emp_qty, "user_id" => $_SESSION['user_id']];
        }
        $item = json_encode($item,true);
        $obj -> update_quota_distribute($item);
    }

    //check save
    if(isset($_GET['save'])=='fail'){
        echo'<script type="text/javascript">
        swal("", "ແກ້ໄຂການແຈກຢາຍທຶນການສຶກສາຜິດພາດ ກະລຸນາລອງໃໝ່ອີກຄັ້ງ", "error");
        </>';
    }
    if(isset($_GET['save2'])=='success'){
        echo'<script type="text/javascript">
        swal("", "ແກ້ໄຂການແຈກຢາຍທຶນການສຶກສາສຳເລັດ", "success");
        </script>';
    }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    // load_data('%%');

    function load_data(query) {
        $.ajax({
            url: "../edit_distribute/fetch_edit_distribute.php",
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


    function load_data2(d_id) {
        $.ajax({
            url: "../edit_distribute/fetch_step2.php",
            method: "POST",
            data: {
                d_id: d_id
            },
            beforeSend: function() {
                $(".waitload2").css({
                    display: "block"
                });
                // $("#result").hide();
                $("#result2").empty();
                $(".waitload2").html(
                    "<br><br><div style='text-align: center;'><img src='<?= $path ?>image/loading.gif' style='width: 150px; height: 150px;' /></div>"
                );
            },
            complete: function(data) {
                $(".waitload2").css({
                    display: "none"
                });
                $("#result2").show();
            },
            error: function(data) {
                $('.waitload2').html(
                    "<div class='waitload'><hr size='1' width='90%'><p align='center'>ເກີດຂໍ້ຜິດພາດ ມີຟາຍເສາຍຫາຍ ຫຼື ໂຄດໂປຼແກຼມຂາດຫາຍ</p><hr size='1' width='90%'></div>"
                );
            },
            success: function(data) {
                $('#result2').html(data);
            }
        });
    }

    $(document).on('click', '.btnUpdate_cust', function() {

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);


        $('#d_id').val(data[21]);


        // var adj_id = $('#adj_id').val();
        var d_id = $('#d_id').val();
        load_data2(d_id);
    });
});



// $(document).ready(function() {
//     $('tr.parent')
//         .css("cursor", "pointer")
//         .attr("title", "Click to expand/collapse")
//         .click(function() {
//             $(this).siblings('.child-' + this.id).toggle();
//         });
//     $('tr[@class^=child-]').hide().children('td');
// });


// $('.plus').on('click', function() {
//     $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) +
//         parseInt($('#num4').val()));
//     $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
//     $("#totalall").val(parseInt($("#total1").val()));
// });
// $('.minus').on('click', function() {
//     $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) +
//         parseInt($('#num4').val()));
//     $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
//     $("#totalall").val(parseInt($("#total1").val()));
// });

// $("#num1").change(function() {
//     $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) +
//         parseInt($('#num4').val()));
//     $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
//     $("#totalall").val(parseInt($("#total1").val()));
// });
// $("#num2").change(function() {
//     $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) +
//         parseInt($('#num4').val()));
//     $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
//     $("#totalall").val(parseInt($("#total1").val()));
// });

// $("#num3").change(function() {
//     $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) +
//         parseInt($('#num4').val()));
//     $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
//     $("#totalall").val(parseInt($("#total1").val()));
// });
// $("#num4").change(function() {
//     $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) +
//         parseInt($('#num4').val()));
//     $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
//     $("#totalall").val(parseInt($("#total1").val()));
// });

// $("#num5").change(function() {
//     $("#total4").val(parseInt($("#num3").val()) + parseInt($('#num4').val()));
//     $("#total5").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
//     $("#totalall").val(parseInt($("#total1").val()));
// });
</script>









<?php
 include ("../../header-footer/footer.php");
?>

