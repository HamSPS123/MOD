<?php
    session_start();
    $path = "../../";
    include ($path."oop/connect.php");
    $adj_id = $_POST['adj_id'];
    echo $adj_id."<br>";
    $item = array();
    
    $faculty = mysqli_query($conn, "SELECT * FROM faculty WHERE uni_id='$_SESSION[uni_id]'");
    foreach($faculty as $fac){
        echo $fac['fac_name']."<br>";
        $course = mysqli_query($conn, "SELECT * FROM course WHERE fac_id='$fac[fac_id]'");
        foreach($course as $crs){
            $course_id = $crs['course_id'];
            echo "&nbsp;&nbsp;&nbsp;-> ". $crs['course_name']. "<br>";
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--> ". $_POST["get_plan_$course_id"] . "<br>";
            if (!empty($_POST["get_plan_$crs[course_id]"]) || $_POST["get_plan_$crs[course_id]"] != 0) {
                $item[] = ["adj_id" => $adj_id,"course_id" => $course_id,"get_plan" => $_POST["get_plan_$course_id"],"user_id" => $_SESSION["user_id"]];
            }
        }
    }
    $item = json_encode($item, true);
    

?>