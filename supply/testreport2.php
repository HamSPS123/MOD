<?php
  include ('../oop/obj.php');
  if(isset($_POST['btnLogin'])){
    $obj->login_supply($_POST['email'],$_POST['pass']);
  }

  $adj_id = "162";
  $dept_id = "001";

  // $std_vte = 0;
  // $std_bke = 0;
  // $std_blk = 0;
  // $std_cps = 0;
  // $std_hph = 0;
  // $std_khm = 0;
  // $std_lnt = 0;
  // $std_lpb = 0;
  // $std_odx = 0;
  // $std_psl = 0;
  // $std_slv = 0;
  // $std_svk = 0;
  // $std_vtep = 0;
  // $std_syb = 0;
  // $std_skg = 0;
  // $std_xsb = 0;
  // $std_xkg = 0;
  // $std_atp = 0;

  // $quota = mysqli_query($conn, "SELECT id,q.d_id,q.p_m_id,p_m_name,std_qty,emp_qty,course_id FROM quota_distribute q 
  //             LEFT JOIN adjustdetail a ON q.d_id=a.d_id
  //             LEFT JOIN province_ministry pm ON q.p_m_id=pm.p_m_id
  //             WHERE course_id='uni001_cours012' AND p_stt=1 ORDER BY q.p_m_id ASC;");
  // foreach($quota as $key){
  //   echo '<pre>';
  // print_r($key);
  // echo '</pre>';
  // if($key['p_m_id'] == 1){
  //   // echo "Get VTE";
  //   $std_vte = $key['std_qty'];
  //   echo $std_vte." VTE";
  // }
  // if($key['p_m_id'] == 2){
  //   $std_bke = $key['std_qty'];
  //   echo $std_bke."BKE";
  // }else{
  //   echo $std_bke;
  // }
  // if($key['p_m_id'] == 4){
  //   // echo "Get BLK";
  //   $std_blk = $key['std_qty'];
  //   echo $std_blk."BLK";
  // }

  // }
  


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
    <!-- ສະຖາບັນສ້າງຄູ -->
    <div class="table-responsive">

        <table class="table table-bordered text-center">
            <thead class="table-primary">
                <tr>
                    <th rowspan="2">ລ.ດ</th>
                    <th rowspan="2" class="text-nowrap">ລາຍລະອຽດ</th>
                    <th rowspan="2" class="rotate"><span>ລວມ</span></th>
                    <th colspan="4">ແບ່ງປັນ</th>
                    <th colspan="3">ຈ່າຍຄ່າຮຽນ</th>
                    <th rowspan="2">ສຳພາດ</th>
                    <th colspan="2" class="rotate"><span>ນະຄອນຫຼວງ</span></th>
                    <th colspan="2" class="rotate"><span>ບໍແກ້ວ</span></th>
                    <th colspan="2" class="rotate"><span>ບໍລິຄຳໄຊ</span></th>
                    <th colspan="2" class="rotate"><span>ຈຳປາຊັກ</span></th>
                    <th colspan="2" class="rotate"><span>ຫົວພັນ</span></th>
                    <th colspan="2" class="rotate"><span>ຄຳມວນ</span></th>
                    <th colspan="2" class="rotate"><span>ຫຼວງນ້ຳທາ</span></th>
                    <th colspan="2" class="rotate"><span>ຫຼວງພະບາງ</span></th>
                    <th colspan="2" class="rotate"><span>ອຸດົມໄຊ</span></th>
                    <th colspan="2" class="rotate"><span>ຜົງສາລີ</span></th>
                    <th colspan="2" class="rotate"><span>ສາລະວັນ</span></th>
                    <th colspan="2" class="rotate"><span>ສະຫວັນນະເຂດ</span></th>
                    <th colspan="2" class="rotate"><span>ວຽງຈັນ</span></th>
                    <th colspan="2" class="rotate"><span>ໄຊຍະບູລີ</span></th>
                    <th colspan="2" class="rotate"><span>ເຊກອງ</span></th>
                    <th colspan="2" class="rotate"><span>ໄຊສົມບູນ</span></th>
                    <th colspan="2" class="rotate"><span>ຊຽງຂວາງ</span></th>
                    <th colspan="2" class="rotate"><span>ອັດຕະປື</span></th>
                </tr>
                <tr>
                    <th class="rotate"><span>ສະຖາບັນ</span></th>
                    <th class="rotate"><span>ສະຖາບັນ (ຮຽນຟຣີ)</span></th>
                    <th class="rotate"><span>ພ/ງ</span></th>
                    <th class="rotate"><span>ຄູອາສາເບ້ຍລ້ຽງ</span></th>
                    <th class="rotate"><span>ນ/ຮ ສາມັນ</span></th>
                    <th class="rotate"><span>ພ/ງ</span></th>
                    <th class="rotate"><span>ເອກະຊົນ</span></th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $adj_id='160';
                $dept_id = 'Dep_002';


                $sql = mysqli_query($conn, "SELECT as_id,adj_id,sd.st_id,st_name,group_name,st_group,
                SUM(std_high_school+univer+univer_valunteer+prov+intv+ad_test+std_public+emp+std_handi+std_lan+ssk+std+emp_gov+test+std_con+std_2lan+std_inter+emp_private) as total,
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
                LEFT JOIN statatic s ON sd.st_id=s.st_id
                LEFT JOIN statatic_group sg ON s.st_group=sg.group_id
                WHERE adj_id='$adj_id' GROUP BY st_group ORDER BY st_group ASC");
                if(mysqli_num_rows($sql) > 0){
                    $i = 1;
                    $group_id = "";
                    foreach($sql as $row1){
                        $group_id=$row1['st_group'];
                        ?>
                <tr style="background: #34a1eb;color: white">
                    <td><?= $i ?></td>
                    <td><?= $row1['group_name'] ?></td>
                    <td><?= number_format($row1['total'],0) ?></td>
                    <td><?= number_format($row1['univer'],0) ?></td>
                    <td><?= number_format($row1['univer_valunteer'],0) ?></td>
                    <td><?= number_format($row1['emp'],0) ?></td>
                    <td><?= number_format($row1['ad_test'],0) ?></td>
                    <td><?= number_format($row1['std'],0) ?></td>
                    <td><?= number_format($row1['emp_gov'],0) ?></td>
                    <td><?= number_format($row1['emp_private'],0) ?></td>
                    <td><?= number_format($row1['intv'],0) ?></td>

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

                        $dis = mysqli_query($conn, "SELECT sd_id,sd.as_id,sd.p_m_id,SUM(std_qty) AS std_qty,SUM(emp_qty) AS emp_qty,st.st_id FROM statistic_distribute sd
                        LEFT JOIN statistic_detail st ON sd.as_id=st.as_id
                        LEFT JOIN statatic s ON st.st_id=s.st_id
                        LEFT JOIN province_ministry pm ON sd.p_m_id=pm.p_m_id
                        WHERE st_group='$group_id' AND p_stt=1 GROUP BY sd.p_m_id ORDER BY sd.p_m_id ASC");

                        foreach($dis as $data){
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

                    <td><?= $group_std_vte ?></td>
                    <td><?= $group_emp_vte ?></td>
                    <td><?= $group_std_bke ?></td>
                    <td><?= $group_emp_bke ?></td>
                    <td><?= $group_std_blk ?></td>
                    <td><?= $group_emp_blk ?></td>
                    <td><?= $group_std_cps ?></td>
                    <td><?= $group_emp_cps ?></td>
                    <td><?= $group_std_hph ?></td>
                    <td><?= $group_emp_hph ?></td>
                    <td><?= $group_std_khm ?></td>
                    <td><?= $group_emp_khm ?></td>
                    <td><?= $group_std_lnt ?></td>
                    <td><?= $group_emp_lnt ?></td>
                    <td><?= $group_std_lpb ?></td>
                    <td><?= $group_emp_lpb ?></td>
                    <td><?= $group_std_odx ?></td>
                    <td><?= $group_emp_odx ?></td>
                    <td><?= $group_std_psl ?></td>
                    <td><?= $group_emp_psl ?></td>
                    <td><?= $group_std_slv ?></td>
                    <td><?= $group_emp_slv ?></td>
                    <td><?= $group_std_svk ?></td>
                    <td><?= $group_emp_svk ?></td>
                    <td><?= $group_std_vtep ?></td>
                    <td><?= $group_emp_vtep ?></td>
                    <td><?= $group_std_syb ?></td>
                    <td><?= $group_emp_syb ?></td>
                    <td><?= $group_std_skg ?></td>
                    <td><?= $group_emp_skg ?></td>
                    <td><?= $group_std_xsb ?></td>
                    <td><?= $group_emp_xsb ?></td>
                    <td><?= $group_std_xkg ?></td>
                    <td><?= $group_emp_xkg ?></td>
                    <td><?= $group_std_atp ?></td>
                    <td><?= $group_emp_atp ?></td>
                </tr>
                <?php
                    $sql2 = mysqli_query($conn, "SELECT as_id,adj_id,sd.st_id,st_name,group_name,
                    std_high_school+univer+univer_valunteer+prov+intv+ad_test+std_public+emp+std_handi+std_lan+ssk+std+emp_gov+test+std_con+std_2lan+std_inter+emp_private as total,
                    std_high_school,univer,univer_valunteer,prov,intv,ad_test,std_public,emp,std_handi,std_lan,ssk,std,emp_gov,test,std_con,std_2lan,std_inter,emp_private,user_id
                    FROM statistic_detail sd
                    LEFT JOIN statatic s ON sd.st_id=s.st_id
                    LEFT JOIN statatic_group sg ON s.st_group=sg.group_id
                    WHERE adj_id='$adj_id' AND st_group='$group_id' ORDER BY sd.st_id ASC;");
                    $j = 1;
                    $st_id = "";
                    foreach($sql2 as $row2){
                        $st_id = $row2['st_id'];
                        ?>
                <tr>
                    <td><?= $i.'.'.$j ?></td>
                    <td><?= $row2['st_name'] ?></td>
                    <td><?= number_format($row2['total'],0) ?></td>
                    <td><?= number_format($row2['univer'],0) ?></td>
                    <td><?= number_format($row2['univer_valunteer'],0) ?></td>
                    <td><?= number_format($row2['emp'],0) ?></td>
                    <td><?= number_format($row2['ad_test'],0) ?></td>
                    <td><?= number_format($row2['std'],0) ?></td>
                    <td><?= number_format($row2['emp_gov'],0) ?></td>
                    <td><?= number_format($row2['emp_private'],0) ?></td>
                    <td><?= number_format($row2['intv'],0) ?></td>

                    <?php
                    $std_vte = 0;
                    $std_bke = 0;
                    $std_blk = 0;
                    $std_cps = 0;
                    $std_hph = 0;
                    $std_khm = 0;
                    $std_lnt = 0;
                    $std_lpb = 0;
                    $std_odx = 0;
                    $std_psl = 0;
                    $std_slv = 0;
                    $std_svk = 0;
                    $std_vtep = 0;
                    $std_syb = 0;
                    $std_skg = 0;
                    $std_xsb = 0;
                    $std_xkg = 0;
                    $std_atp = 0;

                    $emp_vte = 0;
                    $emp_bke = 0;
                    $emp_blk = 0;
                    $emp_cps = 0;
                    $emp_hph = 0;
                    $emp_khm = 0;
                    $emp_lnt = 0;
                    $emp_lpb = 0;
                    $emp_odx = 0;
                    $emp_psl = 0;
                    $emp_slv = 0;
                    $emp_svk = 0;
                    $emp_vtep = 0;
                    $emp_syb = 0;
                    $emp_skg = 0;
                    $emp_xsb = 0;
                    $emp_xkg = 0;
                    $emp_atp = 0;

                    $dis2 = mysqli_query($conn, "SELECT sd_id,sd.as_id,sd.p_m_id,std_qty,emp_qty,st.st_id FROM statistic_distribute sd
                      LEFT JOIN statistic_detail st ON sd.as_id=st.as_id
                      LEFT JOIN statatic s ON st.st_id=s.st_id
                      LEFT JOIN province_ministry pm ON sd.p_m_id=pm.p_m_id
                      WHERE st.st_id='$st_id' AND p_stt=1 GROUP BY sd.p_m_id ORDER BY sd.p_m_id ASC;");

                    foreach($dis2 as $data2){
                        if($data2['p_m_id'] == 1){
                        $std_vte = $data2['std_qty'];
                        $emp_vte = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 2){
                        $std_bke = $data2['std_qty'];
                        $emp_bke = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 3){
                        $std_blk = $data2['std_qty'];
                        $emp_blk = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 4){
                        $std_cps = $data2['std_qty'];
                        $emp_cps = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 5){
                        $std_hph = $data2['std_qty'];
                        $emp_hph = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 6){
                        $std_khm = $data2['std_qty'];
                        $emp_khm = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 7){
                        $std_lnt = $data2['std_qty'];
                        $emp_lnt = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 8){
                        $std_lpb = $data2['std_qty'];
                        $emp_lpb = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 9){
                        $std_odx = $data2['std_qty'];
                        $emp_odx = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 10){
                        $std_psl = $data2['std_qty'];
                        $emp_psl = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 11){
                        $std_slv = $data2['std_qty'];
                        $emp_slv = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 12){
                        $std_svk = $data2['std_qty'];
                        $emp_svk = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 13){
                        $std_vtep = $data2['std_qty'];
                        $emp_vtep = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 14){
                        $std_syb = $data2['std_qty'];
                        $emp_syb = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 15){
                        $std_skg = $data2['std_qty'];
                        $emp_skg = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 16){
                        $std_xsb = $data2['std_qty'];
                        $emp_xsb = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 17){
                        $std_xkg = $data2['std_qty'];
                        $emp_xkg = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 18){
                        $std_atp = $data2['std_qty'];
                        $emp_atp = $data2['emp_qty'];
                        }
                    }
                    ?>
                    <td><?= $std_vte ?></td>
                    <td><?= $emp_vte ?></td>
                    <td><?= $std_bke ?></td>
                    <td><?= $emp_bke ?></td>
                    <td><?= $std_blk ?></td>
                    <td><?= $emp_blk ?></td>
                    <td><?= $std_cps ?></td>
                    <td><?= $emp_cps ?></td>
                    <td><?= $std_hph ?></td>
                    <td><?= $emp_hph ?></td>
                    <td><?= $std_khm ?></td>
                    <td><?= $emp_khm ?></td>
                    <td><?= $std_lnt ?></td>
                    <td><?= $emp_lnt ?></td>
                    <td><?= $std_lpb ?></td>
                    <td><?= $emp_lpb ?></td>
                    <td><?= $std_odx ?></td>
                    <td><?= $emp_odx ?></td>
                    <td><?= $std_psl ?></td>
                    <td><?= $emp_psl ?></td>
                    <td><?= $std_slv ?></td>
                    <td><?= $emp_slv ?></td>
                    <td><?= $std_svk ?></td>
                    <td><?= $emp_svk ?></td>
                    <td><?= $std_vtep ?></td>
                    <td><?= $emp_vtep ?></td>
                    <td><?= $std_syb ?></td>
                    <td><?= $emp_syb ?></td>
                    <td><?= $std_skg ?></td>
                    <td><?= $emp_skg ?></td>
                    <td><?= $std_xsb ?></td>
                    <td><?= $emp_xsb ?></td>
                    <td><?= $std_xkg ?></td>
                    <td><?= $emp_xkg ?></td>
                    <td><?= $std_atp ?></td>
                    <td><?= $emp_atp ?></td>
                </tr>
                <?php
                        $j++;
                    }

                        $i++;
                    }
                }



                $sql = mysqli_query($conn, "SELECT u.uni_id,uni_name,dept_name,sum(get_plan) as get_plan,						
                sum(univer) as univer,
                sum(univer_valunteer) as univer_valunteer,
                sum(prov) as prov,
                sum(intv) as intv,
                sum(ad_test) as ad_test,
                sum(std_public) as std_public,
                sum(emp) as emp,
                sum(std_handi) as std_handi,
                sum(std_lan) as std_lan,
                sum(ssk) as ssk,
                sum(std) as std,
                sum(emp_gov) as emp_gov,
                sum(test) as test,
                sum(std_con) as std_con,
                sum(std_2lan) as std_2lan,
                sum(std_inter) as std_inter,
                sum(emp_private) as emp_private,
                sum(univer) + sum(univer_valunteer) + sum(prov) + sum(intv) + sum(ad_test) + sum(std_public) + sum(emp) + sum(std_handi) + sum(std_lan)+sum(ssk)+sum(std)+sum(emp_gov)+sum(test)+sum(std_con)+sum(std_2lan)+sum(std_inter)+sum(emp_private)
                AS total FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' GROUP BY u.uni_id ORDER BY uni_id ASC;");
                if(mysqli_num_rows($sql) > 0){
                    $no = 1;
                    $uni_id = "";
                    foreach($sql as $row1){
                        $roman = ConverToRoman($no);
                        $uni_id = $row1['uni_id'];
                ?>
                <tr style="background: #34a1eb;color: white">
                    <td><?= $roman ?>.</td>
                    <td class="text-left text-nowrap"><?= $row1['uni_name'] ?></td>
                    <td><?= number_format($row1['get_plan'],0) ?></td>
                    <td><?= number_format($row1['univer'],0) ?></td>
                    <td><?= number_format($row1['univer_valunteer'],0) ?></td>
                    <td><?= number_format($row1['emp'],0) ?></td>
                    <td><?= number_format($row1['ad_test'],0) ?></td>
                    <td><?= number_format($row1['std'],0) ?></td>
                    <td><?= number_format($row1['emp_gov'],0) ?></td>
                    <td><?= number_format($row1['emp_private'],0) ?></td>
                    <td><?= number_format($row1['intv'],0) ?></td>

                    <?php
                    $uni_std_vte = 0;
                    $uni_std_bke = 0;
                    $uni_std_blk = 0;
                    $uni_std_cps = 0;
                    $uni_std_hph = 0;
                    $uni_std_khm = 0;
                    $uni_std_lnt = 0;
                    $uni_std_lpb = 0;
                    $uni_std_odx = 0;
                    $uni_std_psl = 0;
                    $uni_std_slv = 0;
                    $uni_std_svk = 0;
                    $uni_std_vtep = 0;
                    $uni_std_syb = 0;
                    $uni_std_skg = 0;
                    $uni_std_xsb = 0;
                    $uni_std_xkg = 0;
                    $uni_std_atp = 0;
                    
                    $uni_emp_vte = 0;
                    $uni_emp_bke = 0;
                    $uni_emp_blk = 0;
                    $uni_emp_cps = 0;
                    $uni_emp_hph = 0;
                    $uni_emp_khm = 0;
                    $uni_emp_lnt = 0;
                    $uni_emp_lpb = 0;
                    $uni_emp_odx = 0;
                    $uni_emp_psl = 0;
                    $uni_emp_slv = 0;
                    $uni_emp_svk = 0;
                    $uni_emp_vtep = 0;
                    $uni_emp_syb = 0;
                    $uni_emp_skg = 0;
                    $uni_emp_xsb = 0;
                    $uni_emp_xkg = 0;
                    $uni_emp_atp = 0;

                    $uni_quota = mysqli_query($conn, "SELECT id,q.d_id,q.p_m_id,p_m_name,sum(std_qty) as std_qty,sum(emp_qty) as emp_qty,a.course_id,course_name,fac_name FROM quota_distribute q 
                    LEFT JOIN adjustdetail a ON q.d_id=a.d_id
                    LEFT JOIN province_ministry pm ON q.p_m_id=pm.p_m_id
                    LEFT JOIN course c ON a.course_id=c.course_id
                    LEFT JOIN faculty f ON c.fac_id=f.fac_id
                    LEFT JOIN university u ON f.uni_id=u.uni_id
                    WHERE f.uni_id='$uni_id' AND p_stt=1 GROUP BY q.p_m_id ORDER BY q.p_m_id ASC;");

                    if(mysqli_num_rows($uni_quota) > 0){
                        foreach($uni_quota as $data3){
                        if($data3['p_m_id'] == 1){
                            $uni_std_vte = $data3['std_qty'];
                            $uni_emp_vte = $data3['emp_qty'];
                        }

                            if($data3['p_m_id'] == 2){
                            $uni_std_bke = $data3['std_qty'];
                            $uni_emp_bke = $data3['emp_qty'];
                        }

                        
                        if($data3['p_m_id'] == 3){
                            $uni_std_blk = $data3['std_qty'];
                            $uni_emp_blk = $data3['emp_qty'];
                        }

                        
                        if($data3['p_m_id'] == 4){
                            $uni_std_cps = $data3['std_qty'];
                            $uni_emp_cps = $data3['emp_qty'];
                        }

                        
                        if($data3['p_m_id'] == 5){
                            $uni_std_hph = $data3['std_qty'];
                            $uni_emp_hph = $data3['emp_qty'];
                        }

                        
                        if($data3['p_m_id'] == 6){
                            $uni_std_khm = $data3['std_qty'];
                            $uni_emp_khm = $data3['emp_qty'];
                        }

                        
                        if($data3['p_m_id'] == 7){
                            $uni_std_lnt = $data3['std_qty'];
                            $uni_emp_lnt = $data3['emp_qty'];
                        }

                        
                        if($data3['p_m_id'] == 8){
                            $uni_std_lpb = $data3['std_qty'];
                            $uni_emp_lpb = $data3['emp_qty'];
                        }

                        
                        if($data3['p_m_id'] == 9){
                            $uni_std_odx = $data3['std_qty'];
                            $uni_emp_odx = $data3['emp_qty'];
                        }

                        
                        if($data3['p_m_id'] == 10){
                            $uni_std_psl = $data3['std_qty'];
                            $uni_emp_psl = $data3['emp_qty'];
                        }

                        if($data3['p_m_id'] == 11){
                            $uni_std_slv = $data3['std_qty'];
                            $uni_emp_slv = $data3['emp_qty'];
                        }

                        if($data3['p_m_id'] == 12){
                            $uni_std_svk = $data3['std_qty'];
                            $uni_emp_svk = $data3['emp_qty'];
                        }

                        if($data3['p_m_id'] == 13){
                            $uni_std_vtep = $data3['std_qty'];
                            $uni_emp_vtep = $data3['emp_qty'];
                        }

                        if($data3['p_m_id'] == 14){
                            $uni_std_syb = $data3['std_qty'];
                            $uni_emp_syb = $data3['emp_qty'];
                        }

                        if($data3['p_m_id'] == 15){
                            $uni_std_skg = $data3['std_qty'];
                            $uni_emp_skg = $data3['emp_qty'];
                        }

                        if($data3['p_m_id'] == 16){
                            $uni_std_xsb = $data3['std_qty'];
                            $uni_emp_xsb = $data3['emp_qty'];
                        }

                        if($data3['p_m_id'] == 17){
                            $uni_std_xkg = $data3['std_qty'];
                            $uni_emp_xkg = $data3['emp_qty'];
                        }

                        if($data3['p_m_id'] == 18){
                            $uni_std_atp = $data3['std_qty'];
                            $uni_emp_atp = $data3['emp_qty'];
                        }
                        }
                    }
                    ?>
                    <td><?= number_format($uni_std_vte,0) ?></td>
                    <td><?= number_format($uni_emp_vte,0) ?></td>
                    <td><?= number_format($uni_std_bke,0) ?></td>
                    <td><?= number_format($uni_emp_bke,0) ?></td>
                    <td><?= number_format($uni_std_blk,0) ?></td>
                    <td><?= number_format($uni_emp_blk,0) ?></td>
                    <td><?= number_format($uni_std_cps,0) ?></td>
                    <td><?= number_format($uni_emp_cps,0) ?></td>
                    <td><?= number_format($uni_std_hph,0) ?></td>
                    <td><?= number_format($uni_emp_hph,0) ?></td>
                    <td><?= number_format($uni_std_khm,0) ?></td>
                    <td><?= number_format($uni_emp_khm,0) ?></td>
                    <td><?= number_format($uni_std_lnt,0) ?></td>
                    <td><?= number_format($uni_emp_lnt,0) ?></td>
                    <td><?= number_format($uni_std_lpb,0) ?></td>
                    <td><?= number_format($uni_emp_lpb,0) ?></td>
                    <td><?= number_format($uni_std_odx,0) ?></td>
                    <td><?= number_format($uni_emp_odx,0) ?></td>
                    <td><?= number_format($uni_std_psl,0) ?></td>
                    <td><?= number_format($uni_emp_psl,0) ?></td>
                    <td><?= number_format($uni_std_slv,0) ?></td>
                    <td><?= number_format($uni_emp_slv,0) ?></td>
                    <td><?= number_format($uni_std_svk,0) ?></td>
                    <td><?= number_format($uni_emp_svk,0) ?></td>
                    <td><?= number_format($uni_std_vtep,0) ?></td>
                    <td><?= number_format($uni_emp_vtep,0) ?></td>
                    <td><?= number_format($uni_std_syb,0) ?></td>
                    <td><?= number_format($uni_emp_syb,0) ?></td>
                    <td><?= number_format($uni_std_skg,0) ?></td>
                    <td><?= number_format($uni_emp_skg,0) ?></td>
                    <td><?= number_format($uni_std_xsb,0) ?></td>
                    <td><?= number_format($uni_emp_xsb,0) ?></td>
                    <td><?= number_format($uni_std_xkg,0) ?></td>
                    <td><?= number_format($uni_emp_xkg,0) ?></td>
                    <td><?= number_format($uni_std_atp,0) ?></td>
                    <td><?= number_format($uni_emp_atp,0) ?></td>
                </tr>
                <?php
                $sql2 = mysqli_query($conn, "SELECT u.uni_id,uni_name,f.fac_id,fac_name,dept_name,sum(get_plan) as get_plan,
                sum(univer) as univer,
                sum(univer_valunteer) as univer_valunteer,
                sum(prov) as prov,
                sum(intv) as intv,
                sum(ad_test) as ad_test,
                sum(std_public) as std_public,
                sum(emp) as emp,
                sum(std_handi) as std_handi, 
                sum(std_lan) as std_lan,
                sum(ssk) as ssk,
                sum(std) as std,
                sum(emp_gov) as emp_gov,
                sum(test) as test,
                sum(std_con) as std_con,
                sum(std_2lan) as std_2lan,
                sum(std_inter) as std_inter,
                sum(emp_private) as emp_private,
                
                sum(univer)+sum(univer_valunteer)+sum(prov)+sum(intv)+sum(ad_test)+sum(std_public)+sum(emp)+sum(std_handi)+sum(std_lan)+sum(ssk)+sum(std)+sum(emp_gov)+sum(test)+sum(std_con)+sum(std_2lan)+sum(std_inter)+sum(emp_private) as total_fac
                FROM adjustdetail ad
                LEFT JOIN course c ON ad.course_id=c.course_id
                LEFT JOIN faculty f ON c.fac_id=f.fac_id
                LEFT JOIN university u ON f.uni_id=u.uni_id
                LEFT JOIN department d ON u.dept_id=d.dept_id
                LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$uni_id' GROUP BY f.fac_id ORDER BY fac_id ASC;");
                $i = 1;
                $fac_id = "";
                foreach($sql2 as $row2){
                    $fac_id = $row2['fac_id'];
                ?>
                <tr  style="background: #ade1f7">
                    <td><?= $roman.'.'.$i ?></td>
                    <td class="text-nowrap text-left"><?= $row2['fac_name'] ?></td>
                    <td><?= number_format($row2['get_plan'],0) ?></td>
                    <td><?= number_format($row2['univer'],0) ?></td>
                    <td><?= number_format($row2['univer_valunteer'],0) ?></td>
                    <td><?= number_format($row2['emp'],0) ?></td>
                    <td><?= number_format($row2['ad_test'],0) ?></td>
                    <td><?= number_format($row2['std'],0) ?></td>
                    <td><?= number_format($row2['emp_gov'],0) ?></td>
                    <td><?= number_format($row2['emp_private'],0) ?></td>
                    <td><?= number_format($row2['intv'],0) ?></td>

                    <?php
                    $fac_std_vte = 0;
                    $fac_std_bke = 0;
                    $fac_std_blk = 0;
                    $fac_std_cps = 0;
                    $fac_std_hph = 0;
                    $fac_std_khm = 0;
                    $fac_std_lnt = 0;
                    $fac_std_lpb = 0;
                    $fac_std_odx = 0;
                    $fac_std_psl = 0;
                    $fac_std_slv = 0;
                    $fac_std_svk = 0;
                    $fac_std_vtep = 0;
                    $fac_std_syb = 0;
                    $fac_std_skg = 0;
                    $fac_std_xsb = 0;
                    $fac_std_xkg = 0;
                    $fac_std_atp = 0;
                    
                    $fac_emp_vte = 0;
                    $fac_emp_bke = 0;
                    $fac_emp_blk = 0;
                    $fac_emp_cps = 0;
                    $fac_emp_hph = 0;
                    $fac_emp_khm = 0;
                    $fac_emp_lnt = 0;
                    $fac_emp_lpb = 0;
                    $fac_emp_odx = 0;
                    $fac_emp_psl = 0;
                    $fac_emp_slv = 0;
                    $fac_emp_svk = 0;
                    $fac_emp_vtep = 0;
                    $fac_emp_syb = 0;
                    $fac_emp_skg = 0;
                    $fac_emp_xsb = 0;
                    $fac_emp_xkg = 0;
                    $fac_emp_atp = 0;

                    $fac_quota = mysqli_query($conn, "SELECT id,q.d_id,q.p_m_id,p_m_name,sum(std_qty) as std_qty,sum(emp_qty) as emp_qty,a.course_id,course_name,fac_name FROM quota_distribute q 
                    LEFT JOIN adjustdetail a ON q.d_id=a.d_id
                    LEFT JOIN province_ministry pm ON q.p_m_id=pm.p_m_id
                    LEFT JOIN course c ON a.course_id=c.course_id
                    LEFT JOIN faculty f ON c.fac_id=f.fac_id
                    WHERE c.fac_id='$fac_id' AND p_stt=1 GROUP BY q.p_m_id ORDER BY q.p_m_id ASC;");
                    if(mysqli_num_rows($fac_quota) > 0){
                        foreach($fac_quota as $data2){
                          if($data2['p_m_id'] == 1){
                            $fac_std_vte = $data2['std_qty'];
                            $fac_emp_vte = $data2['emp_qty'];
                          }
 
                            if($data2['p_m_id'] == 2){
                            $fac_std_bke = $data2['std_qty'];
                            $fac_emp_bke = $data2['emp_qty'];
                          }
 
                          
                          if($data2['p_m_id'] == 3){
                            $fac_std_blk = $data2['std_qty'];
                            $fac_emp_blk = $data2['emp_qty'];
                          }
 
                          
                          if($data2['p_m_id'] == 4){
                            $fac_std_cps = $data2['std_qty'];
                            $fac_emp_cps = $data2['emp_qty'];
                          }
 
                          
                          if($data2['p_m_id'] == 5){
                            $fac_std_hph = $data2['std_qty'];
                            $fac_emp_hph = $data2['emp_qty'];
                          }
 
                          
                          if($data2['p_m_id'] == 6){
                            $fac_std_khm = $data2['std_qty'];
                            $fac_emp_khm = $data2['emp_qty'];
                          }
 
                          
                          if($data2['p_m_id'] == 7){
                            $fac_std_lnt = $data2['std_qty'];
                            $fac_emp_lnt = $data2['emp_qty'];
                          }
 
                          
                          if($data2['p_m_id'] == 8){
                            $fac_std_lpb = $data2['std_qty'];
                            $fac_emp_lpb = $data2['emp_qty'];
                          }
 
                          
                          if($data2['p_m_id'] == 9){
                            $fac_std_odx = $data2['std_qty'];
                            $fac_emp_odx = $data2['emp_qty'];
                          }
 
                          
                          if($data2['p_m_id'] == 10){
                            $fac_std_psl = $data2['std_qty'];
                            $fac_emp_psl = $data2['emp_qty'];
                          }
 
                          if($data2['p_m_id'] == 11){
                            $fac_std_slv = $data2['std_qty'];
                            $fac_emp_slv = $data2['emp_qty'];
                          }
 
                          if($data2['p_m_id'] == 12){
                            $fac_std_svk = $data2['std_qty'];
                            $fac_emp_svk = $data2['emp_qty'];
                          }
 
                          if($data2['p_m_id'] == 13){
                            $fac_std_vtep = $data2['std_qty'];
                            $fac_emp_vtep = $data2['emp_qty'];
                          }
 
                          if($data2['p_m_id'] == 14){
                            $fac_std_syb = $data2['std_qty'];
                            $fac_emp_syb = $data2['emp_qty'];
                          }
 
                          if($data2['p_m_id'] == 15){
                            $fac_std_skg = $data2['std_qty'];
                            $fac_emp_skg = $data2['emp_qty'];
                          }
 
                          if($data2['p_m_id'] == 16){
                            $fac_std_xsb = $data2['std_qty'];
                            $fac_emp_xsb = $data2['emp_qty'];
                          }
 
                          if($data2['p_m_id'] == 17){
                            $fac_std_xkg = $data2['std_qty'];
                            $fac_emp_xkg = $data2['emp_qty'];
                          }
 
                          if($data2['p_m_id'] == 18){
                            $fac_std_atp = $data2['std_qty'];
                            $fac_emp_atp = $data2['emp_qty'];
                          }
                        }
                      }
                    ?>

                    <td><?= number_format($fac_std_vte,0) ?></td>
                    <td><?= number_format($fac_emp_vte,0) ?></td>
                    <td><?= number_format($fac_std_bke,0) ?></td>
                    <td><?= number_format($fac_emp_bke,0) ?></td>
                    <td><?= number_format($fac_std_blk,0) ?></td>
                    <td><?= number_format($fac_emp_blk,0) ?></td>
                    <td><?= number_format($fac_std_cps,0) ?></td>
                    <td><?= number_format($fac_emp_cps,0) ?></td>
                    <td><?= number_format($fac_std_hph,0) ?></td>
                    <td><?= number_format($fac_emp_hph,0) ?></td>
                    <td><?= number_format($fac_std_khm,0) ?></td>
                    <td><?= number_format($fac_emp_khm,0) ?></td>
                    <td><?= number_format($fac_std_lnt,0) ?></td>
                    <td><?= number_format($fac_emp_lnt,0) ?></td>
                    <td><?= number_format($fac_std_lpb,0) ?></td>
                    <td><?= number_format($fac_emp_lpb,0) ?></td>
                    <td><?= number_format($fac_std_odx,0) ?></td>
                    <td><?= number_format($fac_emp_odx,0) ?></td>
                    <td><?= number_format($fac_std_psl,0) ?></td>
                    <td><?= number_format($fac_emp_psl,0) ?></td>
                    <td><?= number_format($fac_std_slv,0) ?></td>
                    <td><?= number_format($fac_emp_slv,0) ?></td>
                    <td><?= number_format($fac_std_svk,0) ?></td>
                    <td><?= number_format($fac_emp_svk,0) ?></td>
                    <td><?= number_format($fac_std_vtep,0) ?></td>
                    <td><?= number_format($fac_emp_vtep,0) ?></td>
                    <td><?= number_format($fac_std_syb,0) ?></td>
                    <td><?= number_format($fac_emp_syb,0) ?></td>
                    <td><?= number_format($fac_std_skg,0) ?></td>
                    <td><?= number_format($fac_emp_skg,0) ?></td>
                    <td><?= number_format($fac_std_xsb,0) ?></td>
                    <td><?= number_format($fac_emp_xsb,0) ?></td>
                    <td><?= number_format($fac_std_xkg,0) ?></td>
                    <td><?= number_format($fac_emp_xkg,0) ?></td>
                    <td><?= number_format($fac_std_atp,0) ?></td>
                    <td><?= number_format($fac_emp_atp,0) ?></td>
                </tr>
                <?php
                    $sql3 = mysqli_query($conn, "SELECT d_id,u.uni_id,uni_name,f.fac_id,fac_name,dept_name,ad.course_id,course_name,get_plan,univer,univer_valunteer,prov,intv,ad_test,std_public,emp,std_handi,std_lan,ssk,std,emp_gov,test,std_con,std_2lan,std_inter,emp_private,
                    univer+univer_valunteer+prov+intv+ad_test+std_public+emp+std_handi+std_lan+ssk+std+emp_gov+test+std_con+std_2lan+std_inter+emp_private as total_course,level_name
                    FROM adjustdetail ad
                    LEFT JOIN course c ON ad.course_id=c.course_id
                    LEFT JOIN faculty f ON c.fac_id=f.fac_id
                    LEFT JOIN university u ON f.uni_id=u.uni_id
                    LEFT JOIN department d ON u.dept_id=d.dept_id
                    LEFT JOIN adjust a ON ad.adj_id=a.adj_id
                    LEFT JOIN course_level lv ON c.level_id=lv.level_id
                    WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' AND f.uni_id='$uni_id' AND c.fac_id='$fac_id' ORDER BY level_name ASC,course_id ASC;");
                    $j = 1;
                    $course_id = "";
                    foreach($sql3 as $row3){
                        $course_id=$row3['course_id'];
                ?>
                <tr>
                    <td><?= $j ?>.</td>
                    <td class="text-nowrap" style="text-align: left;"><?= $row3['course_name'] ?></td>
                    <td><?= number_format($row3['get_plan'],0) ?></td>
                    <td><?= number_format($row3['univer'],0) ?></td>
                    <td><?= number_format($row3['univer_valunteer'],0) ?></td>
                    <td><?= number_format($row3['emp'],0) ?></td>
                    <td><?= number_format($row3['ad_test'],0) ?></td>
                    <td><?= number_format($row3['std'],0) ?></td>
                    <td><?= number_format($row3['emp_gov'],0) ?></td>
                    <td><?= number_format($row3['emp_private'],0) ?></td>
                    <td><?= number_format($row3['intv'],0) ?></td>

                    <?php
                    $std_vte = 0;
                    $std_bke = 0;
                    $std_blk = 0;
                    $std_cps = 0;
                    $std_hph = 0;
                    $std_khm = 0;
                    $std_lnt = 0;
                    $std_lpb = 0;
                    $std_odx = 0;
                    $std_psl = 0;
                    $std_slv = 0;
                    $std_svk = 0;
                    $std_vtep = 0;
                    $std_syb = 0;
                    $std_skg = 0;
                    $std_xsb = 0;
                    $std_xkg = 0;
                    $std_atp = 0;
                    
                    $emp_vte = 0;
                    $emp_bke = 0;
                    $emp_blk = 0;
                    $emp_cps = 0;
                    $emp_hph = 0;
                    $emp_khm = 0;
                    $emp_lnt = 0;
                    $emp_lpb = 0;
                    $emp_odx = 0;
                    $emp_psl = 0;
                    $emp_slv = 0;
                    $emp_svk = 0;
                    $emp_vtep = 0;
                    $emp_syb = 0;
                    $emp_skg = 0;
                    $emp_xsb = 0;
                    $emp_xkg = 0;
                    $emp_atp = 0;

                    $course_quota = mysqli_query($conn, "SELECT id,q.d_id,q.p_m_id,p_m_name,std_qty,emp_qty,course_id FROM quota_distribute q 
                    LEFT JOIN adjustdetail a ON q.d_id=a.d_id
                    LEFT JOIN province_ministry pm ON q.p_m_id=pm.p_m_id
                    WHERE course_id='$course_id' AND p_stt=1 ORDER BY q.p_m_id ASC;");

                    if(mysqli_num_rows($course_quota) > 0){
                        foreach($course_quota as $data){
                        if($data['p_m_id'] == 1){
                            $std_vte = $data['std_qty'];
                            $emp_vte = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 2){
                            $std_bke = $data['std_qty'];
                            $emp_bke = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 3){
                            $std_blk = $data['std_qty'];
                            $emp_blk = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 4){
                            $std_cps = $data['std_qty'];
                            $emp_cps = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 5){
                            $std_hph = $data['std_qty'];
                            $emp_hph = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 6){
                            $std_khm = $data['std_qty'];
                            $emp_khm = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 7){
                            $std_lnt = $data['std_qty'];
                            $emp_lnt = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 8){
                            $std_lpb = $data['std_qty'];
                            $emp_lpb = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 9){
                            $std_odx = $data['std_qty'];
                            $emp_odx = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 10){
                            $std_psl = $data['std_qty'];
                            $emp_psl = $data['emp_qty'];
                        }
                        
                        if($data['p_m_id'] == 11){
                            $std_slv = $data['std_qty'];
                            $emp_slv = $data['emp_qty'];
                        }
                        
                        if($data['p_m_id'] == 12){
                            $std_svk = $data['std_qty'];
                            $emp_svk = $data['emp_qty'];
                        }
                        
                        if($data['p_m_id'] == 13){
                            $std_vtep = $data['std_qty'];
                            $emp_vtep = $data['emp_qty'];
                        }
                        
                        if($data['p_m_id'] == 14){
                            $std_syb = $data['std_qty'];
                            $emp_syb = $data['emp_qty'];
                        }
                        
                        if($data['p_m_id'] == 15){
                            $std_skg = $data['std_qty'];
                            $emp_skg = $data['emp_qty'];
                        }
                        
                        if($data['p_m_id'] == 16){
                            $std_xsb = $data['std_qty'];
                            $emp_xsb = $data['emp_qty'];
                        }
                        
                        if($data['p_m_id'] == 17){
                            $std_xkg = $data['std_qty'];
                            $emp_xkg = $data['emp_qty'];
                        }
                        
                        if($data['p_m_id'] == 18){
                            $std_atp = $data['std_qty'];
                            $emp_atp = $data['emp_qty'];
                        }
                    }
                }
                    ?>
                    <td><?= number_format($std_vte,0) ?></td>
                    <td><?= number_format($emp_vte,0) ?></td>
                    <td><?= number_format($std_bke,0) ?></td>
                    <td><?= number_format($emp_bke,0) ?></td>
                    <td><?= number_format($std_blk,0) ?></td>
                    <td><?= number_format($emp_blk,0) ?></td>
                    <td><?= number_format($std_cps,0) ?></td>
                    <td><?= number_format($emp_cps,0) ?></td>
                    <td><?= number_format($std_hph,0) ?></td>
                    <td><?= number_format($emp_hph,0) ?></td>
                    <td><?= number_format($std_khm,0) ?></td>
                    <td><?= number_format($emp_khm,0) ?></td>
                    <td><?= number_format($std_lnt,0) ?></td>
                    <td><?= number_format($emp_lnt,0) ?></td>
                    <td><?= number_format($std_lpb,0) ?></td>
                    <td><?= number_format($emp_lpb,0) ?></td>
                    <td><?= number_format($std_odx,0) ?></td>
                    <td><?= number_format($emp_odx,0) ?></td>
                    <td><?= number_format($std_psl,0) ?></td>
                    <td><?= number_format($emp_psl,0) ?></td>
                    <td><?= number_format($std_slv,0) ?></td>
                    <td><?= number_format($emp_slv,0) ?></td>
                    <td><?= number_format($std_svk,0) ?></td>
                    <td><?= number_format($emp_svk,0) ?></td>
                    <td><?= number_format($std_vtep,0) ?></td>
                    <td><?= number_format($emp_vtep,0) ?></td>
                    <td><?= number_format($std_syb,0) ?></td>
                    <td><?= number_format($emp_syb,0) ?></td>
                    <td><?= number_format($std_skg,0) ?></td>
                    <td><?= number_format($emp_skg,0) ?></td>
                    <td><?= number_format($std_xsb,0) ?></td>
                    <td><?= number_format($emp_xsb,0) ?></td>
                    <td><?= number_format($std_xkg,0) ?></td>
                    <td><?= number_format($emp_xkg,0) ?></td>
                    <td><?= number_format($std_atp,0) ?></td>
                    <td><?= number_format($emp_atp,0) ?></td>
                </tr>
                <?php
                $j++;
                    }
                $i++;
                }
                $no++;
                }
            }
                ?>
            </tbody>
        </table>

    </div>

    <!-- ກົມອາຊີວະສຶກສາ -->
    <div class="table-responsive">

        <table class="table table-bordered text-center">
            <thead class="table-primary">
                <tr>
                    <th rowspan="2">ລ.ດ</th>
                    <th rowspan="2">ລາຍລະອຽດ</th>
                    <th rowspan="2">ລວມ</th>
                    <th colspan="2">ແບ່ງປັນ</th>
                    <th colspan="2">ສອບເສັງເຂົ້າ</th>
                    <th rowspan="2">ນະໂຍບາຍ</th>
                    <th rowspan="2">ຊາວໜຸ່ມແຮກສ່ຽວ</th>
                    <th rowspan="2">ກ/ຊ ສຶກສາ</th>
                    <th rowspan="2">ພ/ງ ສະຖາບັນອະຊີວະແບ່ງເອງ</th>
                    <th rowspan="2">ພ/ງ ກ/ຊ ອື່ນ</th>
                    <th rowspan="2">ກ/ຊ ປ້ອງກັນປະເທດ</th>
                </tr>
                <tr>
                    <th>ສຳພາດ</th>
                    <th>ພ/ງ</th>
                    <th>ບໍ່ຈ່າຍຄ່າຮຽນ</th>
                    <th>ຈ່າຍຄ່າຮຽນ</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>

    <!-- ກົມກິລາລະດັບສູງ -->
    <div class="table-responsive">

        <table class="table table-bordered text-center">
            <thead class="table-primary">
                <tr>
                    <th rowspan="3">ລ.ດ</th>
                    <th rowspan="3">ລາຍລະອຽດ</th>
                    <th rowspan="3">ລວມ</th>
                    <th colspan="3">ແບ່ງປັນ</th>
                    <th colspan="2">ສອບເສັງເຂົ້າ</th>
                </tr>
                <tr>
                    <th colspan="2">ນັກຮຽນ</th>
                    <th rowspan="2">ພ/ງ</th>
                    <th rowspan="2">ບໍ່ຈ່າຍຄ່າຮຽນ</th>
                    <th rowspan="2">ຈ່າຍຄ່າຮຽນ</th>
                </tr>
                <tr>
                    <th>ສະຖາບັນແບ່ງ</th>
                    <th>ແຂວງແບ່ງ</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>

    <!-- ກະຊວງຕ່າງໆທີ່ມີໂຮງຮຽນຂື້ນກັບ -->
    <div class="table-responsive">

        <table class="table table-bordered text-center">
            <thead class="table-primary">
                <tr>
                    <th rowspan="2" class="text-nowrap">ລາຍລະອຽດ</th>
                    <th colspan="3">ແບ່ງປັນ</th>
                    <th rowspan="2">ສອບເສັງເຂົ້າ</th>
                    <th colspan="3">ຈ່າຍຄ່າຮຽນ</th>
                    <th rowspan="2">ນ/ຮ ເມືອງທຸກ</th>
                    <th rowspan="2">ສຳພາດ</th>
                    <th colspan="2">ນະຄອນຫຼວງ</th>
                    <th colspan="2">ຜົ້ງສາລີ</th>
                    <th colspan="2">ຫຼວງນ້ຳທາ</th>
                    <th colspan="2">ອຸດົມໄຊ</th>
                    <th colspan="2">ບໍແກ້ວ</th>
                    <th colspan="2">ຫຼວງພະບາງ</th>
                    <th colspan="2">ຫົວພັນ</th>
                    <th colspan="2">ໄຊຍະບູລີ</th>
                    <th colspan="2">ຊຽງຂວາງ</th>
                    <th colspan="2">ວຽງຈັນ</th>
                    <th colspan="2">ໄຊສົມບູນ</th>
                    <th colspan="2">ບໍລິຄຳໄຊ</th>
                    <th colspan="2">ຄຳມວນ</th>
                    <th colspan="2">ສະຫວັນນະເຂດ</th>
                    <th colspan="2">ສາລະວັນ</th>
                    <th colspan="2">ເຊກອງ</th>
                    <th colspan="2">ຈຳປາຊັກ</th>
                    <th colspan="2">ອັດຕະປື</th>
                </tr>
                <tr>
                    <th class="rotate"><span>ນ/ຮ ສາມັນຮຽນເກັ່ງ</span></th>
                    <th class="rotate"><span>ພ/ງ</span></th>
                    <th class="rotate"><span>ສສກ ແບ່ງ</span></th>
                    <th class="rotate"><span>ພ/ງ</span></th>
                    <th class="rotate"><span>ນ/ຮ ສາມັນ</span></th>
                    <th class="rotate"><span>ນ/ຮ ຕໍ່ເນື່ອງ</span></th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                    <th class="text-nowrap">ນ/ຮ</th>
                    <th class="text-nowrap">ພ/ງ</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>

    <!-- ພາກເອກະຊົນ -->
    <div class="table-responsive">

        <table class="table table-bordered text-center">
            <thead class="table-primary">
                <tr>
                    <th rowspan="3">ລ.ດ</th>
                    <th rowspan="3">ລາຍລະອຽດ</th>
                    <th rowspan="3">ລວມ</th>
                    <th colspan="3">ແບ່ງປັນ</th>
                    <th colspan="2">ສອບເສັງເຂົ້າ</th>
                </tr>
                <tr>
                    <th colspan="2">ນັກຮຽນ</th>
                    <th rowspan="2">ພ/ງ</th>
                    <th rowspan="2">ບໍ່ຈ່າຍຄ່າຮຽນ</th>
                    <th rowspan="2">ຈ່າຍຄ່າຮຽນ</th>
                </tr>
                <tr>
                    <th>ສະຖາບັນແບ່ງ</th>
                    <th>ແຂວງແບ່ງ</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</html>