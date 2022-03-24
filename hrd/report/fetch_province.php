<?php
    include "../../oop/connect.php";
    $adj_id = $_POST['adj'];
    $p_m_id = $_POST['province'];

    $sql = mysqli_query($conn, "SELECT * FROM adjust WHERE adj_id='$adj_id'");
    $dept = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $dept_id = $dept['dept_id'];

    
    if($dept_id == '001'){
        include 'fetch/dept_001_province.php';
        echo $table;
    }
?>