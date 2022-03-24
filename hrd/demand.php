<?php
  $title = "ໜ້າຫຼັກ";
  $path = "../";
  $links = "";
  $session_path = "../";
  include ("../header-footer/header.php");
  $conn = mysqli_connect("Localhost", "root", "", "test");

?>

<style>
table {
    font-size: 20px;
    font-family: '10B Muc Zeit', 'Noto Sans Lao' !important;
    font-weight: bold !important;
}
</style>




<form action="senddemand.php" target="_blank" method="Post">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h2>ແຜນສ້າງນັກຮຽນ</h2>
            <h5>ກະລຸນາປ້ອນຈຳນວນນັກສຶກສາທີ່ຕ້ອງການຂໍທຶນ</h5>
        </div>
        <div class="col-xs-12 col-md-6" align="right">
            <h5>ລວມທັງໝົດ <input type="number" class="totalall" value="0" name="totalall" id="amount"
                    style="border: none;width:100px;font-weight: bold;"></h5>
            <button type="submit" name="send" id="btnSend" class="btn btn-sm btn-primary send"><span class="fa fa-paper-plane"> &nbsp&nbsp
                </span>ສົ່ງແຜນຂໍທຶນການສຶກສາ</button> <br> <br>
        </div>
    </div>



    <div class="table-responsive">
        <table id="detail_table" class="table-bordered" style="width: 1500px;">
            <tr>
                <th rowspan="2" style="text-align: center!important;margin: 0 auto;">ລຳດັບ</th>
                <th rowspan="2" style="text-align: center;">ສາຂາວິຊາຮຽນ</th>
                <th rowspan="2" style="text-align: center;">ລະດັບຊັ້ນ</th>
                <th rowspan="2" style="text-align: center;">ລວມ</th>
                <th colspan="2" style="text-align: center; position:st">ຈຳນວນ</th>
            </tr>
            <tr style="text-align: center;">
                <th>ນັກຮຽນ</th>
                <th>ພະນັກງານ</th>
            </tr>
            <?php
                $no_ = 0;
                $unitversity = mysqli_query($conn,"select * from unitversity;");
                foreach($unitversity as $uni){
            ?>
            <tr style="background-color:#5199FA;color:white;">
                <td>
                    <?php echo $no_ += 1; ?>
                </td>
                <td colspan="2" style="text-align:center;">
                    <?php echo $uni['unit_name'] ?>        
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_unit_<?php echo $uni['unit_id'];?>" value="0"  type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_unit_std_<?php echo $uni['unit_id'];?>" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_unit_emp_<?php echo $uni['unit_id'];?>" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
            </tr>
            <?php
                $unit_id = $uni['unit_id'];
                $faculty = mysqli_query($conn,"select * from faculty where unit_id='$unit_id'");
                foreach($faculty as $fac){
            ?>
            <tr class="parent" id="<?php echo $fac['fac_id'];?>" title="Click to expand/collapse"
                style="cursor: pointer;background-color:#B1CDF3;color:white;">
                <td>
                    
                </td>
                <td colspan="2"><?php echo $fac['fac_name'] ?></td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_<?php echo $fac['fac_id'] ?>" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_std_<?php echo $fac['fac_id'] ?>" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_emp_<?php echo $fac['fac_id'] ?>" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
            </tr>
            <!-- parent-end -->
            <?php
                $fac_id = $fac['fac_id'];
                $course = mysqli_query($conn,"select * from course where fac_id='$fac_id'");
                foreach($course as $cour){
            ?>
            <tr class="child-<?php echo $fac['fac_id'] ?>" style="display: table-row;">
                <td></td>
                <td style="padding-left:50px;"><?php echo $cour['course_name'] ?>  <input type="hidden" name="fac_1" value="ຄະນະສຶກສາສາດ"></td>
                <td style="text-align:center">
                    ປະລິນຍາຕີ
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_course_<?php echo $cour['course_id'] ?>" value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
                </td>
                <td>
                <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus demandBtn"></button>
                    <input class="quantity demandInput" min="0" name="std_1" id="std_<?php echo $cour['course_id'] ?>" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus demandBtn"></button>
                </div>
                </td>
                <td>
                <div class="def-number-input number-input safari_only" style="padding-left:170px;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus demandBtn"></button>
                    <input class="quantity demandInput" min="0" name="emp_1" id="emp_<?php echo $cour['course_id'] ?>" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus demandBtn"></button>
                </div>
                </td>
            </tr>
            <?php 
                }
            }
        }
        ?>

        </table>
    </div>
    <!-- endtable -->

</form>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(window).load(function() {
    var intervalId = window.setInterval(function(){
    check_total();
    }, 500);
    function check_total(){
        var totalall = $('#amount').val();
        if(totalall == '' || totalall == '0'){
            $("#btnSend").attr("disabled", true);
        }
        else{
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
// ປຸ່ມບວກກັບລົບ
$('.demandBtn').on('click', function() {
    <?php
    // Loop ມະຫາໄລອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
    $u = mysqli_query($conn,"select *from unitversity");
    foreach($u as $un){
        $u_id = $un['unit_id'];
        $f = mysqli_query($conn,"select * from faculty where unit_id='$u_id'");
        //Loop ຄະນະອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
        foreach($f as $fc){
            $f_id = $fc['fac_id'];
            $c = mysqli_query($conn,"select * from course where fac_id='$f_id'");
            // Loop ສາຂາວິຊາອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
            foreach($c as $cr){
                
                $c_id = $cr['course_id'];
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $c_sql = mysqli_query($conn,"select * from course where fac_id='$f_id'");
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $f_sql = mysqli_query($conn,"select * from faculty where unit_id='$u_id'");

                    ?>   
                        // 1 LOOP qty std and emp
                        var numStd = 0;// ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນ
                        var numEmp = 0;// ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນພະນັກງານ
                        var faculty_std = 0;//ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນ
                        var faculty_emp = 0;//ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນພະນັກງານ
                        <?php 
                        // Loop Course
                        foreach($c_sql as $c_get){
                        ?>
                            numStd +=  parseInt($("#std_<?php echo $c_get['course_id'] ?>").val());//ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
                            numEmp +=  parseInt($("#emp_<?php echo $c_get['course_id'] ?>").val());//ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນພະນັກງານແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
                        <?php
                        }
                        // loop faculty 
                        foreach($f_sql as $f_get){
                        ?>
                            faculty_std +=  parseInt($("#total_fac_std_<?php echo $f_get['fac_id'] ?>").val());//ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
                            faculty_emp +=  parseInt($("#total_fac_emp_<?php echo $f_get['fac_id'] ?>").val());//ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນພະນັກງານແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະມະຫາໄລ
                        <?php
                        }
                        ?>
             
                            //ລວມຄະນະ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
                            $("#total_fac_std_<?php echo $f_id ?>").val(numStd);
                            //

                     
                            //ລວມຄະນະ ແນວຕັ້ງ ຫຼື ຖັນ ພະນັກງານ
                            $("#total_fac_emp_<?php echo $f_id ?>").val(numEmp);
                            //



                            //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
                            $("#total_col_unit_std_<?php echo $u_id ?>").val(faculty_std);                      
                            //


                            
                            //ນັກຮຽນບວກກັບພະນັກງານແນວນອນ ຫຼື ແຖວຂອງ 1 ສາຂາ
                            $("#total_course_<?php echo $c_id ?>").val(parseInt($("#std_<?php echo $c_id ?>").val()) + parseInt($("#emp_<?php echo $c_id ?>").val()));
                            //


                            //ລວມທັງໝົດຂອງຄະນະ ໂດຍການເອົາລວມຄະນະນັກຮຽນແນວນອນບວກກັບລວມຄະນະພະນັກງານແນວນອນ
                            $("#total_fac_<?php echo $f_id ?>").val(parseInt($("#total_fac_std_<?php echo $f_id ?>").val()) + parseInt($("#total_fac_emp_<?php echo $f_id ?>").val()));
                            //
                        <?php
            }//ຈົບ Loop ສາຂາວິຊາ
            ?>
                var faculty_std = 0;//ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
                var faculty_emp = 0;//ຕັ້ງຕົວປ່ຽນລວມຈຳນວນພະນັກງານຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
            <?php
            $f_sql = mysqli_query($conn,"select * from faculty where unit_id='$u_id'");//ດຶງຂໍ້ມູນຄະນະພາຍໃນວິທະຍາໄລດຽວ
            // Loop ຂໍ້ມູນແຕ່ລະຄະນະທີ່ຢູ່ໃນມະຫາໄລນັ້ນອອກມາທັງໝົດແລ້ວເອົາມາບວກລວມກັນ
            foreach($f_sql as $f_get){
            ?>  
                faculty_std +=  parseInt($("#total_fac_std_<?php echo $f_get['fac_id'] ?>").val());//ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
                faculty_emp +=  parseInt($("#total_fac_emp_<?php echo $f_get['fac_id'] ?>").val());//ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນພະນັກງານແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
            <?php
             }
             //
             ?>
                // //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ       
                $("#total_col_unit_std_<?php echo $u_id ?>").val(faculty_std);    
                //
                //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ພະນັກງານ
                $("#total_col_unit_emp_<?php echo $u_id ?>").val(faculty_emp);
                //
             <?php
        }//ຈົບ Loop ຄະນະ
        ?>
        //ລວມທັງໝົດມະຫາໄລ ໂດຍການເອົາລວມມະຫາໄລນັກຮຽນແນວນອນບວກກັບລວມມະຫາໄລພະນັກງານແນວນອນ
         $("#total_unit_<?php echo $u_id ?>").val(parseInt($("#total_col_unit_std_<?php echo $u_id ?>").val()) + parseInt($("#total_col_unit_emp_<?php echo $u_id ?>").val()));
        //  
        <?php
        
    }//ຈົບ Loop ມະຫາໄລ
    $unit_total = mysqli_query($conn,"select * from unitversity"); //ດຶງຂໍ້ມູນມະຫາໄລທັງໝົດອອກມາ
    ?>
      var total_unit = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຄ່າບວກຈຳນວນທັງໝົດຂອງແຕ່ລະມະຫາໄລ
    <?php
        foreach($unit_total as $unit_get){
    ?>
        total_unit +=  parseInt($("#total_unit_<?php echo $unit_get['unit_id'] ?>").val()); // ບວກຈຳນວນແຕ່ລະມະຫາໄລໄວ້ໃນຕົວປ່ຽນ   
    <?php 
        }
    ?>

    // ລວມທັງໝົດ ມະຫາໄລບວກມະຫາໄລ
    $("#amount").val(total_unit);
});



//
//ປຸ່ມປ້ອນຂໍ້ມູນ
$('.demandInput').keyup(function() {
    <?php
    // Loop ມະຫາໄລອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
    $u = mysqli_query($conn,"select *from unitversity");
    foreach($u as $un){
        $u_id = $un['unit_id'];
        $f = mysqli_query($conn,"select * from faculty where unit_id='$u_id'");
        //Loop ຄະນະອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
        foreach($f as $fc){
            $f_id = $fc['fac_id'];
            $c = mysqli_query($conn,"select * from course where fac_id='$f_id'");
            // Loop ສາຂາວິຊາອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
            foreach($c as $cr){
                
                $c_id = $cr['course_id'];
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $c_sql = mysqli_query($conn,"select * from course where fac_id='$f_id'");
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $f_sql = mysqli_query($conn,"select * from faculty where unit_id='$u_id'");

                    ?>   
                        // 1 LOOP qty std and emp
                        var numStd = 0;// ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນ
                        var numEmp = 0;// ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນພະນັກງານ
                        var faculty_std = 0;//ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນ
                        var faculty_emp = 0;//ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນພະນັກງານ
                        <?php 
                        // Loop Course
                        foreach($c_sql as $c_get){
                        ?>
                            numStd +=  parseInt($("#std_<?php echo $c_get['course_id'] ?>").val());//ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
                            numEmp +=  parseInt($("#emp_<?php echo $c_get['course_id'] ?>").val());//ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນພະນັກງານແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
                        <?php
                        }
                        // loop faculty 
                        foreach($f_sql as $f_get){
                        ?>
                            faculty_std +=  parseInt($("#total_fac_std_<?php echo $f_get['fac_id'] ?>").val());//ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
                            faculty_emp +=  parseInt($("#total_fac_emp_<?php echo $f_get['fac_id'] ?>").val());//ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນພະນັກງານແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະມະຫາໄລ
                        <?php
                        }
                        ?>
             
                            //ລວມຄະນະ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
                            $("#total_fac_std_<?php echo $f_id ?>").val(numStd);
                            //

                     
                            //ລວມຄະນະ ແນວຕັ້ງ ຫຼື ຖັນ ພະນັກງານ
                            $("#total_fac_emp_<?php echo $f_id ?>").val(numEmp);
                            //



                            //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
                            $("#total_col_unit_std_<?php echo $u_id ?>").val(faculty_std);                      
                            //


                            
                            //ນັກຮຽນບວກກັບພະນັກງານແນວນອນ ຫຼື ແຖວຂອງ 1 ສາຂາ
                            $("#total_course_<?php echo $c_id ?>").val(parseInt($("#std_<?php echo $c_id ?>").val()) + parseInt($("#emp_<?php echo $c_id ?>").val()));
                            //


                            //ລວມທັງໝົດຂອງຄະນະ ໂດຍການເອົາລວມຄະນະນັກຮຽນແນວນອນບວກກັບລວມຄະນະພະນັກງານແນວນອນ
                            $("#total_fac_<?php echo $f_id ?>").val(parseInt($("#total_fac_std_<?php echo $f_id ?>").val()) + parseInt($("#total_fac_emp_<?php echo $f_id ?>").val()));
                            //
                        <?php
            }//ຈົບ Loop ສາຂາວິຊາ
            ?>
                var faculty_std = 0;//ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
                var faculty_emp = 0;//ຕັ້ງຕົວປ່ຽນລວມຈຳນວນພະນັກງານຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
            <?php
            $f_sql = mysqli_query($conn,"select * from faculty where unit_id='$u_id'");//ດຶງຂໍ້ມູນຄະນະພາຍໃນວິທະຍາໄລດຽວ
            // Loop ຂໍ້ມູນແຕ່ລະຄະນະທີ່ຢູ່ໃນມະຫາໄລນັ້ນອອກມາທັງໝົດແລ້ວເອົາມາບວກລວມກັນ
            foreach($f_sql as $f_get){
            ?>  
                faculty_std +=  parseInt($("#total_fac_std_<?php echo $f_get['fac_id'] ?>").val());//ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
                faculty_emp +=  parseInt($("#total_fac_emp_<?php echo $f_get['fac_id'] ?>").val());//ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນພະນັກງານແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
            <?php
             }
             //
             ?>
                // //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ       
                $("#total_col_unit_std_<?php echo $u_id ?>").val(faculty_std);    
                //
                //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ພະນັກງານ
                $("#total_col_unit_emp_<?php echo $u_id ?>").val(faculty_emp);
                //
             <?php
        }//ຈົບ Loop ຄະນະ
        ?>
        //ລວມທັງໝົດມະຫາໄລ ໂດຍການເອົາລວມມະຫາໄລນັກຮຽນແນວນອນບວກກັບລວມມະຫາໄລພະນັກງານແນວນອນ
         $("#total_unit_<?php echo $u_id ?>").val(parseInt($("#total_col_unit_std_<?php echo $u_id ?>").val()) + parseInt($("#total_col_unit_emp_<?php echo $u_id ?>").val()));
        //  
        <?php
        
    }//ຈົບ Loop ມະຫາໄລ
    $unit_total = mysqli_query($conn,"select * from unitversity"); //ດຶງຂໍ້ມູນມະຫາໄລທັງໝົດອອກມາ
    ?>
      var total_unit = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຄ່າບວກຈຳນວນທັງໝົດຂອງແຕ່ລະມະຫາໄລ
    <?php
        foreach($unit_total as $unit_get){
    ?>
        total_unit +=  parseInt($("#total_unit_<?php echo $unit_get['unit_id'] ?>").val()); // ບວກຈຳນວນແຕ່ລະມະຫາໄລໄວ້ໃນຕົວປ່ຽນ   
    <?php 
        }
    ?>

    // ລວມທັງໝົດ ມະຫາໄລບວກມະຫາໄລ
    $("#amount").val(total_unit);
});

</script>

<?php
 include ("../header-footer/footer.php");
?>