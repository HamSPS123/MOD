<?php
    include "../../oop/connect.php";

    if(isset($_POST['type'])){
        if($_POST['type'] == "fy_data"){
            $option = mysqli_query($conn, "SELECT * FROM fy ORDER BY fy_id ASC");
            foreach($option as $data){
                $output[] = array(
                    'id' => $data['fy_id'],
                    'name' => $data['fy_id']
                );
            }
            echo json_encode($output);
        }else{
            $query = mysqli_query($conn, "SELECT adj_id,fy_id,a.dept_id,dept_name FROM adjust a LEFT JOIN department d ON a.dept_id=d.dept_id WHERE fy_id='$_POST[fy_id]' ORDER BY adj_id");
            foreach($query as $data){
                $output[] = array(
                    'id' => $data['adj_id'],
                    'name' => $data['dept_name']
                );
            }
            echo json_encode($output);
        }

    }


    //test 
// if(isset($_GET['type'])){
//         if($_GET['type'] == "fy_data"){
//             $option = mysqli_query($conn, "SELECT * FROM fy ORDER BY fy_id ASC");
//             foreach($option as $data){
//                 $output[] = array(
//                     'id' => $data['fy_id'],
//                     'name' => $data['fy_id']
//                 );
//             }
//             echo json_encode($output);
//         }else{
//             $query = mysqli_query($conn, "SELECT adj_id,fy_id,a.dept_id,dept_name FROM adjust a LEFT JOIN department d ON a.dept_id=d.dept_id WHERE fy_id='$_GET[fy_id]' ORDER BY adj_id");
//             foreach($query as $data){
//                 $output[] = array(
//                     'id' => $data['adj_id'],
//                     'name' => $data['dept_name']
//                 );
//             }
//             echo json_encode($output);
//         }

//     }
    
?>