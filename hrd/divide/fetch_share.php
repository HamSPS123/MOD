<?php
session_start();
include ("../../oop/connect.php");
    
    if ($_POST["query"] !== "") {
        $adj_id = $_POST['query'];
        $uni_id = $_SESSION['uni_id'];
        $faculty = mysqli_query($conn, "SELECT dept_id FROM adjust WHERE adj_id='$adj_id'");
        $row_fac = mysqli_fetch_array($faculty,MYSQLI_ASSOC);

        $dept_id = $row_fac["dept_id"];
        $result = mysqli_query($conn, "SELECT * FROM adjustdetail WHERE dept_id='$dept_id'");
        // Start Check University
        $no_=0;
        if($_SESSION["uni_id"] == "HRD1"){
            $uni_array = array();
            
            $get_uni = mysqli_query($conn, "SELECT uni_id FROM hrd_user WHERE uni_id != 'HRD1'");
            foreach($get_uni as $row_uni){
                $uni_array[] = "\"".$row_uni['uni_id']."\"";
            }
            $uni_array = implode(",", $uni_array);
            $result_university = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_uni FROM adjustdetail ad
            LEFT JOIN course c ON ad.course_id=c.course_id
            LEFT JOIN faculty f ON c.fac_id=f.fac_id
            LEFT JOIN university u ON f.uni_id=u.uni_id
            LEFT JOIN department d ON u.dept_id=d.dept_id
            LEFT JOIN adjust a ON ad.adj_id=a.adj_id
            WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND u.uni_id NOT IN ('$uni_array') GROUP BY u.uni_id ORDER BY uni_id ASC");
        }
        else{
            $result_university = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_uni FROM adjustdetail ad
            LEFT JOIN course c ON ad.course_id=c.course_id
            LEFT JOIN faculty f ON c.fac_id=f.fac_id
            LEFT JOIN university u ON f.uni_id=u.uni_id
            LEFT JOIN department d ON u.dept_id=d.dept_id
            LEFT JOIN adjust a ON ad.adj_id=a.adj_id
            WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND u.uni_id='$uni_id' GROUP BY u.uni_id ORDER BY uni_id ASC;");
        }
        // $result_university = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_uni FROM adjustdetail ad
        // LEFT JOIN course c ON ad.course_id=c.course_id
        // LEFT JOIN faculty f ON c.fac_id=f.fac_id
        // LEFT JOIN university u ON f.uni_id=u.uni_id
        // LEFT JOIN department d ON u.dept_id=d.dept_id
        // LEFT JOIN adjust a ON ad.adj_id=a.adj_id
        // WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' GROUP BY u.uni_id");
        if(mysqli_num_rows($result_university) > 0){
        ?>
<style>
.tscroll table tr:nth-of-type(2) th {
    top: 27px !important;
}
</style>
<input type="hidden" name="adj_id" value="<?= $adj_id ?>">
<div class="table-responsive tscroll">
    <table id="detail_table" class="table-bordered" style="width: 3500px;">
        <thead>
            <tr>
                <th rowspan="2" style="text-align: center!important;margin: 0 auto;">ລຳດັບ</th>
                <th rowspan="2" style="text-align: center;">ສາຂາວິຊາຮຽນ</th>
                <th rowspan="2" style="text-align: center;">ລຳດັບຊັ້ນ</th>
                <th rowspan="2" style="text-align: center;">ແຜນຮັບນັກ​ຮຽນ</th>
                <th rowspan="2" style="text-align: center;">ລວມ</th>
                <th colspan="10" style="text-align: center; position:st">ແບ່ງປັນ</th>
                <th colspan="7" style="text-align: center;">ຈ່າຍຄ່າຮຽນ</th>
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
        </thead>

        <tbody>
            <?php
            // Start Check University
            foreach($result_university as $uni){
                $uni_id = $uni["uni_id"];
                $no_ ++;
                
            ?>
            <tr style="background-color:#5199FA;color:white;">
                <td class="text-center"><?= ConverToRoman($no_) ?>.</td>
                <td style="text-align:center;"><?= $uni["uni_name"] ?></td>
                <td></td>
                <!-- ຈຳນວນແຜນຮັບທັງໝົດຂອງມະຫາໄລ -->
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" value="<?= $uni["total_uni"] ?>" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <!-- ສິ້ນສຸດ -->
                <!-- ຈຳນວນທັງໝົດຂອງມະຫາໄລ -->
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_uni_<?= $uni["uni_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_uni_univer_<?= $uni["uni_id"] ?>"
                        value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_uni_univer_val_<?= $uni["uni_id"] ?>"
                        value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_uni_prov_<?= $uni["uni_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_uni_intv_<?= $uni["uni_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_uni_ad_test_<?= $uni["uni_id"] ?>"
                        value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_uni_std_pub_<?= $uni["uni_id"] ?>"
                        value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_uni_emp_<?= $uni["uni_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_uni_std_handi_<?= $uni["uni_id"] ?>"
                        value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_uni_std_lan_<?= $uni["uni_id"] ?>"
                        value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_uni_ssk_<?= $uni["uni_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_uni_std_<?= $uni["uni_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_uni_emp_gov_<?= $uni["uni_id"] ?>"
                        value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_uni_test_<?= $uni["uni_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_uni_std_con_<?= $uni["uni_id"] ?>"
                        value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_uni_std_2lan_<?= $uni["uni_id"] ?>"
                        value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_uni_std_inter_<?= $uni["uni_id"] ?>"
                        value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_col_uni_emp_private_<?= $uni["uni_id"] ?>"
                        value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <!-- ສິ້ນສຸດ -->

            </tr>
            <?php
                // Start Loop Faculty
                $result_faculty = mysqli_query($conn,"SELECT u.uni_id,uni_name,f.fac_id,fac_name,dept_name,sum(get_plan) AS total_fac FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$uni_id' GROUP BY f.fac_id ORDER BY fac_id ASC;");
                $i=0;
                foreach($result_faculty as $fac){
                    $fac_id = $fac["fac_id"];
                    $i++;
            ?>
            <tr class="parent" id="<?= $fac_id ?>" title="Click to expand/collapse"
                style="cursor: pointer;background-color:#B1CDF3;color:white;">
                <td class="text-center">
                    <?= $i ?>.
                </td>
                <td><?= $fac["fac_name"] ?></td>
                <td></td>
                <!-- ຈຳນວນລວມແຜນຮັບຂອງຄະນະ -->
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac["total_fac"] ?>" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white"
                        disabled>
                </td>
                <!-- ສິ້ນສຸດ -->
                <!-- ຈຳນວນທັງໝົດຂອງຄະນະ -->
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_<?= $fac["fac_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_univer_<?= $fac["fac_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_univer_val_<?= $fac["fac_id"] ?>"
                        value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_prov_<?= $fac["fac_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_intv_<?= $fac["fac_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_ad_test_<?= $fac["fac_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_std_pub_<?= $fac["fac_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_emp_<?= $fac["fac_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_std_handi_<?= $fac["fac_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_std_lan_<?= $fac["fac_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_ssk_<?= $fac["fac_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_std_<?= $fac["fac_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_emp_gov_<?= $fac["fac_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_test_<?= $fac["fac_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_std_con_<?= $fac["fac_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_std_2lan_<?= $fac["fac_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_std_inter_<?= $fac["fac_id"] ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_fac_emp_private_<?= $fac["fac_id"] ?>"
                        value="0" type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                        disabled>
                </td>
                <!-- ສິ້ນສຸດ -->

            </tr>
            <!-- parent-end -->
            <?php 
                // Start Loop Course
                $result_course = mysqli_query($conn,"SELECT d_id,u.uni_id,uni_name,f.fac_id,fac_name,dept_name,ad.course_id,course_name,get_plan,univer,univer_valunteer,prov,intv,ad_test,std_public,emp,std_handi,std_lan,ssk,std,emp_gov,test,std_con,std_2lan,std_inter,emp_private,level_name FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                LEFT JOIN course_level lv ON c.level_id=lv.level_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$uni_id' AND c.fac_id='$fac_id' ORDER BY level_name ASC,course_id ASC;");
                $j=0;
                foreach($result_course as $course){
                $course_id = $course["course_id"];
                $j++;
            ?>

            <tr class="child-<?= $fac_id ?> " style="display: table-row;">
                <td class="text-center">
                    <?= $i ?>.<?= $j ?>
                    <input type="hidden" name="d_id_<?= $course_id ?>" value="<?= $course["d_id"] ?>">
                </td>
                <td style="padding-left:30px;" class="text-nowrap"><?= $course["course_name"] ?></td>
                <td style="width: 130px;text-align: center;"><?= $course["level_name"] ?></td>
                <!-- ຈຳນວນສ້າງແຜນຮັບ -->
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="num1" value="<?= $course["get_plan"] ?>"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;"
                        disabled>
                </td>
                <!-- ສິ້ນສຸດ -->
                <!-- ຈຳນວນລວມຂອງສາຂາ -->
                <td style="text-align:center">
                    <input class="quantity" min="0" name="num1" id="total_course_<?= $course_id ?>" value="0"
                        type="number"
                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;"
                        disabled>
                </td>
                <!-- ສິ້ນສຸດ -->
                <!-- ບ່ອນປ້ອນຈຳນວນສາຂາ -->
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnAdjust"></button>
                        <input class="quantity adjustInput form-control form-control" min="0"
                            name="num_course_univer_<?= $course_id ?>" id="num_course_univer_<?= $course_id ?>"
                            value="<?php if($course["univer"] == ''){ echo $course['univer'] = 0;}else{ echo $course['univer']; } ?>"
                            type="number" style="font-weight:bold!important;">
                        <div class="invalid-feedback"></div>
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnAdjust"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnAdjust"></button>
                        <input class="quantity adjustInput form-control form-control" min="0"
                            name="num_course_univer_val_<?= $course_id ?>" id="num_course_univer_val_<?= $course_id ?>"
                            value="<?php if($course["univer_valunteer"] == ''){ echo $course['univer_valunteer'] = 0;}else{ echo $course['univer_valunteer']; } ?>"
                            type="number" style="font-weight:bold!important;">
                        <div class="invalid-feedback"></div>
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnAdjust"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnAdjust"></button>
                        <input class="quantity adjustInput form-control" min="0"
                            name="num_course_prov_<?= $course_id ?>" id="num_course_prov_<?= $course_id ?>"
                            value="<?php if($course["prov"] == ''){ echo $course['prov'] = 0;}else{ echo $course['prov']; } ?>"
                            type="number" style="font-weight:bold!important;">
                        <div class="invalid-feedback"></div>
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnAdjust"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnAdjust"></button>
                        <input class="quantity adjustInput form-control" min="0"
                            name="num_course_intv_<?= $course_id ?>" id="num_course_intv_<?= $course_id ?>"
                            value="<?php if($course["intv"] == ''){ echo $course['intv'] = 0;}else{ echo $course['intv']; } ?>"
                            type="number" style="font-weight:bold!important;">
                        <div class="invalid-feedback"></div>
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnAdjust"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnAdjust"></button>
                        <input class="quantity adjustInput form-control" min="0"
                            name="num_course_ad_test_<?= $course_id ?>" id="num_course_ad_test_<?= $course_id ?>"
                            value="<?php if($course["ad_test"] == ''){ echo $course['ad_test'] = 0;}else{ echo $course['ad_test']; } ?>"
                            type="number" style="font-weight:bold!important;">
                        <div class="invalid-feedback"></div>
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnAdjust"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnAdjust"></button>
                        <input class="quantity adjustInput form-control" min="0"
                            name="num_course_std_pub_<?= $course_id ?>" id="num_course_std_pub_<?= $course_id ?>"
                            value="<?php if($course["std_public"] == ''){ echo $course['std_public'] = 0;}else{ echo $course['std_public']; } ?>"
                            type="number" style="font-weight:bold!important;">
                        <div class="invalid-feedback"></div>
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnAdjust"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnAdjust"></button>
                        <input class="quantity adjustInput form-control" min="0" name="num_course_emp_<?= $course_id ?>"
                            id="num_course_emp_<?= $course_id ?>"
                            value="<?php if($course["emp"] == ''){ echo $course['emp'] = 0;}else{ echo $course['emp']; } ?>"
                            type="number" style="font-weight:bold!important;">
                        <div class="invalid-feedback"></div>
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnAdjust"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnAdjust"></button>
                        <input class="quantity adjustInput form-control" min="0"
                            name="num_course_std_handi_<?= $course_id ?>" id="num_course_std_handi_<?= $course_id ?>"
                            value="<?php if($course["std_handi"] == ''){ echo $course['std_handi'] = 0;}else{ echo $course['std_handi']; } ?>"
                            type="number" style="font-weight:bold!important;">
                        <div class="invalid-feedback"></div>
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnAdjust"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnAdjust"></button>
                        <input class="quantity adjustInput form-control" min="0"
                            name="num_course_std_lan_<?= $course_id ?>" id="num_course_std_lan_<?= $course_id ?>"
                            value="<?php if($course["std_lan"] == ''){ echo $course['std_lan'] = 0;}else{ echo $course['std_lan']; } ?>"
                            type="number" style="font-weight:bold!important;">
                        <div class="invalid-feedback"></div>
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnAdjust"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnAdjust"></button>
                        <input class="quantity adjustInput form-control" min="0" name="num_course_ssk_<?= $course_id ?>"
                            id="num_course_ssk_<?= $course_id ?>"
                            value="<?php if($course["ssk"] == ''){ echo $course['ssk'] = 0;}else{ echo $course['ssk']; } ?>"
                            type="number" style="font-weight:bold!important;">
                        <div class="invalid-feedback"></div>
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnAdjust"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnAdjust"></button>
                        <input class="quantity adjustInput form-control" min="0" name="num_course_std_<?= $course_id ?>"
                            id="num_course_std_<?= $course_id ?>"
                            value="<?php if($course["std"] == ''){ echo $course['std'] = 0;}else{ echo $course['std']; } ?>"
                            type="number" style="font-weight:bold!important;">
                        <div class="invalid-feedback"></div>
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnAdjust"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnAdjust"></button>
                        <input class="quantity adjustInput form-control" min="0"
                            name="num_course_emp_gov_<?= $course_id ?>" id="num_course_emp_gov_<?= $course_id ?>"
                            value="<?php if($course["emp_gov"] == ''){ echo $course['emp_gov'] = 0;}else{ echo $course['emp_gov']; } ?>"
                            type="number" style="font-weight:bold!important;">
                        <div class="invalid-feedback"></div>
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnAdjust"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnAdjust"></button>
                        <input class="quantity adjustInput form-control" min="0"
                            name="num_course_test_<?= $course_id ?>" id="num_course_test_<?= $course_id ?>"
                            value="<?php if($course["test"] == ''){ echo $course['test'] = 0;}else{ echo $course['test']; } ?>"
                            type="number" style="font-weight:bold!important;">
                        <div class="invalid-feedback"></div>
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnAdjust"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnAdjust"></button>
                        <input class="quantity adjustInput form-control" min="0"
                            name="num_course_std_con_<?= $course_id ?>" id="num_course_std_con_<?= $course_id ?>"
                            value="<?php if($course["std_con"] == ''){ echo $course['std_con'] = 0;}else{ echo $course['std_con']; } ?>"
                            type="number" style="font-weight:bold!important;">
                        <div class="invalid-feedback"></div>
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnAdjust"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnAdjust"></button>
                        <input class="quantity adjustInput form-control" min="0"
                            name="num_course_std_2lan_<?= $course_id ?>" id="num_course_std_2lan_<?= $course_id ?>"
                            value="<?php if($course["std_2lan"] == ''){ echo $course['std_2lan'] = 0;}else{ echo $course['std_2lan']; } ?>"
                            type="number" style="font-weight:bold!important;">
                        <div class="invalid-feedback"></div>
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnAdjust"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnAdjust"></button>
                        <input class="quantity adjustInput form-control" min="0"
                            name="num_course_std_inter_<?= $course_id ?>" id="num_course_std_inter_<?= $course_id ?>"
                            value="<?php if($course["std_inter"] == ''){ echo $course['std_inter'] = 0;}else{ echo $course['std_inter']; } ?>"
                            type="number" style="font-weight:bold!important;">
                        <div class="invalid-feedback"></div>
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnAdjust"></button>
                    </div>
                </td>
                <td style="text-align:center">
                    <div class="def-number-input number-input safari_only">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                            class="minus btnAdjust"></button>
                        <input class="quantity adjustInput form-control" min="0"
                            name="num_course_emp_private_<?= $course_id ?>"
                            id="num_course_emp_private_<?= $course_id ?>"
                            value="<?php if($course["emp_private"] == ''){ echo $course['emp_private'] = 0;}else{ echo $course['emp_private']; } ?>"
                            type="number" style="font-weight:bold!important;">
                        <div class="invalid-feedback"></div>
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus btnAdjust"></button>
                    </div>
                </td>
                <!-- ສິ້ນສຸດ -->
            </tr>
            <?php 
                // End Loop Course
                }
            ?>
            <?php
                // End Loop Faculty
                }
            ?>
            <?php
            // End Loop University
            }
            ?>
        </tbody>
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

<script>
// $('.plus').on('click', function() {
// $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) +
//     parseInt($('#num4').val()));
// $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
// $("#totalall").val(parseInt($("#total1").val()));
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
// })
// $("#num2").change(function() {
//     $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) +
//         parseInt($('#num4').val()));
//     $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
//     $("#totalall").val(parseInt($("#total1").val()));
// })

// $("#num3").change(function() {
//     $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) +
//         parseInt($('#num4').val()));
//     $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
//     $("#totalall").val(parseInt($("#total1").val()));
// })
// $("#num4").change(function() {
//     $("#total1").val(parseInt($("#num1").val()) + parseInt($('#num2').val()) + parseInt($("#num3").val()) +
//         parseInt($('#num4').val()));
//     $("#total3").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
//     $("#totalall").val(parseInt($("#total1").val()));
// })

// $("#num5").change(function() {
//     $("#total4").val(parseInt($("#num3").val()) + parseInt($('#num4').val()));
//     $("#total5").val(parseInt($("#total1").val()) + parseInt($('#total2').val()));
//     $("#totalall").val(parseInt($("#total1").val()));
// })
</script>

<script type="text/javascript">
$(document).ready(function() {
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
$('.btnAdjust').on('click', function() {
    <?php
    // Loop ມະຫາໄລອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
    if($_SESSION["uni_id"] == "HRD1"){
        // $uni_array = array();
            
        // $get_uni = mysqli_query($conn, "SELECT uni_id FROM hrd_user WHERE uni_id != 'HRD1'");
        // foreach($get_uni as $row_uni){
        //     $uni_array[] = "\"".$row_uni['uni_id']."\"";
        // }
        // $uni_array = implode(",", $uni_array);
        $u = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_uni FROM adjustdetail ad
        LEFT JOIN course c ON ad.course_id=c.course_id
        LEFT JOIN faculty f ON c.fac_id=f.fac_id
        LEFT JOIN university u ON f.uni_id=u.uni_id
        LEFT JOIN department d ON u.dept_id=d.dept_id
        LEFT JOIN adjust a ON ad.adj_id=a.adj_id
        WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND u.uni_id NOT IN ('$uni_array') GROUP BY u.uni_id");
    }
    else{
        $u = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_uni FROM adjustdetail ad
        LEFT JOIN course c ON ad.course_id=c.course_id
        LEFT JOIN faculty f ON c.fac_id=f.fac_id
        LEFT JOIN university u ON f.uni_id=u.uni_id
        LEFT JOIN department d ON u.dept_id=d.dept_id
        LEFT JOIN adjust a ON ad.adj_id=a.adj_id
        WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND u.uni_id='$_SESSION[uni_id]' GROUP BY u.uni_id");
    }
    // $u = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_unit FROM adjustdetail ad
    // LEFT JOIN course c ON ad.course_id=c.course_id
    // LEFT JOIN faculty f ON c.fac_id=f.fac_id
    // LEFT JOIN university u ON f.uni_id=u.uni_id
    // LEFT JOIN department d ON u.dept_id=d.dept_id
    // LEFT JOIN adjust a ON ad.adj_id=a.adj_id
    // WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' GROUP BY u.uni_id");
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
                
                $c_id = $cr['course_id'];
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $c_sql = mysqli_query($conn,"SELECT u.uni_id,uni_name,f.fac_id,fac_name,dept_name,ad.course_id,course_name,get_plan FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$u_id' AND c.fac_id='$f_id'");
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $f_sql = mysqli_query($conn,"SELECT u.uni_id,uni_name,f.fac_id,fac_name,dept_name,ad.course_id,course_name,get_plan FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$u_id' AND c.fac_id='$f_id'");

                    ?>
    // 1 LOOP qty std and emp
    var num_course_univer = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນມະຫາໄລ
    var num_course_univer_val = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນມະຫາໄລ
    var num_course_prov = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນແຂວງ
    var num_course_intv = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນສຳພາດ
    var num_course_ad_test = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນສອບເສັງ
    var num_course_std_pub = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນພະນັກງານ
    var num_course_emp = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນພະນັກງານ
    var num_course_std_handi = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນພິການ
    var num_course_std_lan = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນຫ້ອງ 2 ພາສາ
    var num_course_ssk = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນ ສສກ ແບ່ງ
    var num_course_std = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນ
    var num_course_emp_gov = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນພະນັກງານລັດ
    var num_course_test = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນສອບເສັງ
    var num_course_std_con = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນຕໍ່ເນື່ອງ
    var num_course_std_2lan = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນຫ້ອງ 2 ພາສາ
    var num_course_std_inter = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນຕ່າງປະເທດ
    var num_course_emp_private = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນພະນັກງານເອກະຊົນ

    var total_fac_univer = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນມະຫາໄລ
    var total_fac_univer_val = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນມະຫາໄລ
    var total_fac_prov = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນແຂວງ
    var total_fac_intv = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນສຳພາດ
    var total_fac_ad_test = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນສອບເສັງ
    var total_fac_std_pub = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນພະນັກງານ
    var total_fac_emp = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນພະນັກງານ
    var total_fac_std_handi = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນພິການ
    var total_fac_std_lan = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນຫ້ອງ 2 ພາສາ
    var total_fac_ssk = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນ ສສກ ແບ່ງ
    var total_fac_std = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນ
    var total_fac_emp_gov = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນພະນັກງານລັດ
    var total_fac_test = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນສອບເສັງ
    var total_fac_std_con = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນຕໍ່ເນື່ອງ
    var total_fac_std_2lan = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນຫ້ອງ 2 ພາສາ
    var total_fac_std_inter = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນຕ່າງປະເທດ
    var total_fac_emp_private = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນພະນັກງານເອກະຊົນ
    <?php 
                        // Loop Course
                        foreach($c_sql as $c_get){
                        ?>
    num_course_univer += parseInt($("#num_course_univer_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_univer_val += parseInt($("#num_course_univer_val_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_prov += parseInt($("#num_course_prov_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_intv += parseInt($("#num_course_intv_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_ad_test += parseInt($("#num_course_ad_test_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std_pub += parseInt($("#num_course_std_pub_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_emp += parseInt($("#num_course_emp_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std_handi += parseInt($("#num_course_std_handi_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std_lan += parseInt($("#num_course_std_lan_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_ssk += parseInt($("#num_course_ssk_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std += parseInt($("#num_course_std_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_emp_gov += parseInt($("#num_course_emp_gov_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_test += parseInt($("#num_course_test_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std_con += parseInt($("#num_course_std_con_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std_2lan += parseInt($("#num_course_std_2lan_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std_inter += parseInt($("#num_course_std_inter_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_emp_private += parseInt($("#num_course_emp_private_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    <?php
                        }
                        // loop faculty 
                        foreach($f_sql as $f_get){
                        ?>

    total_fac_univer += parseInt($("#total_fac_univer_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_univer_val += parseInt($("#total_fac_univer_val_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_prov += parseInt($("#total_fac_prov_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_intv += parseInt($("#total_fac_intv_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_ad_test += parseInt($("#total_fac_ad_test_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_pub += parseInt($("#total_fac_std_pub_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_emp += parseInt($("#total_fac_emp_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_handi += parseInt($("#total_fac_std_handi_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_lan += parseInt($("#total_fac_std_lan_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_ssk += parseInt($("#total_fac_ssk_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std += parseInt($("#total_fac_std_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_emp_gov += parseInt($("#total_fac_emp_gov_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_test += parseInt($("#total_fac_test_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_con += parseInt($("#total_fac_std_con_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_2lan += parseInt($("#total_fac_std_2lan_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_inter += parseInt($("#total_fac_std_inter_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_emp_private += parseInt($("#total_fac_emp_private_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    <?php
                        }
                        ?>

    //ລວມຄະນະ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
    $("#total_fac_univer_<?php echo $f_id ?>").val(num_course_univer);
    $("#total_fac_univer_val_<?php echo $f_id ?>").val(num_course_univer_val);
    $("#total_fac_prov_<?php echo $f_id ?>").val(num_course_prov);
    $("#total_fac_intv_<?php echo $f_id ?>").val(num_course_intv);
    $("#total_fac_ad_test_<?php echo $f_id ?>").val(num_course_ad_test);
    $("#total_fac_std_pub_<?php echo $f_id ?>").val(num_course_std_pub);
    $("#total_fac_emp_<?php echo $f_id ?>").val(num_course_emp);
    $("#total_fac_std_handi_<?php echo $f_id ?>").val(num_course_std_handi);
    $("#total_fac_std_lan_<?php echo $f_id ?>").val(num_course_std_lan);
    $("#total_fac_ssk_<?php echo $f_id ?>").val(num_course_ssk);
    $("#total_fac_std_<?php echo $f_id ?>").val(num_course_std);
    $("#total_fac_emp_gov_<?php echo $f_id ?>").val(num_course_emp_gov);
    $("#total_fac_test_<?php echo $f_id ?>").val(num_course_test);
    $("#total_fac_std_con_<?php echo $f_id ?>").val(num_course_std_con);
    $("#total_fac_std_2lan_<?php echo $f_id ?>").val(num_course_std_2lan);
    $("#total_fac_std_inter_<?php echo $f_id ?>").val(num_course_std_inter);
    $("#total_fac_emp_private_<?php echo $f_id ?>").val(num_course_emp_private);
    //



    //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
    $("#total_col_uni_univer_<?php echo $u_id ?>").val(total_fac_univer);
    // $("#total_col_uni_prov_<?php echo $u_id ?>").val(total_fac_prov);
    // $("#total_col_uni_intv_<?php echo $u_id ?>").val(total_fac_intv);
    // $("#total_col_uni_ad_test_<?php echo $u_id ?>").val(total_fac_ad_test);
    // $("#total_col_uni_emp_<?php echo $u_id ?>").val(total_fac_emp);
    // $("#total_col_uni_std_handi_<?php echo $u_id ?>").val(total_fac_std_handi);
    // $("#total_col_uni_std_lan_<?php echo $u_id ?>").val(total_fac_std_lan);
    // $("#total_col_uni_ssk_<?php echo $u_id ?>").val(total_fac_ssk);
    // $("#total_col_uni_std_<?php echo $u_id ?>").val(total_fac_std);
    // $("#total_col_uni_emp_gov_<?php echo $u_id ?>").val(total_fac_emp_gov);
    // $("#total_col_uni_test_<?php echo $u_id ?>").val(total_fac_test);
    // $("#total_col_uni_std_con_<?php echo $u_id ?>").val(total_fac_std_con);
    // $("#total_col_uni_std_2lan_<?php echo $u_id ?>").val(total_fac_std_2lan);
    // $("#total_col_uni_std_inter_<?php echo $u_id ?>").val(total_fac_std_inter);
    // $("#total_col_uni_emp_private_<?php echo $u_id ?>").val(total_fac_emp_private);
    //




    //ນັກຮຽນບວກກັບພະນັກງານແນວນອນ ຫຼື ແຖວຂອງ 1 ສາຂາ
    $("#total_course_<?php echo $c_id ?>").val(
        parseInt($("#num_course_univer_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_univer_val_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_prov_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_intv_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_ad_test_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_pub_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_emp_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_handi_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_lan_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_ssk_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_emp_gov_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_test_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_con_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_2lan_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_inter_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_emp_private_<?php echo $c_id ?>").val())
    );
    //


    //ລວມທັງໝົດຂອງຄະນະ ໂດຍການເອົາລວມຄະນະນັກຮຽນແນວນອນບວກກັບລວມຄະນະພະນັກງານແນວນອນ
    $("#total_fac_<?php echo $f_id ?>").val(
        parseInt($("#total_fac_univer_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_univer_val_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_prov_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_intv_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_ad_test_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_pub_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_emp_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_handi_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_lan_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_ssk_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_emp_gov_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_test_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_con_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_2lan_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_inter_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_emp_private_<?php echo $f_id ?>").val())
    );
    //
    <?php
                }//ຈົບ Loop ສາຂາວິຊາ
            ?>
    var total_fac_univer =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ 
    var total_fac_univer_val =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ 
    var total_fac_intv =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_prov =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_ad_test =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std_pub =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_emp =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std_handi =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std_lan =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_ssk =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_emp_gov =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_test =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std_con =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std_2lan =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std_inter =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_emp_private =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    <?php
                $f_sql = mysqli_query($conn,"SELECT u.uni_id,uni_name,f.fac_id,fac_name,dept_name,sum(get_plan) AS total_fac FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$u_id' GROUP BY f.fac_id");//ດຶງຂໍ້ມູນຄະນະພາຍໃນວິທະຍາໄລດຽວ
                // Loop ຂໍ້ມູນແຕ່ລະຄະນະທີ່ຢູ່ໃນມະຫາໄລນັ້ນອອກມາທັງໝົດແລ້ວເອົາມາບວກລວມກັນ
                foreach($f_sql as $f_get){
            ?>

    total_fac_univer += parseInt($("#total_fac_univer_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_univer_val += parseInt($("#total_fac_univer_val_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_prov += parseInt($("#total_fac_prov_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_intv += parseInt($("#total_fac_intv_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_ad_test += parseInt($("#total_fac_ad_test_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_pub += parseInt($("#total_fac_std_pub_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_emp += parseInt($("#total_fac_emp_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_handi += parseInt($("#total_fac_std_handi_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_lan += parseInt($("#total_fac_std_lan_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_ssk += parseInt($("#total_fac_ssk_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std += parseInt($("#total_fac_std_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_emp_gov += parseInt($("#total_fac_emp_gov_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_test += parseInt($("#total_fac_test_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_con += parseInt($("#total_fac_std_con_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_2lan += parseInt($("#total_fac_std_2lan_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_inter += parseInt($("#total_fac_std_inter_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_emp_private += parseInt($("#total_fac_emp_private_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    <?php
                }
                //
             ?>

    //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ      
    $("#total_col_uni_univer_<?php echo $u_id ?>").val(total_fac_univer);
    $("#total_col_uni_univer_val_<?php echo $u_id ?>").val(total_fac_univer_val);
    $("#total_col_uni_prov_<?php echo $u_id ?>").val(total_fac_prov);
    $("#total_col_uni_intv_<?php echo $u_id ?>").val(total_fac_intv);
    $("#total_col_uni_ad_test_<?php echo $u_id ?>").val(total_fac_ad_test);
    $("#total_col_uni_std_pub_<?php echo $u_id ?>").val(total_fac_std_pub);
    $("#total_col_uni_emp_<?php echo $u_id ?>").val(total_fac_emp);
    $("#total_col_uni_std_handi_<?php echo $u_id ?>").val(total_fac_std_handi);
    $("#total_col_uni_std_lan_<?php echo $u_id ?>").val(total_fac_std_lan);
    $("#total_col_uni_ssk_<?php echo $u_id ?>").val(total_fac_ssk);
    $("#total_col_uni_std_<?php echo $u_id ?>").val(total_fac_std);
    $("#total_col_uni_emp_gov_<?php echo $u_id ?>").val(total_fac_emp_gov);
    $("#total_col_uni_test_<?php echo $u_id ?>").val(total_fac_test);
    $("#total_col_uni_std_con_<?php echo $u_id ?>").val(total_fac_std_con);
    $("#total_col_uni_std_2lan_<?php echo $u_id ?>").val(total_fac_std_2lan);
    $("#total_col_uni_std_inter_<?php echo $u_id ?>").val(total_fac_std_inter);
    $("#total_col_uni_emp_private_<?php echo $u_id ?>").val(total_fac_emp_private);
    //

    <?php
            }//ຈົບ Loop ຄະນະ
        ?>
    //ລວມທັງໝົດມະຫາໄລ ໂດຍການເອົາລວມມະຫາໄລນັກຮຽນແນວນອນບວກກັບລວມມະຫາໄລພະນັກງານແນວນອນ
    $("#total_uni_<?php echo $u_id ?>").val(
        parseInt($("#total_col_uni_univer_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_univer_val_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_prov_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_intv_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_ad_test_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_pub_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_emp_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_handi_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_lan_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_ssk_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_emp_gov_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_test_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_con_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_2lan_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_inter_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_emp_private_<?php echo $u_id ?>").val())
    );
    //  
    <?php
        
            }//ຈົບ Loop ມະຫາໄລ
            if($_SESSION["uni_id"] == "HRD1"){
                $unit_total = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_uni FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND u.uni_id NOT IN ('$uni_array') GROUP BY u.uni_id");
            }
            else{
                $unit_total = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_uni FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND u.uni_id='$_SESSION[uni_id]' GROUP BY u.uni_id");
            }
            // $unit_total = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_unit FROM adjustdetail ad
            // LEFT JOIN course c ON ad.course_id=c.course_id
            // LEFT JOIN faculty f ON c.fac_id=f.fac_id
            // LEFT JOIN university u ON f.uni_id=u.uni_id
            // LEFT JOIN department d ON u.dept_id=d.dept_id
            // LEFT JOIN adjust a ON ad.adj_id=a.adj_id
            // WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' GROUP BY u.uni_id"); //ດຶງຂໍ້ມູນມະຫາໄລທັງໝົດອອກມາ
        ?>
    var total_unit = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຄ່າບວກຈຳນວນທັງໝົດຂອງແຕ່ລະມະຫາໄລ
    <?php
            foreach($unit_total as $unit_get){
        ?>
    total_unit += parseInt($("#total_uni_<?php echo $unit_get['uni_id'] ?>")
        .val()); // ບວກຈຳນວນແຕ່ລະມະຫາໄລໄວ້ໃນຕົວປ່ຽນ   
    <?php 
            }
        ?>

    // ລວມທັງໝົດ ມະຫາໄລບວກມະຫາໄລ
    $("#amount").val(total_unit);
});
//






// ປ້ອນຜ່ານຄີບອດ
$('.adjustInput').keyup(function() {
    <?php
    // Loop ມະຫາໄລອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
    if($_SESSION["uni_id"] == "HRD1"){
        // $uni_array = array();
            
        // $get_uni = mysqli_query($conn, "SELECT uni_id FROM hrd_user WHERE uni_id != 'HRD1'");
        // foreach($get_uni as $row_uni){
        //     $uni_array[] = "\"".$row_uni['uni_id']."\"";
        // }
        // $uni_array = implode(",", $uni_array);
        $u = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_uni FROM adjustdetail ad
        LEFT JOIN course c ON ad.course_id=c.course_id
        LEFT JOIN faculty f ON c.fac_id=f.fac_id
        LEFT JOIN university u ON f.uni_id=u.uni_id
        LEFT JOIN department d ON u.dept_id=d.dept_id
        LEFT JOIN adjust a ON ad.adj_id=a.adj_id
        WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND u.uni_id NOT IN ('$uni_array') GROUP BY u.uni_id");
    }
    else{
        $u = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_uni FROM adjustdetail ad
        LEFT JOIN course c ON ad.course_id=c.course_id
        LEFT JOIN faculty f ON c.fac_id=f.fac_id
        LEFT JOIN university u ON f.uni_id=u.uni_id
        LEFT JOIN department d ON u.dept_id=d.dept_id
        LEFT JOIN adjust a ON ad.adj_id=a.adj_id
        WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND u.uni_id='$_SESSION[uni_id]' GROUP BY u.uni_id");
    }
    // $u = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_unit FROM adjustdetail ad
    // LEFT JOIN course c ON ad.course_id=c.course_id
    // LEFT JOIN faculty f ON c.fac_id=f.fac_id
    // LEFT JOIN university u ON f.uni_id=u.uni_id
    // LEFT JOIN department d ON u.dept_id=d.dept_id
    // LEFT JOIN adjust a ON ad.adj_id=a.adj_id
    // WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' GROUP BY u.uni_id");
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
                
                $c_id = $cr['course_id'];
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $c_sql = mysqli_query($conn,"SELECT u.uni_id,uni_name,f.fac_id,fac_name,dept_name,ad.course_id,course_name,get_plan FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$u_id' AND c.fac_id='$f_id'");
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $f_sql = mysqli_query($conn,"SELECT u.uni_id,uni_name,f.fac_id,fac_name,dept_name,ad.course_id,course_name,get_plan FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$u_id' AND c.fac_id='$f_id'");

                    ?>
    // 1 LOOP qty std and emp
    var num_course_univer = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນມະຫາໄລ
    var num_course_univer_val = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນມະຫາໄລ
    var num_course_prov = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນແຂວງ
    var num_course_intv = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນສຳພາດ
    var num_course_ad_test = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນສອບເສັງ
    var num_course_std_pub = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນພະນັກງານ
    var num_course_emp = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນພະນັກງານ
    var num_course_std_handi = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນພິການ
    var num_course_std_lan = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນຫ້ອງ 2 ພາສາ
    var num_course_ssk = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນ ສສກ ແບ່ງ
    var num_course_std = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນ
    var num_course_emp_gov = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນພະນັກງານລັດ
    var num_course_test = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນສອບເສັງ
    var num_course_std_con = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນຕໍ່ເນື່ອງ
    var num_course_std_2lan = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນຫ້ອງ 2 ພາສາ
    var num_course_std_inter = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນຕ່າງປະເທດ
    var num_course_emp_private = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນພະນັກງານເອກະຊົນ

    var total_fac_univer = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນມະຫາໄລ
    var total_fac_univer_val = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນມະຫາໄລ
    var total_fac_prov = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນແຂວງ
    var total_fac_intv = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນສຳພາດ
    var total_fac_ad_test = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນສອບເສັງ
    var total_fac_std_pub = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນພະນັກງານ
    var total_fac_emp = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນພະນັກງານ
    var total_fac_std_handi = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນພິການ
    var total_fac_std_lan = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນຫ້ອງ 2 ພາສາ
    var total_fac_ssk = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນ ສສກ ແບ່ງ
    var total_fac_std = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນ
    var total_fac_emp_gov = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນພະນັກງານລັດ
    var total_fac_test = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນສອບເສັງ
    var total_fac_std_con = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນຕໍ່ເນື່ອງ
    var total_fac_std_2lan = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນຫ້ອງ 2 ພາສາ
    var total_fac_std_inter = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນຕ່າງປະເທດ
    var total_fac_emp_private = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນພະນັກງານເອກະຊົນ
    <?php 
                        // Loop Course
                        foreach($c_sql as $c_get){
                        ?>
    num_course_univer += parseInt($("#num_course_univer_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_univer_val += parseInt($("#num_course_univer_val_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_prov += parseInt($("#num_course_prov_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_intv += parseInt($("#num_course_intv_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_ad_test += parseInt($("#num_course_ad_test_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std_pub += parseInt($("#num_course_std_pub_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_emp += parseInt($("#num_course_emp_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std_handi += parseInt($("#num_course_std_handi_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std_lan += parseInt($("#num_course_std_lan_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_ssk += parseInt($("#num_course_ssk_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std += parseInt($("#num_course_std_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_emp_gov += parseInt($("#num_course_emp_gov_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_test += parseInt($("#num_course_test_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std_con += parseInt($("#num_course_std_con_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std_2lan += parseInt($("#num_course_std_2lan_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std_inter += parseInt($("#num_course_std_inter_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_emp_private += parseInt($("#num_course_emp_private_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    <?php
                        }
                        // loop faculty 
                        foreach($f_sql as $f_get){
                        ?>

    total_fac_univer += parseInt($("#total_fac_univer_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_univer_val += parseInt($("#total_fac_univer_val_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_prov += parseInt($("#total_fac_prov_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_intv += parseInt($("#total_fac_intv_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_ad_test += parseInt($("#total_fac_ad_test_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_pub += parseInt($("#total_fac_std_pub_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_emp += parseInt($("#total_fac_emp_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_handi += parseInt($("#total_fac_std_handi_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_lan += parseInt($("#total_fac_std_lan_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_ssk += parseInt($("#total_fac_ssk_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std += parseInt($("#total_fac_std_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_emp_gov += parseInt($("#total_fac_emp_gov_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_test += parseInt($("#total_fac_test_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_con += parseInt($("#total_fac_std_con_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_2lan += parseInt($("#total_fac_std_2lan_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_inter += parseInt($("#total_fac_std_inter_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_emp_private += parseInt($("#total_fac_emp_private_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    <?php
                        }
                        ?>

    //ລວມຄະນະ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
    $("#total_fac_univer_<?php echo $f_id ?>").val(num_course_univer);
    $("#total_fac_univer_val_<?php echo $f_id ?>").val(num_course_univer_val);
    $("#total_fac_prov_<?php echo $f_id ?>").val(num_course_prov);
    $("#total_fac_intv_<?php echo $f_id ?>").val(num_course_intv);
    $("#total_fac_ad_test_<?php echo $f_id ?>").val(num_course_ad_test);
    $("#total_fac_std_pub_<?php echo $f_id ?>").val(num_course_std_pub);
    $("#total_fac_emp_<?php echo $f_id ?>").val(num_course_emp);
    $("#total_fac_std_handi_<?php echo $f_id ?>").val(num_course_std_handi);
    $("#total_fac_std_lan_<?php echo $f_id ?>").val(num_course_std_lan);
    $("#total_fac_ssk_<?php echo $f_id ?>").val(num_course_ssk);
    $("#total_fac_std_<?php echo $f_id ?>").val(num_course_std);
    $("#total_fac_emp_gov_<?php echo $f_id ?>").val(num_course_emp_gov);
    $("#total_fac_test_<?php echo $f_id ?>").val(num_course_test);
    $("#total_fac_std_con_<?php echo $f_id ?>").val(num_course_std_con);
    $("#total_fac_std_2lan_<?php echo $f_id ?>").val(num_course_std_2lan);
    $("#total_fac_std_inter_<?php echo $f_id ?>").val(num_course_std_inter);
    $("#total_fac_emp_private_<?php echo $f_id ?>").val(num_course_emp_private);
    //



    //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
    $("#total_col_uni_univer_<?php echo $u_id ?>").val(total_fac_univer);
    // $("#total_col_uni_prov_<?php echo $u_id ?>").val(total_fac_prov);
    // $("#total_col_uni_intv_<?php echo $u_id ?>").val(total_fac_intv);
    // $("#total_col_uni_ad_test_<?php echo $u_id ?>").val(total_fac_ad_test);
    // $("#total_col_uni_emp_<?php echo $u_id ?>").val(total_fac_emp);
    // $("#total_col_uni_std_handi_<?php echo $u_id ?>").val(total_fac_std_handi);
    // $("#total_col_uni_std_lan_<?php echo $u_id ?>").val(total_fac_std_lan);
    // $("#total_col_uni_ssk_<?php echo $u_id ?>").val(total_fac_ssk);
    // $("#total_col_uni_std_<?php echo $u_id ?>").val(total_fac_std);
    // $("#total_col_uni_emp_gov_<?php echo $u_id ?>").val(total_fac_emp_gov);
    // $("#total_col_uni_test_<?php echo $u_id ?>").val(total_fac_test);
    // $("#total_col_uni_std_con_<?php echo $u_id ?>").val(total_fac_std_con);
    // $("#total_col_uni_std_2lan_<?php echo $u_id ?>").val(total_fac_std_2lan);
    // $("#total_col_uni_std_inter_<?php echo $u_id ?>").val(total_fac_std_inter);
    // $("#total_col_uni_emp_private_<?php echo $u_id ?>").val(total_fac_emp_private);
    //




    //ນັກຮຽນບວກກັບພະນັກງານແນວນອນ ຫຼື ແຖວຂອງ 1 ສາຂາ
    $("#total_course_<?php echo $c_id ?>").val(
        parseInt($("#num_course_univer_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_univer_val_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_prov_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_intv_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_ad_test_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_pub_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_emp_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_handi_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_lan_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_ssk_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_emp_gov_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_test_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_con_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_2lan_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_inter_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_emp_private_<?php echo $c_id ?>").val())
    );
    //


    //ລວມທັງໝົດຂອງຄະນະ ໂດຍການເອົາລວມຄະນະນັກຮຽນແນວນອນບວກກັບລວມຄະນະພະນັກງານແນວນອນ
    $("#total_fac_<?php echo $f_id ?>").val(
        parseInt($("#total_fac_univer_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_univer_val_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_prov_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_intv_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_ad_test_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_pub_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_emp_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_handi_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_lan_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_ssk_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_emp_gov_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_test_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_con_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_2lan_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_inter_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_emp_private_<?php echo $f_id ?>").val())
    );
    //
    <?php
                }//ຈົບ Loop ສາຂາວິຊາ
            ?>
    var total_fac_univer =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ 
    var total_fac_univer_val =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ 
    var total_fac_intv =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_prov =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_ad_test =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std_pub =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_emp =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std_handi =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std_lan =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_ssk =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_emp_gov =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_test =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std_con =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std_2lan =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std_inter =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_emp_private =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    <?php
                $f_sql = mysqli_query($conn,"SELECT u.uni_id,uni_name,f.fac_id,fac_name,dept_name,sum(get_plan) AS total_fac FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$u_id' GROUP BY f.fac_id");//ດຶງຂໍ້ມູນຄະນະພາຍໃນວິທະຍາໄລດຽວ
                // Loop ຂໍ້ມູນແຕ່ລະຄະນະທີ່ຢູ່ໃນມະຫາໄລນັ້ນອອກມາທັງໝົດແລ້ວເອົາມາບວກລວມກັນ
                foreach($f_sql as $f_get){
            ?>

    total_fac_univer += parseInt($("#total_fac_univer_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_univer_val += parseInt($("#total_fac_univer_val_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_prov += parseInt($("#total_fac_prov_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_intv += parseInt($("#total_fac_intv_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_ad_test += parseInt($("#total_fac_ad_test_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_pub += parseInt($("#total_fac_std_pub_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_emp += parseInt($("#total_fac_emp_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_handi += parseInt($("#total_fac_std_handi_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_lan += parseInt($("#total_fac_std_lan_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_ssk += parseInt($("#total_fac_ssk_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std += parseInt($("#total_fac_std_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_emp_gov += parseInt($("#total_fac_emp_gov_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_test += parseInt($("#total_fac_test_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_con += parseInt($("#total_fac_std_con_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_2lan += parseInt($("#total_fac_std_2lan_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_inter += parseInt($("#total_fac_std_inter_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_emp_private += parseInt($("#total_fac_emp_private_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    <?php
                }
                //
             ?>

    //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ      
    $("#total_col_uni_univer_<?php echo $u_id ?>").val(total_fac_univer);
    $("#total_col_uni_univer_val_<?php echo $u_id ?>").val(total_fac_univer_val);
    $("#total_col_uni_prov_<?php echo $u_id ?>").val(total_fac_prov);
    $("#total_col_uni_intv_<?php echo $u_id ?>").val(total_fac_intv);
    $("#total_col_uni_ad_test_<?php echo $u_id ?>").val(total_fac_ad_test);
    $("#total_col_uni_std_pub_<?php echo $u_id ?>").val(total_fac_std_pub);
    $("#total_col_uni_emp_<?php echo $u_id ?>").val(total_fac_emp);
    $("#total_col_uni_std_handi_<?php echo $u_id ?>").val(total_fac_std_handi);
    $("#total_col_uni_std_lan_<?php echo $u_id ?>").val(total_fac_std_lan);
    $("#total_col_uni_ssk_<?php echo $u_id ?>").val(total_fac_ssk);
    $("#total_col_uni_std_<?php echo $u_id ?>").val(total_fac_std);
    $("#total_col_uni_emp_gov_<?php echo $u_id ?>").val(total_fac_emp_gov);
    $("#total_col_uni_test_<?php echo $u_id ?>").val(total_fac_test);
    $("#total_col_uni_std_con_<?php echo $u_id ?>").val(total_fac_std_con);
    $("#total_col_uni_std_2lan_<?php echo $u_id ?>").val(total_fac_std_2lan);
    $("#total_col_uni_std_inter_<?php echo $u_id ?>").val(total_fac_std_inter);
    $("#total_col_uni_emp_private_<?php echo $u_id ?>").val(total_fac_emp_private);
    //

    <?php
            }//ຈົບ Loop ຄະນະ
        ?>
    //ລວມທັງໝົດມະຫາໄລ ໂດຍການເອົາລວມມະຫາໄລນັກຮຽນແນວນອນບວກກັບລວມມະຫາໄລພະນັກງານແນວນອນ
    $("#total_uni_<?php echo $u_id ?>").val(
        parseInt($("#total_col_uni_univer_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_univer_val_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_prov_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_intv_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_ad_test_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_pub_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_emp_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_handi_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_lan_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_ssk_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_emp_gov_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_test_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_con_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_2lan_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_inter_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_emp_private_<?php echo $u_id ?>").val())
    );
    //  
    <?php
        
            }//ຈົບ Loop ມະຫາໄລ
            if($_SESSION["uni_id"] == "HRD1"){
                $unit_total = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_uni FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND u.uni_id NOT IN ('$uni_array') GROUP BY u.uni_id");
            }
            else{
                $unit_total = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_uni FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND u.uni_id='$_SESSION[uni_id]' GROUP BY u.uni_id");
            }
            // $unit_total = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_unit FROM adjustdetail ad
            // LEFT JOIN course c ON ad.course_id=c.course_id
            // LEFT JOIN faculty f ON c.fac_id=f.fac_id
            // LEFT JOIN university u ON f.uni_id=u.uni_id
            // LEFT JOIN department d ON u.dept_id=d.dept_id
            // LEFT JOIN adjust a ON ad.adj_id=a.adj_id
            // WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' GROUP BY u.uni_id"); //ດຶງຂໍ້ມູນມະຫາໄລທັງໝົດອອກມາ
        ?>
    var total_unit = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຄ່າບວກຈຳນວນທັງໝົດຂອງແຕ່ລະມະຫາໄລ
    <?php
            foreach($unit_total as $unit_get){
        ?>
    total_unit += parseInt($("#total_uni_<?php echo $unit_get['uni_id'] ?>")
        .val()); // ບວກຈຳນວນແຕ່ລະມະຫາໄລໄວ້ໃນຕົວປ່ຽນ   
    <?php 
            }
        ?>

    // ລວມທັງໝົດ ມະຫາໄລບວກມະຫາໄລ
    $("#amount").val(total_unit);
});
//






$(document).ready(function() {


    $(window).keydown(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });


    <?php
    // Loop ມະຫາໄລອອກມາໃຫ້ຄືນກັນກັບຕາຕະລາງຂ້າງເທິງ
    if($_SESSION["uni_id"] == "HRD1"){
        // $uni_array = array();
            
        // $get_uni = mysqli_query($conn, "SELECT uni_id FROM hrd_user WHERE uni_id != 'HRD1'");
        // foreach($get_uni as $row_uni){
        //     $uni_array[] = "\"".$row_uni['uni_id']."\"";
        // }
        // $uni_array = implode(",", $uni_array);
        $u = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_uni FROM adjustdetail ad
        LEFT JOIN course c ON ad.course_id=c.course_id
        LEFT JOIN faculty f ON c.fac_id=f.fac_id
        LEFT JOIN university u ON f.uni_id=u.uni_id
        LEFT JOIN department d ON u.dept_id=d.dept_id
        LEFT JOIN adjust a ON ad.adj_id=a.adj_id
        WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND u.uni_id NOT IN ('$uni_array') GROUP BY u.uni_id");
    }
    else{
        $u = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_uni FROM adjustdetail ad
        LEFT JOIN course c ON ad.course_id=c.course_id
        LEFT JOIN faculty f ON c.fac_id=f.fac_id
        LEFT JOIN university u ON f.uni_id=u.uni_id
        LEFT JOIN department d ON u.dept_id=d.dept_id
        LEFT JOIN adjust a ON ad.adj_id=a.adj_id
        WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND u.uni_id='$_SESSION[uni_id]' GROUP BY u.uni_id");
    }
    // $u = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_unit FROM adjustdetail ad
    // LEFT JOIN course c ON ad.course_id=c.course_id
    // LEFT JOIN faculty f ON c.fac_id=f.fac_id
    // LEFT JOIN university u ON f.uni_id=u.uni_id
    // LEFT JOIN department d ON u.dept_id=d.dept_id
    // LEFT JOIN adjust a ON ad.adj_id=a.adj_id
    // WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' GROUP BY u.uni_id");
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
                
                $c_id = $cr['course_id'];
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $c_sql = mysqli_query($conn,"SELECT u.uni_id,uni_name,f.fac_id,fac_name,dept_name,ad.course_id,course_name,get_plan FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$u_id' AND c.fac_id='$f_id'");
                //ດຶງຂໍ້ມູນສາຂາວິຊາທີ່ຢູ່ມີເງື່ອນໄຂຢູ່ໃນຂະນະທີ່ ຄິກອອກເພື່ອເອົາມາບວກກັນ
                $f_sql = mysqli_query($conn,"SELECT u.uni_id,uni_name,f.fac_id,fac_name,dept_name,ad.course_id,course_name,get_plan FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$u_id' AND c.fac_id='$f_id'");

                    ?>
    // 1 LOOP qty std and emp
    var num_course_univer = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນມະຫາໄລ
    var num_course_univer_val = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນມະຫາໄລ
    var num_course_prov = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນແຂວງ
    var num_course_intv = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນສຳພາດ
    var num_course_ad_test = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນສອບເສັງ
    var num_course_std_pub = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນພະນັກງານ
    var num_course_emp = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນພະນັກງານ
    var num_course_std_handi = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນພິການ
    var num_course_std_lan = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນຫ້ອງ 2 ພາສາ
    var num_course_ssk = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນ ສສກ ແບ່ງ
    var num_course_std = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນ
    var num_course_emp_gov = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນພະນັກງານລັດ
    var num_course_test = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນສອບເສັງ
    var num_course_std_con = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນຕໍ່ເນື່ອງ
    var num_course_std_2lan = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນຫ້ອງ 2 ພາສາ
    var num_course_std_inter = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນນັກຮຽນຕ່າງປະເທດ
    var num_course_emp_private = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງສາຂາທີ່ເປັນພະນັກງານເອກະຊົນ

    var total_fac_univer = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນມະຫາໄລ
    var total_fac_univer_val = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນມະຫາໄລ
    var total_fac_prov = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນແຂວງ
    var total_fac_intv = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນສຳພາດ
    var total_fac_ad_test = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນສອບເສັງ
    var total_fac_std_pub = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນພະນັກງານ
    var total_fac_emp = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນພະນັກງານ
    var total_fac_std_handi = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນພິການ
    var total_fac_std_lan = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນຫ້ອງ 2 ພາສາ
    var total_fac_ssk = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນ ສສກ ແບ່ງ
    var total_fac_std = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນ
    var total_fac_emp_gov = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນພະນັກງານລັດ
    var total_fac_test = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນສອບເສັງ
    var total_fac_std_con = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນຕໍ່ເນື່ອງ
    var total_fac_std_2lan = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນຫ້ອງ 2 ພາສາ
    var total_fac_std_inter = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນນັກຮຽນຕ່າງປະເທດ
    var total_fac_emp_private = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຈຳນວນລວມຂອງຄະນະທີ່ເປັນພະນັກງານເອກະຊົນ
    <?php 
                        // Loop Course
                        foreach($c_sql as $c_get){
                        ?>
    num_course_univer += parseInt($("#num_course_univer_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_univer_val += parseInt($("#num_course_univer_val_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_prov += parseInt($("#num_course_prov_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_intv += parseInt($("#num_course_intv_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_ad_test += parseInt($("#num_course_ad_test_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std_pub += parseInt($("#num_course_std_pub_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_emp += parseInt($("#num_course_emp_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std_handi += parseInt($("#num_course_std_handi_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std_lan += parseInt($("#num_course_std_lan_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_ssk += parseInt($("#num_course_ssk_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std += parseInt($("#num_course_std_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_emp_gov += parseInt($("#num_course_emp_gov_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_test += parseInt($("#num_course_test_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std_con += parseInt($("#num_course_std_con_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std_2lan += parseInt($("#num_course_std_2lan_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_std_inter += parseInt($("#num_course_std_inter_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    num_course_emp_private += parseInt($("#num_course_emp_private_<?php echo $c_get['course_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງສາຂາທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງຄະນະ
    <?php
                        }
                        // loop faculty 
                        foreach($f_sql as $f_get){
                        ?>

    total_fac_univer += parseInt($("#total_fac_univer_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_univer_val += parseInt($("#total_fac_univer_val_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_prov += parseInt($("#total_fac_prov_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_intv += parseInt($("#total_fac_intv_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_ad_test += parseInt($("#total_fac_ad_test_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_pub += parseInt($("#total_fac_std_pub_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_emp += parseInt($("#total_fac_emp_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_handi += parseInt($("#total_fac_std_handi_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_lan += parseInt($("#total_fac_std_lan_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_ssk += parseInt($("#total_fac_ssk_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std += parseInt($("#total_fac_std_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_emp_gov += parseInt($("#total_fac_emp_gov_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_test += parseInt($("#total_fac_test_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_con += parseInt($("#total_fac_std_con_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_2lan += parseInt($("#total_fac_std_2lan_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_inter += parseInt($("#total_fac_std_inter_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_emp_private += parseInt($("#total_fac_emp_private_<?php echo $f_get['fac_id'] ?>")
        .val()); //ລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    <?php
                        }
                        ?>

    //ລວມຄະນະ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
    $("#total_fac_univer_<?php echo $f_id ?>").val(num_course_univer);
    $("#total_fac_univer_val_<?php echo $f_id ?>").val(num_course_univer_val);
    $("#total_fac_prov_<?php echo $f_id ?>").val(num_course_prov);
    $("#total_fac_intv_<?php echo $f_id ?>").val(num_course_intv);
    $("#total_fac_ad_test_<?php echo $f_id ?>").val(num_course_ad_test);
    $("#total_fac_std_pub_<?php echo $f_id ?>").val(num_course_std_pub);
    $("#total_fac_emp_<?php echo $f_id ?>").val(num_course_emp);
    $("#total_fac_std_handi_<?php echo $f_id ?>").val(num_course_std_handi);
    $("#total_fac_std_lan_<?php echo $f_id ?>").val(num_course_std_lan);
    $("#total_fac_ssk_<?php echo $f_id ?>").val(num_course_ssk);
    $("#total_fac_std_<?php echo $f_id ?>").val(num_course_std);
    $("#total_fac_emp_gov_<?php echo $f_id ?>").val(num_course_emp_gov);
    $("#total_fac_test_<?php echo $f_id ?>").val(num_course_test);
    $("#total_fac_std_con_<?php echo $f_id ?>").val(num_course_std_con);
    $("#total_fac_std_2lan_<?php echo $f_id ?>").val(num_course_std_2lan);
    $("#total_fac_std_inter_<?php echo $f_id ?>").val(num_course_std_inter);
    $("#total_fac_emp_private_<?php echo $f_id ?>").val(num_course_emp_private);
    //



    //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ
    $("#total_col_uni_univer_<?php echo $u_id ?>").val(total_fac_univer);
    // $("#total_col_uni_prov_<?php echo $u_id ?>").val(total_fac_prov);
    // $("#total_col_uni_intv_<?php echo $u_id ?>").val(total_fac_intv);
    // $("#total_col_uni_ad_test_<?php echo $u_id ?>").val(total_fac_ad_test);
    // $("#total_col_uni_emp_<?php echo $u_id ?>").val(total_fac_emp);
    // $("#total_col_uni_std_handi_<?php echo $u_id ?>").val(total_fac_std_handi);
    // $("#total_col_uni_std_lan_<?php echo $u_id ?>").val(total_fac_std_lan);
    // $("#total_col_uni_ssk_<?php echo $u_id ?>").val(total_fac_ssk);
    // $("#total_col_uni_std_<?php echo $u_id ?>").val(total_fac_std);
    // $("#total_col_uni_emp_gov_<?php echo $u_id ?>").val(total_fac_emp_gov);
    // $("#total_col_uni_test_<?php echo $u_id ?>").val(total_fac_test);
    // $("#total_col_uni_std_con_<?php echo $u_id ?>").val(total_fac_std_con);
    // $("#total_col_uni_std_2lan_<?php echo $u_id ?>").val(total_fac_std_2lan);
    // $("#total_col_uni_std_inter_<?php echo $u_id ?>").val(total_fac_std_inter);
    // $("#total_col_uni_emp_private_<?php echo $u_id ?>").val(total_fac_emp_private);
    //




    //ນັກຮຽນບວກກັບພະນັກງານແນວນອນ ຫຼື ແຖວຂອງ 1 ສາຂາ
    $("#total_course_<?php echo $c_id ?>").val(
        parseInt($("#num_course_univer_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_univer_val_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_prov_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_intv_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_ad_test_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_pub_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_emp_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_handi_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_lan_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_ssk_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_emp_gov_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_test_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_con_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_2lan_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_std_inter_<?php echo $c_id ?>").val()) +
        parseInt($("#num_course_emp_private_<?php echo $c_id ?>").val())
    );
    //


    //ລວມທັງໝົດຂອງຄະນະ ໂດຍການເອົາລວມຄະນະນັກຮຽນແນວນອນບວກກັບລວມຄະນະພະນັກງານແນວນອນ
    $("#total_fac_<?php echo $f_id ?>").val(
        parseInt($("#total_fac_univer_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_univer_val_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_prov_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_intv_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_ad_test_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_pub_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_emp_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_handi_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_lan_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_ssk_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_emp_gov_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_test_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_con_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_2lan_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_std_inter_<?php echo $f_id ?>").val()) +
        parseInt($("#total_fac_emp_private_<?php echo $f_id ?>").val())
    );
    //
    <?php
                }//ຈົບ Loop ສາຂາວິຊາ
            ?>
    var total_fac_univer =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ 
    var total_fac_univer_val =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ 
    var total_fac_intv =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_prov =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_ad_test =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std_pub =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_emp =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std_handi =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std_lan =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_ssk =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_emp_gov =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_test =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std_con =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std_2lan =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_std_inter =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    var total_fac_emp_private =
    0; //ຕັ້ງຕົວປ່ຽນລວມຈຳນວນນັກຮຽນຂອງແຕ່ລະຄະຂຶ້ນມາອີກຮອບເພື່ອນຳໄປກວດສອບຄ່າທີ່ປ້ອນເຂົ້າມາໃນ Loop ທຳອິດ
    <?php
                $f_sql = mysqli_query($conn,"SELECT u.uni_id,uni_name,f.fac_id,fac_name,dept_name,sum(get_plan) AS total_fac FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$u_id' GROUP BY f.fac_id");//ດຶງຂໍ້ມູນຄະນະພາຍໃນວິທະຍາໄລດຽວ
                // Loop ຂໍ້ມູນແຕ່ລະຄະນະທີ່ຢູ່ໃນມະຫາໄລນັ້ນອອກມາທັງໝົດແລ້ວເອົາມາບວກລວມກັນ
                foreach($f_sql as $f_get){
            ?>

    total_fac_univer += parseInt($("#total_fac_univer_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_univer_val += parseInt($("#total_fac_univer_val_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_prov += parseInt($("#total_fac_prov_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_intv += parseInt($("#total_fac_intv_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_ad_test += parseInt($("#total_fac_ad_test_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_pub += parseInt($("#total_fac_std_pub_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_emp += parseInt($("#total_fac_emp_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_handi += parseInt($("#total_fac_std_handi_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_lan += parseInt($("#total_fac_std_lan_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_ssk += parseInt($("#total_fac_ssk_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std += parseInt($("#total_fac_std_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_emp_gov += parseInt($("#total_fac_emp_gov_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_test += parseInt($("#total_fac_test_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_con += parseInt($("#total_fac_std_con_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_2lan += parseInt($("#total_fac_std_2lan_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_std_inter += parseInt($("#total_fac_std_inter_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    total_fac_emp_private += parseInt($("#total_fac_emp_private_<?php echo $f_get['fac_id'] ?>")
        .val()
    ); //ກວດສອບຄ່າອີກເທື່ອໜຶ່ງໃນການລວມຈຳນວນທັງໝົດຂອງຄະນະທີ່ເປັນນັກຮຽນແຕ່ລະສາຂາທີ່ເປັນແນວຕັ້ງເພື່ອເປັນຈຳນວນລວມຂອງມະຫາໄລ
    <?php
                }
                //
             ?>

    //ລວມມະຫາໄລ ແນວຕັ້ງ ຫຼື ຖັນ ນັກຮຽນ      
    $("#total_col_uni_univer_<?php echo $u_id ?>").val(total_fac_univer);
    $("#total_col_uni_univer_val_<?php echo $u_id ?>").val(total_fac_univer_val);
    $("#total_col_uni_prov_<?php echo $u_id ?>").val(total_fac_prov);
    $("#total_col_uni_intv_<?php echo $u_id ?>").val(total_fac_intv);
    $("#total_col_uni_ad_test_<?php echo $u_id ?>").val(total_fac_ad_test);
    $("#total_col_uni_std_pub_<?php echo $u_id ?>").val(total_fac_std_pub);
    $("#total_col_uni_emp_<?php echo $u_id ?>").val(total_fac_emp);
    $("#total_col_uni_std_handi_<?php echo $u_id ?>").val(total_fac_std_handi);
    $("#total_col_uni_std_lan_<?php echo $u_id ?>").val(total_fac_std_lan);
    $("#total_col_uni_ssk_<?php echo $u_id ?>").val(total_fac_ssk);
    $("#total_col_uni_std_<?php echo $u_id ?>").val(total_fac_std);
    $("#total_col_uni_emp_gov_<?php echo $u_id ?>").val(total_fac_emp_gov);
    $("#total_col_uni_test_<?php echo $u_id ?>").val(total_fac_test);
    $("#total_col_uni_std_con_<?php echo $u_id ?>").val(total_fac_std_con);
    $("#total_col_uni_std_2lan_<?php echo $u_id ?>").val(total_fac_std_2lan);
    $("#total_col_uni_std_inter_<?php echo $u_id ?>").val(total_fac_std_inter);
    $("#total_col_uni_emp_private_<?php echo $u_id ?>").val(total_fac_emp_private);
    //

    <?php
            }//ຈົບ Loop ຄະນະ
        ?>
    //ລວມທັງໝົດມະຫາໄລ ໂດຍການເອົາລວມມະຫາໄລນັກຮຽນແນວນອນບວກກັບລວມມະຫາໄລພະນັກງານແນວນອນ
    $("#total_uni_<?php echo $u_id ?>").val(
        parseInt($("#total_col_uni_univer_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_univer_val_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_prov_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_intv_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_ad_test_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_pub_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_emp_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_handi_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_lan_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_ssk_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_emp_gov_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_test_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_con_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_2lan_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_std_inter_<?php echo $u_id ?>").val()) +
        parseInt($("#total_col_uni_emp_private_<?php echo $u_id ?>").val())
    );
    //  
    <?php
        
            }//ຈົບ Loop ມະຫາໄລ
            if($_SESSION["uni_id"] == "HRD1"){
                $unit_total = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_uni FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND u.uni_id NOT IN ('$uni_array') GROUP BY u.uni_id");
            }
            else{
                $unit_total = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_uni FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND u.uni_id='$_SESSION[uni_id]' GROUP BY u.uni_id");
            }
            // $unit_total = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,sum(get_plan) AS total_unit FROM adjustdetail ad
            // LEFT JOIN course c ON ad.course_id=c.course_id
            // LEFT JOIN faculty f ON c.fac_id=f.fac_id
            // LEFT JOIN university u ON f.uni_id=u.uni_id
            // LEFT JOIN department d ON u.dept_id=d.dept_id
            // LEFT JOIN adjust a ON ad.adj_id=a.adj_id
            // WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' GROUP BY u.uni_id"); //ດຶງຂໍ້ມູນມະຫາໄລທັງໝົດອອກມາ
        ?>
    var total_unit = 0; // ຕັ້ງຕົວປ່ຽນເພື່ອຮັບຄ່າບວກຈຳນວນທັງໝົດຂອງແຕ່ລະມະຫາໄລ
    <?php
            foreach($unit_total as $unit_get){
        ?>
    total_unit += parseInt($("#total_uni_<?php echo $unit_get['uni_id'] ?>")
        .val()); // ບວກຈຳນວນແຕ່ລະມະຫາໄລໄວ້ໃນຕົວປ່ຽນ   
    <?php 
            }
        ?>

    // ລວມທັງໝົດ ມະຫາໄລບວກມະຫາໄລ
    $("#amount").val(total_unit);
});
//
</script>