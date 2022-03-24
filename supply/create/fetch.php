<?php
session_start();
 include ("../../oop/connect.php");
 if($_POST["query"]){
    $fy_id = $_POST['query'];
    $uni_id = $_SESSION['uni_id'];
    $dpt = mysqli_query($conn, "SELECT dept_id FROM university WHERE uni_id='$uni_id' AND stt=1");
    $dpt2 = mysqli_fetch_array($dpt, MYSQLI_ASSOC);
    $dept_id = $dpt2['dept_id'];
    $fy2 = mysqli_query($conn, "SELECT adj_id FROM adjust WHERE fy_id='$fy_id' AND dept_id='$dept_id'");
    if(mysqli_num_rows($fy2) > 0){
    $row_fy2 = mysqli_fetch_array($fy2,MYSQLI_ASSOC);
     $adj_id = $row_fy2["adj_id"];
     

?>
<style>
    .tscroll table td:first-of-type{
        width: 80px;
    }
</style>
<input type="hidden" name="adj_id" value="<?= $adj_id ?>">
<div class="table-responsive tscroll">
    <table id="detail_table" class="table-bordered" style="width: 100%;">
        <tr>
            <th rowspan="2" style="text-align: center!important;margin: 0 auto;">ລຳດັບ</th>
            <th rowspan="2" style="text-align: center;">ສາຂາວິຊາຮຽນ</th>
            <th rowspan="2" style="text-align: center;">ລະດັບຊັ້ນ</th>
            <th style="text-align: center!important;width:200px;">ຈຳນວນ</th>
        </tr>
        <tr style="text-align: center;">

        </tr>
        <?php
                $no_ = 0;
                $unitversity = mysqli_query($conn,"SELECT * FROM university WHERE uni_id='$uni_id' AND stt=1 ORDER BY uni_id ASC;");
                foreach($unitversity as $uni){
                    $no_ ++;
            ?>
        <tr style="background-color:#5199FA;color:white;">
            <td class="text-center">
                <?php echo ConverToRoman($no_); ?>
            </td>
            <td colspan="2" style="text-align:center;">
                <?php echo $uni['uni_name'] ?>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_unit_get_plan_<?php echo $uni['uni_id'];?>"
                    value="0" type="number"
                    style="border:none;width:150px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>

        </tr>
        <?php
                $unit_id = $uni['uni_id'];
                $i=0;
                $faculty = mysqli_query($conn,"SELECT * FROM faculty WHERE uni_id='$unit_id' AND stt=1 ORDER BY fac_id ASC;");
                foreach($faculty as $fac){
                $fac_id = $fac['fac_id'];
                $i++;
            ?>
        <tr class="parent" id="<?php echo $fac_id;?>" title="Click to expand/collapse"
            style="cursor: pointer;background-color:#B1CDF3;color:white;">
            <td class="text-center">
                <?= $i ?>
            </td>
            <td colspan="2"><?php echo $fac['fac_name'] ?></td>
            <td style="text-align:center">
                <input class="quantity mx-auto" min="0" name="num1" id="total_fac_get_plan_<?php echo $fac['fac_id'] ?>"
                    value="0" type="number"
                    style="border:none;width:150px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>

        </tr>
        <!-- parent-end -->
        <?php
                $j=0;
                $course = mysqli_query($conn,"SELECT * FROM course c left join course_level lv on c.level_id=lv.level_id WHERE fac_id='$fac_id' AND stt=1 ORDER BY level_name ASC,course_id ASC;");
                foreach($course as $cour){
                    $j++;
            ?>
        <tr class="child-<?php echo $fac_id ?>" style="display: table-row;">
            <td class="text-center"><?= $i.".".$j ?></td>
            <td style="padding-left:50px;"><?php echo $cour['course_name'] ?> <input type="hidden" name="fac_1"
                    value="ຄະນະສຶກສາສາດ"></td>
            <td style="text-align:center">
            <?php echo $cour['level_name'] ?>
            </td>
            <td>
                <div class="def-number-input number-input safari_only mx-auto">
                    <button type="button" onclick="this.parentNode.querySELECTor('input[type=number]').stepDown()"
                        class="minus demandBtn"></button>
                    <input class="quantity demandInput" min="0" name="get_plan_<?php echo $cour['course_id'] ?>"
                        id="get_plan_<?php echo $cour['course_id'] ?>" value="0" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySELECTor('input[type=number]').stepUp()"
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
<?php
 }
}
else{
    echo '<br>
    <hr size="1" width="90%">
   <p align="center">ບໍ່ມີຂໍ້ມູນ</p>
   <hr size="1" width="90%">
    ';
}
?>


<script>
// ປຸ່ມບວກກັບລົບ
$('.demandBtn').on('click', function() {
    <?php
    // Loop ມະຫາໄລອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
    $u = mysqli_query($conn,"SELECT * FROM university WHERE uni_id='$uni_id' AND stt=1");
    foreach($u as $un){
        $u_id = $un['uni_id'];
        $f = mysqli_query($conn,"SELECT * FROM faculty WHERE uni_id='$u_id' AND stt=1");
        //Loop ຄະນະອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
        foreach($f as $fc){
            $f_id = $fc['fac_id'];
            $c = mysqli_query($conn,"SELECT * FROM course WHERE fac_id='$f_id' AND stt=1");
            // Loop ສາຂາວິຊາອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
            foreach($c as $cr){
                
                $c_id = $cr['course_id'];
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $c_sql = mysqli_query($conn,"SELECT * FROM course WHERE fac_id='$f_id' AND stt=1");
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $f_sql = mysqli_query($conn,"SELECT * FROM faculty WHERE uni_id='$u_id' AND stt=1");

                    ?>
    // 1 LOOP qty std and emp
    var numStd = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນ
    var numEmp = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນພະນັກງານ
    var faculty_std = 0; //ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນ
    <?php 
                        // Loop Course
                        foreach($c_sql as $c_get){
                        ?>
    numStd += parseInt($("#get_plan_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    <?php
                        }
                        // loop faculty 
                        foreach($f_sql as $f_get){
                        ?>
    faculty_std += parseInt($("#total_fac_get_plan_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    <?php
                        }
                        ?>

    //ລວມຄະນະ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
    $("#total_fac_get_plan_<?php echo $f_id ?>").val(numStd);
    //



    //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
    $("#total_col_unit_get_plan_<?php echo $u_id ?>").val(faculty_std);
    //
    <?php
            }//ຈົບ Loop ສາຂາວິຊາ
            ?>
    var faculty_std =
        0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var faculty_emp =
        0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນພະນັກງານຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    <?php
            $f_sql = mysqli_query($conn,"SELECT * FROM faculty WHERE uni_id='$u_id'");//ດຶງຂໍ້ມູນຄະນະພາຍໃນວິທະຍາໄລດຽວ
            // Loop ຂໍ້ມູນແຕ່ລະຄະນະທີ່ຢູ່ໃນມະຫາໄລນັ້ນອອກມາທັງໝົດແລ້ວເອົາມາບວກລວມກັນ
            foreach($f_sql as $f_get){
            ?>
    faculty_std += parseInt($("#total_fac_get_plan_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    <?php
             }
             //
             ?>
    // //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ       
    $("#total_col_unit_get_plan_<?php echo $u_id ?>").val(faculty_std);
    //
    <?php
        }//ຈົບ Loop ຄະນະ
        ?>
    <?php
        
    }//ຈົບ Loop ມະຫາໄລ
    ?>
    var total_unit = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຄ່າບວກຈຳນວນທັງໝົດຂອງແຕ່ລະມະຫາໄລ

    // ລວມທັງໝົດ ມະຫາໄລບວກມະຫາໄລ
    $("#amount").val(faculty_std);
});



//
//ປຸ່ມປ້ອນຂໍ້ມູນ
$('.demandInput').keyup(function() {
    <?php
    // Loop ມະຫາໄລອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
    $u = mysqli_query($conn,"SELECT * FROM university WHERE uni_id='$uni_id' AND stt=1");
    foreach($u as $un){
        $u_id = $un['uni_id'];
        $f = mysqli_query($conn,"SELECT * FROM faculty WHERE uni_id='$u_id' AND stt=1");
        //Loop ຄະນະອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
        foreach($f as $fc){
            $f_id = $fc['fac_id'];
            $c = mysqli_query($conn,"SELECT * FROM course WHERE fac_id='$f_id' AND stt=1");
            // Loop ສາຂາວິຊາອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
            foreach($c as $cr){
                
                $c_id = $cr['course_id'];
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $c_sql = mysqli_query($conn,"SELECT * FROM course WHERE fac_id='$f_id' AND stt=1");
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $f_sql = mysqli_query($conn,"SELECT * FROM faculty WHERE uni_id='$u_id' AND stt=1");

                    ?>
    // 1 LOOP qty std and emp
    var numStd = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນ
    var numEmp = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນພະນັກງານ
    var faculty_std = 0; //ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນ
    var faculty_emp = 0; //ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນພະນັກງານ
    <?php 
                        // Loop Course
                        foreach($c_sql as $c_get){
                        ?>
    numStd += parseInt($("#get_plan_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    <?php
                        }
                        // loop faculty 
                        foreach($f_sql as $f_get){
                        ?>
    faculty_std += parseInt($("#total_fac_get_plan_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    <?php
                        }
                        ?>

    //ລວມຄະນະ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
    $("#total_fac_get_plan_<?php echo $f_id ?>").val(numStd);
    //



    //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
    $("#total_col_unit_get_plan_<?php echo $u_id ?>").val(faculty_std);
    //
    <?php
            }//ຈົບ Loop ສາຂາວິຊາ
            ?>
    var faculty_std =
        0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var faculty_emp =
        0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນພະນັກງານຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    <?php
            $f_sql = mysqli_query($conn,"SELECT * FROM faculty WHERE uni_id='$u_id' AND stt=1");//ດຶງຂໍ້ມູນຄະນະພາຍໃນວິທະຍາໄລດຽວ
            // Loop ຂໍ້ມູນແຕ່ລະຄະນະທີ່ຢູ່ໃນມະຫາໄລນັ້ນອອກມາທັງໝົດແລ້ວເອົາມາບວກລວມກັນ
            foreach($f_sql as $f_get){
            ?>
    faculty_std += parseInt($("#total_fac_get_plan_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    <?php
             }
             //
             ?>
    // //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ       
    $("#total_col_unit_get_plan_<?php echo $u_id ?>").val(faculty_std);
    //
    <?php
        }//ຈົບ Loop ຄະນະ
        ?>
    <?php
        
    }//ຈົບ Loop ມະຫາໄລ
    ?>
    var total_unit = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຄ່າບວກຈຳນວນທັງໝົດຂອງແຕ່ລະມະຫາໄລ

    // ລວມທັງໝົດ ມະຫາໄລບວກມະຫາໄລ
    $("#amount").val(faculty_std);
});
</script>
<script>
$('tr.parent')
    .css("cursor", "pointer")
    .attr("title", "Click to expand/collapse")
    .click(function() {
        $(this).siblings('.child-' + this.id).toggle();
    });
$('tr[@class^=child-]').hide().children('td');
</script>