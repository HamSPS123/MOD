<?php
    session_start();
    $path = "../../";
    include ($path."oop/connect.php");
    $adj_id = $_POST['status'];
    $item = array();
    $fy2 = mysqli_query($conn, "select * from adjust where adj_id='$adj_id'");
    $row_fy2 = mysqli_fetch_array($fy2,MYSQLI_ASSOC);
     $id = $row_fy2["dept_id"];
     $unitversity = mysqli_query($conn,"select * from university where dept_id='$id';");
     foreach($unitversity as $uni){
        // echo  "ມະຫາໄລ: ".$uni["uni_id"];
        // echo "<br>";
        $unit_id = $uni['uni_id'];
        $faculty = mysqli_query($conn,"select * from faculty where uni_id='$unit_id'");
        foreach($faculty as $fac){
            // echo "ຄະນະ: ".$fac_id = $fac['fac_id'];
            // echo "<br>";
            $course = mysqli_query($conn,"select * from course where fac_id='$fac_id'");
            foreach($course as $cour){
                $cour_id = $cour["course_id"];
                // echo "ນັກຮຽນ: ".$_POST["std_$cour_id"]." &nbsp;&nbsp;&nbsp;&nbsp;";
                // echo "ພະນັກງານ: ".$_POST["emp_$cour_id"];
                // echo "<br>";
                if ((empty($_POST["std_$cour_id"]) || $_POST["std_$cour_id"] == 0) && (empty($_POST["emp_$cour_id"]) || $_POST["emp_$cour_id"] == 0)) {
                    
                }else{
                    $item[] = ["adj_id" => $adj_id,"course_id" => $cour_id,"p_m_id" => $_SESSION["p_m_id"],"std_qty" => $_POST["std_$cour_id"],"emp_qty" => $_POST["emp_$cour_id"],"user_id" => $_SESSION["user_id"]];
                }
            }
        }
     }
     $item = json_encode($item,true);
     $result = mysqli_query($conn, "call insert_createPlan('$item')");
     if (!$result) {
         echo "Error!!!";
     }else{
         echo "Success!!!";
     }

?>