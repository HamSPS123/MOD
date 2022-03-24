<?php
  $title = "ຈັດການຂໍ້ມູນຂອງແຕ່ລະກົມ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>



<?php


  if(isset($_POST['btnDelete'])){
    $obj->delete_department(trim($_POST['id']));
  }
  if(isset($_POST['Dept_ID'])){
    $obj->insert_department(trim($_POST['Dept_ID']),trim($_POST['Dept_Name']));
  }
  if(isset($_POST['Dept_Name_update'])){
    $obj->update_department(trim($_POST['Dept_ID_update']),trim($_POST['Dept_Name_update']));
  }
?>
<div style="width: 100%;">
    <div style="width: 48%; float: left;">
        <b>ລາຍການ<?php echo $title?></b>&nbsp <img src="../../icon/hidemenu.ico" width="10px">
    </div>
    <div style="width: 46%; float: right;" align="right">
        <form action="group" id="form1" method="POST" enctype="multipart/form-data">
            <a href="#" data-toggle="modal" data-target="#exampleModalcategory">
                <img src="../../icon/add.ico" alt="" width="25px">
            </a>
            <div class="modal fade" id="exampleModalcategory" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ເພີ່ມຂໍ້ມູນຂອງແຕ່ລະກົມ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span a ria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ລະຫັດກົມ</label>
                                    <input type="text" name="Dept_ID" id="Dept_ID" placeholder="ລະຫັດກົມການສຶກສາ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ຊື່ກົມການສຶກສາ</label>
                                    <input type="text" name="Dept_Name" id="Dept_Name" placeholder="ຊື່ກົມການສຶກສາ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-dismiss="modal">ຍົກເລີກ</button>
                            <button type="submit" name="Save" id="Save" class="btn btn-outline-primary"
                                onclick="">ບັນທຶກ</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="group" id="formUpdate" method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂຂໍ້ມູນຂອງແຕ່ລະກົມ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ຊື່ກົມການສຶກສາ</label>
                                    <input type="hidden" name="Dept_ID_update" id="Dept_ID_update"
                                        placeholder="ລະຫັດກົມການສຶກສາ">
                                    <input type="text" name="Dept_Name_update" id="Dept_Name_update"
                                        placeholder="ຊື່ກົມການສຶກສາ" class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                    <small class="">Error message</small>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-dismiss="modal">ຍົກເລີກ</button>
                            <button type="submit" name="btnUpdate" id="Update" class="btn btn-outline-success"
                                onclick="">ແກ້ໄຂ</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="clearfix"></div><br>
<?php
   $obj->select_department();
?>
<form method="post" action="group">
    <div class="table-responsive">
        <div id="toolbar">
            <div class="input-group mb-3">

                <input type="text" class="form-control" id="inCus" placeholder="ຄົ້ນຫາ"
                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" type="button"><i class="fas fa-search"></i></button>
                </div>
                &nbsp; &nbsp;
                <button type="button" data-toggle="modal" data-target="#exampleModalDelete_many"
                    class="btn btn-danger"><i class="fa fa-trash"></i> ລົບ</button>
            </div>
        </div>

        <table id="table" data-search-selector="#inCus" data-toolbar="#toolbar" data-pagination="true"
            data-search="true" data-advanced-search="true" data-click-to-select="true" data-id-table="advancedTable"
            data-show-columns="true" data-resizable="true" data-id-field="id" data-page-list="[10, 25, 50, 100, all]"
            data-search-highlight="true" data-search-align="left">
            <thead>
                <tr class="text-center">
                    <th data-field="state" data-checkbox="true"></th>
                    <th>ເຄື່ອງມື</th>
                    <th data-sortable="true">ລຳດັບ</th>
                    <th data-field="id" data-sortable="true">ລະຫັດກົມການສຶກສາ</>
                    <th data-field="name" data-sortable="true">ຊື່ກົມການສຶກສາ</th>
                </tr>
            </thead>
            <tbody>
                <?php
         $i=0;
         while($row = mysqli_fetch_array($result_dept))
         {
            $i++;
            ?>
                <tr>
                    <td></td>
                    <td class="text-center" style="width: 100px;">
                        <a href="#" data-toggle="modal" data-target="#exampleModalUpdate"
                            class="fa fa-pen toolcolor btnUpdate_group"></a>&nbsp; &nbsp;
                        <a href="#" data-toggle="modal" data-target="#exampleModalDelete"
                            class="fa fa-trash toolcolor btnDelete_group"></a>
                    </td>
                    <td><?= $i ?>.</td>
                    <td><?= $row["dept_id"] ?></td>
                    <td><?= $row["dept_name"] ?></td>
                </tr>
                <?php
         }
         mysqli_free_result($result_dept);  
         mysqli_next_result($conn);
        ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="exampleModalDelete_many" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ຢືນຢັນການລົບຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" align="center">
                    ທ່ານຕ້ອງການລົບຂໍ້ມູນ ຫຼື ບໍ່ ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnDelete_many" class="btn btn-outline-danger">ລົບ</button>
                </div>
            </div>
        </div>
    </div>
</form>


<form action="group" id="formDelete" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ຢືນຢັນການລົບຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" align="center">
                    <input type="hidden" name="id" id="id">
                    ທ່ານຕ້ອງການລົບຂໍ້ມູນ ຫຼື ບໍ່ ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnDelete" class="btn btn-outline-danger">ລົບ</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
//ລົບຫຼາຍ user

if(isset($_POST["btnDelete_many"])){
    $logic = 0;
    
        if(isset($_POST["btSelectItem"])){
            foreach($_POST["btSelectItem"] as $checkid){
                $check_university = mysqli_query($conn, "SELECT * FROM university WHERE dept_id = '$checkid'"); //ກວດສອບລະຫັດໃນຕາຕະລາງ university
                $check_adjust = mysqli_query($conn, "SELECT * FROM adjust WHERE dept_id = '$checkid'"); //ກວດສອບລະຫັດໃນຕາຕະລາງ adjust
                if(mysqli_num_rows($check_university) > 0){
                    $logic = 1;
                    echo"<script>";
                    echo"window.location.href='group?Checkdelete=true&&uni=$checkid';";
                    echo"</script>";
                    break;
                }
                if(mysqli_num_rows($check_adjust) > 0){
                    $logic = 1;
                    echo"<script>";
                    echo"window.location.href='group?Checkdelete=true&&adjust=$checkid';";
                    echo"</script>";
                    break;
                }

                if ($_POST["btSelectItem"] == 'HRD001') {
                    $logic = 1;
                    echo"<script>";
                    echo"window.location.href='group?delete3=warning';";
                    echo"</script>";
                    break;
                }
            }
            if($logic == 0){
                $delete = 0;
                foreach($_POST["btSelectItem"] as $id){
                    
                    $delete_many = mysqli_query($conn,"call delete_department('$id')");
                    if(!$delete_many){
                        $delete = 1;
                        echo"<script>";
                        echo"window.location.href='group?del=fail';";
                        echo"</script>";
                    }
                    mysqli_free_result($delete_many);  
                    mysqli_next_result($conn);
                }
                if($delete == 0){
                    echo"<script>";
                    echo"window.location.href='group?del2=success';";
                    echo"</script>";
                }
                
            }
        }
        else{
            echo"<script>";
            echo"window.location.href='group?Checkbox=null';";
            echo"</script>";
        }
}
?>


<script type="text/javascript">
const myform = document.getElementById('form1');
const Dept_ID = document.getElementById('Dept_ID');
const Dept_Name = document.getElementById('Dept_Name');
myform.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs();
});

function checkInputs() {
    const Dept_IDValue = Dept_ID.value.trim();
    const Dept_NameValue = Dept_Name.value.trim();

    if (Dept_IDValue === '') {
        setErrorFor(Dept_ID, 'ກະລຸນາປ້ອນຊື່ກົມການສຶກສາ');
    } else {
        setSuccessFor(Dept_ID);
    }

    if (Dept_NameValue === '') {
        setErrorFor(Dept_Name, 'ກະລຸນາປ້ອນຊື່ກົມການສຶກສາ');
    } else {
        setSuccessFor(Dept_Name);
    }
    if (Dept_IDValue !== '' && Dept_NameValue !== '') {
        document.getElementById("form1").action = "group";
        document.getElementById("form1").submit();
    }
}
</script>

<script type="text/javascript">
const myformUpdate = document.getElementById('formUpdate');
const Dept_ID_update = document.getElementById('Dept_ID_update');
const Dept_Name_update = document.getElementById('Dept_Name_update');
myformUpdate.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputsUpdate();
});

function checkInputsUpdate() {
    const Dept_ID_updateValue = Dept_ID_update.value.trim();
    const Dept_Name_updateValue = Dept_Name_update.value.trim();
    if (Dept_ID_updateValue === '') {
        setErrorFor(Dept_Name_update, 'ກະລຸນາປ້ອນຊື່ກົມການສຶກສາ');
    } else {
        setSuccessFor(Dept_Name_update);
    }

    if (Dept_Name_updateValue === '') {
        setErrorFor(Dept_Name_update, 'ກະລຸນາປ້ອນຊື່ກົມການສຶກສາ');
    } else {
        setSuccessFor(Dept_Name_update);
    }

    if (Dept_ID_updateValue !== '' && Dept_Name_updateValue !== '') {
        document.getElementById("formUpdate").action = "group";
        document.getElementById("formUpdate").submit();
    }
}
</script>
<!-- sweetalert -->
<?php
  // check if name exist
  if(isset($_GET['name'])=='same'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກຊື່ກົມນີ້ມີແລ້ວ ກະລຸນາໃສ່ຊື່ອື່ນ !!", "info");
    </script>';
  }
  //check save
  if(isset($_GET['save'])=='fail'){
    echo'<script type="text/javascript">
    swal("", "ບັນທຶກຂໍ້ມູນບໍ່ສຳເລັດ", "error");
    </script>';
  }
  if(isset($_GET['save2'])=='success'){
    echo'<script type="text/javascript">
    swal("", "ບັນທຶກຂໍ້ມູນສຳເລັດ", "success");
    </script>';
  }
  // check if name_update exist
  if(isset($_GET['name_update'])=='same'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກຊື່ກົມນີ້ມີແລ້ວ ກະລຸນາໃສ່ຊື່ອື່ນ !!", "info");
    </script>';
  }
  //check update
  if(isset($_GET['update'])=='fail'){
    echo'<script type="text/javascript">
    swal("", "ແກ້ໄຂຂໍ້ມູນບໍ່ສຳເລັດ", "error");
    </script>';
  }
  if(isset($_GET['update2'])=='success'){
    echo'<script type="text/javascript">
    swal("", "ແກ້ໄຂຂໍ້ມູນສຳເລັດ", "success");
    </script>';
  }
  // check if dept_id exist in university
  if(isset($_GET['delete'])=='warning'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນກົມນີ້ໄດ້ເນື່ອງຈາກລະຫັດກົມນີ້ເຄີຍໝູນໃຊ້ໃນຂໍ້ມູນວິທະຍາໄລແລ້ວ", "info");
    </script>';
  }
   // check if dept_id exist in adjust
   if(isset($_GET['delete2'])=='warning'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນກົມນີ້ໄດ້ເນື່ອງຈາກລະຫັດກົມນີ້ເຄີຍໝູນໃຊ້ໃນຂໍ້ມູນແບ່ງປັນແລ້ວ", "info");
    </script>';
  }
  // check if dept_id exist in adjust
  if(isset($_GET['delete3'])=='warning'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນກົມນີ້ໄດ້ເນື່ອງຈາກລະຫັດກົມນີ້ຖືກສະຫງວນໄວ້!!!", "info");
    </script>';
  }
  // check delete
  if(isset($_GET['del'])=='fail'){
    echo'<script type="text/javascript">
    swal("", "ລົບຂໍ້ມູນບໍ່ສຳເລັດ", "error");
    </script>';
  }
  if(isset($_GET['del2'])=='success'){
    echo'<script type="text/javascript">
    swal("", "ລົບຂໍ້ມູນສຳເລັດ", "success");
    </script>';
  }
  //ຖ້າ checkbox = null
  if(isset($_GET['Checkbox'])=='null'){
    echo'<script type="text/javascript">
    swal("", "ກະລຸນາເລືອກຂໍ້ມູນທີ່ຕ້ອງການລົບ", "warning");
    </script>';
  }
  //ຖ້າລະຫັດຖືກໃຊ້
  if(isset($_GET['Checkdelete'])=='true' && isset($_GET['uni'])){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດດຳເນີນການຕໍ່ໄດ້ເນື່ອງຈາກໄອດີ '.$_GET['uni'].' ຖືກນຳໃຊ້ໃນຂໍ້ມູນວິທະຍາໄລແລ້ວ", "warning");
    </script>';
  }
  if(isset($_GET['Checkdelete'])=='true' && isset($_GET['adjust'])){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດດຳເນີນການຕໍ່ໄດ້ເນື່ອງຈາກໄອດີ '.$_GET['adjust'].' ຖືກນຳໃຊ້ໃນຂໍ້ມູນແບ່ງປັນທືນແລ້ວ", "warning");
    </script>';
  }
?>


<?php
 include ("../../header-footer/footer.php");
?>

<script>
$(function() {
    $('#table').bootstrapTable();
});
</script>

<script>
$(document).on("click", ".btnUpdate_group", function(){
    $('#exampleModalUpdate').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#Dept_ID_update').val(data[3]);
        $('#Dept_Name_update').val(data[4]);
});
$(document).on("click", ".btnDelete_group", function(){
    $('#exampleModalDelete').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[3]);
});
</script>