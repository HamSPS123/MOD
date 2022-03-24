<?php
  $title = "ອັບໂຫຼດຟາຍ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>
<?php

  if(isset($_POST['btnDelete'])){
    $obj->delete_category(trim($_POST['id']));
  }
  if(isset($_POST['Doc_ID'])){
    $obj->insert_upload(trim($_POST['Doc_ID']),trim($_POST['Fy_ID']),trim($_POST['Description']),$_FILES["Cover"]["name"],$_FILES["pdf_file"]["name"]);
  }
  if(isset($_POST['Up_ID_update'])){
    $obj->update_upload(trim($_POST['Up_ID_update']),trim($_POST['Doc_ID_update']),trim($_POST['Fy_ID_update']),trim($_POST['Description_update']),$_FILES["Cover_update"]["name"],$_FILES["pdf_file_update"]["name"]);
  }
?>
<div style="width: 100%;">
    <div style="width: 48%; float: left;">
        <b>ລາຍການ<?php echo $title?></b>&nbsp <img src="../../icon/hidemenu.ico" width="10px">
    </div>
    <div style="width: 46%; float: right;" align="right">
        <form action="upload" id="form1" method="POST" enctype="multipart/form-data">
            <a href="#" data-toggle="modal" data-target="#exampleModalcategory">
                <img src="../../icon/add.ico" alt="" width="25px">
            </a>
            <div class="modal fade" id="exampleModalcategory" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ເພີ່ມຂໍ້ມູນອັບໂຫຼດເອກະສານ </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span a ria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ປະເພດເອກະສານ</label>
                                    <input type="hidden" name="Up_ID" id="Up_ID" placeholder="ລະຫັດອັບໂຫຼດ">
                                    <!-- <input type="text" name="Doc_ID" id="Doc_ID" placeholder="ປະເພດເອກະສານ"> -->
                                    <select name="Doc_ID" id="Doc_ID">
                                        <option value="" selected disabled>ເລືອກປະເພດເອກະສານ</option>
                                        <?php
                                            $type = mysqli_query($conn, "select * from document_type");
                                            foreach($type as $row){
                                                ?>
                                        <option value="<?= $row['doc_id'] ?>"><?= $row['doc_name'] ?></option>
                                        <?php
                                            }
                                            mysqli_free_result($type);
                                            mysqli_next_result($conn);
                                        ?>
                                    </select>
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ສົກຮຽນປີ</label>
                                    <select name="Fy_ID" id="Fy_ID">
                                        <option value="" selected disabled>ເລືອກສົກຮຽນປີ</option>
                                        <?php
                                            $fy = mysqli_query($conn, "SELECT * FROM fy ORDER BY fy_id DESC");
                                            foreach($fy as $row){
                                                ?>
                                        <option value="<?= $row['fy_id'] ?>"><?= $row['fy_id'] ?></option>
                                        <?php
                                            }
                                            mysqli_free_result($fy);
                                            mysqli_next_result($conn);
                                        ?>
                                    </select>
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ລາຍລະອຽດເອກະສານ</label>
                                    <input type="text" name="Description" id="Description" placeholder="ລາຍລະອຽດເອກະສານ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ໄຟລ໌ PDF</label>
                                    <input type="file" name="pdf_file" id="pdf_file" accept=".pdf" placeholder="ໄຟລ໌ PDF">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ຮູບໜ້າປົກ</label>
                                    <input type="file" name="Cover" id="Cover" accept=".jpg,.png,.gif,.jpeg"
                                        onchange="loadFile(event)" placeholder="ຮູບໜ້າປົກ">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <img src="../../image/upload.jpg" id="output" width="100%" height="250">
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
    </div>
</div>
<form action="upload" id="formUpdate" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂຂໍ້ມູນອັບໂຫຼດເອກະສານ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" align="left">
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ປະເພດເອກະສານ</label>
                            <input type="hidden" name="Up_ID_update" id="Up_ID_update" placeholder="ລະຫັດອັບໂຫຼດ">
                            <!-- <input type="text" name="Doc_ID_update" id="Doc_ID_update" placeholder="ປະເພດເອກະສານ"
                                class="form-control"> -->
                            <select name="Doc_ID_update" id="Doc_ID_update">
                                <option value="" selected disabled>ເລືອກປະເພດເອກະສານ</option>
                                <?php
                                            $type2 = mysqli_query($conn, "select * from document_type");
                                            foreach($type2 as $row){
                                                ?>
                                <option value="<?= $row['doc_id'] ?>"><?= $row['doc_name'] ?></option>
                                <?php
                                            }
                                            mysqli_free_result($type2);
                                            mysqli_next_result($conn);
                                        ?>
                            </select>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ສົກຮຽນປີ</label>
                            <select name="Fy_ID_update" id="Fy_ID_update">
                                <option value="" selected disabled>ເລືອກສົກຮຽນປີ</option>
                                <?php
                                            $fy2 = mysqli_query($conn, "SELECT * FROM fy ORDER BY fy_id DESC");
                                            foreach($fy2 as $row){
                                                ?>
                                <option value="<?= $row['fy_id'] ?>"><?= $row['fy_id'] ?></option>
                                <?php
                                            }
                                            mysqli_free_result($fy2);
                                            mysqli_next_result($conn);
                                        ?>
                            </select>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ລາຍລະອຽດເອກະສານ</label>
                            <input type="text" name="Description_update" id="Description_update"
                                placeholder="ລາຍລະອຽດເອກະສານ" class="form-control">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ໄຟລ໌ PDF</label>
                                    <input type="file" name="pdf_file_update" id="pdf_file_update" accept=".pdf" placeholder="ໄຟລ໌ PDF">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຮູບໜ້າປົກ</label>
                            <input type="file" name="Cover_update" id="Cover_update" accept=".jpg,.png,.gif,.jpeg"
                                onchange="loadFile2(event)" placeholder="ຮູບໜ້າປົກ">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <img src="../../image/upload.jpg" id="output2" width="100%" height="250">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" name="btnUpdate" id="Update" class="btn btn-outline-success"
                        onclick="">ແກ້ໄຂ</button>
                </div>
            </div>
        </div>
    </div>
</form>


<div class="clearfix"></div><br>
<form action="upload" method="POST" enctype="multipart/form-data">
    <div class="table-responsive">

        <div class="row">
            <div class="col-md-8">
                <button type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#exampleModalDelete_many"><i class="fa fa-trash"></i> ລົບ</button>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="inCus" placeholder="ຄົ້ນຫາ"
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="button"><i class="fas fa-search"></i></button>
                    </div>
                    &nbsp; &nbsp;

                </div>
            </div>
        </div>
        <table id="table" data-search-selector="#inCus" data-pagination="true" data-search="true"
            data-custom-search="customSearch" data-click-to-select="true" data-id-table="id" data-resizable="true"
            data-id-field="up_id" data-page-list="[10, 25, 50, 100, all]" data-search-highlight="true"
            data-search-align="right">
            <thead>
                <tr class="text-center">
                    <th data-field="state" data-checkbox="true"></th>
                    <th>ແກ້ໄຂ</th>
                    <th class="hide_col" data-field="up_id"></th>
                    <th class="hide_col"></th>
                    <th data-field="id" data-sortable="true">ປະເພດເອກະສານ</th>
                    <th data-field="course" data-sortable="true">ສົກຮຽນປີ</th>
                    <th data-field="detail" data-sortable="true">ລາຍລະອຽດເອກະສານ</th>
                    <th class="hide_col"></th>
                    <th>ໄຟລ໌ອັບໂຫຼດ</th>
                    <th data-field="img">ຮູບໜ້າປົກ</th>
                    <th data-field="date" data-sortable="true">ວັນທີອັບໂຫຼດເອກະສານ</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $obj->select_upload();
                    
                    if (mysqli_num_rows($result_upload) > 0) {
                        while ($row = mysqli_fetch_array($result_upload)) {
                    ?>
                <tr>
                    <td></td>
                    <td class="text-center">
                        <a href="#" data-toggle="modal" data-target="#exampleModalUpdate"
                            class="fa fa-pen toolcolor btnUpdate_upload"></a>
                    </td>
                    <td class="hide_col"><?= $row['up_id'] ?></td>
                    <td><?= $row['doc_id'] ?></td>
                    <td><?= $row['doc_name'] ?></td>
                    <td><?= $row['fy_id'] ?></td>
                    <td>
                        <div style="width: 250px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?= $row['description'] ?></div>
                    </td>
                    <td style="display:none;">
                        <?php 
                            echo $row['cover'] ;
                        ?>
                    </td>
                    <td>
                        <?php 
                        if(empty($row['file_upload'])){
                            echo "ບໍ່ມີຂໍ້ມູນ";
                        }else{
                            echo '<a href="'. $path.'image/pdf/'.$row["file_upload"].'" target="_blank">'. $row["file_upload"] .'</a>';
                        } 
                        ?>
                    </td>
                    <td align="center">

                        <a href="<?= $path ."image/" . $row['cover'] ?>" target="_blank">
                            <img src="<?= $path ."image/" . $row['cover'] ?>" class="img-circle elevation-2" alt=""
                               style="width:100%;max-width:180px;height:60px;object-fit:cover;">
                        </a>

                    </td>
                    <td><?= date_format(date_create($row['up_date']), 'd/m/Y') ?></td>
                </tr>
                <?php
                        }
                    }
                    mysqli_free_result($result_upload);
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


<?php
//ລົບຫຼາຍ user

if(isset($_POST["btnDelete_many"])){
    $logic = 0;
    
        if(isset($_POST["btSelectItem"])){
            if($logic == 0){
                $delete = 0;
                foreach($_POST["btSelectItem"] as $id){
                    $img = mysqli_query($conn, "SELECT cover,file_upload FROM document_upload WHERE up_id = '$id'"); //ກວດສອບຮູບພາບກ່ອນລົບ
                    $data = mysqli_fetch_array($img, MYSQLI_ASSOC);
                    $un_img = $path.'image/'.$data['cover'];
                    if(file_exists($un_img) && !empty($data['cover'])){
                        unlink($un_img); //ລົບຮູບອອກ
                    }

                    $un_pdf = $path.'image/pdf/'.$data['file_upload'];
                    if(file_exists($un_pdf) && !empty($data['file_upload'])){
                        unlink($un_pdf); //ລົບ pdf
                    }
                    $delete_many = mysqli_query($conn,"call delete_documentUpload('$id');");
                    if(!$delete_many){
                        $delete = 1;
                        echo"<script>";
                        echo"window.location.href='upload?del=fail';";
                        echo"</script>";
                    }
                    mysqli_free_result($delete_many);  
                    mysqli_next_result($conn);
                }
                if($delete == 0){
                    echo"<script>";
                    echo"window.location.href='upload?del2=success';";
                    echo"</script>";
                }
                
            }
        }
        else{
            echo"<script>";
            echo"window.location.href='upload?Checkbox=null';";
            echo"</script>";
        }
}
?>


<form action="upload" id="formDelete" method="POST" enctype="multipart/form-data">
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


<script type="text/javascript">
const myform = document.getElementById('form1');
const Doc_ID = document.getElementById('Doc_ID');
const Fy_ID = document.getElementById('Fy_ID');
const pdf_file = document.getElementById('pdf_file');
const Description = document.getElementById('Description');
// const Cover = document.getElementById('Cover');
myform.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs();
});

function checkInputs() {
    const Doc_IDValue = Doc_ID.value.trim();
    const Fy_IDValue = Fy_ID.value.trim();
    const DescriptionValue = Description.value.trim();
    const pdf_fileValue = pdf_file.value.trim();
    // const CoverValue = Cover.value.trim();

    if (Doc_IDValue === '') {
        setErrorFor(Doc_ID, 'ກະລຸນາເລືອກປະເພດເອກະສານ');
    } else {
        setSuccessFor(Doc_ID);
    }

    if (Fy_IDValue === '') {
        setErrorFor(Fy_ID, 'ກະລຸນາເລືອກສົກຮຽນປີ');
    } else {
        setSuccessFor(Fy_ID);
    }

    if (DescriptionValue === '') {
        setErrorFor(Description, 'ກະລຸນາປ້ອນລາຍລະອຽດເອກະສານ');
    } else {
        setSuccessFor(Description);
    }
    if (pdf_fileValue === '') {
        setErrorFor(pdf_file, 'ກະລຸນາປ້ອນລາຍລະອຽດເອກະສານ');
    } else {
        setSuccessFor(pdf_file);
    }
    // if (CoverValue === '') {
    //     setErrorFor(Cover, 'ກະລຸນາເລືອກຮູບໜ້າປົກ');
    // } else {
    //     setSuccessFor(Cover);
    // }
    if (Doc_IDValue !== '' && Fy_IDValue !== '' && DescriptionValue !== '' && pdf_fileValue !== '') {
        document.getElementById("form1").action = "upload";
        document.getElementById("form1").submit();
    }
}
</script>

<script type="text/javascript">
const myformUpdate = document.getElementById('formUpdate');
const Up_ID_update = document.getElementById('Up_ID_update');
const Fy_ID_update = document.getElementById('Fy_ID_update');
const Description_update = document.getElementById('Description_update');
// const pdf_file_update = document.getElementById('pdf_file_update');
// const Cover_update = document.getElementById('Cover_update');
myformUpdate.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputsUpdate();
});

function checkInputsUpdate() {
    const Up_ID_updateValue = Up_ID_update.value.trim();
    const Doc_ID_updateValue = Doc_ID_update.value.trim();
    const Fy_ID_updateValue = Fy_ID_update.value.trim();
    const Description_updateValue = Description_update.value.trim();
    // const pdf_file_updateValue = pdf_file_update.value.trim();
    // const Cover_updateValue = Cover_update.value.trim();
    if (Up_ID_updateValue === '') {
        setErrorFor(Up_ID_update, 'ກະລຸນາປ້ອນລະຫັດການອັບໂຫຼດ');
    } else {
        setSuccessFor(Up_ID_update);
    }

    if (Doc_ID_updateValue === '') {
        setErrorFor(Doc_ID_update, 'ກະລຸນາເລືອກປະເພດເອກະສານ');
    } else {
        setSuccessFor(Doc_ID_update);
    }

    if (Fy_ID_updateValue === '') {
        setErrorFor(Fy_ID_update, 'ກະລຸນາເລືອກສົກຮຽນປີ');
    } else {
        setSuccessFor(Fy_ID_update);
    }

    if (Description_updateValue === '') {
        setErrorFor(Description_update, 'ກະລຸນາປ້ອນລາຍລະອຽດເອກະສານ');
    } else {
        setSuccessFor(Description_update);
    }
    // if (pdf_file_updateValue === '') {
    //     setErrorFor(pdf_file_update, 'ກະລຸນາປ້ອນລາຍລະອຽດເອກະສານ');
    // } else {
    //     setSuccessFor(pdf_file_update);
    // }
    // if (Cover_updateValue === '') {
    //     setErrorFor(Cover_update, 'ກະລຸນາເລືອກຮູບໜ້າປົກ');
    // } else {
    //     setSuccessFor(Cover_update);
    // }
    if (Up_ID_updateValue !== '' && Fy_ID_updateValue !== '' && Description_updateValue !== '') {
        document.getElementById("formUpdate").action = "upload";
        document.getElementById("formUpdate").submit();
    }
}
</script>

<!-- sweetalert -->
<?php
  // check if name exist
  if(isset($_GET['name'])=='same'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກຊື່ປະເພດສິນຄ້ານີ້ມີແລ້ວ ກະລຸນາໃສ່ຊື່ອື່ນ !!", "info");
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
    swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນຜູ້ສະໜອງນີ້ໄ້ດເນື່ອງຈາກລະຫັດຜູ້ສະໜອງນີ້ເຄີຍໝູນໃຊ້ໃນຂໍ້ມູນສິນຄ້າ", "error");
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

  if(isset($_GET['Checkbox'])=='null'){
    echo'<script type="text/javascript">
    swal("", "ກະລຸນາເລືອກຂໍ້ມູນທີ່ຕ້ອງການລົບ", "info");
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
        return row.id.indexOf(text) > -1 || row.course.indexOf(text) > -1 || row.detail.indexOf(text) > -1 ||
            row.date.indexOf(text) > -1
    })
}
</script>

<script>
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};
var loadFile2 = function(event) {
    var output2 = document.getElementById('output2');
    output2.src = URL.createObjectURL(event.target.files[0]);
    output2.onload = function() {
        URL.revokeObjectURL(output2.src) // free memory
    }
};
</script>

<script>

$(document).on("click", ".btnUpdate_upload", function(){
    $('#exampleModalUpdate').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#Up_ID_update').val(data[2]);
        $('#Doc_ID_update').val(data[3]);
        $('#Fy_ID_update').val(data[5]);
        $('#Description_update').val(data[6]);
        // $('#pdf_file_update').val(data[8]);
        if (data[7] === "") {
            document.getElementById("output2").src = ('<?php echo $path ?>image/upload.jpg');
        } else {
            document.getElementById("output2").src = ('<?php echo $path ?>image/' + data[7]);
        }
});
</script>