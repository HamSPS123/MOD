<?php
  $title = "ຈັດການຂໍ້ມູນມະຫາວິທະຍາໄລ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>


<?php


  if(isset($_POST['btnDelete'])){
    $obj->delete_university(trim($_POST['id']));
  }
  if(isset($_POST['Uni_Name'])){
    $obj->insert_university(trim($_POST['Uni_Id']),trim($_POST['Uni_Name']),trim($_POST['Dept_ID']));
  }
  if(isset($_POST['Uni_Name_update'])){
    $obj->update_university(trim($_POST['Uni_ID_update']),trim($_POST['Uni_Name_update']),trim($_POST['Dept_ID_update']));
  }


?>

<div style="width: 100%;">
    <div style="width: 48%; float: left;">
        <b>ລາຍການ<?php echo $title?></b>&nbsp <img src="../../icon/hidemenu.ico" width="10px">
    </div>
    <div style="width: 46%; float: right;" align="right">
        <!-- insert form -->
        <form action="university" id="form1" method="POST" enctype="multipart/form-data">
            <a href="#" data-toggle="modal" data-target="#exampleModalcategory">
                <img src="../../icon/add.ico" alt="" width="25px">
            </a>
            <div class="modal fade" id="exampleModalcategory" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ເພີ່ມຂໍ້ມູນມະຫາວິທະຍາໄລ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span a ria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ລະຫັດວິທະຍາໄລ</label>
                                    <input type="text" name="Uni_Id" id="Uni_Id" placeholder="ລະຫັດວິທະຍາໄລ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ຊື່ວິທະຍາໄລ</label>
                                    <input type="hidden" name="CC" id="CC" placeholder="ວິທະຍາໄລ">
                                    <input type="text" name="Uni_Name" id="Uni_Name" placeholder="ຊື່ວິທະຍາໄລ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ແຕ່ລະກົມ</label>
                                    <select name="Dept_ID" id="Dept_ID">
                                        <option value="" disabled selected>ເລືອກແຕ່ລະກົມ</option>
                                        <?php
                                        //ດຶງຂໍ້ມູນກົມມາສະແດງ
                                          $select_dept = mysqli_query($conn, "SELECT * FROM department WHERE dept_id != 'HRD001'");
                                          while($row = mysqli_fetch_array($select_dept)){
                                            echo '<option value="'.$row["dept_id"].'">'.$row["dept_name"].'</option>';
                                          }
                                          mysqli_free_result($select_dept);
                                            mysqli_next_result($conn);
                                        ?>
                                    </select>
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

        <form action="university" id="formUpdate" method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂຂໍ້ມູນມະຫາວິທະຍາໄລ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <div class="col-md-12 col-sm-6 form-control2">
                                        <label>ຊື່ວິທະຍາໄລ</label>
                                        <input type="hidden" name="Uni_ID_update" id="Uni_ID_update"
                                            placeholder="ວິທະຍາໄລ">
                                        <input type="text" name="Uni_Name_update" id="Uni_Name_update"
                                            placeholder="ຊື່ວິທະຍາໄລ" class="form-control">
                                        <i class="fas fa-check-circle "></i>
                                        <i class="fas fa-exclamation-circle"></i>
                                        <small class="">Error message</small>
                                    </div>
                                    <div class="col-md-12 col-sm-6 form-control2">
                                        <label>ແຕ່ລະກົມ</label>
                                        <select name="Dept_ID_update" id="Dept_ID_update">
                                            <option value="" disabled>ເລືອກແຕ່ລະກົມ</option>
                                            <?php
                                        //ດຶງຂໍ້ມູນກົມມາສະແດງ
                                          $select_dept2 = mysqli_query($conn, "SELECT * FROM department");
                                          while($row = mysqli_fetch_array($select_dept2)){
                                            echo '<option value="'.$row["dept_id"].'">'.$row["dept_name"].'</option>';
                                          }
                                          mysqli_free_result($select_dept2);
                                            mysqli_next_result($conn);
                                        ?>
                                        </select>
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
</div>
<div class="clearfix"></div><br>

<form method="post" action="university">
    <div class="table-responsive">
        <?php
        // fetch
          $obj->select_university();
        ?>
        <div id="toolbar">
            <div class="input-group mb-3">

                <input type="text" class="form-control" id="inCus" placeholder="ຄົ້ນຫາ ຊື່ ແລະ ນາມສະກຸນ"
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
            <thead class="text-center">
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th>ເຄື່ອງມື</th>
                    <th data-field="id" data-sortable="true">ວິທະຍາໄລ</th>
                    <th data-field="name" data-sortable="true">ຊື່ວິທະຍາໄລ</th>
                    <th data-field="dept" data-sortable="true">ແຕ່ລະກົມ</th>
                    <th class="hide_col">ລະຫັດກົມ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  while($row = mysqli_fetch_array($result_uni)){
                ?>
                <tr>
                    <td></td>
                    <td class="text-center" style="width: 100px;">
                        <a href="#" data-toggle="modal" data-target="#exampleModalUpdate"
                            class="fa fa-pen toolcolor btnUpdate_University"></a>&nbsp; &nbsp;
                        <a href="#" data-toggle="modal" data-target="#exampleModalDelete"
                            class="fa fa-trash toolcolor btnDelete_University"></a>
                    </td>
                    <td><?= $row['uni_id'] ?></td>
                    <td><?= $row['uni_name'] ?></td>
                    <td><?= $row['dept_name'] ?></td>
                    <td><?= $row['dept_id'] ?></td>
                </tr>
                <?php 
            } 
            mysqli_free_result($result_uni);
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


<form action="university" id="formDelete" method="POST" enctype="multipart/form-data">
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
                $check_supply = mysqli_query($conn, "SELECT * FROM supply_user WHERE uni_id='$checkid';"); //ກວດສອບລະຫັດໃນຕາຕະລາງ supply_user
                $check_faculty = mysqli_query($conn, "SELECT * FROM faculty WHERE uni_id='$checkid';"); //ກວດສອບລະຫັດໃນຕາຕະລາງ faculty
                $check_hrd = mysqli_query($conn, "SELECT * FROM hrd_user WHERE uni_id='$checkid';"); //ກວດສອບລະຫັດໃນຕາຕະລາງ hrd_user
                if(mysqli_num_rows($check_supply) > 0){
                    $logic = 1;
                    echo"<script>";
                    echo"window.location.href='university?Checkdelete=true&&sup=$checkid';";
                    echo"</script>";
                    break;
                }
                if(mysqli_num_rows($check_faculty) > 0){
                    $logic = 1;
                    echo"<script>";
                    echo"window.location.href='university?Checkdelete=true&&fac=$checkid';";
                    echo"</script>";
                    break;
                }
                if(mysqli_num_rows($check_hrd) > 0){
                    $logic = 1;
                    echo"<script>";
                    echo"window.location.href='university?Checkdelete=true&&hrd=$checkid';";
                    echo"</script>";
                    break;
                }
                if ($_POST["btSelectItem"] == 'HRD1') {
                    $logic = 1;
                    echo"<script>";
                    echo"window.location.href='university?delete2=warning';";
                    echo"</script>";
                    break;
                }
            }
            if($logic == 0){
                $delete = 0;
                foreach($_POST["btSelectItem"] as $id){
                    
                    $delete_many = mysqli_query($conn, "call delete_university('$id')");
                    if(!$delete_many){
                        $delete = 1;
                        echo"<script>";
                        echo"window.location.href='university?del=fail';";
                        echo"</script>";
                    }
                    mysqli_free_result($delete_many);  
                    mysqli_next_result($conn);
                }
                if($delete == 0){
                    echo"<script>";
                    echo"window.location.href='university?del2=success';";
                    echo"</script>";
                }
                
            }
        }
        else{
            echo"<script>";
            echo"window.location.href='university?Checkbox=null';";
            echo"</script>";
        }
}
?>


<script type="text/javascript">
const myform = document.getElementById('form1');
const Uni_Id = document.getElementById('Uni_Id');
const Uni_Name = document.getElementById('Uni_Name');
const Dept_ID = document.getElementById('Dept_ID');
myform.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs();
});

function checkInputs() {
    const Uni_IdValue = Uni_Id.value.trim();
    const Uni_NameValue = Uni_Name.value.trim();
    const Dept_IDValue = Dept_ID.value.trim();

    if (Uni_IdValue === '') {
        setErrorFor(Uni_Id, 'ກະລຸນາປ້ອນລະຫັດວິທະຍາໄລ');
    } else {
        setSuccessFor(Uni_Id);
    }
    if (Uni_NameValue === '') {
        setErrorFor(Uni_Name, 'ກະລຸນາປ້ອນຊື່ວິທະຍາໄລ');
    } else {
        setSuccessFor(Uni_Name);
    }
    if (Dept_IDValue === '') {
        setErrorFor(Dept_ID, 'ກະລຸນາເລືອກກົມການສຶກສາ');
    } else {
        setSuccessFor(Dept_ID);
    }
    if (Uni_IdValue !== '' && Uni_NameValue !== '' && Dept_IDValue !== '') {
        document.getElementById("form1").action = "university";
        document.getElementById("form1").submit();
    }
}
</script>

<script type="text/javascript">
const myformUpdate = document.getElementById('formUpdate');
const Uni_Name_update = document.getElementById('Uni_Name_update');
const Dept_ID_update = document.getElementById('Dept_ID_update');
myformUpdate.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputsUpdate();
});

function checkInputsUpdate() {
    const Uni_Name_updateValue = Uni_Name_update.value.trim();
    const Dept_ID_updateValue = Dept_ID_update.value.trim();
    if (Uni_Name_updateValue === '') {
        setErrorFor(Uni_Name_update, 'ກະລຸນາປ້ອນຊື່ວິທະຍາໄລ');
    } else {
        setSuccessFor(Uni_Name_update);
    }
    if (Dept_ID_updateValue === '') {
        setErrorFor(Dept_ID_update, 'ກະລຸນາເລືອກກົມການສຶກສາ');
    } else {
        setSuccessFor(Dept_ID_update);
    }
    if (Uni_Name_updateValue !== '' && Dept_ID_updateValue !== '') {
        document.getElementById("formUpdate").action = "university";
        document.getElementById("formUpdate").submit();
    }
}
</script>

<!-- sweetalert -->
<?php
  // check if name exist
  if(isset($_GET['same'])=='same'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກລະຫັດນີ້ມີແລ້ວ ກະລຸນາໃສ່ຊື່ອື່ນ !!", "info");
    </script>';
  }

  if(isset($_GET['same2'])=='same'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກຊື່ວິທະຍາໄລນີ້ມີແລ້ວ ກະລຸນາໃສ່ຊື່ອື່ນ !!", "info");
    </script>';
  }

  if(isset($_GET['expect'])=='expect'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກກົມສູນກາງມີຢູ່ແລ້ວ ກະລຸນາໃສ່ຊື່ອື່ນ !!", "info");
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
    swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກຊື່ປະເພດສິນຄ້ານີ້ມີແລ້ວ ກະລຸນາໃສ່ຊື່ອື່ນ !!", "info");
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
  // check if category_id exist in product
  if(isset($_GET['delete'])=='warning'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນວິທະຍາໄລນີ້ໄ້ດເນື່ອງຈາກລະຫັດວິທະຍາໄລນີ້ເຄີຍໝູນໃຊ້ແລ້ວ!!!", "info");
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

  if(isset($_GET['delete2'])=='warning'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກລະຫັດນີ້ຖືກສະຫງວນໄວ້!!!", "info");
    </script>';
  }
  //if checkbox is null
  if(isset($_GET['Checkbox'])=='null'){
    echo'<script type="text/javascript">
    swal("", "ກະລຸນາເລືອກຜູ້ໃຊ້ທີ່ຕ້ອງການລົບ", "warning");
    </script>';
  }
   //ຖ້າລະຫັດຖືກໃຊ້
   if(isset($_GET['Checkdelete'])=='true' && isset($_GET['sup'])){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດດຳເນີນການຕໍ່ໄດ້ເນື່ອງຈາກໄອດີ '.$_GET['sup'].' ຖືກນຳໃຊ້ແລ້ວ", "warning");
    </script>';
  }
  if(isset($_GET['Checkdelete'])=='true' && isset($_GET['fac'])){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດດຳເນີນການຕໍ່ໄດ້ເນື່ອງຈາກໄອດີ '.$_GET['fac'].' ຖືກນຳໃຊ້ແລ້ວ", "warning");
    </script>';
  }
  if(isset($_GET['Checkdelete'])=='true' && isset($_GET['hrd'])){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດດຳເນີນການຕໍ່ໄດ້ເນື່ອງຈາກໄອດີ '.$_GET['hrd'].' ຖືກນຳໃຊ້ແລ້ວ", "warning");
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
$(document).on("click", ".btnUpdate_University", function(){
    $('#exampleModalUpdate').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#Uni_ID_update').val(data[2]);
        $('#Uni_Name_update').val(data[3]);
        $('#Dept_ID_update').val(data[5]);
});
$(document).on("click", ".btnDelete_University", function(){
    $('#exampleModalDelete').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[2]);
});
</script>