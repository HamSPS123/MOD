<?php
    session_start();
    $path = '../../';
    include $path."oop/connect.php";

    if (isset($_POST['btnConfirm'])) {
        $adj_id = $_POST['adj_id2'];
        $course_id = $_POST['course_id2'];
        $fac_id = $_POST['fac_id2'];
        $item = array();
        
        $detail = mysqli_query($conn, "SELECT d_id FROM adjustdetail WHERE adj_id='$adj_id' AND course_id='$course_id'");
        $detail_id = mysqli_fetch_array($detail,MYSQLI_ASSOC);

        $result = mysqli_query($conn, "SELECT cre_id,adj_id,cp.course_id,course_name,fac_name,uni_name,cp.p_m_id,p_m_name,sum(std_qty) + sum(emp_qty) as total,user_id
        FROM create_plan cp
        LEFT JOIN province_ministry pm ON cp.p_m_id=pm.p_m_id
        LEFT JOIN course c ON cp.course_id=c.course_id
        LEFT JOIN faculty f ON c.fac_id=f.fac_id
        LEFT JOIN university u ON f.uni_id=u.uni_id
        WHERE cp.course_id='$course_id' AND adj_id='$adj_id'
        GROUP BY cp.p_m_id ORDER BY cp.p_m_id");
        foreach ($result as $row) {
            $d_id = $detail_id['d_id'];
            $p_m_id = $row['p_m_id'];
            $std_qty = $_POST["std_qty_$p_m_id"];
            $emp_qty = $_POST["emp_qty_$p_m_id"];
            
            if ($std_qty != 0 || $emp_qty != 0) {
                $item[] = ["d_id" => $d_id, "p_m_id" => $p_m_id, "std_qty" => $std_qty, "emp_qty" => $emp_qty, "user_id" => $_SESSION['user_id']];
            }
            echo $d_id.'<br>';
            echo "&nbsp;&nbsp;&nbsp; $row[p_m_id] &nbsp; $row[p_m_name] <br>";
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $_POST["std_qty_$row[p_m_id]"]." &nbsp;&nbsp;&nbsp;&nbsp;".$_POST["emp_qty_$row[p_m_id]"]."<br>";
        }
        echo '<pre>';
        print_r($item);
        echo '</pre>';
        echo $item = json_encode($item,true);
    }
?>