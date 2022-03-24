<?php
session_start();
include ("../../oop/connect.php");

if ($_POST["query"]) {
$adj_id = $_POST['query'];
$faculty = mysqli_query($conn, "SELECT dept_id FROM adjust WHERE adj_id='$adj_id'");
$row_fac = mysqli_fetch_array($faculty,MYSQLI_ASSOC);

$dept_id = $row_fac["dept_id"];
$no_ = 0;
// $result = mysqli_query($conn, "SELECT * FROM adjustdetail WHERE dept_id='$dept_id'");
// Start Check University
if($_SESSION["uni_id"] == "HRD1"){
    $uni_array = array();
    
    $get_uni = mysqli_query($conn, "SELECT uni_id FROM hrd_user WHERE uni_id != 'HRD1'");
    foreach($get_uni as $row_uni){
        $uni_array[] = "\"".$row_uni['uni_id']."\"";
    }
    $uni_array = implode(",", $uni_array);
    $result_university = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,
    sum(univer) as univer,
    sum(univer_valunteer) as univer_valunteer,
    sum(prov) as prov,
    sum(intv) as intv,
    sum(ad_test) as ad_test,
    sum(std_public) as std_public,
    sum(emp) as emp,
    sum(std_handi) as std_handi,
    sum(std_lan) as std_lan,
    sum(ssk) as ssk,
    sum(std) as std,
    sum(emp_gov) as emp_gov,
    sum(test) as test,
    sum(std_con) as std_con,
    sum(std_2lan) as std_2lan,
    sum(std_inter) as std_inter,
    sum(emp_private) as emp_private,
    sum(univer) + sum(prov) + sum(intv) + sum(ad_test) + sum(emp) + sum(std_handi) + sum(std_lan)+sum(ssk)+sum(std)+sum(emp_gov)+sum(test)+sum(std_con)+sum(std_2lan)+sum(std_inter)+sum(emp_private)
    AS total_uni
    FROM adjustdetail ad
    LEFT JOIN course c ON ad.course_id=c.course_id
    LEFT JOIN faculty f ON c.fac_id=f.fac_id
    LEFT JOIN university u ON f.uni_id=u.uni_id
    LEFT JOIN department d ON u.dept_id=d.dept_id
    LEFT JOIN adjust a ON ad.adj_id=a.adj_id
    WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND u.uni_id NOT IN ('$uni_array') GROUP BY u.uni_id ORDER BY uni_id ASC;");
    //  AND u.uni_id NOT IN ('$uni_array')
}
else{
    $result_university = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,						
    sum(univer) as univer,
    sum(univer_valunteer) as univer_valunteer,
    sum(prov) as prov,
    sum(intv) as intv,
    sum(ad_test) as ad_test,
    sum(std_public) as std_public,
    sum(emp) as emp,
    sum(std_handi) as std_handi,
    sum(std_lan) as std_lan,
    sum(ssk) as ssk,
    sum(std) as std,
    sum(emp_gov) as emp_gov,
    sum(test) as test,
    sum(std_con) as std_con,
    sum(std_2lan) as std_2lan,
    sum(std_inter) as std_inter,
    sum(emp_private) as emp_private,
    sum(univer) + sum(univer_valunteer) + sum(prov) + sum(intv) + sum(ad_test) + sum(std_public) + sum(emp) + sum(std_handi) + sum(std_lan)+sum(ssk)+sum(std)+sum(emp_gov)+sum(test)+sum(std_con)+sum(std_2lan)+sum(std_inter)+sum(emp_private)
    AS total_uni FROM adjustdetail ad
    LEFT JOIN course c ON ad.course_id=c.course_id
    LEFT JOIN faculty f ON c.fac_id=f.fac_id
    LEFT JOIN university u ON f.uni_id=u.uni_id
    LEFT JOIN department d ON u.dept_id=d.dept_id
    LEFT JOIN adjust a ON ad.adj_id=a.adj_id
    WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND u.uni_id='$_SESSION[uni_id]' GROUP BY u.uni_id ORDER BY uni_id ASC;");
}
if(mysqli_num_rows($result_university) > 0){
?>
<style>
.tscroll table tr:nth-of-type(2) th {
    top: 26.5px !important;
}
.tscroll table td:first-of-type{
    width: 80px;
}

table td:nth-of-type(2){
    width: fit-content;
}

table td:nth-of-type(2) i{
    padding-left: 5px;
}
</style>

<div class="table-responsive tscroll">

    <input type="hidden" name="adj_id" id="adj_id" value="<?= $adj_id ?>">
    <input type="hidden" name="course_id" id="course_id" value="">
    <table id="detail_table" class="table-bordered" style="width: 3500px;">
        <tr>
            <th rowspan="2" style="text-align: center;margin: 0 auto;">ລຳດັບ</th>
            <th rowspan="2" style="text-align: center;width: 350px;">ສາຂາວິຊາຮຽນ</th>
            <th rowspan="2" style="text-align: center;">ລຳດັບຊັ້ນ</th>
            <th rowspan="2" style="text-align: center;width: 150px;">ລວມ</th>
            <th colspan="10" style="text-align: center;" class="tet">ແບ່ງປັນ</th>
            <th colspan="7" style="text-align: center;" class="tet">ຈ່າຍຄ່າຮຽນ</th>
        </tr>
        <tr style="text-align: center;">
            <th>ມະຫາໄລ</th>
            <th>ຄູອາສາສະໝັກ</th>
            <th>ແຂວງ</th>
            <th>ສຳພາດ</th>
            <th>ສອບເສັງ</th>
            <th>ນັກຮຽນສາມັນ</th>
            <th>ພະນັກງານ</th>
            <th>ນັກຮຽນພິການ</th>
            <th>ນັກຮຽນຫ້ອງ 2 ພາສາ</th>
            <th>ສສກ ແບ່ງ</th>
            <th>ນັກຮຽນ</th>
            <th>ພະນັກງານລັດ</th>
            <th>ສອບເສັງ</th>
            <th>ນັກຮຽນຕໍ່ເນື່ອງ</th>
            <th>ນັກຮຽນຫ້ອງ 2 ພາສາ ລາວ-ຝລັ່ງ</th>
            <th>ນັກຮຽນຕ່າງປະເທດ</th>
            <th>ພະນັກງານເອກະຊົນ</th>
        </tr>
        <?php
        //Loop University
            foreach($result_university as $uni){
                $uni_id = $uni['uni_id'];
                $no_++;
        ?>
        <tr style="background-color:#5199FA;color:white;">
            <td class="text-center"><?= ConverToRoman($no_) ?></td>
            <td colspan="2" style="text-align:center"><?= $uni['uni_name'] ?></td>
            <!-- ຈຳນວນທັງໝົດຂອງມະຫາໄລ -->
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_uni" value="<?= $uni['total_uni'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_uni_univer" value="<?= $uni['univer'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_uni_univer_valunteer" value="<?= $uni['univer_valunteer'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_uni_prov" value="<?= $uni['prov'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_uni_intv" value="<?= $uni['intv'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_uni_ad_test" value="<?= $uni['ad_test'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_uni_std_public" value="<?= $uni['std_public'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_uni_emp" value="<?= $uni['emp'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_uni_std_handi"
                    value="<?= $uni['std_handi'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_uni_std_lan" value="<?= $uni['std_lan'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_uni_ssk" value="<?= $uni['ssk'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_uni_std" value="<?= $uni['std'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_uni_emp_gov" value="<?= $uni['emp_gov'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_uni_test" value="<?= $uni['test'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_uni_std_con" value="<?= $uni['std_con'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_uni_std_2lan" value="<?= $uni['std_2lan'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_uni_std_inter"
                    value="<?= $uni['std_inter'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_col_uni_emp_private"
                    value="<?= $uni['emp_private'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <!-- ສິ້ນສຸດ -->

        </tr>
        <?php
            //Loop Faculty
            $result_faculty = mysqli_query($conn, "SELECT u.uni_id,uni_name,f.fac_id,fac_name,dept_name,
            sum(univer) as univer,
            sum(univer_valunteer) as univer_valunteer,
            sum(prov) as prov,
            sum(intv) as intv,
            sum(ad_test) as ad_test,
            sum(std_public) as std_public,
            sum(emp) as emp,
            sum(std_handi) as std_handi, 
            sum(std_lan) as std_lan,
            sum(ssk) as ssk,
            sum(std) as std,
            sum(emp_gov) as emp_gov,
            sum(test) as test,
            sum(std_con) as std_con,
            sum(std_2lan) as std_2lan,
            sum(std_inter) as std_inter,
            sum(emp_private) as emp_private,
            
            sum(univer)+sum(univer_valunteer)+sum(prov)+sum(intv)+sum(ad_test)+sum(std_public)+sum(emp)+sum(std_handi)+sum(std_lan)+sum(ssk)+sum(std)+sum(emp_gov)+sum(test)+sum(std_con)+sum(std_2lan)+sum(std_inter)+sum(emp_private) as total_fac
            FROM adjustdetail ad
            LEFT JOIN course c ON ad.course_id=c.course_id
            LEFT JOIN faculty f ON c.fac_id=f.fac_id
            LEFT JOIN university u ON f.uni_id=u.uni_id
            LEFT JOIN department d ON u.dept_id=d.dept_id
            LEFT JOIN adjust a ON ad.adj_id=a.adj_id
            WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$uni_id' GROUP BY f.fac_id ORDER BY fac_id ASC;");
            $i=0;
            foreach ($result_faculty as $fac) {
                $fac_id = $fac['fac_id'];
                $i++;
        ?>
        <tr class="parent" id="<?= $fac_id ?>" title="Click to expand/collapse"
            style="cursor: pointer;background-color:#B1CDF3;color:white;">
            <td style="color:white;" class="text-center">
                <?= $i ?>
            </td>
            <td style="color:white;"><?= $fac['fac_name'] ?></td>
            <td></td>
            <!-- ຈຳນວນທັງໝົດຂອງຄະນະ -->
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac" value="<?= $fac['total_fac'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_univer" value="<?= $fac['univer'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_univer_valunteer" value="<?= $fac['univer_valunteer'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_prov" value="<?= $fac['prov'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_intv" value="<?= $fac['intv'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_ad_test" value="<?= $fac['ad_test'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_std_public" value="<?= $fac['std_public'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_emp" value="<?= $fac['emp'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_std_handi" value="<?= $fac['std_handi'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_std_lan" value="<?= $fac['std_lan'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_ssk" value="<?= $fac['ssk'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_std" value="<?= $fac['std'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_emp_gov" value="<?= $fac['emp_gov'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_test" value="<?= $fac['test'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_std_con" value="<?= $fac['std_con'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_std_2lan" value="<?= $fac['std_2lan'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_std_inter" value="<?= $fac['std_inter'] ?>"
                    type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_fac_emp_private"
                    value="<?= $fac['emp_private'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <!-- ສິ້ນສຸດ -->
        </tr>
        <?php

            //Loop Course
                $result_course = mysqli_query($conn, "SELECT d_id,u.uni_id,uni_name,f.fac_id,fac_name,dept_name,ad.course_id,course_name,univer,univer_valunteer,prov,intv,ad_test,std_public,emp,std_handi,std_lan,ssk,std,emp_gov,test,std_con,std_2lan,std_inter,emp_private,
                univer+univer_valunteer+prov+intv+ad_test+std_public+emp+std_handi+std_lan+ssk+std+emp_gov+test+std_con+std_2lan+std_inter+emp_private as total_course,level_name
                FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                LEFT JOIN course_level lv ON c.level_id=lv.level_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$uni_id' AND c.fac_id='$fac_id' ORDER BY level_name ASC,course_id ASC;");
                $j=0;
                foreach ($result_course as $cour) {
                    $course_id = $cour['course_id'];
                    $j++;
            ?>
        <tr class="child-<?= $fac_id ?>" style="display: table-row;">
            <td class="text-center">
                <?= $i . "." . $j ?>
            </td>
            <td style="width: fit-content" class="text-nowrap">
                <div class="d-flex pl-2 py-2" style="gap: 25px;">
                    <i style="cursor: pointer;" class="fa fa-info toolcolor btnUpdate_cust"></i>
                    <small style="font-size:16px;"><?= $cour['course_name'] ?>
                    </small>
                </div>
            </td>
            <td style="width: 130px;text-align: center;"><?= $cour['level_name'] ?></td>
            <!-- ຈຳນວນລວມຂອງສາຂາ -->
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="total_course_<?= $course_id ?>"
                    value="<?= $cour['total_course'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;" disabled>
            </td>
            <!-- ສິ້ນສຸດ -->
            <!-- ບ່ອນປ້ອນຈຳນວນສາຂາ -->
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only">

                    <input class="quantity adjustInput form-control form-control" min="0" name="num_course_univer"
                        id="num_course_univer_<?= $course_id ?>" value="<?= $cour["univer"] ?>" type="number"
                        style="font-weight:bold!important;">
                    <div class="invalid-feedback"></div>

                </div>
            </td>
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only">

                    <input class="quantity adjustInput form-control form-control" min="0" name="num_course_univer_valunteer"
                        id="num_course_univer_valunteer_<?= $course_id ?>" value="<?= $cour["univer_valunteer"] ?>" type="number"
                        style="font-weight:bold!important;">
                    <div class="invalid-feedback"></div>

                </div>
            </td>
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only">

                    <input class="quantity adjustInput form-control" min="0" name="num_course_prov"
                        id="num_course_prov_<?= $course_id ?>" value="<?= $cour["prov"] ?>" type="number"
                        style="font-weight:bold!important;">
                    <div class="invalid-feedback"></div>

                </div>
            </td>
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only">

                    <input class="quantity adjustInput form-control" min="0" name="num_course_intv"
                        id="num_course_intv_<?= $course_id ?>" value="<?= $cour["intv"] ?>" type="number"
                        style="font-weight:bold!important;">
                    <div class="invalid-feedback"></div>

                </div>
            </td>
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only">

                    <input class="quantity adjustInput form-control" min="0" name="num_course_ad_test"
                        id="num_course_ad_test_<?= $course_id ?>" value="<?= $cour["ad_test"] ?>" type="number"
                        style="font-weight:bold!important;">
                    <div class="invalid-feedback"></div>

                </div>
            </td>
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only">

                    <input class="quantity adjustInput form-control" min="0" name="num_course_std_public"
                        id="num_course_std_public_<?= $course_id ?>" value="<?= $cour["std_public"] ?>" type="number"
                        style="font-weight:bold!important;">
                    <div class="invalid-feedback"></div>

                </div>
            </td>
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only">

                    <input class="quantity adjustInput form-control" min="0" name="num_course_emp"
                        id="num_course_emp_<?= $course_id ?>" value="<?= $cour["emp"] ?>" type="number"
                        style="font-weight:bold!important;">
                    <div class="invalid-feedback"></div>

                </div>
            </td>
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only">

                    <input class="quantity adjustInput form-control" min="0" name="num_course_std_handi"
                        id="num_course_std_handi_<?= $course_id ?>" value="<?= $cour["std_handi"] ?>" type="number"
                        style="font-weight:bold!important;">
                    <div class="invalid-feedback"></div>

                </div>
            </td>
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only">

                    <input class="quantity adjustInput form-control" min="0" name="num_course_std_lan"
                        id="num_course_std_lan_<?= $course_id ?>" value="<?= $cour["std_lan"] ?>" type="number"
                        style="font-weight:bold!important;">
                    <div class="invalid-feedback"></div>

                </div>
            </td>
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only">

                    <input class="quantity adjustInput form-control" min="0" name="num_course_ssk"
                        id="num_course_ssk_<?= $course_id ?>" value="<?= $cour["ssk"] ?>" type="number"
                        style="font-weight:bold!important;">
                    <div class="invalid-feedback"></div>

                </div>
            </td>
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only">

                    <input class="quantity adjustInput form-control" min="0" name="num_course_std"
                        id="num_course_std_<?= $course_id ?>" value="<?= $cour["std"] ?>" type="number"
                        style="font-weight:bold!important;">
                    <div class="invalid-feedback"></div>

                </div>
            </td>
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only">

                    <input class="quantity adjustInput form-control" min="0" name="num_course_emp_gov"
                        id="num_course_emp_gov_<?= $course_id ?>" value="<?= $cour["emp_gov"] ?>" type="number"
                        style="font-weight:bold!important;">
                    <div class="invalid-feedback"></div>

                </div>
            </td>
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only">

                    <input class="quantity adjustInput form-control" min="0" name="num_course_test"
                        id="num_course_test_<?= $course_id ?>" value="<?= $cour["test"] ?>" type="number"
                        style="font-weight:bold!important;">
                    <div class="invalid-feedback"></div>

                </div>
            </td>
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only">

                    <input class="quantity adjustInput form-control" min="0" name="num_course_std_con"
                        id="num_course_std_con_<?= $course_id ?>" value="<?= $cour["std_con"] ?>" type="number"
                        style="font-weight:bold!important;">
                    <div class="invalid-feedback"></div>

                </div>
            </td>
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only">

                    <input class="quantity adjustInput form-control" min="0" name="num_course_std_2lan"
                        id="num_course_std_2lan_<?= $course_id ?>" value="<?= $cour["std_2lan"] ?>" type="number"
                        style="font-weight:bold!important;">
                    <div class="invalid-feedback"></div>

                </div>
            </td>
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only">

                    <input class="quantity adjustInput form-control" min="0" name="num_course_std_inter"
                        id="num_course_std_inter_<?= $course_id ?>" value="<?= $cour["std_inter"] ?>" type="number"
                        style="font-weight:bold!important;">
                    <div class="invalid-feedback"></div>

                </div>
            </td>
            <td style="text-align:center">
                <div class="def-number-input number-input safari_only">

                    <input class="quantity adjustInput form-control" min="0" name="num_course_emp_private"
                        id="num_course_emp_private_<?= $course_id ?>" value="<?= $cour["emp_private"] ?>" type="number"
                        style="font-weight:bold!important;">
                    <div class="invalid-feedback"></div>

                </div>
            </td>
            <td style="display: none">
            <?= $course_id ?>
            </td>
            <!-- ສິ້ນສຸດ -->
        </tr>

        <?php
                //End Loop Course
                    }
                ?>

        <?php
            //End Loop Faculty
            }
            ?>
        <?php
        // End loop university
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
                <hr size="1" width="90%">';
    }
}else{
        echo '<br>
                <hr size="1" width="90%">
                <p align="center">ບໍ່ມີຂໍ້ມູນ</p>
                <hr size="1" width="90%">';
    }
?>

<div class="waitload2" id="waitload2">
</div>
<div id="result2">
</div>

<script>
// $(document).on('click', '.btnUpdate_cust', function() {

//     $tr = $(this).closest('tr');
//     var data = $tr.children("td").map(function() {
//         return $(this).text();
//     }).get();

//     console.log(data);


//     $('#course_id').val(data[0]);


//     var adj_id = $('#adj_id').val();
//     var course_id = $('#course_id').val();
//     load_data2(adj_id, course_id);
// });

// function load_data2(adj, course) {
//     $.ajax({
//         url: "fetch_step2.php",
//         method: "POST",
//         data: {
//             adj: adj,
//             course: course
//         },
//         success: function(data) {
//             $('#result2').html(data);
//         }
//     });
// }

$('tr.parent')
    .css("cursor", "pointer")
    .attr("title", "Click to expand/collapse")
    .click(function() {
        $(this).siblings('.child-' + this.id).toggle();
    });
$('tr[@class^=child-]').hide().children('td');
</script>