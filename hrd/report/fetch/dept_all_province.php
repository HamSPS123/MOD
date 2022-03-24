<?php
    global $table;

    $table .= '
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th rowspan="2">ລ/ດ</th>
                    <th rowspan="2">ລາຍລະອຽດ</th>
                    <th rowspan="2">ລວມ</th>
                    <th colspan="2">ແບ່ງປັນ</th>
                    <th rowspan="2">ນັກຮຽນຕ່າງປະເທດ</th>
                </tr>
                <tr>
                    <th>ນ/ຮ</th>
                    <th>ພ/ງ</th>
                </tr>
            </thead>
            <tbody>';

            $query = mysqli_query($conn, "SELECT as_id,sd.adj_id,fy_id,sd.st_id,st_name,st_group,group_name,user_id
            FROM statistic_detail sd
            LEFT JOIN statatic st ON sd.st_id=st.st_id
            LEFT JOIN statatic_group sg ON st.st_group=sg.group_id
            LEFT JOIN adjust a ON sd.adj_id=a.adj_id
            WHERE fy_id='$fy_id' GROUP BY st_group ORDER BY st_group;");
            if(mysqli_num_rows($query)>0){
                foreach($query as $key => $row){
                    $key++;
                    $group_id = $row['st_group'];
                    $table .='
                    <tr style="background: #34a1eb;color: white">
                        <td>'. $key .'</td>
                        <td class="text-left">'. $row['group_name'] .'</td>';
                    $g_total = 0;
                    $g_std_qty = 0;
                    $g_emp_qty = 0;
                    $quota = mysqli_query($conn, "SELECT sd_id,sd.as_id,sd.p_m_id,SUM(std_qty)+SUM(emp_qty) AS total,SUM(std_qty) AS std_qty,SUM(emp_qty) AS emp_qty,st.st_id FROM statistic_distribute sd
                    LEFT JOIN statistic_detail st ON sd.as_id=st.as_id
                    LEFT JOIN statatic s ON st.st_id=s.st_id
                    LEFT JOIN province_ministry pm ON sd.p_m_id=pm.p_m_id
                    WHERE st_group='$group_id' AND sd.p_m_id='$p_m_id' AND p_stt=1 GROUP BY sd.p_m_id ORDER BY sd.p_m_id ASC");

                    if(mysqli_num_rows($quota)>0){
                        foreach($quota as $data){
                            $g_total = $data['total'];
                            $g_std_qty = $data['std_qty'];
                            $g_emp_qty = $data['emp_qty'];
                        }
                    }
                    
                    $table .='
                        <td>'. number_format($g_total,0) .'</td>
                        <td>'. number_format($g_std_qty,0) .'</td>
                        <td>'. number_format($g_emp_qty,0) .'</td>
                        <td>0</td>
                    </tr>';

                    $query2 = mysqli_query($conn, "SELECT as_id,sd.adj_id,fy_id,sd.st_id,st_name,st_group,group_name,user_id
                    FROM statistic_detail sd
                    LEFT JOIN statatic st ON sd.st_id=st.st_id
                    LEFT JOIN statatic_group sg ON st.st_group=sg.group_id
                    LEFT JOIN adjust a ON sd.adj_id=a.adj_id
                    WHERE fy_id='$fy_id' AND st_group='$group_id' ORDER BY sd.st_id;");
                    if(mysqli_num_rows($query2)>0){
                        foreach($query2 as $key2 => $row2){
                            $key2++;
                            $st_id = $row2['st_id'];

                            $table .= '
                            <tr>
                                <td>'. $key .'.'. $key2 .'</td>
                                <td>'. $row2['st_name'] .'</td>';

                            $s_total = 0;
                            $s_std_qty = 0;
                            $s_emp_qty = 0;

                            $quota2 = mysqli_query($conn, "SELECT sd_id,sd.as_id,sd.p_m_id,std_qty+emp_qty as total,std_qty,emp_qty,st.st_id FROM statistic_distribute sd
                            LEFT JOIN statistic_detail st ON sd.as_id=st.as_id
                            LEFT JOIN statatic s ON st.st_id=s.st_id
                            LEFT JOIN province_ministry pm ON sd.p_m_id=pm.p_m_id
                            WHERE st.st_id='$st_id' AND sd.p_m_id='$p_m_id' AND p_stt=1 GROUP BY sd.p_m_id ORDER BY sd.p_m_id ASC;");
                           
                                foreach($quota2 as $data2){
                                    $s_total = $data2['total'];
                                    $s_std_qty = $data2['std_qty'];
                                    $s_emp_qty = $data2['emp_qty'];
                                }
                            
                            $table.='
                                <td>'. number_format($s_total,0) .'</td>
                                <td>'. number_format($s_std_qty,0) .'</td>
                                <td>'. number_format($s_emp_qty,0) .'</td>
                                <td>0</td>
                            </tr>
                            ';
                        }
                    }
                }
            }else{
                $table .= '
                <tr>
                    <td colspan="6" style="background: #EDEDED;color: red;">ບໍ່ມີຂໍ້ມູນການແຈກຢາຍ</td>
                </tr>
                ';
            }
                $table .='
            </tbody>
        </table>
    ';
?>