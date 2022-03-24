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

    if(isset($_POST['query'])){
        $adj_id = $_POST['query'];
        $check = mysqli_query($conn, "SELECT * FROM adjust WHERE adj_id='$adj_id'");
        $result = mysqli_fetch_array($check, MYSQLI_ASSOC);

        if($result['dept_id'] == "001"){
        $dept_id = "001";
            include "fetch/dept_001.php";
            echo $table;
        }else{
            echo "<p class='no-distribute'>ບໍ່ມີຂໍ້ມູນແຈກຢາຍ</p>";
        }
    }else{
        echo "No Data";
    }
    ?>