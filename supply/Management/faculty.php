<?php
  $title = "ຈັດການຂໍ້ມູນຂອງແຕ່ຄະນະ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>



<?php

  if(isset($_POST['btnDelete'])){
    $obj->delete_faculty(trim($_POST['id']));
  }
  if(isset($_POST['Fac_ID'])){
    $obj->insert_faculty(trim($_SESSION['uni_id'] ."_". $_POST['Fac_ID']),trim($_POST['Fac_Name']),trim($_POST['Uni_ID']));
  }
  if(isset($_POST['Fac_ID_update'])){
    $obj->update_faculty(trim($_POST['Fac_ID_update']),trim($_POST['Fac_Name_update']),trim($_POST['Uni_ID_update']));
  }
?>
<div style="width: 100%;">
    <div style="width: 48%; float: left;">
        <b>ລາຍການ<?php echo $title?></b>&nbsp <img src="../../icon/hidemenu.ico" width="10px">
    </div>
    <div style="width: 46%; float: right;" align="right">
        <form action="faculty" id="form1" method="POST" enctype="multipart/form-data">
            <a href="#" data-toggle="modal" data-target="#exampleModalcategory">
                <img src="../../icon/add.ico" alt="" width="25px">
            </a>
            <div class="modal fade" id="exampleModalcategory" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ເພີ່ມຂໍ້ມູນຂອງແຕ່ລະຄະນະ </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span a ria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ລະຫັດຄະນະ</label>
                                    <input type="text" name="Fac_ID" id="Fac_ID" placeholder="ລະຫັດຄະນະ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ຊື່ຄະນະ</label>
                                    <input type="text" name="Fac_Name" id="Fac_Name" placeholder="ຊື່ຄະນະ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ວິທະຍາໄລ</label>
                                    <select name="Uni_ID" id="Uni_ID">
                                        <option value="" disabled selected>ເລືອກວິທະຍາໄລ</option>
                                        <?php
                                        //ສະແດງຂໍ້ມູນມະຫາວິທະຍາໄລ
                                            $university = mysqli_query($conn, "select * from university where uni_id='$_SESSION[uni_id]'");
                                            
                                            foreach($university as $row) {
                                                echo '<option value="'.$row['uni_id'].'">'.$row['uni_name'].'</option>';
                                            }
                                            mysqli_free_result($university);
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

        <form action="faculty" id="formUpdate" method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂຂໍ້ມູນຂອງແຕ່ຄະນະ </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ຊື່ຄະນະ</label>
                                    <input type="hidden" name="Fac_ID_update" id="Fac_ID_update"
                                        placeholder="ລະຫັດຄະນະ">
                                    <input type="text" name="Fac_Name_update" id="Fac_Name_update" placeholder="ຊື່ຄະນະ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ວິທະຍາໄລ</label>
                                    <select name="Uni_ID_update" id="Uni_ID_update">
                                        <option value="" disabled selected>ເລືອກວິທະຍາໄລ</option>
                                        <?php
                                        //ສະແດງຂໍ້ມູນມະຫາວິທະຍາໄລ
                                            $university2 = mysqli_query($conn, "select * from university where uni_id='$_SESSION[uni_id]'");
                                            
                                            foreach($university2 as $row) {
                                                echo '<option value="'.$row['uni_id'].'">'.$row['uni_name'].'</option>';
                                            }
                                            mysqli_free_result($university2);
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
                            <button type="submit" name="btnUpdate" id="Update" class="btn btn-outline-success"
                                onclick="">ແກ້ໄຂ</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<form method="post" action="faculty">
    <div class="table-responsive">
        <?php 
           $obj->select_faculty($_SESSION['uni_id']);
           ?>
        <div class="row">
            <div class="col-md-8">
                <button type="button" data-toggle="modal" data-target="#exampleModalDelete_many"
                    class="btn btn-danger"><i class="fa fa-trash"></i> ລົບ</button>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
    
                    <input type="text" class="form-control" id="inCus" placeholder="ຄົ້ນຫາ"
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <table id="table" data-search-selector="#inCus" data-pagination="true"
            data-custom-search="customSearch" data-search="true" data-click-to-select="true" data-resizable="true"
            data-id-field="id" data-page-list="[10, 25, 50, 100, all]" data-search-highlight="true"
            data-search-align="left">
            <thead>
                <tr class="text-center">
                    <th data-field="state" data-checkbox="true"></th>
                    <th>ເຄື່ອງມື</th>
                    <th data-sortable="true">ລຳດັບ</th>
                    <th data-field="id" data-sortable="true">ລະຫັດຄະນະ</th>
                    <th data-field="name" data-sortable="true">ຊື່ຄະນະ</th>
                    <th data-field="uni_name" data-sortable="true">ວິທະຍາໄລ</th>
                    <th data-field="dept" data-sortable="true">ກົມ</th>
                    <th data-field="uni" class="hide_col">ລະຫັດວິທະຍາໄລ</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $i = 0;
                while($row = mysqli_fetch_array($result_fac)){
                    $i++;
            ?>
                <tr>
                    <td></td>
                    <td class="text-center">
                        <a href="#" data-toggle="modal" data-target="#exampleModalUpdate"
                            class="fa fa-pen toolcolor btnUpdate_faculty"></a>&nbsp; &nbsp;
                        <a href="#" data-toggle="modal" data-target="#exampleModalDelete"
                            class="fa fa-trash toolcolor btnDelete_faculty"></a>
                    </td>
                    <td style="width: 35px;"><?= $i ?>.</td>
                    <td><?= $row['fac_id'] ?></td>
                    <td><?= $row['fac_name'] ?></td>
                    <td><?= $row['uni_name'] ?></td>
                    <td><?= $row['dept_name'] ?></td>
                    <td class="hide_col"><?= $row['uni_id'] ?></td>
                </tr>
                <?php
                 }
                 mysqli_free_result($result_fac);  
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


<form action="faculty" id="formDelete" method="POST" enctype="multipart/form-data">
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
                $check_course = mysqli_query($conn, "SELECT * FROM course WHERE fac_id='$checkid'"); //ກວດສອບວ່າລະຫັ້ນນີ້ເຄີຍນຳໃຊ້ຫຼືຍັງ
                if(mysqli_num_rows($check_course) > 0){
                    $logic = 1;
                    echo"<script>";
                    echo"window.location.href='faculty?Checkdelete=true&&course=$checkid';";
                    echo"</script>";
                    break;
                }
            }
            if($logic == 0){
                $delete = 0;
                foreach($_POST["btSelectItem"] as $id){
                    
                    $delete_many = mysqli_query($conn, "call delete_faculty('$id')");
                    if(!$delete_many){
                        $delete = 1;
                        echo"<script>";
                        echo"window.location.href='faculty?del=fail';";
                        echo"</script>";
                    }
                    mysqli_free_result($delete_many);  
                    mysqli_next_result($conn);
                }
                if($delete == 0){
                    echo"<script>";
                    echo"window.location.href='faculty?del2=success';";
                    echo"</script>";
                }
                
            }
        }
        else{
            echo"<script>";
            echo"window.location.href='faculty?Checkbox=null';";
            echo"</script>";
        }
}
?>

<script type="text/javascript">
const myform = document.getElementById('form1');
const Fac_ID = document.getElementById('Fac_ID');
const Fac_Name = document.getElementById('Fac_Name');
const Uni_ID = document.getElementById('Uni_ID');
myform.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs();
});

function checkInputs() {
    Fac_IDValue = Fac_ID.value.trim();
    Fac_NameValue = Fac_Name.value.trim();
    Uni_IDValue = Uni_ID.value.trim();

    if (Fac_IDValue === '') {
        setErrorFor(Fac_ID, 'ກະລຸນາປ້ອນໄອດີຄະນະ');
    } else {
        setSuccessFor(Fac_ID);
    }

    if (Fac_NameValue === '') {
        setErrorFor(Fac_Name, 'ກະລຸນາປ້ອນຊື່ຄະນະ');
    } else {
        setSuccessFor(Fac_Name);
    }
    if (Uni_IDValue === '') {
        setErrorFor(Uni_ID, 'ກະລຸນາປ້ອນວິທະຍາໄລ');
    } else {
        setSuccessFor(Uni_ID);
    }
    if (Fac_IDValue !== '' && Fac_NameValue !== '' && Uni_IDValue !== '') {
        document.getElementById("form1").action = "faculty";
        document.getElementById("form1").submit();
    }
}
</script>

<script type="text/javascript">
const myformUpdate = document.getElementById('formUpdate');
const Fac_Name_update = document.getElementById('Fac_Name_update');
const Uni_ID_update = document.getElementById('Uni_ID_update');
myformUpdate.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputsUpdate();
});

function checkInputsUpdate() {
    Fac_Name_updateValue = Fac_Name_update.value.trim();
    Uni_ID_updateValue = Uni_ID_update.value.trim();
    if (Fac_Name_updateValue === '') {
        setErrorFor(Fac_Name_update, 'ກະລຸນາປ້ອນຊື່ຄະນະ');
    } else {
        setSuccessFor(Fac_Name_update);
    }

    if (Uni_ID_updateValue === '') {
        setErrorFor(Uni_ID_update, 'ກະລຸນາປ້ອນວິທະຍາໄລ');
    } else {
        setSuccessFor(Uni_ID_update);
    }
    if (Fac_Name_updateValue !== '' && Uni_ID_updateValue !== '') {
        document.getElementById("formUpdate").action = "faculty";
        document.getElementById("formUpdate").submit();
    }
}
</script>

<!-- sweetalert -->
<?php
    // check if id exist
  if(isset($_GET['fac_id'])=='same'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກລະຫັດຄະນະນີ້ມີແລ້ວ ກະລຸນາໃສ່ລະຫັດອື່ນ !!", "info");
    </script>';
  }
  // check if name exist
  if(isset($_GET['name'])=='same'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກຊື່ຄະນະນີ້ມີແລ້ວ ກະລຸນາໃສ່ຊື່ອື່ນ !!", "info");
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
    swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກຊື່ຄະນະນີ້ມີແລ້ວ ກະລຸນາໃສ່ຊື່ອື່ນ !!", "info");
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
    swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນຄະນະນີ້ໄ້ດເນື່ອງຈາກລະຫັດຄະນະນີ້ເຄີຍໝູນໃຊ້ໃນຂໍ້ມູນສາຂາວິຊາ", "error");
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

  //if checkbox null
  if(isset($_GET['Checkbox'])=='null'){
    echo'<script type="text/javascript">
    swal("", "ກະລຸນາເລື່ອກຂໍ້ມູນທີ່ຕ້ອງການລົບ", "info");
    </script>';
  }

   //ຖ້າລະຫັດຖືກໃຊ້
   if(isset($_GET['Checkdelete'])=='true' && isset($_GET['course'])){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດດຳເນີນການຕໍ່ໄດ້ເນື່ອງຈາກໄອດີ '.$_GET['course'].' ຖືກນຳໃຊ້ໃນຂໍ້ມູນສາຂາວິຊາແລ້ວ", "warning");
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

function customSearch(data, text) {
    return data.filter(function(row) {
        return row.id.indexOf(text) > -1 || row.name.indexOf(text) > -1 || row.uni_name.indexOf(text) > -1 ||
            row.dept.indexOf(text) > -1
    })
}
</script>

<script>
$(document).on("click", ".btnUpdate_faculty", function() {
    $('#exampleModalUpdate').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    console.log(data);

    $('#Fac_ID_update').val(data[3]);
    $('#Fac_Name_update').val(data[4]);
    $('#Uni_ID_update').val(data[7]);

});
$(document).on("click", ".btnDelete_faculty", function() {
    $('#exampleModalDelete').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    console.log(data);

    $('#id').val(data[3]);

});
</script>