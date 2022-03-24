<?php
    session_start();
    $path = '../../../';
    $filename = 'ລາຍງານແຜນແບ່ງປັນ'. date('YmdHis');
    $title = "";
    include $path.'vendor/autoload.php';
    include $path.'oop/obj.php';
    $dept_id = '';
    $fy_id = "";

    $date = date('d');
    $month = date('m');
    $year = date('Y');

    if($month == 1){
        $month = "ມັງກອນ";
    }elseif($month == 2){
        $month = "ກຸມພາ";
    }elseif($month == 3){
        $month = "ມີນາ";
    }elseif($month == 4){
        $month = "ເມສາ";
    }elseif($month == 5){
        $month = "ພືດສະພາ";
    }elseif($month == 6){
        $month = "ມິຖຸນາ";
    }elseif($month == 7){
        $month = "ກໍລະກົດ";
    }elseif($month == 8){
        $month = "ສິງຫາ";
    }elseif($month == 9){
        $month = "ກັນຍາ";
    }elseif($month == 10){
        $month = "ຕຸລາ";
    }elseif($month == 11){
        $month = "ພະຈິກ";
    }else{
        $month = "ທັນວາ";
    }
    

    
    if(isset($_GET['fy'])){
        $fy_id = $_GET['fy'];
        include "../fetch/dept_all.php";
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

            .text-nowrap{
                white-space: nowrap;
            }

            .table td:nth-of-type(2) {
                width: 250px !important;
            }

            .left{
                width: 250px;
                float: left;
            }
            .right{
                width: 250px;
                float: right;
                text-align: right;
            }

            .signature{
                width: 15%;
                float: right;
            }
        </style>
        <div>
            <h4 class="text-center">
            <img src="'.$path.'image/Emblem_of_Laos.png" width="55px" />
            <br>ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ<br>
            ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ
            </h4>
            <div style="clear: both">
                <div class="left">ກະຊວງສຶກສາທິການ ແລະ ກິລາ</div>
                <div class="right">ເລກທີ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/ສສກ<br> ນະຄອນຫຼວງວຽງຈັນ, ວັນທີ '. $date .' '. $month .' '. $year .'</div>
            </div>
            <h2 class="text-center">ສັງລວມແຜນແບ່ງປັນສັບຊ້ອນນັກຮຽນ-ພະນັກງານ ເຂົ້າຮຽນພາຍໃນປະເທດ ສົກປີ '. $fy_id .'</h2>
        
    ';

    $content .= $table;
    $content .='
    </div>
    <p class="signature">ລັດຖະມົນຕີ</p>
    ';

    
    $mdpf->WriteHTML($content);
    $mdpf->Output("$filename.pdf","I");
?>