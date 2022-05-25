<?php
global $table;


$table='
<div class="table-responsive tscroll">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th rowspan="3">ລ.ດ</th>
                <th rowspan="3">ລາຍລະອຽດ</th>
                <th rowspan="3">ລວມ</th>
                <th colspan="3">ແບ່ງປັນ</th>
                <th colspan="2">ສອບເສັງເຂົ້າ</th>
            </tr>
            <tr>
                <th colspan="2">ນັກຮຽນ</th>
                <th rowspan="2">ພ/ງ</th>
                <th rowspan="2">ບໍ່ຈ່າຍຄ່າຮຽນ</th>
                <th rowspan="2">ຈ່າຍຄ່າຮຽນ</th>
            </tr>
            <tr>
                <th>ສະຖາບັນແບ່ງ</th>
                <th>ແຂວງແບ່ງ</th>
            </tr>
        </thead>
        <tbody>';
        $sql = mysqli_query($conn,"SELECT as_id,adj_id,sd.st_id,st_name,group_name,st_group,
        (univer+prov+ad_test+std_public+emp) as total,
        SUM(univer) as univer,
        SUM(prov) as prov,
        SUM(ad_test) as ad_test,
        SUM(std_public) as std_public,
        SUM(emp) as emp,
        user_id
        FROM statistic_detail sd
        LEFT JOIN statatic s ON sd.st_id=s.st_id
        LEFT JOIN statatic_group sg ON s.st_group=sg.group_id
        WHERE adj_id='$adj_id' GROUP BY st_group ORDER BY st_group ASC");
        foreach($sql as $row){
            $st_group = $row['st_group'];
            
                $table .='
            <tr style="background: #34a1eb;color: white">
                <td></td>
                <td>'. $row['group_name'] .'</td>
                <td>'. number_format($row['total'],0) .'</td>
                <td>'. number_format($row['univer'],0) .'</td>
                <td>'. number_format($row['prov'],0) .'</td>
                <td>'. number_format($row['emp'],0) .'</td>
                <td>'. number_format($row['ad_test'],0) .'</td>
                <td>'. number_format($row['std_public'],0) .'</td>
            </tr>';

            $sql2 = mysqli_query($conn,"SELECT as_id,adj_id,sd.st_id,st_name,group_name,
            univer+prov+ad_test+std_public+emp as total,
            univer,prov,ad_test,std_public,emp,user_id
            FROM statistic_detail sd
            LEFT JOIN statatic s ON sd.st_id=s.st_id
            LEFT JOIN statatic_group sg ON s.st_group=sg.group_id
            WHERE adj_id='$adj_id' AND st_group='$st_group' ORDER BY sd.st_id ASC;");
            foreach($sql2 as $row2){
                $table .='
                <tr>
                    <td></td>
                    <td>'. $row2['st_name'] .'</td>
                    <td>'. number_format($row2['total'],0) .'</td>
                    <td>'. number_format($row2['univer'],0) .'</td>
                    <td>'. number_format($row2['prov'],0) .'</td>
                    <td>'. number_format($row2['emp'],0) .'</td>
                    <td>'. number_format($row2['ad_test'],0) .'</td>
                    <td>'. number_format($row2['std_public'],0) .'</td>
                </tr>';
            }
        }

        $sql = mysqli_query($conn,"SELECT u.uni_id,uni_name,dept_name,level_name,sum(get_plan) as get_plan,						
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
        WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' GROUP BY uni_id ORDER BY uni_id ASC;");

        if(mysqli_num_rows($sql)){
            foreach($sql as $key => $row){
                $uni_id = $row['uni_id'];
                $key+=1;
                $table .='
            <tr style="background: #34a1eb;color: white">
                <td>'. $key .'</td>
                <td>'. $row['uni_name'] .'</td>
                <td>'. number_format($row['get_plan'],0) .'</td>
                <td>'. number_format($row['univer'],0) .'</td>
                <td>'. number_format($row['prov'],0) .'</td>
                <td>'. number_format($row['emp'],0) .'</td>
                <td>'. number_format($row['ad_test'],0) .'</td>
                <td>'. number_format($row['std_public'],0) .'</td>
            </tr>';

            $sql2 = mysqli_query($conn, "SELECT u.uni_id,uni_name,c.fac_id,fac_name,dept_name,level_name,sum(get_plan) as get_plan,						
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
            WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$uni_id' GROUP BY c.fac_id ORDER BY fac_id ASC;");
            foreach($sql2 as $key2 => $row2){
                $fac_id = $row2['fac_id'];
                $key2+=1;
                $table .='
                <tr style="background: #ade1f7">
                    <td>'. $key .'.'. $key2 .'</td>
                    <td>'. $row2['fac_name'] .'</td>
                    <td>'. number_format($row2['get_plan'],0) .'</td>
                    <td>'. number_format($row2['univer'],0) .'</td>
                    <td>'. number_format($row2['prov'],0) .'</td>
                    <td>'. number_format($row2['emp'],0) .'</td>
                    <td>'. number_format($row2['ad_test'],0) .'</td>
                    <td>'. number_format($row2['std_public'],0) .'</td>
                </tr>';

                $sql3 = mysqli_query($conn, "SELECT d_id,u.uni_id,uni_name,f.fac_id,fac_name,dept_name,ad.course_id,course_name,get_plan,univer,univer_valunteer,prov,intv,ad_test,std_public,emp,std_handi,std_lan,ssk,std,emp_gov,test,std_con,std_2lan,std_inter,emp_private,
                univer+univer_valunteer+prov+intv+ad_test+std_public+emp+std_handi+std_lan+ssk+std+emp_gov+test+std_con+std_2lan+std_inter+emp_private as total,level_name
                FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                LEFT JOIN course_level lv ON c.level_id=lv.level_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$uni_id' AND c.fac_id='$fac_id' ORDER BY course_id ASC;");

                foreach($sql3 as $key3 => $row3){
                    $key3+=1;
                    $table .='
                    <tr>
                        <td>'. $key .'.'. $key2 .'.'. $key3 .'</td>
                        <td>'. $row3['course_name'] .'</td>
                        <td>'. number_format($row3['get_plan'],0) .'</td>
                        <td>'. number_format($row3['univer'],0) .'</td>
                        <td>'. number_format($row3['prov'],0) .'</td>
                        <td>'. number_format($row3['emp'],0) .'</td>
                        <td>'. number_format($row3['ad_test'],0) .'</td>
                        <td>'. number_format($row3['std_public'],0) .'</td>
                    </tr>';
                }
                }
            }
        }

    $table .=' 
        </tbody>
    </table>
</div>';
