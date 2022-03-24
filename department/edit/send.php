<?php
    session_start();
    include ("../../oop/connect.php");
    $adj_id = $_POST['adj_id'];
    $dept_id = $_SESSION["dept_id"];
    $item = array();
    $unitversity = mysqli_query($conn,"SELECT u.uni_id,uni_name,sum(get_plan) AS total_uni FROM adjustdetail a LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id WHERE adj_id='$adj_id' AND u.dept_id='$dept_id' GROUP BY u.uni_id ORDER BY u.uni_id ASC;");
    foreach($unitversity as $uni){
        $uni_id = $uni['uni_id'];
        $faculty = mysqli_query($conn, "SELECT f.fac_id,fac_name,sum(get_plan) AS total_fac FROM adjustdetail a LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id WHERE u.uni_id='$uni_id' AND adj_id='$adj_id' GROUP BY f.fac_id;");
            foreach($faculty as $fac){
                $course = mysqli_query($conn, "SELECT d_id,a.course_id,course_name,get_plan,sup_name FROM adjustdetail a LEFT JOIN course c ON a.course_id=c.course_id LEFT JOIN faculty f ON c.fac_id=f.fac_id LEFT JOIN university u ON f.uni_id=u.uni_id LEFT JOIN supply_user su ON a.user_id=su.user_id WHERE f.fac_id='$fac[fac_id]' AND adj_id='$adj_id' GROUP BY a.course_id;");
                foreach($course as $crs){
                    $course_id = $crs['course_id'];
                    $d_id = $crs["d_id"];
                    if ($crs['get_plan'] != $_POST["get_plan_$course_id"]) {
                        $item[] = ["adj_id" => $adj_id,"course_id" => $course_id,"get_plan" => $_POST["get_plan_$course_id"],"user_id" => $_SESSION["user_id"],"d_id" => $_POST["d_id_$d_id"]];
                    }
                }
            }
    }
    echo $item = json_encode($item, true);

    echo '<script>console.log(\''.$item.'\');</script>';
?>