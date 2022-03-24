<?php
    global $table;

    $table .= '

    <style>
        .tscroll {
        height: 900px !important;
      }
        .tscroll table tr:nth-of-type(2) th {
            top: 49px !important;
        }
    </style>

    <div class="table-responsive tscroll">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th rowspan="2">ລ/ດ</th>
                <th rowspan="2" colspan="2">ລາຍລະອຽດ</th>
                <th rowspan="2">ລວມ</th>
                <th colspan="3">ແບ່ງປັນ</th>
            </tr>
            <tr>
                <th>ນັກຮຽນ</th>
                <th>ພະນັກງານ</th>
                <th>ນ/ຮ ແຮກສ່ຽວ/ຮ່ວມມື</th>
            </tr>
        </thead>
        <tbody>';

                $sql = mysqli_query($conn, "SELECT as_id,adj_id,sd.st_id,st_name,group_name,st_group,`user_id`
                FROM statistic_detail sd
                LEFT JOIN statatic s ON sd.st_id=s.st_id
                LEFT JOIN statatic_group sg ON s.st_group=sg.group_id
                WHERE adj_id='$adj_id' GROUP BY st_group ORDER BY st_group ASC;");
                if(mysqli_num_rows($sql) > 0){
                    $i=0;
                    foreach($sql as $row){
                        $i++;
                        $group_id = $row['st_group'];
            $table .= '
            <tr style="background: #34a1eb;color: white">
                <td>'. $i .'</td>
                <td colspan="2">'. $row['group_name'] .'</td>';

                    $g_total = 0;
                    $g_std = 0;
                    $g_emp = 0;
                
                    $quota = mysqli_query($conn, "SELECT sd_id,sd.as_id,p_m_id,SUM(std_qty) + SUM(emp_qty) as total,SUM(std_qty) AS std_qty,SUM(emp_qty) AS emp_qty,st.st_id FROM statistic_distribute sd
                    LEFT JOIN statistic_detail st ON sd.as_id=st.as_id
                    LEFT JOIN statatic s ON st.st_id=s.st_id
                    WHERE st_group='$group_id' AND p_m_id='$p_m_id' GROUP BY p_m_id ORDER BY p_m_id ASC");
                    foreach($quota as $data){
                        $g_total = $data['total'];
                        $g_std = $data['std_qty'];
                        $g_emp = $data['emp_qty'];
                    }
                $table .= '
                <td>'. number_format($g_total, 0) .'</td>
                <td>'. number_format($g_std, 0) .'</td>
                <td>'. number_format($g_emp, 0) .'</td>
                <td>0</td>
            </tr>';
            
            $sql2 = mysqli_query($conn, "SELECT as_id,adj_id,sd.st_id,st_name,group_name,st_group,user_id
            FROM statistic_detail sd
            LEFT JOIN statatic s ON sd.st_id=s.st_id
            LEFT JOIN statatic_group sg ON s.st_group=sg.group_id
            WHERE adj_id='$adj_id' AND st_group='$group_id';");
            if(mysqli_num_rows($sql2) > 0){
                $j=0;
            foreach($sql2 as $row2){
                $as_id=$row2['as_id'];
                $j++;
            $table .= '
            <tr>
                <td>'. $i.".". $j .'</td>
                <td colspan="2">'. $row2['st_name'] .'</td>';
                $s_total = 0;
                $s_std = 0;
                $s_emp = 0;
                    $quota2 = mysqli_query($conn, "SELECT sd_id,sd.as_id,p_m_id,std_qty + emp_qty as total,std_qty,emp_qty,st.st_id FROM statistic_distribute sd
                    LEFT JOIN statistic_detail st ON sd.as_id=st.as_id
                    LEFT JOIN statatic s ON st.st_id=s.st_id
                    WHERE sd.as_id='$as_id' AND p_m_id='$p_m_id' ORDER BY p_m_id ASC;");
                    if(mysqli_num_rows($quota2) > 0){
                    foreach($quota2 as $data2){
                        $s_total = $data2['total'];
                        $s_std = $data2['std_qty'];
                        $s_emp = $data2['emp_qty'];
                
                    }
                }
                $table .= '
                <td>'. number_format($s_total,0) .'</td>
                <td>'. number_format($s_std,0) .'</td>
                <td>'. number_format($s_emp,0) .'</td>
                <td>0</td>
            </tr>';
                        }
                    }
                }
            }
    
    
    
            $sql = mysqli_query($conn, "SELECT u.uni_id,uni_name,dept_name FROM adjustdetail ad
            LEFT JOIN course c ON ad.course_id=c.course_id
            LEFT JOIN faculty f ON c.fac_id=f.fac_id
            LEFT JOIN university u ON f.uni_id=u.uni_id
            LEFT JOIN department d ON u.dept_id=d.dept_id
            LEFT JOIN adjust a ON ad.adj_id=a.adj_id
            WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' GROUP BY u.uni_id ORDER BY uni_id ASC;");
            if(mysqli_num_rows($sql)>0){
                $i=0;
                foreach($sql as $row){
                    $uni_id = $row['uni_id'];
                    $i++;
                    $roman = ConverToRoman($i);
            $table .= '
            <tr style="background: #34a1eb;color: white">
                <td>'. $roman .'.</td>
                <td colspan="2">'. $row['uni_name'] .'</td>';
                
                    $u_total = 0;
                    $u_std = 0;
                    $u_emp = 0;
                    $quota = mysqli_query($conn, "SELECT id,q.d_id,q.p_m_id,p_m_name,sum(std_qty) + sum(emp_qty) as total,sum(std_qty) as std_qty,sum(emp_qty) as emp_qty,a.course_id,course_name,fac_name FROM quota_distribute q 
                    LEFT JOIN adjustdetail a ON q.d_id=a.d_id
                    LEFT JOIN province_ministry pm ON q.p_m_id=pm.p_m_id
                    LEFT JOIN course c ON a.course_id=c.course_id
                    LEFT JOIN faculty f ON c.fac_id=f.fac_id
                    LEFT JOIN university u ON f.uni_id=u.uni_id
                    WHERE a.adj_id='$adj_id' AND f.uni_id='$uni_id' AND q.p_m_id='$p_m_id' AND p_stt=1 GROUP BY q.p_m_id ORDER BY q.p_m_id ASC;");
                    if(mysqli_num_rows($quota) > 0){
                    foreach($quota as $data){
                        $u_total = $data['total'];
                        $u_std = $data['std_qty'];
                        $u_emp = $data['emp_qty'];       
                    }
                }
                $table .= '
                <td>'. number_format($u_total, 0) .'</td>
                <td>'. number_format($u_std, 0) .'</td>
                <td>'. number_format($u_emp, 0) .'</td>
                <td>0</td>
            </tr>';
            
                $sql2 = mysqli_query($conn, "SELECT u.uni_id,uni_name,f.fac_id,fac_name,dept_name
                FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$uni_id' GROUP BY f.fac_id ORDER BY fac_id ASC;");
                $j=0;
                foreach($sql2 as $row2){
                    $fac_id = $row2['fac_id'];
                    $j++;
            $table .='
            <tr style="background: #ade1f7">
                <td>'. $roman.'.'.$j .'</td>
                <td colspan="2">'. $row2['fac_name'] .'</td>';
                
                    $f_total = 0;
                    $f_std = 0;
                    $f_emp = 0;
                    $quota2 = mysqli_query($conn, "SELECT id,q.d_id,q.p_m_id,p_m_name,sum(std_qty) + sum(emp_qty) as total,sum(std_qty) as std_qty,sum(emp_qty) as emp_qty,a.course_id,course_name,fac_name FROM quota_distribute q 
                    LEFT JOIN adjustdetail a ON q.d_id=a.d_id
                    LEFT JOIN province_ministry pm ON q.p_m_id=pm.p_m_id
                    LEFT JOIN course c ON a.course_id=c.course_id
                    LEFT JOIN faculty f ON c.fac_id=f.fac_id
                    WHERE a.adj_id='$adj_id' AND c.fac_id='$fac_id' AND q.p_m_id='$p_m_id' AND p_stt=1 GROUP BY q.p_m_id ORDER BY q.p_m_id ASC;");
                    if(mysqli_num_rows($quota2)>0){
                        foreach($quota2 as $data2){
                            $f_total=$data2['total'];
                            $f_std=$data2['std_qty'];
                            $f_emp=$data2['emp_qty'];
                        }
                    }
                $table .= '
                <td>'. number_format($f_total,0) .'</td>
                <td>'. number_format($f_std,0) .'</td>
                <td>'. number_format($f_emp,0) .'</td>
                <td>0</td>
            </tr>';
            
                $sql3 = mysqli_query($conn, "SELECT d_id,u.uni_id,uni_name,f.fac_id,fac_name,dept_name,ad.course_id,course_name,level_name
                FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                LEFT JOIN course_level lv ON c.level_id=lv.level_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$uni_id' AND c.fac_id='$fac_id' ORDER BY level_name ASC,course_id ASC;");
                $k=0;
                foreach($sql3 as $row3){
                    $course_id = $row3['course_id'];
                    $k++;
                    
            $table .='
            <tr>
                <td>'. $k .'.</td>
                <td class="text-left">'. $row3['course_name'] .'</td>
                <td>'. $row3['level_name'] .'</td>';

                $c_total = 0;
                $c_std = 0;
                $c_emp = 0;
                $quota3 = mysqli_query($conn, "SELECT id,q.d_id,q.p_m_id,p_m_name,std_qty + emp_qty as total,std_qty,emp_qty,course_id FROM quota_distribute q 
                    LEFT JOIN adjustdetail a ON q.d_id=a.d_id
                    LEFT JOIN province_ministry pm ON q.p_m_id=pm.p_m_id
                    WHERE a.adj_id='$adj_id' AND course_id='$course_id' AND q.p_m_id='$p_m_id' AND p_stt=1 ORDER BY q.p_m_id ASC;");
                    if(mysqli_num_rows($quota3)>0){
                        foreach($quota3 as $data3){
                            $c_total=$data3['total'];
                            $c_std=$data3['std_qty'];
                            $c_emp=$data3['emp_qty'];
                        }
                    }
                $table .='
                <td>'. number_format($c_total,0) .'</td>
                <td>'. number_format($c_std,0) .'</td>
                <td>'. number_format($c_emp,0) .'</td>
                <td>0</td>
            </tr>';
            
                        }
                    }
                }
            }else{
                $table .= '
                <tr>
                    <td colspan="7" style="background: #EDEDED;color: red;">ບໍ່ມີຂໍ້ມູນການແຈກຢາຍ</td>
                </tr>
                ';
            }
            $table.='
        </tbody>
    </table>
</div>';
?>