<?php
    global $table;

    

    $table .= '
    <style>
thead th {
    /* color: #000 !important; */
    vertical-align: middle !important;
}

tr:first-of-type th:nth-of-type(5),
tr:nth-of-type(2) th:nth-of-type(6),
td:nth-of-type(11) {
    border-right: 2px solid #000;
}

.tscroll {
  height: 900px !important;
}

.tscroll table tr:nth-of-type(2) th {
  top: 49px !important;
}

.tscroll table tr:nth-of-type(3) th{
  top: 99px !important;
}
</style>

<div class="table-responsive tscroll">

    <table class="table table-bordered text-center">
        <thead class="table-primary">
            <tr>
                <th rowspan="3">ລ/ດ</th>
                <th rowspan="3">ລາຍລະອຽດ</th>
                <th rowspan="3">ລວມ</th>
                <th colspan="4">ແບ່ງປັນ</th>
                <th colspan="4">ຈ່າຍຄ່າຮຽນ</th>
                <th class="rotate-text" colspan="2">ນະຄອນຫຼວງ</th>
                <th class="rotate-text" colspan="2">ບໍແກ້ວ</th>
                <th class="rotate-text" colspan="2">ບໍລິຄຳໄຊ</th>
                <th class="rotate-text" colspan="2">ຈຳປາຊັກ</th>
                <th class="rotate-text" colspan="2">ຫົວພັນ</th>
                <th class="rotate-text" colspan="2">ຄຳມວນ</th>
                <th class="rotate-text" colspan="2">ຫຼວງນ້ຳທາ</th>
                <th class="rotate-text" colspan="2">ຫຼວງພະບາງ</th>
                <th class="rotate-text" colspan="2">ອຸດົມໄຊ</th>
                <th class="rotate-text" colspan="2">ຜົງສາລີ</th>
                <th class="rotate-text" colspan="2">ສາລະວັນ</th>
                <th class="rotate-text" colspan="2">ສະຫວັນນະເຂດ</th>
                <th class="rotate-text" colspan="2">ວຽງຈັນ</th>
                <th class="rotate-text" colspan="2">ໄຊຍະບູລີ</th>
                <th class="rotate-text" colspan="2">ເຊກອງ</th>
                <th class="rotate-text" colspan="2">ໄຊສົມບູນ</th>
                <th class="rotate-text" colspan="2">ຊຽງຂວາງ</th>
                <th class="rotate-text" colspan="2">ອັດຕະປື</th>
                <th class="rotate-text" rowspan="3">ຊາວໜຸ່ມແຮກສ່ຽວ</th>
                <th class="rotate-text" rowspan="3">ກ/ຊ ສຶກສາ</th>
                <th class="rotate-text" rowspan="3">ພ/ງ ກ/ຊ ອື່ນ</th>
                <th class="rotate-text" rowspan="3">ພ/ງ ກະຊວງປ້ອງກັນປະເທດ</th>
            </tr>
            <tr>
                <th colspan="3" class="text-nowrap">ນັກຮຽນ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
                <th rowspan="2">ພ/ງ</th>
                <th rowspan="2">ນ/ຮ</th>
                <th rowspan="2">ນ/ຮ ຕໍ່ເນື່ອງ</th>
                <th rowspan="2">ຊາວໜຸ່ມແຮກສ່ຽວ</th>
                <th rowspan="2" class="text-nowrap">ນ/ຮ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
                <th rowspan="2" class="text-nowrap">ນ/ຮ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
                <th rowspan="2" class="text-nowrap">ນ/ຮ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
                <th rowspan="2" class="text-nowrap">ນ/ຮ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
                <th rowspan="2" class="text-nowrap">ນ/ຮ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
                <th rowspan="2" class="text-nowrap">ນ/ຮ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
                <th rowspan="2" class="text-nowrap">ນ/ຮ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
                <th rowspan="2" class="text-nowrap">ນ/ຮ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
                <th rowspan="2" class="text-nowrap">ນ/ຮ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
                <th rowspan="2" class="text-nowrap">ນ/ຮ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
                <th rowspan="2" class="text-nowrap">ນ/ຮ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
                <th rowspan="2" class="text-nowrap">ນ/ຮ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
                <th rowspan="2" class="text-nowrap">ນ/ຮ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
                <th rowspan="2" class="text-nowrap">ນ/ຮ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
                <th rowspan="2" class="text-nowrap">ນ/ຮ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
                <th rowspan="2" class="text-nowrap">ນ/ຮ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
                <th rowspan="2" class="text-nowrap">ນ/ຮ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
                <th rowspan="2" class="text-nowrap">ນ/ຮ</th>
                <th rowspan="2" class="text-nowrap">ພ/ງ</th>
            </tr>
            <tr>
                <th>ມະຫາວິທະຍາໄລເລືອກ(ໃນແຜນ)</th>
                <th>
                    ມະຫາວິທະຍາໄລເລືອກແບ່ງໃຫ້ຄູອາສາສະໝັກມາຮຽນລະບົບຕໍ່ເນື່ອງ (ໃນແຜນ)</th>
                <th>ແຂວງ/ນະຄອນຫຼວງເລືອກ</th>
            </tr>
        </thead>
        <tbody>
';

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
                $i=0;
                $group_id="";
                if(mysqli_num_rows($sql) > 0){
                foreach($sql as $row){
                  $i++;
                  $group_id = $row['st_group'];


            $table .= '<tr style="background: #34a1eb;color: white">
            <td>'. $i .'</td>
            <td style="white-space: nowrap;">'. $row['group_name'] .'</td>
            <td>'. number_format($row['total'],0) .'</td>
            <td>'. number_format($row['univer'],0) .'</td>
            <td>'. number_format($row['univer_valunteer'],0) .'</td>
            <td>'. number_format($row['emp'],0) .'</td>
            <td>'. number_format($row['prov'],0) .'</td>
            <td>'. number_format($row['emp_gov'],0) .'</td>
            <td>'. number_format($row['std'],0) .'</td>
            <td>'. number_format($row['std_con'],0) .'</td>
            <td>0</td>';
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

                      $dis = mysqli_query($conn, "SELECT sd_id,sd.as_id,p_m_id,SUM(std_qty) AS std_qty,SUM(emp_qty) AS emp_qty,st.st_id FROM statistic_distribute sd
                      LEFT JOIN statistic_detail st ON sd.as_id=st.as_id
                      LEFT JOIN statatic s ON st.st_id=s.st_id
                      WHERE st_group='$group_id' GROUP BY p_m_id ORDER BY p_m_id ASC");
                      foreach($dis as $data){
                        if($data['p_m_id'] == 1){
                          $uni_std_vte = $data['std_qty'];
                          $uni_emp_vte = $data['emp_qty'];
                        }

                          if($data['p_m_id'] == 2){
                          $uni_std_bke = $data['std_qty'];
                          $uni_emp_bke = $data['emp_qty'];
                        }

                        
                        if($data['p_m_id'] == 3){
                          $uni_std_blk = $data['std_qty'];
                          $uni_emp_blk = $data['emp_qty'];
                        }

                        
                        if($data['p_m_id'] == 4){
                          $uni_std_cps = $data['std_qty'];
                          $uni_emp_cps = $data['emp_qty'];
                        }

                        
                        if($data['p_m_id'] == 5){
                          $uni_std_hph = $data['std_qty'];
                          $uni_emp_hph = $data['emp_qty'];
                        }

                        
                        if($data['p_m_id'] == 6){
                          $uni_std_khm = $data['std_qty'];
                          $uni_emp_khm = $data['emp_qty'];
                        }

                        
                        if($data['p_m_id'] == 7){
                          $uni_std_lnt = $data['std_qty'];
                          $uni_emp_lnt = $data['emp_qty'];
                        }

                        
                        if($data['p_m_id'] == 8){
                          $uni_std_lpb = $data['std_qty'];
                          $uni_emp_lpb = $data['emp_qty'];
                        }

                        
                        if($data['p_m_id'] == 9){
                          $uni_std_odx = $data['std_qty'];
                          $uni_emp_odx = $data['emp_qty'];
                        }

                        
                        if($data['p_m_id'] == 10){
                          $uni_std_psl = $data['std_qty'];
                          $uni_emp_psl = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 11){
                          $uni_std_slv = $data['std_qty'];
                          $uni_emp_slv = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 12){
                          $uni_std_svk = $data['std_qty'];
                          $uni_emp_svk = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 13){
                          $uni_std_vtep = $data['std_qty'];
                          $uni_emp_vtep = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 14){
                          $uni_std_syb = $data['std_qty'];
                          $uni_emp_syb = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 15){
                          $uni_std_skg = $data['std_qty'];
                          $uni_emp_skg = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 16){
                          $uni_std_xsb = $data['std_qty'];
                          $uni_emp_xsb = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 17){
                          $uni_std_xkg = $data['std_qty'];
                          $uni_emp_xkg = $data['emp_qty'];
                        }

                        if($data['p_m_id'] == 18){
                          $uni_std_atp = $data['std_qty'];
                          $uni_emp_atp = $data['emp_qty'];
                        }
                      }

                $table .= '    
                <td>'. number_format($uni_std_vte,0) .'</td>
                <td>'. number_format($uni_emp_vte,0) .'</td>
                <td>'. number_format($uni_std_bke,0) .'</td>
                <td>'. number_format($uni_emp_bke,0) .'</td>
                <td>'. number_format($uni_std_blk,0) .'</td>
                <td>'. number_format($uni_emp_blk,0) .'</td>
                <td>'. number_format($uni_std_cps,0) .'</td>
                <td>'. number_format($uni_emp_cps,0) .'</td>
                <td>'. number_format($uni_std_hph,0) .'</td>
                <td>'. number_format($uni_emp_hph,0) .'</td>
                <td>'. number_format($uni_std_khm,0) .'</td>
                <td>'. number_format($uni_emp_khm,0) .'</td>
                <td>'. number_format($uni_std_lnt,0) .'</td>
                <td>'. number_format($uni_emp_lnt,0) .'</td>
                <td>'. number_format($uni_std_lpb,0) .'</td>
                <td>'. number_format($uni_emp_lpb,0) .'</td>
                <td>'. number_format($uni_std_odx,0) .'</td>
                <td>'. number_format($uni_emp_odx,0) .'</td>
                <td>'. number_format($uni_std_psl,0) .'</td>
                <td>'. number_format($uni_emp_psl,0) .'</td>
                <td>'. number_format($uni_std_slv,0) .'</td>
                <td>'. number_format($uni_emp_slv,0) .'</td>
                <td>'. number_format($uni_std_svk,0) .'</td>
                <td>'. number_format($uni_emp_svk,0) .'</td>
                <td>'. number_format($uni_std_vtep,0) .'</td>
                <td>'. number_format($uni_emp_vtep,0) .'</td>
                <td>'. number_format($uni_std_syb,0) .'</td>
                <td>'. number_format($uni_emp_syb,0) .'</td>
                <td>'. number_format($uni_std_skg,0) .'</td>
                <td>'. number_format($uni_emp_skg,0) .'</td>
                <td>'. number_format($uni_std_xsb,0) .'</td>
                <td>'. number_format($uni_emp_xsb,0) .'</td>
                <td>'. number_format($uni_std_xkg,0) .'</td>
                <td>'. number_format($uni_emp_xkg,0) .'</td>
                <td>'. number_format($uni_std_atp,0) .'</td>
                <td>'. number_format($uni_emp_atp,0) .'</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            ';
            
                $sql2 = mysqli_query($conn, "SELECT as_id,adj_id,sd.st_id,st_name,group_name,
                std_high_school+univer+univer_valunteer+prov+intv+ad_test+std_public+emp+std_handi+std_lan+ssk+std+emp_gov+test+std_con+std_2lan+std_inter+emp_private as total,
                std_high_school,univer,univer_valunteer,prov,intv,ad_test,std_public,emp,std_handi,std_lan,ssk,std,emp_gov,test,std_con,std_2lan,std_inter,emp_private,user_id
                FROM statistic_detail sd
                LEFT JOIN statatic s ON sd.st_id=s.st_id
                LEFT JOIN statatic_group sg ON s.st_group=sg.group_id
                WHERE adj_id='$adj_id' AND st_group='$group_id' ORDER BY sd.st_id ASC;");
                $j = 0;
                $st_id = "";
                foreach($sql2 as $row1){
                  $j++;
                  $st_id = $row1['st_id'];
            $table .= '      
            <tr>
                <td>'. $i .'.'. $j .'</td>
                <td>'. $row1['st_name'] .'</td>
                <td>'. number_format($row1['total'],0) .'</td>
                <td>'. number_format($row1['univer'],0) .'</td>
                <td>'. number_format($row1['univer_valunteer'],0) .'</td>
                <td>'. number_format($row1['emp'],0) .'</td>
                <td>'. number_format($row1['prov'],0) .'</td>
                <td>'. number_format($row1['emp_gov'],0) .'</td>
                <td>'. number_format($row1['std'],0) .'</td>
                <td>'. number_format($row1['std_con'],0) .'</td>
                <td>0</td>';
            
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

                      $dis2 = mysqli_query($conn, "SELECT sd_id,sd.as_id,p_m_id,std_qty,emp_qty,st.st_id FROM statistic_distribute sd
                      LEFT JOIN statistic_detail st ON sd.as_id=st.as_id
                      LEFT JOIN statatic s ON st.st_id=s.st_id
                      WHERE st.st_id='$st_id' GROUP BY p_m_id ORDER BY p_m_id ASC;");
                      foreach($dis2 as $data2){
                        if($data2['p_m_id'] == 1){
                          $uni_std_vte = $data2['std_qty'];
                          $uni_emp_vte = $data2['emp_qty'];
                        }

                          if($data2['p_m_id'] == 2){
                          $uni_std_bke = $data2['std_qty'];
                          $uni_emp_bke = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 3){
                          $uni_std_blk = $data2['std_qty'];
                          $uni_emp_blk = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 4){
                          $uni_std_cps = $data2['std_qty'];
                          $uni_emp_cps = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 5){
                          $uni_std_hph = $data2['std_qty'];
                          $uni_emp_hph = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 6){
                          $uni_std_khm = $data2['std_qty'];
                          $uni_emp_khm = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 7){
                          $uni_std_lnt = $data2['std_qty'];
                          $uni_emp_lnt = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 8){
                          $uni_std_lpb = $data2['std_qty'];
                          $uni_emp_lpb = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 9){
                          $uni_std_odx = $data2['std_qty'];
                          $uni_emp_odx = $data2['emp_qty'];
                        }

                        
                        if($data2['p_m_id'] == 10){
                          $uni_std_psl = $data2['std_qty'];
                          $uni_emp_psl = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 11){
                          $uni_std_slv = $data2['std_qty'];
                          $uni_emp_slv = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 12){
                          $uni_std_svk = $data2['std_qty'];
                          $uni_emp_svk = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 13){
                          $uni_std_vtep = $data2['std_qty'];
                          $uni_emp_vtep = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 14){
                          $uni_std_syb = $data2['std_qty'];
                          $uni_emp_syb = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 15){
                          $uni_std_skg = $data2['std_qty'];
                          $uni_emp_skg = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 16){
                          $uni_std_xsb = $data2['std_qty'];
                          $uni_emp_xsb = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 17){
                          $uni_std_xkg = $data2['std_qty'];
                          $uni_emp_xkg = $data2['emp_qty'];
                        }

                        if($data2['p_m_id'] == 18){
                          $uni_std_atp = $data2['std_qty'];
                          $uni_emp_atp = $data2['emp_qty'];
                        }
                      }
                $table .= '
                <td>'. number_format($uni_std_vte,0) .'</td>
                <td>'. number_format($uni_emp_vte,0) .'</td>
                <td>'. number_format($uni_std_bke,0) .'</td>
                <td>'. number_format($uni_emp_bke,0) .'</td>
                <td>'. number_format($uni_std_blk,0) .'</td>
                <td>'. number_format($uni_emp_blk,0) .'</td>
                <td>'. number_format($uni_std_cps,0) .'</td>
                <td>'. number_format($uni_emp_cps,0) .'</td>
                <td>'. number_format($uni_std_hph,0) .'</td>
                <td>'. number_format($uni_emp_hph,0) .'</td>
                <td>'. number_format($uni_std_khm,0) .'</td>
                <td>'. number_format($uni_emp_khm,0) .'</td>
                <td>'. number_format($uni_std_lnt,0) .'</td>
                <td>'. number_format($uni_emp_lnt,0) .'</td>
                <td>'. number_format($uni_std_lpb,0) .'</td>
                <td>'. number_format($uni_emp_lpb,0) .'</td>
                <td>'. number_format($uni_std_odx,0) .'</td>
                <td>'. number_format($uni_emp_odx,0) .'</td>
                <td>'. number_format($uni_std_psl,0) .'</td>
                <td>'. number_format($uni_emp_psl,0) .'</td>
                <td>'. number_format($uni_std_slv,0) .'</td>
                <td>'. number_format($uni_emp_slv,0) .'</td>
                <td>'. number_format($uni_std_svk,0) .'</td>
                <td>'. number_format($uni_emp_svk,0) .'</td>
                <td>'. number_format($uni_std_vtep,0) .'</td>
                <td>'. number_format($uni_emp_vtep,0) .'</td>
                <td>'. number_format($uni_std_syb,0) .'</td>
                <td>'. number_format($uni_emp_syb,0) .'</td>
                <td>'. number_format($uni_std_skg,0) .'</td>
                <td>'. number_format($uni_emp_skg,0) .'</td>
                <td>'. number_format($uni_std_xsb,0) .'</td>
                <td>'. number_format($uni_emp_xsb,0) .'</td>
                <td>'. number_format($uni_std_xkg,0) .'</td>
                <td>'. number_format($uni_emp_xkg,0) .'</td>
                <td>'. number_format($uni_std_atp,0) .'</td>
                <td>'. number_format($uni_emp_atp,0) .'</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            ';
                    }
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
              AS total_uni FROM adjustdetail ad
              LEFT JOIN course c ON ad.course_id=c.course_id
              LEFT JOIN faculty f ON c.fac_id=f.fac_id
              LEFT JOIN university u ON f.uni_id=u.uni_id
              LEFT JOIN department d ON u.dept_id=d.dept_id
              LEFT JOIN adjust a ON ad.adj_id=a.adj_id
              WHERE ad.adj_id='$adj_id' AND d.dept_id='$dept_id' GROUP BY u.uni_id ORDER BY uni_id ASC;");
          
              if(mysqli_num_rows($sql) > 0){
                
            ?>
            <?php
                $i=0;
            foreach($sql as $row1){
              $uni_id=$row1['uni_id'];
              $i++;
              $roman = ConverToRoman($i);
          $table .= '
            <tr style="background: #34a1eb;color: white">
                <td>'. $roman .'</td>
                <td style="white-space: nowrap;">'. $row1['uni_name'] .'</td>
                <td>'. number_format($row1['get_plan'],0) .'</td>
                <td>'. number_format($row1['univer'],0) .'</td>
                <td>'. number_format($row1['univer_valunteer'],0) .'</td>
                <td>'. number_format($row1['emp'],0) .'</td>
                <td>'. number_format($row1['prov'],0) .'</td>
                <td>'. number_format($row1['emp_gov'],0) .'</td>
                <td>'. number_format($row1['std'],0) .'</td>
                <td>'. number_format($row1['std_con'],0) .'</td>
                <td>0</td>';
                
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
                      $quota3 = mysqli_query($conn, "SELECT id,q.d_id,q.p_m_id,p_m_name,sum(std_qty) as std_qty,sum(emp_qty) as emp_qty,a.course_id,course_name,fac_name FROM quota_distribute q 
                      LEFT JOIN adjustdetail a ON q.d_id=a.d_id
                      LEFT JOIN province_ministry pm ON q.p_m_id=pm.p_m_id
                      LEFT JOIN course c ON a.course_id=c.course_id
                      LEFT JOIN faculty f ON c.fac_id=f.fac_id
                      LEFT JOIN university u ON f.uni_id=u.uni_id
                      WHERE a.adj_id='$adj_id' AND f.uni_id='$uni_id' AND p_stt=1 GROUP BY q.p_m_id ORDER BY q.p_m_id ASC;");
                      if(mysqli_num_rows($quota3) > 0){
                        foreach($quota3 as $data3){
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
                $table .= '
                <td>'. number_format($uni_std_vte,0) .'</td>
                <td>'. number_format($uni_emp_vte,0) .'</td>
                <td>'. number_format($uni_std_bke,0) .'</td>
                <td>'. number_format($uni_emp_bke,0) .'</td>
                <td>'. number_format($uni_std_blk,0) .'</td>
                <td>'. number_format($uni_emp_blk,0) .'</td>
                <td>'. number_format($uni_std_cps,0) .'</td>
                <td>'. number_format($uni_emp_cps,0) .'</td>
                <td>'. number_format($uni_std_hph,0) .'</td>
                <td>'. number_format($uni_emp_hph,0) .'</td>
                <td>'. number_format($uni_std_khm,0) .'</td>
                <td>'. number_format($uni_emp_khm,0) .'</td>
                <td>'. number_format($uni_std_lnt,0) .'</td>
                <td>'. number_format($uni_emp_lnt,0) .'</td>
                <td>'. number_format($uni_std_lpb,0) .'</td>
                <td>'. number_format($uni_emp_lpb,0) .'</td>
                <td>'. number_format($uni_std_odx,0) .'</td>
                <td>'. number_format($uni_emp_odx,0) .'</td>
                <td>'. number_format($uni_std_psl,0) .'</td>
                <td>'. number_format($uni_emp_psl,0) .'</td>
                <td>'. number_format($uni_std_slv,0) .'</td>
                <td>'. number_format($uni_emp_slv,0) .'</td>
                <td>'. number_format($uni_std_svk,0) .'</td>
                <td>'. number_format($uni_emp_svk,0) .'</td>
                <td>'. number_format($uni_std_vtep,0) .'</td>
                <td>'. number_format($uni_emp_vtep,0) .'</td>
                <td>'. number_format($uni_std_syb,0) .'</td>
                <td>'. number_format($uni_emp_syb,0) .'</td>
                <td>'. number_format($uni_std_skg,0) .'</td>
                <td>'. number_format($uni_emp_skg,0) .'</td>
                <td>'. number_format($uni_std_xsb,0) .'</td>
                <td>'. number_format($uni_emp_xsb,0) .'</td>
                <td>'. number_format($uni_std_xkg,0) .'</td>
                <td>'. number_format($uni_emp_xkg,0) .'</td>
                <td>'. number_format($uni_std_atp,0) .'</td>
                <td>'. number_format($uni_emp_atp,0) .'</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                </tr>';
            
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
  
            $j=0;
            foreach($sql2 as $row2){
              $fac_id = $row2['fac_id'];
              $j++;
          $table .= '
            <tr style="background: #ade1f7">
                <td>'.  $roman .'.'.$j .'</td>
                <td style="white-space: nowrap;">'.$row2['fac_name'] .'</td>
                <td>'. number_format($row2['get_plan'],0) .'</td>
                <td>'. number_format($row2['univer'],0) .'</td>
                <td>'. number_format($row2['univer_valunteer'],0) .'</td>
                <td>'. number_format($row2['emp'],0) .'</td>
                <td>'. number_format($row2['prov'],0) .'</td>
                <td>'. number_format($row2['emp_gov'],0) .'</td>
                <td>'. number_format($row2['std'],0) .'</td>
                <td>'. number_format($row2['std_con'],0) .'</td>
                <td>0</td>';

                
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

                      $quota2 = mysqli_query($conn, "SELECT id,q.d_id,q.p_m_id,p_m_name,sum(std_qty) as std_qty,sum(emp_qty) as emp_qty,a.course_id,course_name,fac_name FROM quota_distribute q 
                      LEFT JOIN adjustdetail a ON q.d_id=a.d_id
                      LEFT JOIN province_ministry pm ON q.p_m_id=pm.p_m_id
                      LEFT JOIN course c ON a.course_id=c.course_id
                      LEFT JOIN faculty f ON c.fac_id=f.fac_id
                      WHERE a.adj_id='$adj_id' AND c.fac_id='$fac_id' AND p_stt=1 GROUP BY q.p_m_id ORDER BY q.p_m_id ASC;");
                      if(mysqli_num_rows($quota2) > 0){
                        foreach($quota2 as $data2){
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
                $table .= '
                <td>'. number_format($fac_std_vte,0) .'</td>
                <td>'. number_format($fac_emp_vte,0) .'</td>
                <td>'. number_format($fac_std_bke,0) .'</td>
                <td>'. number_format($fac_emp_bke,0) .'</td>
                <td>'. number_format($fac_std_blk,0) .'</td>
                <td>'. number_format($fac_emp_blk,0) .'</td>
                <td>'. number_format($fac_std_cps,0) .'</td>
                <td>'. number_format($fac_emp_cps,0) .'</td>
                <td>'. number_format($fac_std_hph,0) .'</td>
                <td>'. number_format($fac_emp_hph,0) .'</td>
                <td>'. number_format($fac_std_khm,0) .'</td>
                <td>'. number_format($fac_emp_khm,0) .'</td>
                <td>'. number_format($fac_std_lnt,0) .'</td>
                <td>'. number_format($fac_emp_lnt,0) .'</td>
                <td>'. number_format($fac_std_lpb,0) .'</td>
                <td>'. number_format($fac_emp_lpb,0) .'</td>
                <td>'. number_format($fac_std_odx,0) .'</td>
                <td>'. number_format($fac_emp_odx,0) .'</td>
                <td>'. number_format($fac_std_psl,0) .'</td>
                <td>'. number_format($fac_emp_psl,0) .'</td>
                <td>'. number_format($fac_std_slv,0) .'</td>
                <td>'. number_format($fac_emp_slv,0) .'</td>
                <td>'. number_format($fac_std_svk,0) .'</td>
                <td>'. number_format($fac_emp_svk,0) .'</td>
                <td>'. number_format($fac_std_vtep,0) .'</td>
                <td>'. number_format($fac_emp_vtep,0) .'</td>
                <td>'. number_format($fac_std_syb,0) .'</td>
                <td>'. number_format($fac_emp_syb,0) .'</td>
                <td>'. number_format($fac_std_skg,0) .'</td>
                <td>'. number_format($fac_emp_skg,0) .'</td>
                <td>'. number_format($fac_std_xsb,0) .'</td>
                <td>'. number_format($fac_emp_xsb,0) .'</td>
                <td>'. number_format($fac_std_xkg,0) .'</td>
                <td>'. number_format($fac_emp_xkg,0) .'</td>
                <td>'. number_format($fac_std_atp,0) .'</td>
                <td>'. number_format($fac_emp_atp,0) .'</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                </tr>';
            
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
            $k = 0;
            foreach($sql3 as $row3){
              $course_id=$row3['course_id'];
              $k++;
          $table .= '
            <tr>
                <td>'.  $k .'</td>
                <td class="text-nowrap" style="text-align: left;">'. $row3['course_name'] .'</td>
                <td>'. number_format($row3['get_plan'],0) .'</td>
                <td>'. number_format($row3['univer'],0) .'</td>
                <td>'. number_format($row3['univer_valunteer'],0) .'</td>
                <td>'. number_format($row3['emp'],0) .'</td>
                <td>'. number_format($row3['prov'],0) .'</td>
                <td>'. number_format($row3['emp_gov'],0) .'</td>
                <td>'. number_format($row3['std'],0) .'</td>
                <td>'. number_format($row3['std_con'],0) .'</td>
                <td>0</td>
                ';
            
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
              $quota = mysqli_query($conn, "SELECT id,q.d_id,q.p_m_id,p_m_name,std_qty,emp_qty,course_id FROM quota_distribute q 
              LEFT JOIN adjustdetail a ON q.d_id=a.d_id
              LEFT JOIN province_ministry pm ON q.p_m_id=pm.p_m_id
              WHERE a.adj_id='$adj_id' AND course_id='$course_id' AND p_stt=1 ORDER BY q.p_m_id ASC;");
              if(mysqli_num_rows($quota) > 0){
                foreach($quota as $data){
                  if($data['p_m_id'] == 1){
                    $std_vte = $data['std_qty'];
                    $emp_vte = $data['emp_qty'];
                  }
                  // else{
                  //   $std_vte = 0;
                  // }

                  if($data['p_m_id'] == 2){
                    $std_bke = $data['std_qty'];
                    $emp_bke = $data['emp_qty'];
                  }
                  // else{
                  //   $std_bke = 0;
                  // }

                  if($data['p_m_id'] == 3){
                    $std_blk = $data['std_qty'];
                    $emp_blk = $data['emp_qty'];
                  }
                  // else{
                  //   $std_blk = 0;
                  // }

                  if($data['p_m_id'] == 4){
                    $std_cps = $data['std_qty'];
                    $emp_cps = $data['emp_qty'];
                  }
                  // else{
                  //   $std_cps = 0;
                  // }

                  if($data['p_m_id'] == 5){
                    $std_hph = $data['std_qty'];
                    $emp_hph = $data['emp_qty'];
                  }
                  // else{
                  //   $std_hph = 0;
                  // }

                  if($data['p_m_id'] == 6){
                    $std_khm = $data['std_qty'];
                    $emp_khm = $data['emp_qty'];
                  }
                  // else{
                  //   $std_khm = 0;
                  // }

                  if($data['p_m_id'] == 7){
                    $std_lnt = $data['std_qty'];
                    $emp_lnt = $data['emp_qty'];
                  }
                  // else{
                  //   $std_lnt = 0;
                  // }

                  if($data['p_m_id'] == 8){
                    $std_lpb = $data['std_qty'];
                    $emp_lpb = $data['emp_qty'];
                  }
                  // else{
                  //   $std_lpb = 0;
                  // }

                  if($data['p_m_id'] == 9){
                    $std_odx = $data['std_qty'];
                    $emp_odx = $data['emp_qty'];
                  }
                  // else{
                  //   $std_odx = 0;
                  // }

                  if($data['p_m_id'] == 10){
                    $std_psl = $data['std_qty'];
                    $emp_psl = $data['emp_qty'];
                  }
                  // else{
                  //   $std_psl = 0;
                  // }
                  if($data['p_m_id'] == 11){
                    $std_slv = $data['std_qty'];
                    $emp_slv = $data['emp_qty'];
                  }
                  // else{
                  //   $std_slv = 0;
                  // }
                  if($data['p_m_id'] == 12){
                    $std_svk = $data['std_qty'];
                    $emp_svk = $data['emp_qty'];
                  }
                  // else{
                  //   $std_svk = 0;
                  // }
                  if($data['p_m_id'] == 13){
                    $std_vtep = $data['std_qty'];
                    $emp_vtep = $data['emp_qty'];
                  }
                  // else{
                  //   $std_vtep = 0;
                  // }
                  if($data['p_m_id'] == 14){
                    $std_syb = $data['std_qty'];
                    $emp_syb = $data['emp_qty'];
                  }
                  // else{
                  //   $std_syb = 0;
                  // }
                  if($data['p_m_id'] == 15){
                    $std_skg = $data['std_qty'];
                    $emp_skg = $data['emp_qty'];
                  }
                  // else{
                  //   $std_skg = 0;
                  // }
                  if($data['p_m_id'] == 16){
                    $std_xsb = $data['std_qty'];
                    $emp_xsb = $data['emp_qty'];
                  }
                  // else{
                  //   $std_xsb = 0;
                  // }
                  if($data['p_m_id'] == 17){
                    $std_xkg = $data['std_qty'];
                    $emp_xkg = $data['emp_qty'];
                  }
                  // else{
                  //   $std_xkg = 0;
                  // }
                  if($data['p_m_id'] == 18){
                    $std_atp = $data['std_qty'];
                    $emp_atp = $data['emp_qty'];
                  }
                  // else{
                  //   $std_atp = 0;
                  // }
                  
                  // echo "<td>$data[std_qty]</td>";
                  // echo "<td>$data[emp_qty]</td>";
                }
                ?>

                <?php
              }
              // else{
              //   for($j=0;$j<18;$j++){
              //     echo "<td>0</td>";
              //     echo "<td>0</td>";
              //   }
              // }
              // foreach($quota as $data){
              //   if(mysqli_num_rows($quota) < 18){
              //     $count = mysqli_num_rows($fetch_emp);
              //     for($j=$count+1;$j<=18;$j++){
              //       echo "<td>0</td>";
              //     }
              //   }else{
                 
              //   }
                $table .='
                <td>'. number_format($std_vte,0) .'</td>
                <td>'. number_format($emp_vte,0) .'</td>
                <td>'. number_format($std_bke,0) .'</td>
                <td>'. number_format($emp_bke,0) .'</td>
                <td>'. number_format($std_blk,0) .'</td>
                <td>'. number_format($emp_blk,0) .'</td>
                <td>'. number_format($std_cps,0) .'</td>
                <td>'. number_format($emp_cps,0) .'</td>
                <td>'. number_format($std_hph,0) .'</td>
                <td>'. number_format($emp_hph,0) .'</td>
                <td>'. number_format($std_khm,0) .'</td>
                <td>'. number_format($emp_khm,0) .'</td>
                <td>'. number_format($std_lnt,0) .'</td>
                <td>'. number_format($emp_lnt,0) .'</td>
                <td>'. number_format($std_lpb,0) .'</td>
                <td>'. number_format($emp_lpb,0) .'</td>
                <td>'. number_format($std_odx,0) .'</td>
                <td>'. number_format($emp_odx,0) .'</td>
                <td>'. number_format($std_psl,0) .'</td>
                <td>'. number_format($emp_psl,0) .'</td>
                <td>'. number_format($std_slv,0) .'</td>
                <td>'. number_format($emp_slv,0) .'</td>
                <td>'. number_format($std_svk,0) .'</td>
                <td>'. number_format($emp_svk,0) .'</td>
                <td>'. number_format($std_vtep,0) .'</td>
                <td>'. number_format($emp_vtep,0) .'</td>
                <td>'. number_format($std_syb,0) .'</td>
                <td>'. number_format($emp_syb,0) .'</td>
                <td>'. number_format($std_skg,0) .'</td>
                <td>'. number_format($emp_skg,0) .'</td>
                <td>'. number_format($std_xsb,0) .'</td>
                <td>'. number_format($emp_xsb,0) .'</td>
                <td>'. number_format($std_xkg,0) .'</td>
                <td>'. number_format($emp_xkg,0) .'</td>
                <td>'. number_format($std_atp,0) .'</td>
                <td>'. number_format($emp_atp,0) .'</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                </tr>';
            
        }
      } 
    }
  }else{
    $table .= '
    <tr>
        <td colspan="51" style="background: #EDEDED;color: red;">ບໍ່ມີຂໍ້ມູນການແຈກຢາຍ</td>
    </tr>
    ';
  }
  $table .= '
        </tbody>
    </table>

</div>
';
?>