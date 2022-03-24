<?php
    session_start();
    $path = "../../";
    include $path."oop/connect.php";

    if(isset($_POST['query'])){
        $adj_id = $_POST['query'];
        $p_m_id = $_SESSION['p_m_id'];

        $university = mysqli_query($conn, "SELECT cre_id,adj_id,cp.course_id,course_name,fac_name,f.uni_id,uni_name,p_m_id,sum(std_qty) as std_qty,sum(emp_qty) as emp_qty,
        sum(std_qty) + sum(emp_qty) as total
        FROM create_plan cp
        LEFT JOIN course c ON cp.course_id=c.course_id
        LEFT JOIN faculty f ON c.fac_id=f.fac_id
        LEFT JOIN university u ON f.uni_id=u.uni_id
        WHERE adj_id='$adj_id' AND p_m_id='$p_m_id' AND `user_id`='$_SESSION[user_id]'
        GROUP BY f.uni_id ORDER BY uni_id ASC;");
        if(mysqli_num_rows($university) > 0){
            include "fetch/demand.php";
            ?>
            <style>
                .tscroll table tr:nth-of-type(2) th{
                    top: 49px !important;
                }
                th{
                    vertical-align: middle !important;
                }
            </style>

<div class="table-responsive tscroll">
    <?= $table ?>
</div>
<?php
        }else{
            echo '<p class="mt-2 text-center result">ບໍ່ມີຂໍ້ມູນການສ້າງແຜນ</p>';
        }
    }
?>