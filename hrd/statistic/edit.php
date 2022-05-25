<?php
    $path = "../../";
    include $path."oop/connect.php";
    $st_id = $_POST['query'];
    $adj_id = $_POST['adj'];

    
    $univer = 0;
    $univer_val = 0;
    $prov = 0;
    $intv = 0;
    $ad_test = 0;
    $std_pub = 0;
    $emp = 0;
    $std_handi = 0;
    $std_lan = 0;
    $ssk = 0;
    $std = 0;
    $emp_gov = 0;
    $test = 0;
    $std_con = 0;
    $std_2lan = 0;
    $std_inter = 0;
    $emp_private = 0;

    $sql = mysqli_query($conn, "SELECT * FROM statistic_detail WHERE st_id='$st_id' AND adj_id='$adj_id'");
    if(mysqli_num_rows($sql) > 0){
        foreach($sql as $row){
            $as_id = $row['as_id'];
            $univer = $row['univer'];
            $univer_val = $row['univer_valunteer'];
            $prov = $row['prov'];
            $intv = $row['intv'];
            $ad_test = $row['ad_test'];
            $std_pub = $row['std_public'];
            $emp = $row['emp'];
            $std_handi = $row['std_handi'];
            $std_lan = $row['std_lan'];
            $ssk = $row['ssk'];
            $std = $row['std'];
            $emp_gov = $row['emp_gov'];
            $test = $row['test'];
            $std_con = $row['std_con'];
            $std_2lan = $row['std_2lan'];
            $std_inter = $row['std_inter'];
            $emp_private = $row['emp_private'];
        }
    }
?>

<form action="statistic.php" method="post" class="needs-validation" novalidate>
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title-edit">ແກ້ໄຂຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="as_id" id="as_id" value="<?= $as_id ?>">
                    <h5 class="mt-3">ແບ່ງປັນ: <span id="total-dis-update">0</span></h5>
                    <hr>
                    <div class="col-md-12">
                        <label for="">ມະຫາໄລ</label>
                        <input type="number" name="univer_update" id="univer_update" class="form-control"
                            onchange="cal_dis_update()" value="<?= $univer ?>" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ຄູອາສາສະໝັກ</label>
                        <input type="number" name="univer_val_update" id="univer_val_update" class="form-control"
                            onchange="cal_dis_update()" value="<?= $univer_val ?>" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ແຂວງ</label>
                        <input type="number" name="prov_update" id="prov_update" class="form-control"
                            onchange="cal_dis_update()" value="<?= $prov ?>" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ສຳພາດ</label>
                        <input type="number" name="intv_update" id="intv_update" class="form-control"
                            onchange="cal_dis_update()" value="<?= $intv ?>" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ສອບເສັງ</label>
                        <input type="number" name="ad_test_update" id="ad_test_update" class="form-control"
                            onchange="cal_dis_update()" value="<?= $ad_test ?>" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ພະນັກງານ</label>
                        <input type="number" name="emp_update" id="emp_update" class="form-control"
                            onchange="cal_dis_update()" value="<?= $emp ?>" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ນັກຮຽນສາມັນ</label>
                        <input type="number" name="std_pub_update" id="std_pub_update" class="form-control" onchange="cal_dis_update()"
                            value="<?= $std_pub ?>" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ນັກຮຽນພິການ</label>
                        <input type="number" name="std_handi_update" id="std_handi_update" class="form-control"
                            onchange="cal_dis_update()" value="<?= $std_handi ?>" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ນັກຮຽນຫ້ອງ 2 ພາສາ</label>
                        <input type="number" name="std_lan_update" id="std_lan_update" class="form-control"
                            onchange="cal_dis_update()" value="<?= $std_lan ?>" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ສສກ ແບ່ງ</label>
                        <input type="number" name="ssk_update" id="ssk_update" class="form-control" onchange="cal_dis_update()"
                            value="<?= $ssk ?>" min="0" required>
                    </div>

                    <h5 class="mt-3">ແຈກຢາຍ: <span id="total-quota-update">0</span></h5>
                    <hr>
                    <div class="col-md-12">
                        <label for="">ນັກຮຽນ</label>
                        <input type="number" name="std_update" id="std_update" class="form-control"
                            onchange="cal_quota_update()" value="<?= $std ?>" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ພະນັກງານລັດ</label>
                        <input type="number" name="emp_gov_update" id="emp_gov_update" class="form-control"
                            onchange="cal_quota_update()" value="<?= $emp_gov ?>" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ສອບເສັງ</label>
                        <input type="number" name="test_update" id="test_update" class="form-control"
                            onchange="cal_quota_update()" value="<?= $test ?>" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ນັກຮຽນຕໍ່ເນື່ອງ</label>
                        <input type="number" name="std_con_update" id="std_con_update" class="form-control"
                            onchange="cal_quota_update()" value="<?= $std_con ?>" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ນັກຮຽນຫ້ອງ 2 ພາສາ ລາວ-ຝລັ່ງ</label>
                        <input type="number" name="std_2lan_update" id="std_2lan_update" class="form-control"
                            onchange="cal_quota_update()" value="<?= $std_2lan ?>" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ນັກຮຽນຕ່າງປະເທດ</label>
                        <input type="number" name="std_inter_update" id="std_inter_update" class="form-control"
                            onchange="cal_quota_update()" value="<?= $std_inter ?>" min="0" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">ພະນັກງານເອກະຊົນ</label>
                        <input type="number" name="emp_private_update" id="emp_private_update" class="form-control"
                            onchange="cal_quota_update()" value="<?= $emp_private ?>" min="0" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnEdit" id="btnEdit" class="btn btn-success">ບັນທຶກ</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
function cal_quota_update() {
    let total = 0;

    let std = Number.parseInt(document.getElementById("std_update").value);
    let emp_gov = Number.parseInt(document.getElementById("emp_gov_update").value);
    let test = Number.parseInt(document.getElementById("test_update").value);
    let std_con = Number.parseInt(document.getElementById("std_con_update").value);
    let std_2lan = Number.parseInt(document.getElementById("std_2lan_update").value);
    let std_inter = Number.parseInt(document.getElementById("std_inter_update").value);
    let emp_private = Number.parseInt(document.getElementById("emp_private_update").value);


    total = std + emp_gov + test + std_con + std_2lan + std_inter + emp_private;

    document.getElementById("total-quota-update").innerHTML = total;
}

function cal_dis_update() {
    let total = 0;

    let univer = Number.parseInt(document.getElementById("univer_update").value);
    let univer_val = Number.parseInt(document.getElementById("univer_val_update").value);
    let prov = Number.parseInt(document.getElementById("prov_update").value);
    let intv = Number.parseInt(document.getElementById("intv_update").value);
    let ad_test = Number.parseInt(document.getElementById("ad_test_update").value);
    let std_pub = Number.parseInt(document.getElementById("std_pub_update").value);
    let emp = Number.parseInt(document.getElementById("emp_update").value);
    let std_handi = Number.parseInt(document.getElementById("std_handi_update").value);
    let std_lan = Number.parseInt(document.getElementById("std_lan_update").value);
    let ssk = Number.parseInt(document.getElementById("ssk_update").value);


    total = univer + univer_val + prov + intv + ad_test + std_pub + emp + std_handi + std_lan + ssk;

    document.getElementById("total-dis-update").innerHTML = total;
}

$(document).ready(function(){
    cal_dis_update();
    cal_quota_update();
})
</script>