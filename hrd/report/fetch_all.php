<?php
    $path = "../../";
    include $path."oop/connect.php";
    
    ?>
<style>
.no-distribute {
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    padding: 10px 0;
    text-align: center;
    font-weight: bold;
}

.tscroll table tr:nth-of-type(2) th {
            top: 49px !important;
}
th{
    vertical-align: middle !important;
}
.tscroll {
        height: 900px !important;
      }
</style>
<?php

    if(isset($_POST['fy'])){
        $fy_id = $_POST['fy'];
        include 'fetch/dept_all.php';
        echo $table;
}
?>