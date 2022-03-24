<?php
global $table;

$table = '
<table class="table table-bordered">
<thead class="text-center">
    <tr>
        <th rowspan="2">ລຳດັບ</th>
        <th rowspan="2">ສາຂາວິຊາ</th>
        <th rowspan="2">ລະດັບຊັ້ນ</th>
        <th rowspan="2">ລວມ</th>
        <th colspan="2">ຈຳນວນ</th>
        <th rowspan="2">ຜູ້ສະເໜີແຜນສ້າງ</th>
    </tr>
    <tr>
        <th>ນ/ຮ</th>
        <th>ພ/ງ</th>
    </tr>
</thead>
<tbody>';
    
                    $i = 1;
                    $uni_id = "";
                    foreach($university as $uni){
                        $romand = ConverToRoman($i++);
                        $uni_id = $uni['uni_id'];
    $table .='
    <tr style="background-color:#5199FA;color:white;" class="university">
        <td class="text-center">'. $romand .'</td>
        <td colspan="2">'. $uni['uni_name'] .'</td>
        <td class="text-center">'. number_format($uni['total'],0) .'</td>
        <td class="text-center">'. number_format($uni['std_qty'],0) .'</td>
        <td class="text-center">'. number_format($uni['emp_qty'],0) .'</td>
        <td>&nbsp;</td>
    </tr>';
    
                        $faculty = mysqli_query($conn,"SELECT cre_id,adj_id,cp.course_id,course_name,c.fac_id,fac_name,p_m_id,
                        sum(std_qty) as std_qty,sum(emp_qty) as emp_qty, sum(std_qty)+ sum(emp_qty) as total
                        FROM create_plan cp
                        LEFT JOIN course c ON cp.course_id=c.course_id
                        LEFT JOIN faculty f ON c.fac_id=f.fac_id
                        WHERE adj_id='$adj_id' AND p_m_id='$p_m_id' AND uni_id='$uni_id' AND `user_id`='$_SESSION[user_id]'
                        GROUP BY c.fac_id ORDER BY fac_id ASC;");
                        $j = 1;
                        $fac_id = "";
                        foreach($faculty as $fac){
                            $fac_id = $fac['fac_id'];
    $table .= '
    <tr style="cursor: pointer;background-color:#B1CDF3;color:white;">
        <td class="text-center">'. $j .'</td>
        <td colspan="2">'. $fac['fac_name'] .'</td>
        <td class="text-center">'. number_format($fac['total'],0) .'</td>
        <td class="text-center">'. number_format($fac['std_qty'],0) .'</td>
        <td class="text-center">'. number_format($fac['emp_qty'],0) .'</td>
        <td class="text-center">&nbsp;</td>
    </tr>';
    
                            $course = mysqli_query($conn,"SELECT cre_id,demand_name,surname,gender,adj_id,cp.course_id,c.fac_id,course_name,cp.p_m_id,sum(std_qty) as std_qty,sum(emp_qty) as emp_qty, sum(std_qty)+ sum(emp_qty) as total,level_name
                            FROM create_plan cp
                            LEFT JOIN course c ON cp.course_id=c.course_id
                            LEFT JOIN faculty f ON c.fac_id=f.fac_id
                            LEFT JOIN user u ON cp.user_id=u.user_id
                            LEFT JOIN demand_user du ON u.user_id=du.user_id
                            LEFT JOIN course_level lv ON c.level_id=lv.level_id
                            WHERE adj_id='$adj_id' AND cp.p_m_id='$p_m_id' AND uni_id='$uni_id' AND c.fac_id='$fac_id' AND cp.`user_id`='$_SESSION[user_id]'
                            GROUP BY cp.course_id  ORDER BY level_name ASC;");
                            $k = 1;
                            foreach($course as $cour){
    $table .= '
    <tr>
        <td class="text-center">'. $j .'.'. $k .'</td>
        <td>'. $cour['course_name'] .'</td>
        <td class="text-center">'. $cour['level_name'] .'</td>
        <td class="text-center">'. number_format($cour['total'],0) .'</td>
        <td class="text-center">'. number_format($cour['std_qty'],0) .'</td>
        <td class="text-center">'. number_format($cour['emp_qty'],0) .'</td>
        <td class="text-center">'. $cour['demand_name'] ." ".$cour['surname'] .'</td>
    </tr>';
                                $k++;
                            }
                            $j++;
                        }
                    }
$table .= '
</tbody>
</table>';
?>