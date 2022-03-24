<?php
  include ('../../oop/obj.php');
  if(isset($_POST['btnLogin'])){
    $obj->login_supply($_POST['email'],$_POST['pass']);
  }

  $adj_id = "162";
  $dept_id = "001";
  $fy_id = "2021-2022";
  


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="image/logo.png">
    <title>ກະຊວງສຶກສາທິການແລະກິລາ</title>
    <!-- <link rel="stylesheet" href="../dist/css/alt/style2.css"> -->
    <link rel="stylesheet" href="../dist/css/alt/style.css">
    <!-- <link rel="stylesheet" href="../fontawesome/css/all.css"> -->
    <link rel="shortcut icon" href="../image/logo.png" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="../dist/js/sweetalert.min.js"></script>
    <style>
    /* .rotate-text span{
        display: block;
        width: 100
        transform: rotate(-90deg);
      } */

    thead th {
        color: #000 !important;
        vertical-align: middle;
    }

    /* tr:first-of-type th:nth-of-type(5),
    tr:nth-of-type(2) th:nth-of-type(6),
    td:nth-of-type(11){
      border-right: 2px solid #000;
    } */
    .rotate span {
        display: block;
        writing-mode: vertical-lr;
        transform: rotate(180deg);
        white-space: nowrap;
        text-align: center;
        margin: auto auto;
    }
    </style>
</head>

<body>
    <table class="table table-bordered text-center">
        <thead class="table-primary">
            <tr>
                <th rowspan="2">ລ/ດ</th>
                <th rowspan="2">ລາຍລະອຽດ</th>
                <th rowspan="2">ລວມ</th>
                <th colspan="6">ແບ່ງປັນ</th>
                <th colspan="5">ຈ່າຍຄ່າຮຽນ</th>
                <th rowspan="2">ສຳພາດ</th>
                <th colspan="2">ນະຄອນຫຼວງ</th>
                <th colspan="2">ຜົ້ງສາລີ</th>
                <th colspan="2">ຫຼວງນ້ຳທາ</th>
                <th colspan="2">ອຸດົມໄຊ</th>
                <th colspan="2">ບໍ່ແກ້ວ</th>
                <th colspan="2">ຫຼວງພະບາງ</th>
                <th colspan="2">ຫົວພັນ</th>
                <th colspan="2">ໄຊຍະບູລີ</th>
                <th colspan="2">ຊຽງຂວາງ</th>
                <th colspan="2">ວຽງຈັນ</th>
                <th colspan="2">ໄຊສົມບູນ</th>
                <th colspan="2">ບໍລິຄຳໄຊ</th>
                <th colspan="2">ຄຳມ່ວນ</th>
                <th colspan="2">ສະຫວັນນະເຂດ</th>
                <th colspan="2">ສາລະວັນ</th>
                <th colspan="2">ເຊກອງ</th>
                <th colspan="2">ຈຳປາຊັກ</th>
                <th colspan="2">ອັດຕະປື</th>
                <th rowspan="2">ຊາວໜຸ່ມແຮກສ່ຽວ</th>
                <th rowspan="2">ກ/ຊ ສຶກສາ</th>
                <th rowspan="2">ພ/ງ ກ/ຊ ອື່ນ</th>
                <th rowspan="2">ກ/ຊ ປ້ອງກັນປະເທດ</th>
            </tr>
            <tr>
                <th>ນ/ຮ ສາມັນ (ໃນແຜນ)</th>
                <th>ມະຫາວິທະຍາໄລເລືອກແບ່ງໃຫ້ຄູອາສາສະໝັກມາຮຽນລະບົບຕໍ່ເນື່ອງ</th>
                <th>ພ/ງ</th>
                <th>ສສກ ແບ່ງ</th>
                <th>ຄຸອາສາເບ້ຍລ້ຽງ</th>
                <th>ສອບເສັງ</th>
                <th>ພ/ງ</th>
                <th>ນ/ຮ ສາມັນ</th>
                <th>ນ/ຮ ຕໍ່ເນື່ອງ</th>
                <th>ນັກຮຽນຫ້ອງສອງພາສາລາວ-ຝຣັ່ງ</th>
                <th>ນ/ຮ ຕ່າງປະເທດ</th>
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
                <th>ນ/ຮ</th>
                <th>ພ/ງ</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = mysqli_query($conn, "SELECT as_id,sd.adj_id,fy_id,sd.st_id,st_name,st_group,group_name,
                SUM(std_high_school)+SUM(univer)+SUM(univer_valunteer)+SUM(prov)+SUM(intv)+SUM(ad_test)+SUM(std_public)+SUM(emp)+SUM(std_handi)+SUM(std_lan)+SUM(ssk)+SUM(std)+SUM(emp_gov)+SUM(test)+SUM(std_con)+SUM(std_2lan)+SUM(std_inter)+SUM(emp_private) as total,
                SUM(std_high_school) as std_high_school,
                SUM(univer) as univer,
                SUM(univer_valunteer) as univer_valunteer,
                SUM(prov) as prov,
                SUM(intv) as intv,
                SUM(ad_test) as ad_test,
                SUM(std_public) as std_public,
                SUM(emp) as emp,
                SUM(std_handi) as std_handi,
                SUM(std_lan) as std_lan,
                SUM(ssk) as ssk,
                SUM(std) as std,
                SUM(emp_gov) as emp_gov,
                SUM(test) as test,
                SUM(std_con) as std_con,
                SUM(std_2lan) as std_2lan,
                SUM(std_inter) as std_inter,
                SUM(emp_private) as emp_private,
                user_id
                FROM statistic_detail sd
                LEFT JOIN statatic st ON sd.st_id=st.st_id
                LEFT JOIN statatic_group sg ON st.st_group=sg.group_id
                LEFT JOIN adjust a ON sd.adj_id=a.adj_id
                WHERE fy_id='$fy_id' GROUP BY st_group ORDER BY st_group;");
                if(mysqli_num_rows($query)>0){
                    foreach($query as $row => $key){
                        $group_id = $key['st_group'];
            ?>
            <tr style="background: #34a1eb;color: white">
                <td><?= ConverToRoman($row) ?></td>
                <td class="text-nowrap text-left"><?= $group_id == 1 ? $key['group_name']." ສົກຮຽນ $fy_id" : $key['group_name'] ?></td>
                <td><?= number_format($key['total'],0) ?></td>
                <td><?= number_format($key['std_public'],0) ?></td>
                <td><?= number_format($key['univer'],0) ?></td>
                <td><?= number_format($key['emp'],0) ?></td>
                <td><?= number_format($key['ssk'],0) ?></td>
                <td><?= number_format($key['univer_valunteer'],0) ?></td>
                <td><?= number_format($key['ad_test'],0) ?></td>
                <td><?= number_format($key['emp_gov'],0) ?></td>
                <td><?= number_format($key['std'],0) ?></td>
                <td><?= number_format($key['std_con'],0) ?></td>
                <td><?= number_format($key['std_2lan'],0) ?></td>
                <td><?= number_format($key['std_inter'],0) ?></td>
                <td><?= number_format($key['intv'],0) ?></td>
                <?php
                    $group_std_vte = 0;
                    $group_std_bke = 0;
                    $group_std_blk = 0;
                    $group_std_cps = 0;
                    $group_std_hph = 0;
                    $group_std_khm = 0;
                    $group_std_lnt = 0;
                    $group_std_lpb = 0;
                    $group_std_odx = 0;
                    $group_std_psl = 0;
                    $group_std_slv = 0;
                    $group_std_svk = 0;
                    $group_std_vtep = 0;
                    $group_std_syb = 0;
                    $group_std_skg = 0;
                    $group_std_xsb = 0;
                    $group_std_xkg = 0;
                    $group_std_atp = 0;
                    
                    $group_emp_vte = 0;
                    $group_emp_bke = 0;
                    $group_emp_blk = 0;
                    $group_emp_cps = 0;
                    $group_emp_hph = 0;
                    $group_emp_khm = 0;
                    $group_emp_lnt = 0;
                    $group_emp_lpb = 0;
                    $group_emp_odx = 0;
                    $group_emp_psl = 0;
                    $group_emp_slv = 0;
                    $group_emp_svk = 0;
                    $group_emp_vtep = 0;
                    $group_emp_syb = 0;
                    $group_emp_skg = 0;
                    $group_emp_xsb = 0;
                    $group_emp_xkg = 0;
                    $group_emp_atp = 0;
                    $quota = mysqli_query($conn, "SELECT sd_id,sd.as_id,sd.p_m_id,SUM(std_qty) AS std_qty,SUM(emp_qty) AS emp_qty,st.st_id FROM statistic_distribute sd
                    LEFT JOIN statistic_detail st ON sd.as_id=st.as_id
                    LEFT JOIN statatic s ON st.st_id=s.st_id
                    LEFT JOIN province_ministry pm ON sd.p_m_id=pm.p_m_id
                    WHERE st_group='$group_id' AND p_stt=1 GROUP BY sd.p_m_id ORDER BY sd.p_m_id ASC");
                    foreach($quota as $data){
                        if($data['p_m_id'] == 1){
                        $group_std_vte = $data['std_qty'];
                        $group_emp_vte = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 2){
                        $group_std_bke = $data['std_qty'];
                        $group_emp_bke = $data['emp_qty'];
                        }

                        
                        if($data['p_m_id'] == 3){
                        $group_std_blk = $data['std_qty'];
                        $group_emp_blk = $data['emp_qty'];
                        }

                        
                        if($data['p_m_id'] == 4){
                        $group_std_cps = $data['std_qty'];
                        $group_emp_cps = $data['emp_qty'];
                        }

                        
                        if($data['p_m_id'] == 5){
                        $group_std_hph = $data['std_qty'];
                        $group_emp_hph = $data['emp_qty'];
                        }

                        
                        if($data['p_m_id'] == 6){
                        $group_std_khm = $data['std_qty'];
                        $group_emp_khm = $data['emp_qty'];
                        }

                        
                        if($data['p_m_id'] == 7){
                        $group_std_lnt = $data['std_qty'];
                        $group_emp_lnt = $data['emp_qty'];
                        }

                        
                        if($data['p_m_id'] == 8){
                        $group_std_lpb = $data['std_qty'];
                        $group_emp_lpb = $data['emp_qty'];
                        }

                        
                        if($data['p_m_id'] == 9){
                        $group_std_odx = $data['std_qty'];
                        $group_emp_odx = $data['emp_qty'];
                        }

                        
                        if($data['p_m_id'] == 10){
                        $group_std_psl = $data['std_qty'];
                        $group_emp_psl = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 11){
                        $group_std_slv = $data['std_qty'];
                        $group_emp_slv = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 12){
                        $group_std_svk = $data['std_qty'];
                        $group_emp_svk = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 13){
                        $group_std_vtep = $data['std_qty'];
                        $group_emp_vtep = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 14){
                        $group_std_syb = $data['std_qty'];
                        $group_emp_syb = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 15){
                        $group_std_skg = $data['std_qty'];
                        $group_emp_skg = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 16){
                        $group_std_xsb = $data['std_qty'];
                        $group_emp_xsb = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 17){
                        $group_std_xkg = $data['std_qty'];
                        $group_emp_xkg = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 18){
                        $group_std_atp = $data['std_qty'];
                        $group_emp_atp = $data['emp_qty'];
                        }
                    }
                ?>
                <td><?= number_format($group_std_vte,0) ?></td>
                <td><?= number_format($group_emp_vte,0) ?></td>
                <td><?= number_format($group_std_psl,0) ?></td>
                <td><?= number_format($group_emp_psl,0) ?></td>
                <td><?= number_format($group_std_lnt,0) ?></td>
                <td><?= number_format($group_emp_lnt,0) ?></td>
                <td><?= number_format($group_std_odx,0) ?></td>
                <td><?= number_format($group_emp_odx,0) ?></td>
                <td><?= number_format($group_std_bke,0) ?></td>
                <td><?= number_format($group_emp_bke,0) ?></td>
                <td><?= number_format($group_std_lpb,0) ?></td>
                <td><?= number_format($group_emp_lpb,0) ?></td>
                <td><?= number_format($group_std_hph,0) ?></td>
                <td><?= number_format($group_emp_hph,0) ?></td>
                <td><?= number_format($group_std_syb,0) ?></td>
                <td><?= number_format($group_emp_syb,0) ?></td>
                <td><?= number_format($group_std_xkg,0) ?></td>
                <td><?= number_format($group_emp_xkg,0) ?></td>
                <td><?= number_format($group_std_vtep,0) ?></td>
                <td><?= number_format($group_emp_vtep,0) ?></td>
                <td><?= number_format($group_std_xsb,0) ?></td>
                <td><?= number_format($group_emp_xsb,0) ?></td>
                <td><?= number_format($group_std_blk,0) ?></td>
                <td><?= number_format($group_emp_blk,0) ?></td>
                <td><?= number_format($group_std_khm,0) ?></td>
                <td><?= number_format($group_emp_khm,0) ?></td>
                <td><?= number_format($group_std_svk,0) ?></td>
                <td><?= number_format($group_emp_svk,0) ?></td>
                <td><?= number_format($group_std_slv,0) ?></td>
                <td><?= number_format($group_emp_slv,0) ?></td>
                <td><?= number_format($group_std_skg,0) ?></td>
                <td><?= number_format($group_emp_skg,0) ?></td>
                <td><?= number_format($group_std_cps,0) ?></td>
                <td><?= number_format($group_emp_cps,0) ?></td>
                <td><?= number_format($group_std_atp,0) ?></td>
                <td><?= number_format($group_emp_atp,0) ?></td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <?php
                $query2 = mysqli_query($conn, "SELECT as_id,sd.adj_id,fy_id,sd.st_id,st_name,st_group,group_name,
                std_high_school+univer+univer_valunteer+prov+intv+ad_test+std_public+emp+std_handi+std_lan+ssk+std+emp_gov+test+std_con+std_2lan+std_inter+emp_private as total,
                std_high_school,
                univer,
                univer_valunteer,
                prov,
                intv,
                ad_test,
                std_public,
                emp,
                std_handi,
                std_lan,
                ssk,
                std,
                emp_gov,
                test,
                std_con,
                std_2lan,
                std_inter,
                emp_private,
                user_id
                FROM statistic_detail sd
                LEFT JOIN statatic st ON sd.st_id=st.st_id
                LEFT JOIN statatic_group sg ON st.st_group=sg.group_id
                LEFT JOIN adjust a ON sd.adj_id=a.adj_id
                WHERE fy_id='$fy_id' AND st_group='$group_id' ORDER BY sd.st_id;");
                foreach($query2 as $row2 => $key2){
                    $row2++;
                    $st_id = $key2['st_id'];
            ?>
            <tr>
                <td><?= $row2 ?></td>
                <td class="text-nowrap" style="text-align: left;"><?= $group_id == 1 ? $key2['st_name'] ." ສົກຮຽນ $fy_id" : $key2['st_name'] ?></td>
                <td><?= number_format($key2['total'],0) ?></td>
                <td><?= number_format($key2['std_public'],0) ?></td>
                <td><?= number_format($key2['univer'],0) ?></td>
                <td><?= number_format($key2['emp'],0) ?></td>
                <td><?= number_format($key2['ssk'],0) ?></td>
                <td><?= number_format($key2['univer_valunteer'],0) ?></td>
                <td><?= number_format($key2['ad_test'],0) ?></td>
                <td><?= number_format($key2['emp_gov'],0) ?></td>
                <td><?= number_format($key2['std'],0) ?></td>
                <td><?= number_format($key2['std_con'],0) ?></td>
                <td><?= number_format($key2['std_2lan'],0) ?></td>
                <td><?= number_format($key2['std_inter'],0) ?></td>
                <td><?= number_format($key2['intv'],0) ?></td>
                <?php
                    $st_std_vte = 0;
                    $st_std_bke = 0;
                    $st_std_blk = 0;
                    $st_std_cps = 0;
                    $st_std_hph = 0;
                    $st_std_khm = 0;
                    $st_std_lnt = 0;
                    $st_std_lpb = 0;
                    $st_std_odx = 0;
                    $st_std_psl = 0;
                    $st_std_slv = 0;
                    $st_std_svk = 0;
                    $st_std_vtep = 0;
                    $st_std_syb = 0;
                    $st_std_skg = 0;
                    $st_std_xsb = 0;
                    $st_std_xkg = 0;
                    $st_std_atp = 0;
                    
                    $st_emp_vte = 0;
                    $st_emp_bke = 0;
                    $st_emp_blk = 0;
                    $st_emp_cps = 0;
                    $st_emp_hph = 0;
                    $st_emp_khm = 0;
                    $st_emp_lnt = 0;
                    $st_emp_lpb = 0;
                    $st_emp_odx = 0;
                    $st_emp_psl = 0;
                    $st_emp_slv = 0;
                    $st_emp_svk = 0;
                    $st_emp_vtep = 0;
                    $st_emp_syb = 0;
                    $st_emp_skg = 0;
                    $st_emp_xsb = 0;
                    $st_emp_xkg = 0;
                    $st_emp_atp = 0;
                    $quota2 = mysqli_query($conn, "SELECT sd_id,sd.as_id,sd.p_m_id,std_qty,emp_qty,st.st_id FROM statistic_distribute sd
                    LEFT JOIN statistic_detail st ON sd.as_id=st.as_id
                    LEFT JOIN statatic s ON st.st_id=s.st_id
                    LEFT JOIN province_ministry pm ON sd.p_m_id=pm.p_m_id
                    WHERE st.st_id='$st_id' AND p_stt=1 GROUP BY sd.p_m_id ORDER BY sd.p_m_id ASC;");
                    foreach($quota2 as $data2){
                        if($data2['p_m_id'] == 1){
                        $st_std_vte = $data2['std_qty'];
                        $st_emp_vte = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 2){
                        $st_std_bke = $data2['std_qty'];
                        $st_emp_bke = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 3){
                        $st_std_blk = $data2['std_qty'];
                        $st_emp_blk = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 4){
                        $st_std_cps = $data2['std_qty'];
                        $st_emp_cps = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 5){
                        $st_std_hph = $data2['std_qty'];
                        $st_emp_hph = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 6){
                        $st_std_khm = $data2['std_qty'];
                        $st_emp_khm = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 7){
                        $st_std_lnt = $data2['std_qty'];
                        $st_emp_lnt = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 8){
                        $st_std_lpb = $data2['std_qty'];
                        $st_emp_lpb = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 9){
                        $st_std_odx = $data2['std_qty'];
                        $st_emp_odx = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 10){
                        $st_std_psl = $data2['std_qty'];
                        $st_emp_psl = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 11){
                        $st_std_slv = $data2['std_qty'];
                        $st_emp_slv = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 12){
                        $st_std_svk = $data2['std_qty'];
                        $st_emp_svk = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 13){
                        $st_std_vtep = $data2['std_qty'];
                        $st_emp_vtep = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 14){
                        $st_std_syb = $data2['std_qty'];
                        $st_emp_syb = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 15){
                        $st_std_skg = $data2['std_qty'];
                        $st_emp_skg = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 16){
                        $st_std_xsb = $data2['std_qty'];
                        $st_emp_xsb = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 17){
                        $st_std_xkg = $data2['std_qty'];
                        $st_emp_xkg = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 18){
                        $st_std_atp = $data2['std_qty'];
                        $st_emp_atp = $data2['emp_qty'];
                        }
                    }
                ?>
                <td><?= number_format($st_std_vte,0) ?></td>
                <td><?= number_format($st_emp_vte,0) ?></td>
                <td><?= number_format($st_std_psl,0) ?></td>
                <td><?= number_format($st_emp_psl,0) ?></td>
                <td><?= number_format($st_std_lnt,0) ?></td>
                <td><?= number_format($st_emp_lnt,0) ?></td>
                <td><?= number_format($st_std_odx,0) ?></td>
                <td><?= number_format($st_emp_odx,0) ?></td>
                <td><?= number_format($st_std_bke,0) ?></td>
                <td><?= number_format($st_emp_bke,0) ?></td>
                <td><?= number_format($st_std_lpb,0) ?></td>
                <td><?= number_format($st_emp_lpb,0) ?></td>
                <td><?= number_format($st_std_hph,0) ?></td>
                <td><?= number_format($st_emp_hph,0) ?></td>
                <td><?= number_format($st_std_syb,0) ?></td>
                <td><?= number_format($st_emp_syb,0) ?></td>
                <td><?= number_format($st_std_xkg,0) ?></td>
                <td><?= number_format($st_emp_xkg,0) ?></td>
                <td><?= number_format($st_std_vtep,0) ?></td>
                <td><?= number_format($st_emp_vtep,0) ?></td>
                <td><?= number_format($st_std_xsb,0) ?></td>
                <td><?= number_format($st_emp_xsb,0) ?></td>
                <td><?= number_format($st_std_blk,0) ?></td>
                <td><?= number_format($st_emp_blk,0) ?></td>
                <td><?= number_format($st_std_khm,0) ?></td>
                <td><?= number_format($st_emp_khm,0) ?></td>
                <td><?= number_format($st_std_svk,0) ?></td>
                <td><?= number_format($st_emp_svk,0) ?></td>
                <td><?= number_format($st_std_slv,0) ?></td>
                <td><?= number_format($st_emp_slv,0) ?></td>
                <td><?= number_format($st_std_skg,0) ?></td>
                <td><?= number_format($st_emp_skg,0) ?></td>
                <td><?= number_format($st_std_cps,0) ?></td>
                <td><?= number_format($st_emp_cps,0) ?></td>
                <td><?= number_format($st_std_atp,0) ?></td>
                <td><?= number_format($st_emp_atp,0) ?></td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <?php
                        }
                    }
                }
            ?>
        </tbody>
    </table>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</html>

