<?php
    $path = "../../";
    include $path."oop/connect.php";
    $st_id = $_POST['query'];
    $adj_id = $_POST['adj'];
    $as_id = "";
    $check = mysqli_query($conn, "SELECT * FROM statistic_distribute sd LEFT JOIN statistic_detail s ON sd.as_id=s.as_id WHERE st_id = '$st_id' AND adj_id = '$adj_id'");

    $p_m_array = array();
    if(mysqli_num_rows($check) > 0){
        $as_id = mysqli_fetch_array($check, MYSQLI_ASSOC);
        ?>
<form action="statistic" method="POST">
    <div class="modal fade show-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $_POST['title'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="as_id" id="as_id" value="<?= $as_id['as_id'] ?>">
                    <table id="detail_table" class="table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                                <th rowspan="2" style="text-align: center;margin: 0 auto; width: 70px;">ລຳດັບ</th>
                                <th rowspan="2" style="text-align: center;width: 450px;">ຜູ້ສະເໜີສ້າງ</th>
                                <th colspan="2" style="text-align: center;width: 250px;">ອະນຸມັດ</th>
                                <th rowspan="2" style="text-align: center;width: 150px;">ລວມ</th>
                            </tr>
                            <tr style="text-align: center;">
                                <th>ນ/ຮ</th>
                                <th>ພ/ງ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <button type="button" data-toggle="collapse" data-target=".multi-collapse-province"
                                        aria-expanded="false"
                                        aria-controls="multiCollapseExample1 multiCollapseExample2"
                                        class="btn btn-outline-success btn-sm" id="click-col-1">
                                        <i class="fas fa-plus" id="icon-click-1"></i>
                                    </button>
                                </td>
                                <td colspan="5" class="h4">ແຂວງຕ່າງໆ <span id="total-province">0</span></td>
                            </tr>
                            <?php
                                $sql2 = mysqli_query($conn, "SELECT sd_id,sd.as_id,sd.p_m_id,p_m_name,std_qty,emp_qty FROM statistic_distribute sd 
                                LEFT JOIN statistic_detail s ON sd.as_id=s.as_id 
                                LEFT JOIN province_ministry p ON sd.p_m_id=p.p_m_id
                                WHERE st_id='$st_id' AND adj_id='$adj_id' AND p.p_stt=1 ORDER BY sd.p_m_id");
                                $i = 1;
                                foreach($sql2 as $row1){

                            ?>
                            <tr class="collapse multi-collapse-province fade">
                                <td class="text-center"><?= $i++ ?>.</td>
                                <td>
                                    <?= $row1['p_m_name'] ?>
                                    <input type="hidden" name="sd_id_<?= $row1['p_m_id'] ?>"
                                        id="sd_id_<?= $row1['p_m_id'] ?>" value="<?= $row1['sd_id'] ?>">
                                </td>
                                <td>
                                    <div class="def-number-input number-input safari_only" style="margin:0 auto;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                            class="minus btnQuota"></button>
                                        <input class="quantity inputQuota" min="0" name="std_qty_<?= $row1['p_m_id'] ?>"
                                            id="std_qty_<?= $row1['p_m_id'] ?>" value="<?= $row1['std_qty'] ?>"
                                            type="number" style="font-weight:bold!important;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                            class="plus btnQuota"></button>
                                    </div>
                                </td>
                                <td>
                                    <div class="def-number-input number-input safari_only" style="margin:0 auto;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                            class="minus btnQuota"></button>
                                        <input class="quantity inputQuota" min="0" name="emp_qty_<?= $row1['p_m_id'] ?>"
                                            id="emp_qty_<?= $row1['p_m_id'] ?>" value="<?= $row1['emp_qty'] ?>"
                                            type="number" style="font-weight:bold!important;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                            class="plus btnQuota"></button>
                                    </div>
                                </td>
                                <td>
                                    <input class="quantity num_qty_province" min="0"
                                        name="num_qty_<?= $row1['p_m_id'] ?>" id="num_qty_<?= $row1['p_m_id'] ?>"
                                        value="0" type="number"
                                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;"
                                        disabled>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                            <tr>
                                <td class="text-center">
                                    <button type="button" data-toggle="collapse" data-target=".multi-collapse-ministry"
                                        aria-expanded="false"
                                        aria-controls="multiCollapseExample1 multiCollapseExample2"
                                        class="btn btn-outline-success btn-sm" id="click-col-2">
                                        <i class="fas fa-plus" id="icon-click-2"></i>
                                    </button>
                                </td>
                                <td colspan="5" class="h4">ກະຊວງຕ່າງໆ <span id="total-ministry">0</span></td>
                            </tr>
                            <?php
                                $sql2 = mysqli_query($conn, "SELECT sd_id,sd.as_id,sd.p_m_id,p_m_name,std_qty,emp_qty FROM statistic_distribute sd 
                                LEFT JOIN statistic_detail s ON sd.as_id=s.as_id 
                                LEFT JOIN province_ministry p ON sd.p_m_id=p.p_m_id
                                WHERE st_id='$st_id' AND adj_id='$adj_id' AND p.p_stt=2 ORDER BY sd.p_m_id");
                                $i = 1;
                                foreach($sql2 as $row1){
                            ?>
                            <tr class="collapse multi-collapse-ministry fade">
                                <td class="text-center">
                                    <?= $i++ ?>.
                                </td>
                                <td>
                                    <?= $row1['p_m_name'] ?>
                                    <input type="hidden" name="sd_id_<?= $row1['p_m_id'] ?>"
                                        id="sd_id_<?= $row1['p_m_id'] ?>" value="<?= $row1['sd_id'] ?>">
                                </td>
                                <td>
                                    <div class="def-number-input number-input safari_only" style="margin:0 auto;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                            class="minus btnQuota"></button>
                                        <input class="quantity inputQuota" min="0" name="std_qty_<?= $row1['p_m_id'] ?>"
                                            id="std_qty_<?= $row1['p_m_id'] ?>" value="<?= $row1['std_qty'] ?>"
                                            type="number" style="font-weight:bold!important;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                            class="plus btnQuota"></button>
                                    </div>
                                </td>
                                <td>
                                    <div class="def-number-input number-input safari_only" style="margin:0 auto;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                            class="minus btnQuota"></button>
                                        <input class="quantity inputQuota" min="0" name="emp_qty_<?= $row1['p_m_id'] ?>"
                                            id="emp_qty_<?= $row1['p_m_id'] ?>" value="<?= $row1['emp_qty'] ?>"
                                            type="number" style="font-weight:bold!important;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                            class="plus btnQuota"></button>
                                    </div>
                                </td>
                                <td>
                                    <input class="quantity num_qty_ministry" min="0"
                                        name="num_qty_<?= $row1['p_m_id'] ?>" id="num_qty_<?= $row1['p_m_id'] ?>"
                                        value="0" type="number"
                                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;"
                                        disabled>
                                </td>
                            </tr>
                            <?php
                                }
                               
                                $new_ministry = mysqli_query($conn, "SELECT * FROM province_ministry WHERE p_m_id NOT IN (SELECT p_m_id FROM statistic_distribute WHERE as_id='$as_id[as_id]') AND p_stt=2 ORDER BY p_m_id");
                                if(mysqli_num_rows($new_ministry) > 0){
                            ?>

                            <tr>
                                <td class="text-center">
                                    <button type="button" data-toggle="collapse"
                                        data-target=".multi-collapse-new-ministry" aria-expanded="false"
                                        aria-controls="multiCollapseExample1 multiCollapseExample2"
                                        class="btn btn-outline-success btn-sm" id="click-col-2">
                                        <i class="fas fa-plus" id="icon-click-2"></i>
                                    </button>
                                </td>
                                <td colspan="5" class="h4">ກະຊວງເພີ່ມໃໝ່ <span id="total-new">0</span></td>
                            </tr>
                            <?php
                            $i=1;
                            foreach($new_ministry as $row1){
                                ?>
                            <tr class="collapse multi-collapse-new-ministry fade">
                                <td class="text-center">
                                    <?= $i++ ?>.
                                </td>
                                <td>
                                    <?= $row1['p_m_name'] ?>
                                    <input type="hidden" name="sd_id_<?= $row1['p_m_id'] ?>"
                                        id="sd_id_<?= $row1['p_m_id'] ?>" value="0">
                                </td>
                                <td>
                                    <div class="def-number-input number-input safari_only" style="margin:0 auto;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                            class="minus btnQuota"></button>
                                        <input class="quantity inputQuota" min="0" name="std_qty_<?= $row1['p_m_id'] ?>"
                                            id="std_qty_<?= $row1['p_m_id'] ?>" value="0"
                                            type="number" style="font-weight:bold!important;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                            class="plus btnQuota"></button>
                                    </div>
                                </td>
                                <td>
                                    <div class="def-number-input number-input safari_only" style="margin:0 auto;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                            class="minus btnQuota"></button>
                                        <input class="quantity inputQuota" min="0" name="emp_qty_<?= $row1['p_m_id'] ?>"
                                            id="emp_qty_<?= $row1['p_m_id'] ?>" value="0"
                                            type="number" style="font-weight:bold!important;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                            class="plus btnQuota"></button>
                                    </div>
                                </td>
                                <td>
                                    <input class="quantity num_qty_new" min="0"
                                        name="num_qty_<?= $row1['p_m_id'] ?>" id="num_qty_<?= $row1['p_m_id'] ?>"
                                        value="0" type="number"
                                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;"
                                        disabled>
                                </td>
                            </tr>
                            <?php
                            }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btn_update_dis" class="btn btn-primary">ບັນທຶກ</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
    }else{

        $as = mysqli_query($conn, "SELECT as_id,std_high_school+univer+univer_valunteer+prov+intv+ad_test+std_public+emp+std_handi+std_lan+ssk+std+emp_gov+test+std_con+std_2lan+std_inter+emp_private as total FROM `statistic_detail` WHERE st_id='$st_id' AND adj_id='$adj_id'");
        $as = mysqli_fetch_array($as, MYSQLI_ASSOC);
        ?>
<form action="statistic" method="POST">
    <div class="modal fade show-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $_POST['title'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="as_id" id="as_id" value="<?= $as['as_id'] ?>">
                    <table id="detail_table" class="table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                                <th rowspan="2" style="text-align: center;margin: 0 auto; width: 70px;">ລຳດັບ</th>
                                <th rowspan="2" style="text-align: center;width: 450px;">ຜູ້ສະເໜີສ້າງ</th>
                                <th colspan="2" style="text-align: center;width: 250px;">ອະນຸມັດ</th>
                                <th rowspan="2" style="text-align: center;width: 150px;">ລວມ</th>
                            </tr>
                            <tr style="text-align: center;">
                                <th>ນ/ຮ</th>
                                <th>ພ/ງ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <button type="button" data-toggle="collapse" data-target=".multi-collapse-province"
                                        aria-expanded="false"
                                        aria-controls="multiCollapseExample1 multiCollapseExample2"
                                        class="btn btn-outline-success btn-sm" id="click-col-1">
                                        <i class="fas fa-plus" id="icon-click-1"></i>
                                    </button>
                                </td>
                                <td colspan="5" class="h4">ແຂວງຕ່າງໆ <span id="total-province">0</span></td>
                            </tr>
                            <?php
                                $sql2 = mysqli_query($conn, "SELECT * FROM province_ministry WHERE p_stt=1");
                                $i = 1;
                                foreach($sql2 as $row1){
                            ?>
                            <tr class="collapse multi-collapse-province fade">
                                <td class="text-center"><?= $i++ ?>.</td>
                                <td><?= $row1['p_m_name'] ?></td>
                                <td>
                                    <div class="def-number-input number-input safari_only" style="margin:0 auto;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                            class="minus btnQuota"></button>
                                        <input class="quantity inputQuota" min="0" name="std_qty_<?= $row1['p_m_id'] ?>"
                                            id="std_qty_<?= $row1['p_m_id'] ?>" value="0" type="number"
                                            style="font-weight:bold!important;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                            class="plus btnQuota"></button>
                                    </div>
                                </td>
                                <td>
                                    <div class="def-number-input number-input safari_only" style="margin:0 auto;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                            class="minus btnQuota"></button>
                                        <input class="quantity inputQuota" min="0" name="emp_qty_<?= $row1['p_m_id'] ?>"
                                            id="emp_qty_<?= $row1['p_m_id'] ?>" value="0" type="number"
                                            style="font-weight:bold!important;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                            class="plus btnQuota"></button>
                                    </div>
                                </td>
                                <td>
                                    <input class="quantity num_qty_province" min="0"
                                        name="num_qty_<?= $row1['p_m_id'] ?>" id="num_qty_<?= $row1['p_m_id'] ?>"
                                        value="0" type="number"
                                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;"
                                        disabled>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                            <tr>
                                <td class="text-center">
                                    <button type="button" data-toggle="collapse" data-target=".multi-collapse-ministry"
                                        aria-expanded="false"
                                        aria-controls="multiCollapseExample1 multiCollapseExample2"
                                        class="btn btn-outline-success btn-sm" id="click-col-2">
                                        <i class="fas fa-plus" id="icon-click-2"></i>
                                    </button>
                                </td>
                                <td colspan="5" class="h4">ກະຊວງຕ່າງໆ <span id="total-ministry">0</span></td>
                            </tr>
                            <?php
                                $sql2 = mysqli_query($conn, "SELECT * FROM province_ministry WHERE p_stt=2");
                                $i = 1;
                                foreach($sql2 as $row1){
                            ?>
                            <tr class="collapse multi-collapse-ministry fade">
                                <td class="text-center"><?= $i++ ?>.</td>
                                <td><?= $row1['p_m_name'] ?></td>
                                <td>
                                    <div class="def-number-input number-input safari_only" style="margin:0 auto;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                            class="minus btnQuota"></button>
                                        <input class="quantity inputQuota" min="0" name="std_qty_<?= $row1['p_m_id'] ?>"
                                            id="std_qty_<?= $row1['p_m_id'] ?>" value="0" type="number"
                                            style="font-weight:bold!important;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                            class="plus btnQuota"></button>
                                    </div>
                                </td>
                                <td>
                                    <div class="def-number-input number-input safari_only" style="margin:0 auto;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                            class="minus btnQuota"></button>
                                        <input class="quantity inputQuota" min="0" name="emp_qty_<?= $row1['p_m_id'] ?>"
                                            id="emp_qty_<?= $row1['p_m_id'] ?>" value="0" type="number"
                                            style="font-weight:bold!important;">
                                        <button type="button"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                            class="plus btnQuota"></button>
                                    </div>
                                </td>
                                <td>
                                    <input class="quantity num_qty_ministry" min="0"
                                        name="num_qty_<?= $row1['p_m_id'] ?>" id="num_qty_<?= $row1['p_m_id'] ?>"
                                        value="0" type="number"
                                        style="border:none;width:100%;max-width:180px;text-align:center;font-weight: bold;"
                                        disabled>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btn_save_dis" class="btn btn-primary">ບັນທຶກ</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
    }

?>

<script>
$("#click-col-1").click(function() {
    // $("#icon-click").removeClass("");
    $("#icon-click-1").toggleClass("fa-plus fa-minus");
    $("#click-col-1").toggleClass("btn-outline-success btn-outline-danger");
    // $("#click-col").addClass("btn-outline-danger");
});
$("#click-col-2").click(function() {
    // $("#icon-click").removeClass("");
    $("#icon-click-2").toggleClass("fa-plus fa-minus");
    $("#click-col-2").toggleClass("btn-outline-success btn-outline-danger");
    // $("#click-col").addClass("btn-outline-danger");
});

function count() {
    var std_qty = 0;
    var emp_qty = 0;

    var total_qty = 0;
    <?php
            $count_dist = mysqli_query($conn, "SELECT * FROM province_ministry");

            foreach ($count_dist as $cd) {
                ?>
    std_qty += parseInt($("#std_qty_<?= $cd['p_m_id'] ?>").val());
    emp_qty += parseInt($("#emp_qty_<?= $cd['p_m_id'] ?>").val());

    $("#num_qty_<?= $cd['p_m_id'] ?>").val(
        parseInt($("#std_qty_<?= $cd['p_m_id'] ?>").val()) +
        parseInt($("#emp_qty_<?= $cd['p_m_id'] ?>").val())
    );
    <?php
            }
        ?>
    total_qty = std_qty + emp_qty;
}

$('.btnQuota').on('click', function() {
    count();
    province_total();
    ministry_total();
    new_total();
})

$('.inputQuota').keyup(function() {
    count();
    province_total();
    ministry_total();
    new_total();
})

$(document).ready(function() {
    count();
    province_total();
    ministry_total();
})

function province_total() {
    let total = 0;
    let inputs = $(".num_qty_province");

    for (var i = 0; i < inputs.length; i++) {
        // alert($(inputs[i]).val());
        total += Number.parseInt($(inputs[i]).val());
    }
    // alert(total);

    document.getElementById("total-province").innerHTML = total;
}

function ministry_total() {
    let total = 0;
    let inputs = $(".num_qty_ministry");

    for (var i = 0; i < inputs.length; i++) {
        // alert($(inputs[i]).val());
        total += Number.parseInt($(inputs[i]).val());
    }
    // alert(total);

    document.getElementById("total-ministry").innerHTML = total;
}

function new_total() {
    let total = 0;
    let inputs = $(".num_qty_new");

    for (var i = 0; i < inputs.length; i++) {
        // alert($(inputs[i]).val());
        total += Number.parseInt($(inputs[i]).val());
    }
    // alert(total);

    document.getElementById("total-new").innerHTML = total;
}
</script>