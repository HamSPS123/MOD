<?php
    session_start();
    $path = '../../../';
    $title = 'ລາຍງານແຜນຮັບ'. date('YmdHis');
    include $path.'vendor/autoload.php';
    include $path.'oop/obj.php';


    if(isset($_GET['fy'])){
        $fy_id = $_GET['fy'];
        $uni_id = $_SESSION['uni_id'];
        $user_id = $_SESSION['user_id'];
    
    

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

        <h2 class="text-center">ສັງລວມຂໍ້ມູນຈຳນວນນັກຮຽນ ແລະ ພະນັກງານຮຽນຕໍ່ໃນສາຍມະຫາວິທະຍາໄລ ສົກປີ '. $fy .'</h2>
    ';
    $sql = mysqli_query($conn, "SELECT d_id,ad.adj_id,fy_id,ad.course_id,course_name,fac_name,uni_name,level_name,SUM(get_plan) AS get_plan ,`user_id` FROM adjustdetail ad
    LEFT JOIN adjust a ON ad.adj_id=a.adj_id
    LEFT JOIN course c ON ad.course_id=c.course_id
    LEFT JOIN course_level cl ON c.level_id=cl.level_id
    LEFT JOIN faculty f ON c.fac_id=f.fac_id
    LEFT JOIN university u ON f.uni_id=u.uni_id
    WHERE fy_id='$fy_id' AND f.uni_id='$uni_id' AND user_id='$user_id' GROUP BY f.uni_id ORDER BY f.uni_id ASC");
    $content .= '
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ລ/ດ</th>
                <th>ສາຂາວິຊາ</th>
                <th>ລະດັບຊັ້ນ</th>
                <th>ຈຳນວນ</th>
                <th>ຜູ້ສ້າງແຜນຮັບ</th>
            </tr>
        </thead>
        <tbody>';
            
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
                WHERE fy_id='$fy_id' AND f.uni_id='$uni_id' AND user_id='$user_id' GROUP BY c.fac_id ORDER BY c.fac_id ASC"); 
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
                WHERE fy_id='$fy_id' AND c.fac_id='$fac_id' AND ad.user_id='$user_id' ORDER BY ad.course_id ASC");
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
    ';

    
    $mdpf->WriteHTML($content);
    $mdpf->Output("$title.pdf","I");
}
?>