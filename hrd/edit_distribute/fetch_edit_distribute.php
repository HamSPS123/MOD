<?php
session_start();
$path = "../../";
include ($path."oop/connect.php");
  if (isset($_POST['query']) != "") {
    $adj_id=$_POST['query'];
    $uni_id=$_SESSION['uni_id'];
    $fac = mysqli_query($conn, "SELECT dept_id FROM adjust WHERE adj_id='$adj_id'");
    $fac_row = mysqli_fetch_array($fac,MYSQLI_ASSOC);
    $dept_id = $fac_row['dept_id'];
    $no_ = 0;

    if ($uni_id == "HRD1") {
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
        sum(univer) + sum(univer_valunteer) + sum(prov) + sum(intv) + sum(ad_test) + sum(std_public) + sum(emp) + sum(std_handi) + sum(std_lan)+sum(ssk)+sum(std)+sum(emp_gov)+sum(test)+sum(std_con)+sum(std_2lan)+sum(std_inter)+sum(emp_private)
        AS total_uni
        FROM adjustdetail ad
        LEFT JOIN course c ON ad.course_id=c.course_id
        LEFT JOIN faculty f ON c.fac_id=f.fac_id
        LEFT JOIN university u ON f.uni_id=u.uni_id
        LEFT JOIN department d ON u.dept_id=d.dept_id
        LEFT JOIN adjust a ON ad.adj_id=a.adj_id
        WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND u.uni_id NOT IN ('$uni_array') GROUP BY u.uni_id ORDER BY uni_id ASC;");
    }else{
        $result_university = mysqli_query($conn,"SELECT d_id,u.uni_id,uni_name,dept_name,						
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
        WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND u.uni_id='$uni_id' GROUP BY u.uni_id ORDER BY uni_id ASC;");
    }
    ?>
<style>
.tscroll table tr:nth-of-type(2) th {
    top: 26.5px !important;
}
</style>
<div class="table-responsive tscroll">

    <?php
        if (mysqli_num_rows($result_university) > 0) {
        
    ?>
    <!-- <input type="hidden" name="d_id" id="d_id" value="<?= $d_id ?>"> -->
    <input type="hidden" name="d_id" id="d_id">
    <table id="detail_table" class="table-bordered" style="width: 3100px;">
        <tr>
            <th rowspan="2" style="text-align: center;margin: 0 auto;">ລຳດັບ</th>
            <th rowspan="2" style="text-align: center;">ສາຂາວິຊາຮຽນ</th>
            <th rowspan="2" style="text-align: center;">ລຳດັບຊັ້ນ</th>
            <th rowspan="2" style="text-align: center;">ລວມ</th>
            <th colspan="10" style="text-align: center;" class="tet">ແບ່ງປັນ</th>
            <th colspan="7" style="text-align: center;" class="tet">ຈ່າຍຄ່າຮຽນ</th>
        </tr>
        <tr style="text-align: center;">
            <th>ມະຫາໄລ</th>
            <th>ຄູອາສາສະໝັກ</th>
            <th>ແຂວງ</th>
            <th>ພ/ງ</th>
            <th>ສອບເສັງ</th>
            <th>ນັກຮຽນສາມັນ</th>
            <th>ນ/ຮ ພິການ</th>
            <th>2 ພາສາ</th>
            <th>ສສກ ແບ່ງ</th>
            <th>ສຳພາດ</th>
            <th>ນ/ຮ</th>
            <th>ພ/ງ</th>
            <th>ສອບເສັງ</th>
            <th>ນ/ຮ ຕໍ່ເນື່ອງ</th>
            <th>ນ/ຮ ພາສາ ລາວ-ຝລັ່ງ</th>
            <th>ນ/ຮ ຕ່າງປະເທດ</th>
            <th>ພ/ງ ເອກະຊົນ</th>
        </tr>
        <?php
        //start loop university
            foreach($result_university as $uni){
                $uni_ids = $uni['uni_id'];
                $no_ ++;
        ?>
        <tr style="background-color:#5199FA;color:white;">
            <td class="text-center"><?= ConverToRoman($no_) ?></td>
            <td colspan="2" style="text-align:center"><?= $uni['uni_name'] ?></td>

            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $uni['total_uni'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $uni['univer'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $uni['univer_valunteer'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $uni['prov'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $uni['intv'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $uni['ad_test'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $uni['std_public'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $uni['emp'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $uni['std_handi'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $uni['std_lan'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $uni['ssk'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $uni['std'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $uni['emp_gov'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $uni['test'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $uni['std_con'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $uni['std_2lan'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $uni['std_inter'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $uni['emp_private'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
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
            WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$uni_ids' GROUP BY f.fac_id ORDER BY fac_id ASC;");
            $i=0;
            foreach ($result_faculty as $fac) {
                $fac_id = $fac['fac_id'];
                $i++;
        ?>
        <tr class="parent" id="row1" title="Click to expand/collapse"
            style="cursor: pointer;background-color:#B1CDF3;color:white;">
            <td style="color:white;" class="text-center">
                <?= $i ?>
            </td>
            <td style="color:white;"><?= $fac['fac_name'] ?></td>
            <td></td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac['total_fac'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac['univer'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac['univer_valunteer'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac['prov'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac['intv'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac['ad_test'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac['std_public'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac['emp'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac['std_handi'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac['std_lan'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac['ssk'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac['std'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac['emp_gov'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac['test'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac['std_con'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac['std_2lan'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac['std_inter'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $fac['emp_private'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;background:none;color:white;"
                    disabled>
            </td>
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
            WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$uni_ids' AND c.fac_id='$fac_id' ORDER BY level_name ASC,course_id ASC;");
            $j=0;
            foreach($result_course as $cou){
                $course_id = $cou['course_id'];
                $d_id=$cou['d_id'];
                $j++;
        ?>
        <tr class="child-row1" style="display: table-row;">
            <td class="text-center">
                <?= $i.".".$j ?>
            </td>
            <td class="text-nowrap px-2 py-2">
                <div class="d-flex" style="gap: 25px;">
                    <a href="#" class="fa fa-info toolcolor btnUpdate_cust"></a>
                    <small style="font-size:16px;"><?= $cou['course_name'] ?></small>
                </div>
            </td>
            <td style="width: 130px;text-align: center;">
                <?= $cou['level_name'] ?>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $cou['total_course'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $cou['univer'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $cou['univer_valunteer'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $cou['prov'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $cou['intv'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $cou['ad_test'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $cou['std_public'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $cou['emp'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $cou['std_handi'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $cou['std_lan'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $cou['ssk'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $cou['std'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $cou['emp_gov'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $cou['test'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $cou['std_con'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $cou['std_2lan'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $cou['std_inter'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="text-align:center">
                <input class="quantity" min="0" name="num1" id="num1" value="<?= $cou['emp_private'] ?>" type="number"
                    style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;" disabled>
            </td>
            <td style="display: none">
                <?= $d_id ?>
            </td>
        </tr>
        <?php
                //End loop course
                }
        ?>
        <?php
            //End loop faculty
            }
        ?>
        <?php
        //End loop university
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
<div style="clear: both"></div>
<form action="edit-distribute" method="POST">
    <div class="waitload2" id="waitload2">
        <hr size="1" width="90%">
        <p align="center">ກະລຸນາເລືອກກົມ</p>
        <hr size="1" width="90%">
    </div>
    <div id="result2">
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
                    ທ່ານຕ້ອງການແຈກຢາຍທຶນການສຶກສາ ຫຼື ບໍ່ ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnConfirm" class="btn btn-outline-primary">ຢືນຢັນ</button>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
// update edit-share
$('.btnUpdate_distribute').on('click', function() {
    $('#exampleModalUpdate').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    console.log(data);
    $('#id_update').val(data[0]);
    $('#student_update').val(data[3]);
    $('#employee_update').val(data[4]);
});
</script>

<?php
  }else{
    echo '<br>
                <hr size="1" width="90%">
                <p align="center">ບໍ່ມີຂໍ້ມູນ</p>
                <hr size="1" width="90%">';
  }
?>