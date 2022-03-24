<?php
  $title = "ຈັດການຂໍ້ມູນລະດັບຊັ້ນ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>

<style>
.d-none {
    display: none !important;
}
</style>

<?php


//   if(isset($_POST['btnDelete'])){
//     $obj->delete_department(trim($_POST['id']));
//   }
  if(isset($_POST['btnSave'])){
    $obj->insert_newadjust(trim($_POST['fy_id_save']),trim($_POST['dept_id_save']));
  }
  if(isset($_POST['btnDelete'])){
    $obj->delete_newadjust(trim($_POST['adj_id_save']));
    //     echo"<script>
    // alert('$_POST[adj_id_save]');
    // </script>";
  }
?>
<div style="width: 100%;">
    <div style="width: 48%; float: left;">
        <b>ລາຍການ<?php echo $title?></b>&nbsp <img src="../../icon/hidemenu.ico" width="10px">
    </div>
    <div style="width: 46%; float: right;" align="right">
        <form action="Add-Dept" id="form1" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <a href="#" data-toggle="modal" data-target="#exampleModalcategory">
                <img src="../../icon/add.ico" alt="" width="25px">
            </a>
            <div class="modal fade" id="exampleModalcategory" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ເພີ່ມຂໍ້ມູນກົມເຂົ້າສົກຮຽນ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span a ria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6">
                                    <label>ເລືອກສົກຮຽນ</label>
                                    <select name="fy_id_save" id="fy_id_save" class="custom-select form-control" required>
                                        <option value="" disabled selected>ເລືອກສົກຮຽນ</option>
                                        <?php
                                            $obj->select_fy();                    
                                            if (mysqli_num_rows($result) > 0) {
                                            while ($row_fy = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value="<?= $row_fy['fy_id'] ?>"><?= $row_fy['fy_id'] ?></option>
                                        <?php
                                            }
                                            }else{
                                                echo '<option disabled>ບໍ່ມີຂໍ້ມູນ</option>';
                                            }
                                                mysqli_free_result($result);
                                                mysqli_next_result($conn);
                                            ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        ກະລຸນາເລືອກສົກຮຽນ
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6"><br>
                                    <label>ເລືອກກົມ</label>
                                        <select name="dept_id_save" id="dept_id_save" class="custom-select form-control" required>
                                            <option value="" disabled selected>ເລືອກກົມ</option>
                                            <?php
                                                $obj->select_department();                    
                                                if (mysqli_num_rows($result_dept) > 0) {
                                                    while ($row_dept = mysqli_fetch_array($result_dept)) {
                                                ?>
                                                    <option value="<?= $row_dept['dept_id'] ?>"><?= $row_dept['dept_name'] ?></option>
                                                <?php
                                                }
                                                    }else{
                                                        echo '<option disabled>ບໍ່ມີຂໍ້ມູນ</option>';
                                                    }
                                                    mysqli_free_result($result_dept);
                                                    mysqli_next_result($conn);
                                                ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            ກະລຸນາເລືອກກົມ
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-dismiss="modal">ຍົກເລີກ</button>
                            <button type="submit" name="btnSave" id="btnSave" class="btn btn-outline-primary"
                                onclick="">ບັນທຶກ</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="Add-Dept" id="formUpdate" method="POST" enctype="multipart/form-data" class="needs-validation"
            novalidate>
            <div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ທ່ານຕ້ອງການລົບກົມນີ້ອອກຈາກສົກຮຽນ ຫຼື ບໍ່ ?
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="center">
                                <div class="col-md-12 col-sm-6">
                                    <p>ທ່ານຕ້ອງການລົບກົມນີ້ອອກຈາກສົກຮຽນ</p>
                                    <input type="hidden" name="adj_id_save" id="adj_id_save">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-dismiss="modal">ຍົກເລີກ</button>
                            <button type="submit" name="btnDelete" id="Update" class="btn btn-outline-danger"
                                onclick="">ລົບ</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="clearfix"></div><br>
<?php
   $obj->select_adjust();
?>
    <div class="table-responsive">
        <div class="row">
            <div class="col-md-4 my-1">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="inCus" placeholder="ຄົ້ນຫາ"
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <table id="table" data-search-selector="#inCus" data-pagination="true" data-custom-search="customSearch"
            data-search="true" data-advanced-search="true" data-resizable="true" data-id-field="id"
            data-page-list="[10, 25, 50, 100, all]" data-search-highlight="true">
            <thead>
                <tr class="text-center">
                    <th class="d-none"></th>
                    <th>ເຄື່ອງມື</th>
                    <th data-sortable="true" style="width: 90px;">ລຳດັບ</th>
                    <th data-field="fy" data-sortable="true">ສົກຮຽນ</th>
                    <th data-field="name" data-sortable="true">ລາຍຊື່ກົມ</th>
                    <th data-field="accept" data-sortable="true">ສະຖານະອະນຸມັດ</th>
                </tr>
            </thead>
            <tbody>
                <?php
         $i=0;
         while($row = mysqli_fetch_array($result))
         {
            $i++;
            ?>
                <tr>
                    <td class="d-none"><?= $row["adj_id"] ?></td>
                    <td class="text-center" style="width: 100px;">
                        <a href="#" data-toggle="modal" data-target="#exampleModalUpdate"
                            class="fa fa-trash toolcolor btnUpdate_group"></a>
                    </td>
                    <td class="text-center" style="width: 90px;"><?= $i ?>.</td>
                    <td><?= $row["fy_id"] ?></td>
                    <td><?= $row["dept_name"] ?></td>
                    <td>
                        <?php 
                            if($row["accept"] == 1){
                               echo "ກົມຢືນຢັນການສ້າງແຜນຮັບ";
                            }
                            else{
                                echo "ຍັງບໍ່ຮັບການຢືນຢັນ";
                            }
                        ?>
                    </td>
                </tr>
                <?php
         }
         mysqli_free_result($result);  
         mysqli_next_result($conn);
        ?>
            </tbody>
        </table>
    </div>

<?php
//ລົບຫຼາຍ user

if(isset($_POST["btnDelete_many"])){
    $logic = 0;
    
        if(isset($_POST["btSelectItem"])){
            foreach($_POST["btSelectItem"] as $checkid){
                $check_course = mysqli_query($conn, "SELECT * FROM course WHERE level_id = '$checkid'"); //ກວດສອບລະຫັດໃນຕາຕະລາງ university
                
                if(mysqli_num_rows($check_course) > 0){
                    $logic = 1;
                    echo"<script>";
                    echo"window.location.href='level?Checkdelete=true&&course=$checkid';";
                    echo"</script>";
                    break;
                }
            }
            if($logic == 0){
                $delete = 0;
                foreach($_POST["btSelectItem"] as $id){
                    // $obj->delete_level($id);
                    
                    $delete_many = mysqli_query($conn,"call delete_level('$id')");
                    if(!$delete_many){
                        $delete = 1;
                        echo"<script>";
                        echo"window.location.href='level?msg=fail';";
                        echo"</script>";
                    }
                    mysqli_free_result($delete_many);  
                    mysqli_next_result($conn);
                }
                if($delete == 0){
                    echo"<script>";
                    echo"window.location.href='level?msg=success';";
                    echo"</script>";
                }
                
            }
        }
        else{
            echo"<script>";
            echo"window.location.href='level?Checkbox=null';";
            echo"</script>";
        }
}
?>


<!-- sweetalert -->
<?php
if(isset($_GET["msg"])){
    if($_GET["msg"]  == "adjustdetail-has"){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກກົມນີ້ ແລະ ສົກຮຽນນີ້ໄດ້ທຳການເຮັດແຜນສ້າງແລ້ວ", "info");
        </script>';
    }
    if($_GET["msg"]  == "create-has"){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກກົມນີ້ ແລະ ສົກຮຽນນີ້ໄດ້ທຳການເຮັດແຜນຮັບແລ້ວ", "info");
        </script>';
    }
    if($_GET["msg"]  == "dept-same"){
        echo'<script type="text/javascript">
        swal("", "ກົມນີ້ ແລະ ສົກຮຽນນີ້ມີຢູ່ແລ້ວ", "info");
        </script>';
    }
    if($_GET["msg"] == "fail"){
        echo'<script type="text/javascript">
        swal("", "ຜິດພາດ !", "error");
        </script>';
    }
    if($_GET["msg"] == "success"){
        echo'<script type="text/javascript">
        swal("", "ສຳເລັດ !", "success");
        </script>';
    }
}
  
?>


<?php
 include ("../../header-footer/footer.php");
?>

<script>
$(function() {
    $('#table').bootstrapTable();
});

function customSearch(data, text) {
    return data.filter(function(row) {
        return row.fy.indexOf(text) > -1 || row.name.indexOf(text) > -1
    })
}
</script>

<script>
$(document).on("click", ".btnUpdate_group", function() {
    $('#exampleModalUpdate').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    console.log(data);

    $('#adj_id_save').val(data[0]);
});
$(document).on("click", ".btnDelete_group", function() {
    $('#exampleModalDelete').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    console.log(data);

    $('#id').val(data[3]);
});
</script>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>