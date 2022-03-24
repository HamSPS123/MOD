<?php
    session_start();
    $path = '../../../';
    include $path.'oop/obj.php';
    $filename = "ລາຍງານແຜນແບ່ງປັນ".date("YmdHis");
    $output = '';

    $output = '
        <style>
        .table{
            border-collapse: collapse;
            width: 100%;
            hegiht: 100%;
            font-family: phetsarath ot;
        }
        .table th, .table td{
            border: 1px solid #000;
            padding: 8px;
        }
        .text-center{
            text-align: center !important;
        }
        .text-left{
            text-align: left !important;
        }
        .text-right{
            text-align: right !important;
        }
        .table th {
            background-color: ##066BCA;
            color: #fff;
        }

        .table td:nth-of-type(2) {
            width: 250px !important;
        }
        </style>
    ';
    
    if(isset($_GET)){
        $adj_id = $_GET['adj'];

        $check = mysqli_query($conn, "SELECT * FROM adjust WHERE adj_id='$adj_id'");
        $result = mysqli_fetch_array($check, MYSQLI_ASSOC);
        $dept_id = $result['dept_id'];
        $fy = $result['fy_id'];
        if($result['dept_id'] == "001"){
            include "fetch/dept_001.php";

            $table .='
                <h3 class="text-center">ສັງລວມຂໍ້ມູນຈໍານວນນັກຮຽນ ແລະ ພະນັກງານຮຽນຕໍ່ໃນສາຍມະຫາວິທະຍາໄລ ສົກປີ '.$fy.'</h3>
            ';

            $output .= $table;

            header("Content-Type: application/xls");
            header("Content-Disposition:attachment; filename=$filename.xls");
            echo $output;
        }
    }

    
?>