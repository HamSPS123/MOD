<?php
    session_start();
    $path = '../../../';
    $filename = 'ລາຍງານແຜນສ້າງ'. date('YmdHis');
    include $path.'vendor/autoload.php';
    include $path.'oop/obj.php';


    if(isset($_GET['adj'])){
        $adj_id = $_GET['adj'];
        $p_m_id = $_SESSION['p_m_id'];
        $user_id = $_SESSION['user_id'];

        $pm = mysqli_query($conn, "SELECT * FROM province_ministry WHERE p_m_id='$p_m_id'");
        $p_m = mysqli_fetch_array($pm,MYSQLI_ASSOC);

    
    

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
        <p class="text-center">ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ<br>
        ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ<br>
        ====0000====
        </p>
        <h3 class="text-center" style="text-decoration: underline">ລາຍງານແຜນສ້າງ</h3>
        <p class="text-center" style="margin: 0;padding:0;">ແຂວງ '.$p_m['p_m_name'].' ສົກຮຽນ 2021-2022</p>
    ';
    $university = mysqli_query($conn, "SELECT cre_id,adj_id,cp.course_id,course_name,fac_name,f.uni_id,uni_name,p_m_id,sum(std_qty) as std_qty,sum(emp_qty) as emp_qty,
    sum(std_qty) + sum(emp_qty) as total
    FROM create_plan cp
    LEFT JOIN course c ON cp.course_id=c.course_id
    LEFT JOIN faculty f ON c.fac_id=f.fac_id
    LEFT JOIN university u ON f.uni_id=u.uni_id
    WHERE adj_id='$adj_id' AND p_m_id='$p_m_id' AND `user_id`='$_SESSION[user_id]'
    GROUP BY f.uni_id ORDER BY uni_id ASC;");

    if(mysqli_num_rows($university) > 0){
        include "../fetch/demand.php";

        $content .= $table;
    }
    
    $footer = '<p class="text-center" style="font-style: normal;font-weight: normal">ໜ້າທີ {PAGENO}</p>';

    $mdpf->setFooter($footer);
    $mdpf->WriteHTML($content);
    $mdpf->Output("$filename.pdf","I");
}
?>