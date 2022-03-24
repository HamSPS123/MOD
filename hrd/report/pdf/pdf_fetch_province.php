<?php
    session_start();
    $path = '../../../';
    $filename = 'ລາຍງານແຜນແບ່ງປັນ'. date('YmdHis');
    $title = "";
    include $path.'vendor/autoload.php';
    include $path.'oop/obj.php';
    
    $fy_id = "";
    $p_m_id = "";

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
        $p_m_id = $_GET['province'];
        include "../fetch/dept_all_province.php";

        $pm = mysqli_query($conn, "SELECT * FROM province_ministry WHERE p_m_id='$p_m_id'");
        $result = mysqli_fetch_array($pm, MYSQLI_ASSOC);

        $p_m_name = $result['p_m_name'];
    }
    

    // $footer = '{PAGENO}';
    $mdpf = new \Mpdf\Mpdf([
        'format'            => 'A4',
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
                width: 49%;
                float: left;
            }
            .right{
                width: 49%;
                float: right;
                text-align: right;
            }

            .signature{
                width: 15%;
                float: right;
            }
        </style>
        <div>
            <p class="text-center">
            <img src="'.$path.'image/Emblem_of_Laos.png" width="55px" />
            <br>ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ<br>
            ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ
            </p>
            <div>
                <p class="left">ກະຊວງສຶກສາທິການ ແລະ ກິລາ</p>
                <p class="right">ເລກທີ            /ສສກ<br> ນະຄອນຫຼວງວຽງຈັນ, ວັນທີ '. $date .' '. $month .' '. $year .'</p>
            </div>
            <h3 class="text-center">ສັງລວມແຜນແບ່ງປັນສັບຊ້ອນນັກຮຽນ-ພະນັກງານ ເຂົ້າຮຽນພາຍໃນປະເທດ ສົກປີ '. $fy_id .'<br>'. $p_m_name .'</h3>
        
    ';

    $content .= $table;
    $content .='
            <p class="signature">ລັດຖະມົນຕີ</p>
        </div>
    ';

    
    $mdpf->WriteHTML($content);
    $mdpf->Output("$filename.pdf","I");
?>