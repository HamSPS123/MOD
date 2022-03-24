<?php
session_start();
 include ("../../oop/connect.php");
 if($_POST["query"]){
    $fy_id = $_POST['query'];
    $fy2 = mysqli_query($conn, "select dept_id from  adjust where fy_id='$fy_id' group by dept_id");
    if(mysqli_num_rows($fy2) > 0){
        $dept_id = array();
        foreach($fy2 as $row_dept_id){
            $dept_id[] = "\"".$row_dept_id['dept_id']."\"";
        }
        $dept_id = implode(",", $dept_id);
     $no_ = 0;
     $unitversity = mysqli_query($conn,"SELECT u.uni_id,uni_name,sum(get_plan) AS total_uni FROM adjustdetail a LEFT JOIN adjust ad ON a.adj_id=ad.adj_id LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id WHERE u.dept_id in ($dept_id) AND ad.fy_id='$fy_id' GROUP BY u.uni_id ORDER BY uni_id ASC;");
    if(mysqli_num_rows($unitversity) > 0){
?>
<input type="hidden" name="adj_id" value="<?= $adj_id ?>">
<div class="table-responsive tscroll">
    <table id="detail_table" class="table-bordered" style="width: 1200px;">
        <tr>
            <th rowspan="2" style="text-align: center!important;margin: 0 auto;">ລຳດັບ</th>
            <th rowspan="2" style="text-align: center;">ສາຂາວິຊາຮຽນ</th>
            <th rowspan="2" style="text-align: center;">ລະດັບຊັ້ນ</th>
            <th style="text-align: center!important;width:200px;">ຈຳນວນ</th>
            <th style="text-align: center;">ຜູ້ສ້າງແຜນຮັບ</th>
        </tr>
        <tr style="text-align: center;">

        </tr>
        <?php
              
                foreach($unitversity as $uni){
                    $no_++;
            ?>
        <tr style="background-color:#5199FA;color:white;">
            <td align="center">
                <?php echo ConverToRoman($no_); ?>
            </td>
            <td colspan="2" style="text-align:center;">
                <?php echo $uni['uni_name'] ?>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_unit_get_plan_<?php echo $uni['uni_id'];?>"
                    value="<?= $uni["total_uni"] ?>" type="number"
                    style="border:none;width:150px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td></td>

        </tr>
        <?php
                $i=0;
                $unit_id = $uni['uni_id'];
                $faculty = mysqli_query($conn,"SELECT f.fac_id,fac_name,sum(get_plan) AS total_fac FROM adjustdetail a LEFT JOIN adjust ad ON a.adj_id=ad.adj_id LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id WHERE f.uni_id='$unit_id' AND ad.fy_id='$fy_id' GROUP BY f.fac_id ORDER BY fac_id ASC;");
                foreach($faculty as $fac){
                $fac_id = $fac['fac_id'];
                $i++;
            ?>
        <tr class="parent" id="<?php echo $fac_id;?>" title="Click to expand/collapse"
            style="cursor: pointer;background-color:#B1CDF3;color:white;font-size: 18px;">
            <td class="text-center">
            <?= $i ?>
            </td>
            <td colspan="2"><?php echo $fac['fac_name'] ?></td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_get_plan_<?php echo $fac['fac_id'] ?>"
                    value="<?= $fac["total_fac"] ?>" type="number"
                    style="border:none;width:150px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td></td>

        </tr>
        <!-- parent-end -->
        <?php
                $j=0;
                $course = mysqli_query($conn,"SELECT d_id,a.course_id,course_name,get_plan,sup_name,su.surname,concat(hrd_name,'(Admin)') as admins,level_name FROM adjustdetail a LEFT JOIN adjust ad ON a.adj_id=ad.adj_id LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id LEFT JOIN supply_user su ON a.user_id=su.user_id LEFT JOIN hrd_user hs ON a.user_id=hs.user_id LEFT JOIN course_level lv ON c.level_id=lv.level_id WHERE f.fac_id='$fac_id' AND ad.fy_id='$fy_id' GROUP BY a.course_id ORDER BY level_name ASC,course_id ASC;");
                foreach($course as $cour){
                    $j++;
            ?>
        <tr class="child-<?php echo $fac_id ?>" style="display: table-row;">
            <td class="text-center"><?= $i.".".$j ?></td>
            <td style="font-size: 14px!important;padding-left:50px;"><?php echo $cour['course_name'] ?> <input type="hidden" name="fac_1"
                    value="ຄະນະສຶກສາສາດ"></td>
            <td style="text-align:center;font-size: 14px!important;">
                <?php echo $cour['level_name'] ?>
            </td>
            <td>
                <div class="def-number-input number-input safari_only" style="padding-left:22px;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus demandBtn"></button>
                    <input class="quantity demandInput" min="0" name="get_plan_<?php echo $cour['course_id'] ?>"
                        id="get_plan_<?php echo $cour['course_id'] ?>" value="<?php if($cour["get_plan"] == ""){ echo "0";}else{ echo $cour["get_plan"];} ?>" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus demandBtn"></button>
                </div>
            </td>
            <td align="center" style="font-size: 14px!important;"><?php if($cour['admins'] != ""){ echo $cour["admins"]; }else{ echo $cour["sup_name"]; echo $cour["surname"]; } ?></td>

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
        else{
            echo '<br>
            <hr size="1" width="90%">
        <p align="center">ບໍ່ມີຂໍ້ມູນ</p>
        <hr size="1" width="90%">
            ';
        }
    }
    else{
        echo '<br>
        <hr size="1" width="90%">
    <p align="center">ບໍ່ມີຂໍ້ມູນ</p>
    <hr size="1" width="90%">
        ';
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
    $u = mysqli_query($conn,"SELECT u.uni_id,uni_name,sum(get_plan) AS total_uni FROM adjustdetail a LEFT JOIN adjust ad ON a.adj_id=ad.adj_id  LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id WHERE u.dept_id in ($dept_id) AND ad.fy_id='$fy_id' GROUP BY u.uni_id;");
    foreach($u as $un){
        $u_id = $un['uni_id'];
        $f = mysqli_query($conn,"SELECT f.fac_id,fac_name,sum(get_plan) AS total_fac FROM adjustdetail a LEFT JOIN adjust ad ON a.adj_id=ad.adj_id LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id WHERE u.uni_id='$u_id' AND ad.fy_id='$fy_id' GROUP BY f.fac_id;");
        //Loop ຄະນະອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
        foreach($f as $fc){
            $f_id = $fc['fac_id'];
            $c = mysqli_query($conn,"SELECT a.course_id,course_name,get_plan,sup_name FROM adjustdetail a LEFT JOIN adjust ad ON a.adj_id=ad.adj_id LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id LEFT JOIN supply_user su ON a.user_id=su.user_id WHERE f.fac_id='$f_id' AND ad.fy_id='$fy_id' GROUP BY a.course_id;");
            // Loop ສາຂາວິຊາອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
            foreach($c as $cr){
                
                $c_id = $cr['course_id'];
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $c_sql = mysqli_query($conn,"SELECT a.course_id,course_name,get_plan,sup_name FROM adjustdetail a LEFT JOIN adjust ad ON a.adj_id=ad.adj_id LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id LEFT JOIN supply_user su ON a.user_id=su.user_id WHERE f.fac_id='$f_id' AND ad.fy_id='$fy_id' GROUP BY a.course_id;");
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $f_sql = mysqli_query($conn,"SELECT f.fac_id,fac_name,sum(get_plan) AS total_fac FROM adjustdetail a LEFT JOIN adjust ad ON a.adj_id=ad.adj_id LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id WHERE u.uni_id='$u_id' AND ad.fy_id='$fy_id' GROUP BY f.fac_id;");

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
            $f_sql = mysqli_query($conn,"SELECT f.fac_id,fac_name,sum(get_plan) AS total_fac FROM adjustdetail a LEFT JOIN adjust ad ON a.adj_id=ad.adj_id LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id WHERE u.uni_id='$u_id' AND ad.fy_id='$fy_id' GROUP BY f.fac_id;");//ດຶງຂໍ້ມູນຄະນະພາຍໃນວິທະຍາໄລດຽວ
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
    $u = mysqli_query($conn,"SELECT u.uni_id,uni_name,sum(get_plan) AS total_uni FROM adjustdetail a LEFT JOIN adjust ad ON a.adj_id=ad.adj_id LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id WHERE u.dept_id in ($dept_id) AND ad.fy_id='$fy_id' GROUP BY u.uni_id;");
    foreach($u as $un){
        $u_id = $un['uni_id'];
        $f = mysqli_query($conn,"SELECT f.fac_id,fac_name,sum(get_plan) AS total_fac FROM adjustdetail a LEFT JOIN adjust ad ON a.adj_id=ad.adj_id LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id WHERE u.uni_id='$u_id' AND ad.fy_id='$fy_id' GROUP BY f.fac_id;");
        //Loop ຄະນະອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
        foreach($f as $fc){
            $f_id = $fc['fac_id'];
            $c = mysqli_query($conn,"SELECT a.course_id,course_name,get_plan,sup_name FROM adjustdetail a LEFT JOIN adjust ad ON a.adj_id=ad.adj_id LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id LEFT JOIN supply_user su ON a.user_id=su.user_id WHERE f.fac_id='$f_id' AND ad.fy_id='$fy_id' GROUP BY a.course_id;");
            // Loop ສາຂາວິຊາອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
            foreach($c as $cr){
                
                $c_id = $cr['course_id'];
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $c_sql = mysqli_query($conn,"SELECT a.course_id,course_name,get_plan,sup_name FROM adjustdetail a LEFT JOIN adjust ad ON a.adj_id=ad.adj_id LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id LEFT JOIN supply_user su ON a.user_id=su.user_id WHERE f.fac_id='$f_id' AND ad.fy_id='$fy_id' GROUP BY a.course_id;");
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $f_sql = mysqli_query($conn,"SELECT f.fac_id,fac_name,sum(get_plan) AS total_fac FROM adjustdetail a LEFT JOIN adjust ad ON a.adj_id=ad.adj_id LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id WHERE u.uni_id='$u_id' AND ad.fy_id='$fy_id' GROUP BY f.fac_id;");

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
            $f_sql = mysqli_query($conn,"SELECT f.fac_id,fac_name,sum(get_plan) AS total_fac FROM adjustdetail a LEFT JOIN adjust ad ON a.adj_id=ad.adj_id LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id WHERE u.uni_id='$u_id' AND ad.fy_id='$fy_id' GROUP BY f.fac_id;");//ດຶງຂໍ້ມູນຄະນະພາຍໃນວິທະຍາໄລດຽວ
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