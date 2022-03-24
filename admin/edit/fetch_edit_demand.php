<?php
session_start();
$path = "../../";
include $path."oop/connect.php";
$adj_id = $_POST['query'];
$p_m_id = $_POST['p_m_id'];
// $p_m_id = $_SESSION['p_m_id'];
    if (isset($_POST['query']) || isset($_POST["p_m_id"])) {
?>

<div class="table-responsive tscroll">
    <?php
     // $no_ = 0;
     $university = mysqli_query($conn,"SELECT cre_id,adj_id,cp.course_id,course_name,fac_name,f.uni_id,uni_name,p_m_id,sum(std_qty) as std_qty,sum(emp_qty) as emp_qty,
     sum(std_qty) + sum(emp_qty) as total
     FROM create_plan cp
     LEFT JOIN course c ON cp.course_id=c.course_id
     LEFT JOIN faculty f ON c.fac_id=f.fac_id
     LEFT JOIN university u ON f.uni_id=u.uni_id
     WHERE adj_id='$adj_id' AND cp.p_m_id='$p_m_id'
     GROUP BY f.uni_id ORDER BY uni_name ASC;");

     if (mysqli_num_rows($university) > 0) {
    ?>
    <input type="hidden" name="adj_id" value="<?= $adj_id ?>">
    <table id="detail_table" class="table-bordered" style="width: 1600px;">
        <tr>
            <th rowspan="2" style="text-align: center!important;margin: 0 auto;">ລຳດັບ</th>
            <th rowspan="2" style="text-align: center;">ສາຂາວິຊາຮຽນ</th>
            <th rowspan="2" style="text-align: center;">ລະດັບຊັ້ນ</th>
            <th rowspan="2" style="text-align: center;">ລວມ</th>
            <th colspan="2" style="text-align: center; position:st">ຈຳນວນ</th>
            <th rowspan="2" style="text-align: center;">ຜູ້ສະເໜີແຜນສ້າງ</th>
        </tr>
        <tr style="text-align: center;">
            <th>ນັກຮຽນ</th>
            <th>ພະນັກງານ</th>
        </tr>
        <?php
               // Loop University
               $no_ =0;
                foreach($university as $uni){
                    $uni_id = $uni['uni_id'];
                    $no_++;
            ?>
        <tr style="background-color:#5199FA;color:white;">
            <td class="text-center">
                <?php echo ConverToRoman($no_); ?>
            </td>
            <td colspan="2" style="text-align:center;">
                <?= $uni['uni_name'] ?>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_uni_<?php echo $uni['uni_id'];?>"
                    value="<?= $uni['total'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num_uni_std_<?php echo $uni['uni_id'];?>"
                    value="<?= $uni['std_qty'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num_uni_emp_<?php echo $uni['uni_id'];?>"
                    value="<?= $uni['emp_qty'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td></td>
        </tr>
        <?php
                // $uni_id = $uni['uni_id'];
                $faculty = mysqli_query($conn,"SELECT cre_id,adj_id,cp.course_id,course_name,c.fac_id,fac_name,p_m_id,
                sum(std_qty) as std_qty,sum(emp_qty) as emp_qty, sum(std_qty) + sum(emp_qty) as total
                FROM create_plan cp
                LEFT JOIN course c ON cp.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                WHERE adj_id='$adj_id' AND uni_id='$uni_id' AND cp.p_m_id='$p_m_id'
                GROUP BY c.fac_id ORDER BY fac_name ASC;");
                $no_i = 0;
                foreach($faculty as $fac){
                    $fac_id = $fac['fac_id'];
                    $no_i++;
            ?>
        <tr class="parent" id="<?php echo $fac['fac_id'];?>" title="Click to expand/collapse"
            style="cursor: pointer;background-color:#B1CDF3;color:white;">
            <td class="text-center">
                <?= $no_i ?>
            </td>
            <td colspan="2"><?php echo $fac['fac_name'] ?></td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_<?php echo $fac['fac_id'];?>"
                    value="<?= $fac['total'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num_fac_std_<?php echo $fac['fac_id'];?>"
                    value="<?= $fac['std_qty'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num_fac_emp_<?php echo $fac['fac_id'];?>"
                    value="<?= $fac['emp_qty'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td></td>
        </tr>
        <!-- parent-end -->
        <?php
                // $fac_id = $fac['fac_id'];
                $course = mysqli_query($conn,"SELECT cp.user_id,cre_id,demand_name,surname,gender,adj_id,cp.course_id,c.fac_id,course_name,cp.p_m_id,std_qty as std_qty,emp_qty as emp_qty, std_qty + emp_qty as total,level_name
                FROM create_plan cp
                LEFT JOIN course c ON cp.course_id=c.course_id
                LEFT JOIN user u ON cp.user_id=u.user_id
                LEFT JOIN demand_user du ON u.user_id=du.user_id
                LEFT JOIN course_level lv ON c.level_id=lv.level_id
                WHERE adj_id='$adj_id' AND c.fac_id='$fac_id' AND cp.p_m_id='$p_m_id' ORDER BY level_name ASC,course_name ASC;");
                $no_j = 0;
                foreach($course as $cour){
                    $course_id = $cour['course_id'];
                    if ($cour['gender'] == "ຊາຍ") {
                        $cour['gender'] = "ທ່ານ";
                    }
                    if ($cour['gender'] == "ຍິງ") {
                        $cour['gender'] = "ນາງ";
                    }
                    $no_j ++;
            ?>
        <tr class="child-<?php echo $fac['fac_id'] ?> btnUpdate_demand" style="display: table-row;">
            <td class="text-center">
            <?php echo $no_i;?>.<?php echo $no_j;?>
                 <input type="hidden" name="cre_id_<?php echo $cour['cre_id'] ?>_<?php echo $cour['user_id'] ?>" value="<?php echo $cour['cre_id'] ?>">
            </td>
            <td style="padding-left:50px;">
                <?php echo $cour['course_name'] ?>
                <input type="hidden" name="fac_1" value="ຄະນະສຶກສາສາດ">
            </td>
            <td style="text-align:center">
                <?php echo $cour['level_name'] ?>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_course_<?php echo $course_id;?>_<?php echo $cour['user_id'];?>"
                    value="<?= $cour['total'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
            </td>
            <td style="text-align:center;">
                <div class="def-number-input number-input safari_only mx-auto">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus demandBtn"></button>
                    <input class="quantity demandInput" min="0" name="std_<?php echo $cour['course_id'] ?>_<?php echo $cour['user_id'] ?>"
                        id="std_<?php echo $cour['course_id'] ?>_<?php echo $cour['user_id'] ?>" value="<?= $cour['std_qty'] ?>" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus demandBtn"></button>
                </div>
            </td>
            <td style="text-align:center;">
                <div class="def-number-input number-input safari_only mx-auto">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus demandBtn"></button>
                    <input class="quantity demandInput" min="0" name="emp_<?php echo $cour['course_id'] ?>_<?php echo $cour['user_id'] ?>"
                        id="emp_<?php echo $cour['course_id'] ?>_<?php echo $cour['user_id'] ?>" value="<?= $cour['emp_qty'] ?>" type="number"
                        style="font-weight:bold!important;">
                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus demandBtn"></button>
                </div>
            </td>
            <td class="text-center">
                <?= $cour['gender']." ". $cour['demand_name'] ." ". $cour['surname'] ?>
            </td>
        </tr>
        <?php 
                }
            }
        }
        ?>

    </table>
    <?php
    }else{
        echo '<br>
        <hr size="1" width="90%">
       <p align="center">ບໍ່ມີຂໍ້ມູນ</p>
       <hr size="1" width="90%">'; 
    }
    ?>
</div>
<?php
    }else{
        echo '<br>
    <hr size="1" width="90%">
   <p align="center">ບໍ່ມີຂໍ້ມູນ</p>
   <hr size="1" width="90%">
    ';
    }
?>

<script>
// $(window).load(function() {
    $('tr.parent')
        .css("cursor", "pointer")
        .attr("title", "Click to expand/collapse")
        .click(function() {
            $(this).siblings('.child-' + this.id).toggle();
        });
    $('tr[@class^=child-]').hide().children('td');
// });
</script>
<script>


// ປຸ່ມບວກກັບລົບ
$('.demandBtn').on('click', function() {
    <?php
    // Loop ມະຫາໄລອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
    $a_id = $_POST['query'];
    // $p_id = $_SESSION['p_m_id'];

    $u = mysqli_query($conn,"SELECT cre_id,adj_id,cp.course_id,course_name,fac_name,f.uni_id,uni_name,p_m_id,sum(std_qty) as std_qty,sum(emp_qty) as emp_qty,
    sum(std_qty) + sum(emp_qty) as total
    FROM create_plan cp
    LEFT JOIN course c ON cp.course_id=c.course_id
    LEFT JOIN faculty f ON c.fac_id=f.fac_id
    LEFT JOIN university u ON f.uni_id=u.uni_id
    WHERE adj_id='$a_id' AND cp.p_m_id='$p_m_id'
    GROUP BY f.uni_id;");
    foreach($u as $un){
        $u_id = $un['uni_id'];
        $f = mysqli_query($conn,"SELECT cre_id,adj_id,cp.course_id,course_name,c.fac_id,fac_name,p_m_id,
        sum(std_qty) as std_qty,sum(emp_qty) as emp_qty, sum(std_qty)+ sum(emp_qty) as total
        FROM create_plan cp
        LEFT JOIN course c ON cp.course_id=c.course_id
        LEFT JOIN faculty f ON c.fac_id=f.fac_id
        WHERE adj_id='$a_id' AND uni_id='$u_id' AND cp.p_m_id='$p_m_id'
        GROUP BY c.fac_id;");
        //Loop ຄະນະອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
        foreach($f as $fc){
            $f_id = $fc['fac_id'];
            $c = mysqli_query($conn,"SELECT cp.user_id,cre_id,demand_name,surname,gender,adj_id,cp.course_id,c.fac_id,course_name,cp.p_m_id,std_qty as std_qty,emp_qty as emp_qty, std_qty + emp_qty as total
            FROM create_plan cp
            LEFT JOIN course c ON cp.course_id=c.course_id
            LEFT JOIN user u ON cp.user_id=u.user_id
            LEFT JOIN demand_user du ON u.user_id=du.user_id
            WHERE adj_id='$a_id' AND c.fac_id='$f_id' AND cp.p_m_id='$p_m_id';");
            // Loop ສາຂາວິຊາອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
            foreach($c as $cr){
                
                $c_id = $cr['course_id'];
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $c_sql = mysqli_query($conn,"SELECT cp.user_id,cre_id,demand_name,surname,gender,adj_id,cp.course_id,c.fac_id,course_name,cp.p_m_id,std_qty as std_qty,emp_qty as emp_qty, std_qty + emp_qty as total
                FROM create_plan cp
                LEFT JOIN course c ON cp.course_id=c.course_id
                LEFT JOIN user u ON cp.user_id=u.user_id
                LEFT JOIN demand_user du ON u.user_id=du.user_id
                WHERE adj_id='$a_id' AND c.fac_id='$f_id' AND cp.p_m_id='$p_m_id';");
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $f_sql = mysqli_query($conn,"SELECT cre_id,adj_id,cp.course_id,course_name,c.fac_id,fac_name,p_m_id,
                sum(std_qty) as std_qty,sum(emp_qty) as emp_qty, sum(std_qty)+ sum(emp_qty) as total
                FROM create_plan cp
                LEFT JOIN course c ON cp.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                WHERE adj_id='$a_id' AND uni_id='$u_id' AND cp.p_m_id='$p_m_id'
                GROUP BY c.fac_id;");

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
    numStd += parseInt($("#std_<?php echo $c_get['course_id'] ?>_<?php echo $c_get['user_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    numEmp += parseInt($("#emp_<?php echo $c_get['course_id'] ?>_<?php echo $c_get['user_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນພະນັກງານແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    <?php
                        }
                        // loop faculty 
                        foreach($f_sql as $f_get){
                        ?>
    faculty_std += parseInt($("#num_fac_std_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    faculty_emp += parseInt($("#num_fac_emp_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນພະນັກງານແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະມະຫາໄລ
    <?php
                        }
                        ?>

    //ລວມຄະນະ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
    $("#num_fac_std_<?php echo $f_id ?>").val(numStd);
    //


    //ລວມຄະນະ ແນວຕັ້ງ ຫຼື ຖັນ ພະນັກງານ
    $("#num_fac_emp_<?php echo $f_id ?>").val(numEmp);
    //



    //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
    $("#num_uni_std_<?php echo $u_id ?>").val(faculty_std);
    $("#num_uni_emp_<?php echo $u_id ?>").val(faculty_emp);
    //



    //ນັກຮຽນບວກກັບພະນັກງານແນວນອນ ຫຼື ແຖວຂອງ 1 ສາຂາ
    $("#total_course_<?php echo $c_id ?>_<?php echo $cr['user_id'] ?>").val(parseInt($("#std_<?php echo $c_id ?>_<?php echo $cr['user_id'] ?>").val()) + parseInt($(
        "#emp_<?php echo $c_id ?>_<?php echo $cr['user_id'] ?>").val()));
    //


    //ລວມທັງໝົດຂອງຄະນະ ໂດຍການເອົາລວມຄະນະນັກຮຽນແນວນອນບວກກັບລວມຄະນະພະນັກງານແນວນອນ
    $("#total_fac_<?php echo $f_id ?>").val(parseInt($("#num_fac_std_<?php echo $f_id ?>").val()) + parseInt(
        $("#num_fac_emp_<?php echo $f_id ?>").val()));
    //
    <?php
            }//ຈົບ Loop ສາຂາວິຊາ
            ?>
    var faculty_std =
        0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var faculty_emp =
        0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນພະນັກງານຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    <?php
            $f_sql = mysqli_query($conn,"SELECT cp.user_id,cre_id,adj_id,cp.course_id,c.fac_id,course_name,p_m_id,std_qty as std_qty,emp_qty as emp_qty, std_qty + emp_qty as total
            FROM create_plan cp
            LEFT JOIN course c ON cp.course_id=c.course_id
            LEFT JOIN faculty f ON c.fac_id=f.fac_id
            WHERE adj_id='$a_id' AND uni_id='$u_id' AND c.fac_id='$f_id' AND cp.p_m_id='$p_m_id'
            GROUP BY cp.user_id;");//ດຶງຂໍ້ມູນຄະນະພາຍໃນວິທະຍາໄລດຽວ
            // Loop ຂໍ້ມູນແຕ່ລະຄະນະທີ່ຢູ່ໃນມະຫາໄລນັ້ນອອກມາທັງໝົດແລ້ວເອົາມາບວກລວມກັນ
            foreach($f_sql as $f_get){
            ?>
    faculty_std += parseInt($("#total_fac_std_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    faculty_emp += parseInt($("#total_fac_emp_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນພະນັກງານແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    <?php
             }
             //
             ?>
    // //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ       
    $("#total_col_uni_std_<?php echo $u_id ?>").val(faculty_std);
    //
    //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ພະນັກງານ
    $("#total_col_uni_emp_<?php echo $u_id ?>").val(faculty_emp);
    //
    <?php
        }//ຈົບ Loop ຄະນະ
        ?>
    //ລວມທັງໝົດມະຫາໄລ ໂດຍການເອົາລວມມະຫາໄລນັກຮຽນແນວນອນບວກກັບລວມມະຫາໄລພະນັກງານແນວນອນ
    $("#total_uni_<?php echo $u_id ?>").val(parseInt($("#num_uni_std_<?php echo $u_id ?>").val()) +
        parseInt($("#num_uni_emp_<?php echo $u_id ?>").val()));
    //  
    <?php
        
    }//ຈົບ Loop ມະຫາໄລ
    $uni_total = mysqli_query($conn,"SELECT f.uni_id
    FROM create_plan cp
    LEFT JOIN course c ON cp.course_id=c.course_id
    LEFT JOIN faculty f ON c.fac_id=f.fac_id
    LEFT JOIN university u ON f.uni_id=u.uni_id
    WHERE adj_id='$a_id' AND cp.p_m_id='$p_m_id' 
    GROUP BY f.uni_id;"); //ດຶງຂໍ້ມູນມະຫາໄລທັງໝົດອອກມາ
    ?>
    var total_uni = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຄ່າບວກຈຳນວນທັງໝົດຂອງແຕ່ລະມະຫາໄລ
    <?php
        foreach($uni_total as $uni_get){
    ?>
    total_uni += parseInt($("#total_uni_<?= $uni_get['uni_id'] ?>")
        .val()); // ບວກຈຳນວນແຕ່ລະມະຫາໄລໄວ້ໃນຕົວປ່ຽນ   
    <?php 
        }
    ?>

    // ລວມທັງໝົດ ມະຫາໄລບວກມະຫາໄລ
    $("#amount").val(total_uni);
});



//
//ປຸ່ມປ້ອນຂໍ້ມູນ
$('.demandInput').keyup(function() {
    <?php
    // Loop ມະຫາໄລອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
    $a_id = $_POST['query'];
    // $p_id = $_SESSION['p_m_id'];

    $u = mysqli_query($conn,"SELECT cre_id,adj_id,cp.course_id,course_name,fac_name,f.uni_id,uni_name,p_m_id,sum(std_qty) as std_qty,sum(emp_qty) as emp_qty,
    sum(std_qty) + sum(emp_qty) as total
    FROM create_plan cp
    LEFT JOIN course c ON cp.course_id=c.course_id
    LEFT JOIN faculty f ON c.fac_id=f.fac_id
    LEFT JOIN university u ON f.uni_id=u.uni_id
    WHERE adj_id='$a_id' AND cp.p_m_id='$p_m_id'
    GROUP BY f.uni_id;");
    foreach($u as $un){
        $u_id = $un['uni_id'];
        $f = mysqli_query($conn,"SELECT cre_id,adj_id,cp.course_id,course_name,c.fac_id,fac_name,p_m_id,
        sum(std_qty) as std_qty,sum(emp_qty) as emp_qty, sum(std_qty)+ sum(emp_qty) as total
        FROM create_plan cp
        LEFT JOIN course c ON cp.course_id=c.course_id
        LEFT JOIN faculty f ON c.fac_id=f.fac_id
        WHERE adj_id='$a_id' AND uni_id='$u_id' AND cp.p_m_id='$p_m_id'
        GROUP BY c.fac_id;");
        //Loop ຄະນະອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
        foreach($f as $fc){
            $f_id = $fc['fac_id'];
            $c = mysqli_query($conn,"SELECT cp.user_id,cre_id,demand_name,surname,gender,adj_id,cp.course_id,c.fac_id,course_name,cp.p_m_id,std_qty as std_qty,emp_qty as emp_qty, std_qty + emp_qty as total
            FROM create_plan cp
            LEFT JOIN course c ON cp.course_id=c.course_id
            LEFT JOIN user u ON cp.user_id=u.user_id
            LEFT JOIN demand_user du ON u.user_id=du.user_id
            WHERE adj_id='$a_id' AND c.fac_id='$f_id' AND cp.p_m_id='$p_m_id';");
            // Loop ສາຂາວິຊາອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
            foreach($c as $cr){
                
                $c_id = $cr['course_id'];
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $c_sql = mysqli_query($conn,"SELECT cp.user_id,cre_id,demand_name,surname,gender,adj_id,cp.course_id,c.fac_id,course_name,cp.p_m_id,std_qty as std_qty,emp_qty as emp_qty, std_qty + emp_qty as total
                FROM create_plan cp
                LEFT JOIN course c ON cp.course_id=c.course_id
                LEFT JOIN user u ON cp.user_id=u.user_id
                LEFT JOIN demand_user du ON u.user_id=du.user_id
                WHERE adj_id='$a_id' AND c.fac_id='$f_id' AND cp.p_m_id='$p_m_id';");
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $f_sql = mysqli_query($conn,"SELECT cre_id,adj_id,cp.course_id,course_name,c.fac_id,fac_name,p_m_id,
                sum(std_qty) as std_qty,sum(emp_qty) as emp_qty, sum(std_qty)+ sum(emp_qty) as total
                FROM create_plan cp
                LEFT JOIN course c ON cp.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                WHERE adj_id='$a_id' AND uni_id='$u_id' AND cp.p_m_id='$p_m_id'
                GROUP BY c.fac_id;");

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
    numStd += parseInt($("#std_<?php echo $c_get['course_id'] ?>_<?php echo $c_get['user_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    numEmp += parseInt($("#emp_<?php echo $c_get['course_id'] ?>_<?php echo $c_get['user_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນພະນັກງານແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    <?php
                        }
                        // loop faculty 
                        foreach($f_sql as $f_get){
                        ?>
    faculty_std += parseInt($("#num_fac_std_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    faculty_emp += parseInt($("#num_fac_emp_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນພະນັກງານແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະມະຫາໄລ
    <?php
                        }
                        ?>

    //ລວມຄະນະ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
    $("#num_fac_std_<?php echo $f_id ?>").val(numStd);
    //


    //ລວມຄະນະ ແນວຕັ້ງ ຫຼື ຖັນ ພະນັກງານ
    $("#num_fac_emp_<?php echo $f_id ?>").val(numEmp);
    //



    //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
    $("#num_uni_std_<?php echo $u_id ?>").val(faculty_std);
    $("#num_uni_emp_<?php echo $u_id ?>").val(faculty_emp);
    //



    //ນັກຮຽນບວກກັບພະນັກງານແນວນອນ ຫຼື ແຖວຂອງ 1 ສາຂາ
    $("#total_course_<?php echo $c_id ?>_<?php echo $cr['user_id'] ?>").val(parseInt($("#std_<?php echo $c_id ?>_<?php echo $cr['user_id'] ?>").val()) + parseInt($(
        "#emp_<?php echo $c_id ?>_<?php echo $cr['user_id'] ?>").val()));
    //


    //ລວມທັງໝົດຂອງຄະນະ ໂດຍການເອົາລວມຄະນະນັກຮຽນແນວນອນບວກກັບລວມຄະນະພະນັກງານແນວນອນ
    $("#total_fac_<?php echo $f_id ?>").val(parseInt($("#num_fac_std_<?php echo $f_id ?>").val()) + parseInt(
        $("#num_fac_emp_<?php echo $f_id ?>").val()));
    //
    <?php
            }//ຈົບ Loop ສາຂາວິຊາ
            ?>
    var faculty_std =
        0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var faculty_emp =
        0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນພະນັກງານຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    <?php
            $f_sql = mysqli_query($conn,"SELECT cp.user_id,cre_id,adj_id,cp.course_id,c.fac_id,course_name,p_m_id,std_qty as std_qty,emp_qty as emp_qty, std_qty + emp_qty as total
            FROM create_plan cp
            LEFT JOIN course c ON cp.course_id=c.course_id
            LEFT JOIN faculty f ON c.fac_id=f.fac_id
            WHERE adj_id='$a_id' AND uni_id='$u_id' AND c.fac_id='$f_id' AND cp.p_m_id='$p_m_id'
            GROUP BY cp.user_id;");//ດຶງຂໍ້ມູນຄະນະພາຍໃນວິທະຍາໄລດຽວ
            // Loop ຂໍ້ມູນແຕ່ລະຄະນະທີ່ຢູ່ໃນມະຫາໄລນັ້ນອອກມາທັງໝົດແລ້ວເອົາມາບວກລວມກັນ
            foreach($f_sql as $f_get){
            ?>
    faculty_std += parseInt($("#total_fac_std_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    faculty_emp += parseInt($("#total_fac_emp_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນພະນັກງານແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    <?php
             }
             //
             ?>
    // //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ       
    $("#total_col_uni_std_<?php echo $u_id ?>").val(faculty_std);
    //
    //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ພະນັກງານ
    $("#total_col_uni_emp_<?php echo $u_id ?>").val(faculty_emp);
    //
    <?php
        }//ຈົບ Loop ຄະນະ
        ?>
    //ລວມທັງໝົດມະຫາໄລ ໂດຍການເອົາລວມມະຫາໄລນັກຮຽນແນວນອນບວກກັບລວມມະຫາໄລພະນັກງານແນວນອນ
    $("#total_uni_<?php echo $u_id ?>").val(parseInt($("#num_uni_std_<?php echo $u_id ?>").val()) +
        parseInt($("#num_uni_emp_<?php echo $u_id ?>").val()));
    //  
    <?php
        
    }//ຈົບ Loop ມະຫາໄລ
    $uni_total = mysqli_query($conn,"SELECT f.uni_id
    FROM create_plan cp
    LEFT JOIN course c ON cp.course_id=c.course_id
    LEFT JOIN faculty f ON c.fac_id=f.fac_id
    LEFT JOIN university u ON f.uni_id=u.uni_id
    WHERE adj_id='$a_id' AND cp.p_m_id='$p_m_id'
    GROUP BY f.uni_id;"); //ດຶງຂໍ້ມູນມະຫາໄລທັງໝົດອອກມາ
    ?>
    var total_uni = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຄ່າບວກຈຳນວນທັງໝົດຂອງແຕ່ລະມະຫາໄລ
    <?php
        foreach($uni_total as $uni_get){
    ?>
    total_uni += parseInt($("#total_uni_<?= $uni_get['uni_id'] ?>")
        .val()); // ບວກຈຳນວນແຕ່ລະມະຫາໄລໄວ້ໃນຕົວປ່ຽນ   
    <?php 
        }
    ?>

    // ລວມທັງໝົດ ມະຫາໄລບວກມະຫາໄລ
    $("#amount").val(total_uni);
});


//ລວມຄ່າທັງໝົດຕອນໂຫຼດຂໍ້ມູນ
$(document).ready(function(){
    <?php
    // Loop ມະຫາໄລອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
    $a_id = $_POST['query'];
    // $p_id = $_SESSION['p_m_id'];

    $u = mysqli_query($conn,"SELECT cre_id,adj_id,cp.course_id,course_name,fac_name,f.uni_id,uni_name,p_m_id,sum(std_qty) as std_qty,sum(emp_qty) as emp_qty,
    sum(std_qty) + sum(emp_qty) as total
    FROM create_plan cp
    LEFT JOIN course c ON cp.course_id=c.course_id
    LEFT JOIN faculty f ON c.fac_id=f.fac_id
    LEFT JOIN university u ON f.uni_id=u.uni_id
    WHERE adj_id='$a_id' AND cp.p_m_id='$p_m_id' AND cp.p_m_id='$p_m_id'
    GROUP BY f.uni_id;");
    foreach($u as $un){
        $u_id = $un['uni_id'];
        $f = mysqli_query($conn,"SELECT cre_id,adj_id,cp.course_id,course_name,c.fac_id,fac_name,p_m_id,
        sum(std_qty) as std_qty,sum(emp_qty) as emp_qty, sum(std_qty)+ sum(emp_qty) as total
        FROM create_plan cp
        LEFT JOIN course c ON cp.course_id=c.course_id
        LEFT JOIN faculty f ON c.fac_id=f.fac_id
        WHERE adj_id='$a_id' AND uni_id='$u_id' AND cp.p_m_id='$p_m_id'
        GROUP BY c.fac_id;");
        //Loop ຄະນະອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
        foreach($f as $fc){
            $f_id = $fc['fac_id'];
            $c = mysqli_query($conn,"SELECT cp.user_id,cre_id,demand_name,surname,gender,adj_id,cp.course_id,c.fac_id,course_name,cp.p_m_id,std_qty as std_qty,emp_qty as emp_qty, std_qty + emp_qty as total
            FROM create_plan cp
            LEFT JOIN course c ON cp.course_id=c.course_id
            LEFT JOIN user u ON cp.user_id=u.user_id
            LEFT JOIN demand_user du ON u.user_id=du.user_id
            WHERE adj_id='$a_id' AND c.fac_id='$f_id' AND cp.p_m_id='$p_m_id';");
            // Loop ສາຂາວິຊາອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
            foreach($c as $cr){
                
                $c_id = $cr['course_id'];
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $c_sql = mysqli_query($conn,"SELECT cp.user_id,cre_id,demand_name,surname,gender,adj_id,cp.course_id,c.fac_id,course_name,cp.p_m_id,std_qty as std_qty,emp_qty as emp_qty, std_qty + emp_qty as total
                FROM create_plan cp
                LEFT JOIN course c ON cp.course_id=c.course_id
                LEFT JOIN user u ON cp.user_id=u.user_id
                LEFT JOIN demand_user du ON u.user_id=du.user_id
                WHERE adj_id='$a_id' AND c.fac_id='$f_id' AND cp.p_m_id='$p_m_id';");
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $f_sql = mysqli_query($conn,"SELECT cre_id,adj_id,cp.course_id,course_name,c.fac_id,fac_name,p_m_id,
                sum(std_qty) as std_qty,sum(emp_qty) as emp_qty, sum(std_qty)+ sum(emp_qty) as total
                FROM create_plan cp
                LEFT JOIN course c ON cp.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                WHERE adj_id='$a_id' AND uni_id='$u_id' AND cp.p_m_id='$p_m_id'
                GROUP BY c.fac_id;");

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
    numStd += parseInt($("#std_<?php echo $c_get['course_id'] ?>_<?php echo $c_get['user_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    numEmp += parseInt($("#emp_<?php echo $c_get['course_id'] ?>_<?php echo $c_get['user_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນພະນັກງານແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    <?php
                        }
                        // loop faculty 
                        foreach($f_sql as $f_get){
                        ?>
    faculty_std += parseInt($("#num_fac_std_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    faculty_emp += parseInt($("#num_fac_emp_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນພະນັກງານແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະມະຫາໄລ
    <?php
                        }
                        ?>

    //ລວມຄະນະ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
    $("#num_fac_std_<?php echo $f_id ?>").val(numStd);
    //


    //ລວມຄະນະ ແນວຕັ້ງ ຫຼື ຖັນ ພະນັກງານ
    $("#num_fac_emp_<?php echo $f_id ?>").val(numEmp);
    //



    //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
    $("#num_uni_std_<?php echo $u_id ?>").val(faculty_std);
    $("#num_uni_emp_<?php echo $u_id ?>").val(faculty_emp);
    //



    //ນັກຮຽນບວກກັບພະນັກງານແນວນອນ ຫຼື ແຖວຂອງ 1 ສາຂາ
    $("#total_course_<?php echo $c_id ?>_<?php echo $cr['user_id'] ?>").val(parseInt($("#std_<?php echo $c_id ?>_<?php echo $cr['user_id'] ?>").val()) + parseInt($(
        "#emp_<?php echo $c_id ?>_<?php echo $cr['user_id'] ?>").val()));
    //


    //ລວມທັງໝົດຂອງຄະນະ ໂດຍການເອົາລວມຄະນະນັກຮຽນແນວນອນບວກກັບລວມຄະນະພະນັກງານແນວນອນ
    $("#total_fac_<?php echo $f_id ?>").val(parseInt($("#num_fac_std_<?php echo $f_id ?>").val()) + parseInt(
        $("#num_fac_emp_<?php echo $f_id ?>").val()));
    //
    <?php
            }//ຈົບ Loop ສາຂາວິຊາ
            ?>
    var faculty_std =
        0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var faculty_emp =
        0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນພະນັກງານຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    <?php
            $f_sql = mysqli_query($conn,"SELECT cp.user_id,cre_id,adj_id,cp.course_id,c.fac_id,course_name,p_m_id,std_qty as std_qty,emp_qty as emp_qty, std_qty + emp_qty as total
            FROM create_plan cp
            LEFT JOIN course c ON cp.course_id=c.course_id
            LEFT JOIN faculty f ON c.fac_id=f.fac_id
            WHERE adj_id='$a_id' AND uni_id='$u_id' AND c.fac_id='$f_id' AND cp.p_m_id='$p_m_id'
            GROUP BY cp.user_id;");//ດຶງຂໍ້ມູນຄະນະພາຍໃນວິທະຍາໄລດຽວ
            // Loop ຂໍ້ມູນແຕ່ລະຄະນະທີ່ຢູ່ໃນມະຫາໄລນັ້ນອອກມາທັງໝົດແລ້ວເອົາມາບວກລວມກັນ
            foreach($f_sql as $f_get){
            ?>
    faculty_std += parseInt($("#total_fac_std_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    faculty_emp += parseInt($("#total_fac_emp_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນພະນັກງານແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    <?php
             }
             //
             ?>
    // //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ       
    $("#total_col_uni_std_<?php echo $u_id ?>").val(faculty_std);
    //
    //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ພະນັກງານ
    $("#total_col_uni_emp_<?php echo $u_id ?>").val(faculty_emp);
    //
    <?php
        }//ຈົບ Loop ຄະນະ
        ?>
    //ລວມທັງໝົດມະຫາໄລ ໂດຍການເອົາລວມມະຫາໄລນັກຮຽນແນວນອນບວກກັບລວມມະຫາໄລພະນັກງານແນວນອນ
    $("#total_uni_<?php echo $u_id ?>").val(parseInt($("#num_uni_std_<?php echo $u_id ?>").val()) +
        parseInt($("#num_uni_emp_<?php echo $u_id ?>").val()));
    //  
    <?php
        
    }//ຈົບ Loop ມະຫາໄລ
    $uni_total = mysqli_query($conn,"SELECT f.uni_id
    FROM create_plan cp
    LEFT JOIN course c ON cp.course_id=c.course_id
    LEFT JOIN faculty f ON c.fac_id=f.fac_id
    LEFT JOIN university u ON f.uni_id=u.uni_id
    WHERE adj_id='$a_id' AND cp.p_m_id='$p_m_id'
    GROUP BY f.uni_id;"); //ດຶງຂໍ້ມູນມະຫາໄລທັງໝົດອອກມາ
    ?>
    var total_uni = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຄ່າບວກຈຳນວນທັງໝົດຂອງແຕ່ລະມະຫາໄລ
    <?php
        foreach($uni_total as $uni_get){
    ?>
    total_uni += parseInt($("#total_uni_<?= $uni_get['uni_id'] ?>")
        .val()); // ບວກຈຳນວນແຕ່ລະມະຫາໄລໄວ້ໃນຕົວປ່ຽນ   
    <?php 
        }
    ?>

    // ລວມທັງໝົດ ມະຫາໄລບວກມະຫາໄລ
    $("#amount").val(total_uni);
});
</script>