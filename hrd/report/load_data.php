<?php
    include "../../oop/connect.php";

    //Selected Fy
    if(isset($_POST['type'])){
        if($_POST['type'] == "fy_data"){
            $option = mysqli_query($conn, "SELECT * FROM fy ORDER BY fy_id ASC");
            foreach($option as $data){
                $output[] = array(
                    'id' => $data['year'],
                    'name' => $data['fy_id']
                );
            }
            echo json_encode($output);
        }else if($_POST['type'] == "adj_data"){
            $query = mysqli_query($conn, "SELECT adj_id,a.fy_id,a.dept_id,dept_name FROM adjust a LEFT JOIN department d ON a.dept_id=d.dept_id LEFT JOIN fy ON a.fy_id=fy.fy_id WHERE year='$_POST[fy_id]' ORDER BY a.dept_id");
            foreach($query as $data){
                $output[] = array(
                    'id' => $data['adj_id'],
                    'name' => $data['dept_name']
                );
            }
            echo json_encode($output);
        }else{
            $query = mysqli_query($conn, "SELECT * FROM province_ministry ORDER BY p_m_id");
            foreach($query as $data){
                $output[] = array(
                    'id' => $data['p_m_id'],
                    'name' => $data['p_m_name']
                );
            }
            echo json_encode($output);
        }

        
    }

    if(isset($_POST['supply'])){
        if($_POST['supply'] == "supply_data"){
            $query = mysqli_query($conn, "SELECT * FROM fy ORDER BY fy_id ASC");
            foreach($query as $data){
                $output[] = array(
                    'id' => $data['fy_id'],
                    'name' => $data['fy_id']
                );
            }
            echo json_encode($output);
        }else{
            $query = mysqli_query($conn, "SELECT a.dept_id,dept_name FROM adjust a LEFT JOIN department d ON a.dept_id=d.dept_id WHERE fy_id='$_POST[fy]' AND accept=1 ORDER BY adj_id");
            foreach($query as $data){
                $output[] = array(
                    'id' => $data['dept_id'],
                    'name' => $data['dept_name']
                );
            }
            echo json_encode($output);
        }
    }

    if(isset($_POST['demand'])){
        if($_POST['demand'] == "demand_data"){
            $option = mysqli_query($conn, "SELECT * FROM fy ORDER BY fy_id ASC");
            foreach($option as $data){
                $output[] = array(
                    'id' => $data['fy_id'],
                    'name' => $data['fy_id']
                );
            }
            echo json_encode($output);
        }else if($_POST['demand'] == 'adj_data'){
            $fy_id = $_POST['fy_id'];
            $query = mysqli_query($conn, "SELECT adj_id,fy_id,a.dept_id,dept_name FROM adjust a LEFT JOIN department d ON a.dept_id=d.dept_id WHERE fy_id='$fy_id' ORDER BY adj_id");
            foreach($query as $data){
                $output[] = array(
                    'id' => $data['adj_id'],
                    'name' => $data['dept_name']
                );
            }
            echo json_encode($output);
        }else{
            $query = mysqli_query($conn, "SELECT * FROM province_ministry");
            foreach($query as $data){
                $output[] = array(
                    'id' => $data['p_m_id'],
                    'name' => $data['p_m_name']
                );
            }
            echo json_encode($output);
        }

        
    }


    //test 
// if(isset($_GET['supply'])){
//         if($_GET['supply'] == "supply_data"){
//             $option = mysqli_query($conn, "SELECT * FROM fy ORDER BY fy_id ASC");
//             foreach($option as $data){
//                 $output[] = array(
//                     'id' => $data['fy_id'],
//                     'name' => $data['fy_id']
//                 );
//             }
//             echo json_encode($output);
//         }else{
//             $query = mysqli_query($conn, "SELECT a.dept_id,dept_name FROM adjust a LEFT JOIN department d ON a.dept_id=d.dept_id WHERE fy_id='$_GET[fy]' AND accept=1 ORDER BY adj_id");
//             foreach($query as $data){
//                 $output[] = array(
//                     'id' => $data['dept_id'],
//                     'name' => $data['dept_name']
//                 );
//             }
//             echo json_encode($output);
//         }

//     }
    
?>