<?php
    session_start();
    $path = '../../../';
    $title = "";
    include $path.'vendor/autoload.php';
    include $path.'oop/obj.php';
    $dept_id = '';
    $filename = '';
    
    if(isset($_GET['adj'])){
        $adj_id = $_GET['adj'];
        $sql = mysqli_query($conn, "SELECT * FROM adjust WHERE adj_id='$adj_id'");
        $dept = mysqli_fetch_array($sql,MYSQLI_ASSOC);
        $dept_id = $dept['dept_id'];
        $fy = $dept['fy_id'];
        $filename = 'ລາຍງານແຜນແບ່ງປັນ_'. $dept_id . '_' . date('YmdHis');
    }

    //include table report
    if($dept_id == '001'){
        include "../fetch/dept_001.php";
        $title = "ສັງລວມຂໍ້ມູນຈຳນວນນັກຮຽນ ແລະ ພະນັກງານຮຽນຕໍ່ໃນສາຍມະຫາວິທະຍາໄລ ສົກປີ " . $fy;
    }elseif($dept_id == 'Dep_002'){
        include "../fetch/dept_002.php";
        $title = "ແຜນແບ່ງປັນນັກຮຽນ ແລະ ພະນັກງານເຂົ້າຮຽນຕໍ່ສະຖາບັນສ້າງຄູ ສົກປີ " . $fy;
    }
    elseif($dept_id == 'Dep_003'){
        include "../fetch/dept_003.php";
        $title = "ສັງລວມຂໍ້ມູນຈຳນວນນັກຮຽນ ແລະ ພະນັກງານຮຽນຕໍ່ ໃນສາຍອາຊີວະສຶກສາ ສົກປີ " . $fy;
    }
    elseif($dept_id == 'Dep_11'){
        include "../fetch/dept_011.php";
        $title = "ສັງລວມຂໍ້ມູນຈຳນວນນັກຮຽນເຂົ້າຮຽນຕໍ່ ໃນສະຖາບັນກິລາ-ກາຍຍະກຳ ສົກປີ " . $fy;
    }
    elseif($dept_id == 'Dep_12'){
        include "../fetch/dept_012.php";
        $title = "ສັງລວມຂໍ້ມູນຈຳນວນນັກຮຽນ ແລະ ພະນັກງານຮຽນຕໍ່ ໃນສາຍການສຶກສາ​ພາກ​ເອ​ກະ​ຊົນ ສົກປີ " . $fy;
    }
    else{
        $table = "ບໍ່ມີຂໍ້ມູນ";
    }
    
    

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

        <h2 class="text-center"> '. $title .'</h2>
    ';

    $content .= $table;

    
    $mdpf->WriteHTML($content);
    $mdpf->Output("$filename.pdf","I");
?>