<?php
global $table;


$table='
<div class="table-responsive tscroll">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th rowspan="2">ລ.ດ</th>
                <th rowspan="2">ລາຍລະອຽດ</th>
                <th rowspan="2">ລວມ</th>
                <th colspan="2">ແບ່ງປັນ</th>
                <th colspan="2">ສອບເສັງເຂົ້າ</th>
                <th rowspan="2">ນະໂຍບາຍ</th>
                <th rowspan="2">ຊາວໝຸ່ມແຮກສ່ຽວ</th>
                <th rowspan="2">ກ/ຊ ສຶກສາ</th>
                <th rowspan="2">ພ/ງ ສະຖາບັນອາຊີວະແບ່ງເອງ</th>
                <th rowspan="2">ພ/ງ ກະຊວງອື່ນໆ</th>
                <th rowspan="2">ກ/ຊ ປ້ອງກັນປະເທດ</th>
            </tr>
            <tr>
                <th>ສຳພາດ</th>
                <th class="text-nowrap">ພ/ງ</th>
                <th>ບໍ່ຈ່າຍຄ່າຮຽນ</th>
                <th>ຈ່າຍຄ່າຮຽນ</th>
            </tr>
        </thead>
        <tbody>';
        $sql = mysqli_query($conn, "SELECT u.uni_id,uni_name,dept_name,c.level_id,level_name,sum(get_plan) as get_plan,						
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
        AS total FROM adjustdetail ad
        LEFT JOIN course c ON ad.course_id=c.course_id
        LEFT JOIN faculty f ON c.fac_id=f.fac_id
        LEFT JOIN university u ON f.uni_id=u.uni_id
        LEFT JOIN department d ON u.dept_id=d.dept_id
        LEFT JOIN adjust a ON ad.adj_id=a.adj_id
        LEFT JOIN course_level cl ON c.level_id=cl.level_id
        WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' GROUP BY c.level_id ORDER BY level_id ASC;");
        if(mysqli_num_rows($sql)>0){
            $level_id = "";
            foreach($sql as $row){
                $level_id = $row['level_id'];

                $table .= '
            <tr style="background: #34a1eb;color: white">
                <td> &nbsp </td>
                <td class="text-nowrap">'.$row['level_name'].'</td>
                <td>'. number_format($row['total'],0) .'</td>
                <td>'. number_format($row['intv'],0) .'</td>
                <td>'. number_format($row['emp'],0) .'</td>
                <td>'. number_format($row['ad_test'],0) .'</td>
                <td>'. number_format($row['std_public'],0) .'</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>';

            $sql1 = mysqli_query($conn, "SELECT u.uni_id,uni_name,dept_name,level_name,sum(get_plan) as get_plan,						
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
            AS total FROM adjustdetail ad
            LEFT JOIN course c ON ad.course_id=c.course_id
            LEFT JOIN faculty f ON c.fac_id=f.fac_id
            LEFT JOIN university u ON f.uni_id=u.uni_id
            LEFT JOIN department d ON u.dept_id=d.dept_id
            LEFT JOIN adjust a ON ad.adj_id=a.adj_id
            LEFT JOIN course_level cl ON c.level_id=cl.level_id
            WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND c.level_id='$level_id' GROUP BY uni_id ORDER BY uni_id ASC;");

                $uni_id ="";

                foreach($sql1 as $key => $row1){
                    $key++;
                    $uni_id = $row1['uni_id'];
                    $table .='
                    <tr style="background: #ade1f7">
                        <td>'. ConverToRoman($key) .'.</td>
                        <td class="text-left text-nowrap">'. $row1['uni_name'] .'</td>
                        <td>'. number_format($row1['total'],0) .'</td>
                        <td>'. number_format($row1['intv'],0) .'</td>
                        <td>'. number_format($row1['emp'],0) .'</td>
                        <td>'. number_format($row1['ad_test'],0) .'</td>
                        <td>'. number_format($row1['std_public'],0) .'</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>';
                
            $sql2 = mysqli_query($conn, "SELECT d_id,u.uni_id,uni_name,f.fac_id,fac_name,dept_name,ad.course_id,course_name,get_plan,univer,univer_valunteer,prov,intv,ad_test,std_public,emp,std_handi,std_lan,ssk,std,emp_gov,test,std_con,std_2lan,std_inter,emp_private,
            univer+univer_valunteer+prov+intv+ad_test+std_public+emp+std_handi+std_lan+ssk+std+emp_gov+test+std_con+std_2lan+std_inter+emp_private as total,level_name
            FROM adjustdetail ad
            LEFT JOIN course c ON ad.course_id=c.course_id
            LEFT JOIN faculty f ON c.fac_id=f.fac_id
            LEFT JOIN university u ON f.uni_id=u.uni_id
            LEFT JOIN department d ON u.dept_id=d.dept_id
            LEFT JOIN adjust a ON ad.adj_id=a.adj_id
            LEFT JOIN course_level lv ON c.level_id=lv.level_id
            WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$uni_id' ORDER BY level_name ASC,course_id ASC;");

            foreach($sql2 as $key2 => $row2){
                $key2++;
            $table .= '
            <tr>
                <td>'. $key2 .'</td>
                <td class="text-left">'. $row2['course_name'] .'</td>
                <td>'. number_format($row2['total'],0) .'</td>
                <td>'. number_format($row2['intv'],0) .'</td>
                <td>'. number_format($row2['emp'],0) .'</td>
                <td>'. number_format($row2['ad_test'],0) .'</td>
                <td>'. number_format($row2['std_public'],0) .'</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>';
                    }
                }
            }
        }
        $table .= '
        </tbody>
    </table>
</div>';