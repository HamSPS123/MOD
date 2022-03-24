<?php
    session_start();
    include "../../oop/connect.php";

    $p_m_id = $_SESSION['p_m_id'];
    $adj_id = $_POST['adj_id'];
    $item = array();

    $university = mysqli_query($conn,"SELECT cre_id,adj_id,cp.course_id,course_name,fac_name,f.uni_id,uni_name,p_m_id,sum(std_qty) as std_qty,sum(emp_qty) as emp_qty,
     sum(std_qty) + sum(emp_qty) as total
     FROM create_plan cp
     LEFT JOIN course c ON cp.course_id=c.course_id
     LEFT JOIN faculty f ON c.fac_id=f.fac_id
     LEFT JOIN university u ON f.uni_id=u.uni_id
     WHERE adj_id='$adj_id' AND p_m_id='$p_m_id'
     GROUP BY f.uni_id;");
     foreach($university as $uni){
         $uni_id = $uni['uni_id'];

         $faculty = mysqli_query($conn,"SELECT cre_id,adj_id,cp.course_id,course_name,c.fac_id,fac_name,p_m_id,
                sum(std_qty) as std_qty,sum(emp_qty) as emp_qty, sum(std_qty)+ sum(emp_qty) as total
                FROM create_plan cp
                LEFT JOIN course c ON cp.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                WHERE adj_id='$adj_id' AND p_m_id='$p_m_id' AND uni_id='$uni_id'
                GROUP BY c.fac_id;");
        foreach ($faculty as $fac) {
            $fac_id = $fac['fac_id'];

            $course = mysqli_query($conn,"SELECT cre_id,adj_id,cp.course_id,c.fac_id,course_name,p_m_id,sum(std_qty) as std_qty,sum(emp_qty) as emp_qty, sum(std_qty)+ sum(emp_qty) as total
                FROM create_plan cp
                LEFT JOIN course c ON cp.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                WHERE adj_id='$adj_id' AND p_m_id='$p_m_id' AND uni_id='$uni_id' AND c.fac_id='$fac_id'
                GROUP BY cp.course_id;");
                foreach ($course as $cour) {
                    $cre_id = $cour['cre_id'];
                    $course_id = $cour['course_id'];

                    $item[] = ["cre_id" => $cre_id,"std_qty" => $_POST["std_$course_id"],"emp_qty" => $_POST["emp_$course_id"],"user_id" => $_SESSION['user_id']];
                }
        }
     }

     echo '<pre>';
     print_r($item);
     echo '</pre>';
     echo $item = json_encode($item, true);
?>