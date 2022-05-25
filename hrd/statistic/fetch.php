<?php
    session_start();
    $path = "../../";
    include($path."oop/connect.php");
    $adj_id = $_POST['query'];
    $check_dept = mysqli_query($conn, "SELECT * FROM adjust WHERE adj_id='$adj_id'");
    $adj = mysqli_fetch_array($check_dept,MYSQLI_ASSOC);
    $dept_id = $adj['dept_id'];
    $group = mysqli_query($conn, "SELECT * FROM statatic_group WHERE dept_id='$dept_id'");


    if(mysqli_num_rows($group) > 0){
        ?>

<style>
.input-total {
    border: none;
    width: 100%;
    max-width: 180px;
    text-align: center;
    font-weight: bold;
    background: none;
    color: white;
}
</style>


<div class="table-responsive tscroll">
    <input type="hidden" name="adj_id" id="adj_id" value="<?= $adj_id ?>">
    <table id="table" class="table table-bordered">
        <thead class="text-nowrap">
            <tr>
                <th style="text-align: center!important;margin: 0 auto;">ລຳດັບ</th>
                <th style="text-align: center;">ລາຍລະອຽດ</th>
                <th style="text-align: center;width: 150px;">ລວມ</th>
                <th style="text-align: center;">ເພີ່ມ</th>
                <th style="text-align: center;">ແຈກຢາຍຕົວແລກ</th>
                <!-- <th colspan="10" style="text-align: center; position:st">ແບ່ງປັນ</th>
                <th colspan="7" style="text-align: center;">ຈ່າຍຄ່າຮຽນ</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
                foreach($group as $row1){
                    $group_id = $row1['group_id'];
            ?>
            <tr style="background-color:#5199FA;color:white;cursor: pointer;" class="parent" id="<?= $group_id ?>"
                title="Click to expand/collapse">
                <td class="text-center"><?= $i ?></td>
                <td><?= $row1['group_name'] ?></td>
                <td class="text-center">
                <?php
                        $num1 = mysqli_query($conn, "SELECT sum(univer)+sum(univer_valunteer)+sum(prov)+sum(intv+ad_test)+sum(std_public)+sum(emp)+sum(std_handi)+sum(std_lan)+sum(ssk)+sum(std)+sum(emp_gov)+sum(test)+sum(std_con)+sum(std_2lan)+sum(std_inter)+sum(emp_private) as total FROM statistic_detail sd LEFT JOIN statatic s ON sd.st_id=s.st_id WHERE s.st_group='$group_id' AND adj_id='$adj_id' GROUP BY st_group");
                        if(mysqli_num_rows($num1) > 0){
                            $total1 = mysqli_fetch_array($num1,MYSQLI_ASSOC);
                            echo number_format($total1['total'],2);
                        }else{
                            echo "0";
                        }
                    ?>
                </td>
                <td colspan="2"></td>
            </tr>

            <?php
            $statistic = mysqli_query($conn, "SELECT * FROM statatic WHERE st_group='$group_id'");
            $j=1;

            $as_id = "";
            
            foreach($statistic as $row2){
                $stat_id = $row2['st_id'];
                ?>
            <tr class="child-<?= $group_id ?>" style="display: table-row;">
                <td class="d-none"><?= $stat_id ?></td>
                <td class="text-center"><?= $i.".".$j++ ?></td>
                <td class="p-3"><?= $row2['st_name'] ?></td>
                <td class="text-center">
                    <?php
                        $btnAdd = "";
                        $btnEdit = "";
                        $btndis = "";
                        $num = mysqli_query($conn, "SELECT as_id,univer+univer_valunteer+prov+intv+ad_test+std_public+emp+std_handi+std_lan+ssk+std+emp_gov+test+std_con+std_2lan+std_inter+emp_private as total FROM statistic_detail WHERE st_id='$stat_id' AND adj_id='$adj_id'");
                        if(mysqli_num_rows($num) > 0){
                            $total = mysqli_fetch_array($num,MYSQLI_ASSOC);
                            echo number_format($total['total'],0);
                            $btnEdit = "";
                            $btnAdd = "d-none";
                            $as_id = $total['as_id'];
                            $btndis = "enabled";
                        }else{
                            echo "0";
                            $btnAdd = "";
                            $btnEdit = "d-none";
                            $btndis = "disabled";
                        }
                    ?>
                </td>
                <td class="p-3">
                    <div class="d-flex">
                        <a href="#" style="width: 100%" class="btn btn-success btn-sm btnAdd <?= $btnAdd ?>"><i class="fas fa-plus"></i> ເພີ່ມ</a>
                        <a href="#" style="width: 100%" class="btn btn-info btn-sm btnEdit <?= $btnEdit ?>"><i class="fas fa-edit"></i> ແກ້ໄຂ</a>
                    </div>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-success btn-sm btn-dis" <?= $btndis ?>>ແຈກຢາຍ</butt>
                </td>
            </tr>
            <?php
            }
            $i++;
                }
            ?>
        </tbody>
    </table>
</div>
<div id="edit"></div>


<?php
    }else{
        echo "<p style='border-top: 1px solid #ddd;border-bottom: 1px solid #ddd' class='text-center py-3 mt-3'>ບໍ່ມີຂໍ້ມູນຂອງກົມ</p>";
    }
?>

<script type="text/javascript">
$(document).ready(function() {
    $('tr.parent')
        .css("cursor", "pointer")
        .attr("title", "Click to expand/collapse")
        .click(function() {
            $(this).siblings('.child-' + this.id).toggle();
        });
    $('tr[@class^=child-]').hide().children('td');
});

$('.btnAdd').click(function() {
    var title = "";
    $('#ModalAdd').modal('show');

    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    title = data[2];

    document.getElementById("title-header").innerHTML = title;
    console.log(data);

    $('#st_ID').val(data[0]);
});

$('.btnEdit').click(function(){
    let edit_id = "";
    let adj_id = $("#adj_id").val();

    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    edit_id = data[0];

    $.ajax({
        url: "edit.php",
        method: "POST",
        data: {
            query: edit_id,
            adj: adj_id
        },
        success: function(data){
            $("#edit").html(data);
            $('#ModalEdit').modal('show');
        }
    });

});

$('.btn-dis').click(function(){
    let edit_id = "";
    let adj_id = $("#adj_id").val();
    let title = "";

    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    edit_id = data[0];
    title = data[2];

    $.ajax({
        url: "distribute.php",
        method: "POST",
        data: {
            query: edit_id,
            adj: adj_id,
            title: title
        },
        success: function(data){
            $("#edit").html(data);
            $('.show-modal').modal('show');
        }
    });

});
</script>

