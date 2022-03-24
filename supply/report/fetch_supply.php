<?php
    session_start();
    include "../../oop/connect.php";
    
    if(isset($_POST['query'])){
        $fy_id = $_POST['query'];
        $uni_id = $_SESSION['uni_id'];
        $user_id = $_SESSION['user_id'];

        $sql = mysqli_query($conn, "SELECT d_id,ad.adj_id,fy_id,ad.course_id,course_name,fac_name,uni_name,level_name,SUM(get_plan) AS get_plan ,`user_id` FROM adjustdetail ad
        LEFT JOIN adjust a ON ad.adj_id=a.adj_id
        LEFT JOIN course c ON ad.course_id=c.course_id
        LEFT JOIN course_level cl ON c.level_id=cl.level_id
        LEFT JOIN faculty f ON c.fac_id=f.fac_id
        LEFT JOIN university u ON f.uni_id=u.uni_id
        WHERE fy_id='$fy_id' AND f.uni_id='$uni_id' AND user_id='$user_id' GROUP BY f.uni_id ORDER BY f.uni_id ASC");

        if(mysqli_num_rows($sql) > 0){
           
                ?>
<style>
    .university{
        background: #5199FA;
        color: #fff;
    }
    .fac{
        background: #B1CDF3;
        color: #FFF;
    }
</style>

<div class="table-responsive tscroll">
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
        <tbody>
            <?php
            $i=0;
            foreach($sql as $row){
                $i++;
                // $fac_id=$row['fac_id'];
                            ?>
            <tr class="university">
                <td><?= ConverToRoman($i) ?>.</td>
                <td colspan="2"><?= $row['uni_name'] ?></td>
                <td><?= number_format($row['get_plan'],0) ?></td>
                <td>&nbsp;</td>
            </tr>
            <?php
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
                    ?>
            <tr class="fac">
                <td><?= $j ?></td>
                <td colspan="2"><?= $row2['fac_name'] ?></td>
                <td><?= number_format($row2['get_plan'],0) ?></td>
                <td>&nbsp;</td>
            </tr>
                    <?php
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
                    ?>
            <tr>
                <td><?= $j ?>.<?= $k ?></td>
                <td class="text-left"><?= $row3['course_name'] ?></td>
                <td><?= $row3['level_name'] ?></td>
                <td><?= number_format($row3['get_plan'],0) ?></td>
                <td><?= $row3['sup_name'] ?></td>
            </tr>
                    <?php
                }

                }       
            }
            ?>
        </tbody>
    </table>
</div>
<?php
        }
    }
?>