<?php
    session_start();
    $path = '../../../';
    $title = 'ລາຍງານແຜນແບ່ງປັນ'. date('YmdHis');
    include $path.'vendor/autoload.php';
    include $path.'oop/obj.php';


    if(isset($_GET['adj'])){
        $adj_id = $_GET['adj'];
        $sql = mysqli_query($conn, "SELECT * FROM adjust WHERE adj_id='$adj_id'");
        $dept = mysqli_fetch_array($sql,MYSQLI_ASSOC);
        $dept_id = $dept['dept_id'];
        $fy = $dept['fy_id'];
    }

    //include table report
    include "../fetch/dept_001.php";
    
    

    // $footer = '{PAGENO}';
    $mdpf = new \Mpdf\Mpdf([
        'format'            => 'A3-L',
        'mode'              => 'utf-8',      
        'tempDir'           => '/tmp',
        'default_font_size' => 10,
        'margin_bottom' => 10,
        'margin_footer' => 10, 
        'default_font' => 'phetsarath_ot'
    ]);
    $content = '
        <style>
            .table{
                border-collapse: collapse;
                width: 100%;
                hegiht: 100%;
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

        <h2 class="text-center">ສັງລວມຂໍ້ມູນຈຳນວນນັກຮຽນ ແລະ ພະນັກງານຮຽນຕໍ່ໃນສາຍມະຫາວິທະຍາໄລ ສົກປີ '. $fy .'</h2>
    ';

    $content .= $table;

    
    $mdpf->WriteHTML($content);
    $mdpf->Output("$title.pdf","I");
?>