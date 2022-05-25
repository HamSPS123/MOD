<?php
    include "../../oop/connect.php";
    
    ?>
<style>
.no-distribute {
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    padding: 10px 0;
    text-align: center;
    font-weight: bold;
}
</style>
<?php

    if(isset($_POST['adj'])){
        $adj_id = $_POST['adj'];
        $check = mysqli_query($conn, "SELECT * FROM adjust WHERE adj_id='$adj_id'");
        $result = mysqli_fetch_array($check, MYSQLI_ASSOC);

        if($result['dept_id'] == "001"){
            $dept_id = $result['dept_id'];
            include "fetch/dept_001.php";
            echo $table;
        }elseif($result['dept_id'] == 'Dep_002'){
            $dept_id = $result['dept_id'];
            include "fetch/dept_002.php";
            echo $table;
        }elseif($result['dept_id'] == 'Dep_003'){
            $dept_id = $result['dept_id'];
            include "fetch/dept_003.php";
            echo $table;
        }else{
            echo "<p class='no-distribute'>ບໍ່ມີຂໍ້ມູນແຈກຢາຍ</p>";
        }
    }else{
        echo "No Data";
    }
    ?>