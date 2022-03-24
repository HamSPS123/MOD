<?php
    session_start();
    $path = '../../../';
    $filename = 'ລາຍງານແຜນແບ່ງປັນ'. date('YmdHis');
    $title = "";
    include $path.'vendor/autoload.php';
    include $path.'oop/obj.php';
    $dept_id = '';


    if(isset($_GET['adj'])){
        $adj_id = $_GET['adj'];
        $p_m_id = $_GET['province'];
        $sql = mysqli_query($conn, "SELECT * FROM adjust WHERE adj_id='$adj_id'");
        $dept = mysqli_fetch_array($sql,MYSQLI_ASSOC);
        $dept_id = $dept['dept_id'];
        $fy = $dept['fy_id'];


        $p = mysqli_fetch_array(mysqli_query($conn, "SELECT p_m_name FROM province_ministry WHERE p_m_id='$p_m_id'"), MYSQLI_ASSOC);
    }

    //include table report
    if($dept_id == '001'){
        include "../fetch/dept_001_province.php";
        $title = "ສັງລວມຂໍ້ມູນຈຳນວນນັກຮຽນ ແລະ ພະນັກງານຮຽນຕໍ່ໃນສາຍມະຫາວິທະຍາໄລ ສົກປີ " . $fy;
    }elseif($dept_id == 'Dep_002'){
        include "../fetch/dept_002.php";
        $title = "ແຜນແບ່ງປັນນັກຮຽນ ແລະ ພະນັກງານເຂົ້າຮຽນຕໍ່ສະຖາບັນສ້າງຄູ ສົກປີ " . $fy;
    }else{
        $table = "ບໍ່ມີຂໍ້ມູນ";
    }
    

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
    

    // $footer = '{PAGENO}';
    $mdpf = new \Mpdf\Mpdf([
        'format'            => 'A4',
        'mode'              => 'utf-8',      
        'tempDir'           => '/tmp',
        'default_font_size' => 12,
        'margin_bottom' => 10,
        'margin_footer' => 10, 
        'default_font' => 'phetsarath_ot'
    ]);
    $content = '
        <style>
            .cover{
                width: 100%;
                height: 100%;
            }
            .slogan{
                text-align: center
            }
            .img-logo{
                width: 55px;
                height: auto;
            }
            .book_no{
                width: 100%;
                margin: 0 auto;
                line-height: 5px;
            }
            .no_left{
                width: 50%;
                float: left;
                text-align: left;
            }
            .no_right{
                width: 50%;
                float: left;
                text-align: right;
            }
            .cover-footer{
                position: fixed;
                width: 100%;
                margin-left: auto;
                margin-right: auto;
                vertical-align: bottom;
                font-size: 11pt;
                bottom: 25px;
                left: 0;
                text-align: center;
            }
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

        <div class="cover">     
            <p class="slogan">
                <img src="'.$path.'image/Emblem_of_Laos.png" class="img-logo" /><br>
            ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ<br>
            ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ
            </p>
            <div class="book_no">
                <div class="no_left">
                    <p>ກະຊວງສຶກສາທິການ ແລະ ກິລາ</p>
                </div>
                <div class="no_right">
                    <p>ເລກທີ:............./ສສກ</p>
                    <p>ນະຄອນຫຼວງວຽງຈັນ, ວັນທີ '. $date . ' '. $month . ' '. $year .'</p>
                </div>
            </div>
            <h1 class="text-center">ແຜນແບ່ງປັນນັກຮຽນ-ພະນັກງານເຂົ້າຮຽນຕໍ່ປະຈຳສົກປີ '. $fy_id .'</h1>
            <h1 class="text-center">'. $p['p_m_name'] .'</h1>
            </div>
            <p class="cover-footer">'. $month . ' '. $year .'</p>
        <formfeed>

        <h3 class="text-center"> '. $title .'<br>'. $p['p_m_name'] .'</h3>
    ';

    $content .= $table;

    
    $mdpf->WriteHTML($content);
    $mdpf->Output("$filename.pdf","I");
?>