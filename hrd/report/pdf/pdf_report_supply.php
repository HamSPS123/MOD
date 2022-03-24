<?php
    session_start();
    $path = '../../../';
    $title = 'ລາຍງານແຜນຮັບ'. date('YmdHis');
    include $path.'vendor/autoload.php';
    include $path.'oop/obj.php';


    if(isset($_GET['fy'])){
        $fy_id = $_GET['fy'];
        $dept = $_GET['dept'];

        $dept_name = mysqli_query($conn, "SELECT * FROM department WHERE dept_id='$dept'");
        $dn = mysqli_fetch_array($dept_name, MYSQLI_ASSOC);

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
        'margin_top' => 15,
        'margin_left' => 25,
        'margin_right' => 15,
        'margin_bottom' => 15,
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
        .body{
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

            .university td{
                background: #5199FA;
                color: #fff;
                font-weight: bold;
            }
            .fac{
                background: #B1CDF3;
                color: #FFF;
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
            <h1 class="text-center">ແຜນຮັບນັກຮຽນ-ພະນັກງານເຂົ້າຮຽນຕໍ່ປະຈຳສົກປີ '. $fy_id .'</h1>
            <h1 class="text-center">'.$dn['dept_name'].'</h1>
            </div>
            <p class="cover-footer">'. $month . ' '. $year .'</p>
        <formfeed>
    ';
    $sql = mysqli_query($conn, "SELECT d_id,ad.adj_id,fy_id,ad.course_id,course_name,fac_name,uni_name,level_name,SUM(get_plan) AS get_plan ,`user_id` FROM adjustdetail ad
    LEFT JOIN adjust a ON ad.adj_id=a.adj_id
    LEFT JOIN course c ON ad.course_id=c.course_id
    LEFT JOIN course_level cl ON c.level_id=cl.level_id
    LEFT JOIN faculty f ON c.fac_id=f.fac_id
    LEFT JOIN university u ON f.uni_id=u.uni_id
    WHERE fy_id='$fy_id' AND u.dept_id='$dept' GROUP BY f.uni_id ORDER BY f.uni_id ASC");
    $content .= '
    <div class="body">
    <table class="table table-bordered text-center">

        <tbody>
        <tr>
            <th>ລ/ດ</th>
            <th>ສາຂາວິຊາ</th>
            <th>ລະດັບຊັ້ນ</th>
            <th>ຈຳນວນ</th>
            <th>ຜູ້ສ້າງແຜນຮັບ</th>
        </tr>
        ';
            
            $i=0;
            foreach($sql as $row){
                $i++;
                // $fac_id=$row['fac_id'];
            $content.= '
            <tr class="university">
                <td>'. ConverToRoman($i) .'.</td>
                <td colspan="2">'. $row['uni_name'] .'</td>
                <td>'. number_format($row['get_plan'],0) .'</td>
                <td>&nbsp;</td>
            </tr>';
            
                $sql2 = mysqli_query($conn, "SELECT d_id,ad.adj_id,fy_id,ad.course_id,course_name,c.fac_id,fac_name,uni_name,level_name,SUM(get_plan) AS get_plan ,`user_id` FROM adjustdetail ad
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN course_level cl ON c.level_id=cl.level_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                WHERE fy_id='$fy_id' AND u.dept_id='$dept' GROUP BY c.fac_id ORDER BY c.fac_id ASC"); 
            $fac_id = "";
            $j = 0; 
                foreach($sql2 as $row2){
                    $j++;
                    $fac_id=$row2['fac_id'];
            $content .= '
            <tr class="fac">
                <td>'. $j .'</td>
                <td colspan="2">'. $row2['fac_name'] .'</td>
                <td>'. number_format($row2['get_plan'],0) .'</td>
                <td>&nbsp;</td>
            </tr>';
            
                $sql3 = mysqli_query($conn, "SELECT d_id,ad.adj_id,fy_id,ad.course_id,course_name,level_name,c.fac_id,fac_name,uni_name,get_plan,ad.user_id,sup_name FROM adjustdetail ad
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN course_level cl ON c.level_id=cl.level_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN supply_user sp ON ad.user_id=sp.user_id
                WHERE fy_id='$fy_id' AND c.fac_id='$fac_id' ORDER BY ad.course_id ASC");
                $k = 0;
                foreach($sql3 as $row3){
                    $k++;
            $content.='        
            <tr>
                <td>'. $j .'.'. $k .'</td>
                <td class="text-left">'. $row3['course_name'] .'</td>
                <td>'. $row3['level_name'] .'</td>
                <td>'. number_format($row3['get_plan'],0) .'</td>
                <td>'. $row3['sup_name'] .'</td>
            </tr>';
                }

                }       
            }
            $content .='
        </tbody>
    </table>
    </div>
    ';

    $mdpf->setTitle("ລາຍງານແຜນຮັບນັກຮຽນ-ພະນັກງານ");
    
    $mdpf->WriteHTML($content);
    $mdpf->Output("$title.pdf","I");
}
?>