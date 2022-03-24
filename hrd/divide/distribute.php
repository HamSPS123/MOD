<?php
  $title = "ແຈກຢາຍທຶນການສຶກສາ";
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
    <p align="center">ບໍ່ມີຂໍ້ມູນ</p>
    <hr size="1" width="90%">
</div>
<div id="fetch_dist">
</div>
<br>





<br>

<?php
    if (isset($_POST['btnConfirm'])) {
        $adj_id = $_POST['adj_id2'];
        $course_id = $_POST['course_id2'];
        $fac_id = $_POST['fac_id2'];
        $item = array();
        
        $detail = mysqli_query($conn, "SELECT d_id FROM adjustdetail WHERE adj_id='$adj_id' AND course_id='$course_id'");
        $detail_id = mysqli_fetch_array($detail,MYSQLI_ASSOC);

        $result = mysqli_query($conn, "SELECT cre_id,adj_id,cp.course_id,course_name,fac_name,uni_name,cp.p_m_id,p_m_name,sum(std_qty) + sum(emp_qty) as total,user_id
        FROM create_plan cp
        LEFT JOIN province_ministry pm ON cp.p_m_id=pm.p_m_id
        LEFT JOIN course c ON cp.course_id=c.course_id
        LEFT JOIN faculty f ON c.fac_id=f.fac_id
        LEFT JOIN university u ON f.uni_id=u.uni_id
        WHERE cp.course_id='$course_id' AND adj_id='$adj_id'
        GROUP BY cp.p_m_id ORDER BY cp.p_m_id");
        foreach ($result as $row) {
            $d_id = $detail_id['d_id'];
            $p_m_id = $row['p_m_id'];
            $std_qty = $_POST["std_qty_$p_m_id"];
            $emp_qty = $_POST["emp_qty_$p_m_id"];
            

            $item[] = ["d_id" => $d_id, "p_m_id" => $p_m_id, "std_qty" => $std_qty, "emp_qty" => $emp_qty, "user_id" => $_SESSION['user_id']];
        }
        $item = json_encode($item,true);
        $obj -> insert_quota_distribute($item);
    }

    //check save
    if(isset($_GET['save'])=='fail'){
        echo'<script type="text/javascript">
        swal("", "ການແຈກຢາຍທຶນການສຶກສາຜິດພາດ ກະລຸນາລອງໃໝ່ອີກຄັ້ງ", "error");
        </script>';
    }
    if(isset($_GET['save2'])=='success'){
        echo'<script type="text/javascript">
        swal("", "ການແຈກຢາຍທຶນການສຶກສາສຳເລັດ", "success");
        </script>';
    }
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function() {

    function load_data(query) {
        $.ajax({
            url: "fetch_distribute.php",
            method: "POST",
            data: {
                query: query
            },
            beforeSend: function() {
                $(".waitload").css({
                    display: "block"
                });
                // $("#result").hide();
                $("#fetch_dist").empty();
                $(".waitload").html(
                    "<br><br><div style='text-align: center;'><img src='<?= $path ?>image/loading.gif' style='width: 150px; height: 150px;' /></div>"
                );
            },
            complete: function(data) {
                $(".waitload").css({
                    display: "none"
                });
                $("#fetch_dist").show();
            },
            error: function(data) {
                $('.waitload').html(
                    "<div class='waitload'><hr size='1' width='90%'><p align='center'>ເກີດຂໍ້ຜິດພາດ ມີຟາຍເສາຍຫາຍ ຫຼື ໂຄດໂປຼແກຼມຂາດຫາຍ</p><hr size='1' width='90%'></div>"
                );
            },
            success: function(data) {
                $("#fetch_dist").html(data);
            }
        });
    };
    
    function load_data2(adj, course) {
        $.ajax({
            url: "fetch_step2.php",
            method: "POST",
            data: {
                adj: adj,
                course: course
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


        $('#course_id').val(data[21]);


        var adj_id = $('#adj_id').val();
        var course_id = $('#course_id').val();
        load_data2(adj_id, course_id);
    });
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

    //     $('tr.parent')
    //         .css("cursor", "pointer")
    //         .attr("title", "Click to expand/collapse")
    //         .click(function() {
    //             $(this).siblings('.child-' + this.id).toggle();
    //         });
    //     $('tr[@class^=child-]').hide().children('td');
});
</script>
<script type="text/javascript">
// $(document).ready(function() {
//     $('tr.parent')
//         .css("cursor", "pointer")
//         .attr("title", "Click to expand/collapse")
//         .click(function() {
//             $(this).siblings('.child-' + this.id).toggle();
//         });
//     $('tr[@class^=child-]').hide().children('td');
// });


$('.plus').on('click', function() {
    $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) +
        parseInt($('#num4').val()));
    $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
    $("#totalall").val(parseInt($("#total1").val()));
});
$('.minus').on('click', function() {
    $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) +
        parseInt($('#num4').val()));
    $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
    $("#totalall").val(parseInt($("#total1").val()));
});

$("#num1").change(function() {
    $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) +
        parseInt($('#num4').val()));
    $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
    $("#totalall").val(parseInt($("#total1").val()));
})
$("#num2").change(function() {
    $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) +
        parseInt($('#num4').val()));
    $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
    $("#totalall").val(parseInt($("#total1").val()));
})

$("#num3").change(function() {
    $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) +
        parseInt($('#num4').val()));
    $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
    $("#totalall").val(parseInt($("#total1").val()));
})
$("#num4").change(function() {
    $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) +
        parseInt($('#num4').val()));
    $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
    $("#totalall").val(parseInt($("#total1").val()));
})

$("#num5").change(function() {
    $("#total4").val(parseInt($("#num3").val()) + parseInt($('#num4').val()));
    $("#total5").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
    $("#totalall").val(parseInt($("#total1").val()));
})
</script>


<?php
 include ("../../header-footer/footer.php");
?>