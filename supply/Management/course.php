<?php
  $title = "ຈັດການຂໍ້ມູນສາຂາວິຊາ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>


<?php

  if(isset($_POST['btnDelete'])){
    $obj->delete_course(trim($_POST['id']));
  }
  if(isset($_POST['Course_ID'])){
    $obj->insert_course(trim($_SESSION['uni_id']."_".$_POST['Course_ID']),trim($_POST['Course_Name']),trim($_POST['Fac_ID']),trim($_POST['Level_ID']));
  }
  if(isset($_POST['Course_ID_update'])){
    $obj->update_course(trim($_POST['Course_ID_update']),trim($_POST['Course_Name_update']),trim($_POST['Fac_ID_update']),trim($_POST['Level_ID_update']));
  }
?>
<div style="width: 100%;">
    <div style="width: 48%; float: left;">
        <b>ລາຍການ<?php echo $title?></b>&nbsp <img src="../../icon/hidemenu.ico" width="10px">
    </div>
    <div style="width: 46%; float: right;" align="right">
        <form action="courses" id="form1" method="POST" enctype="multipart/form-data">
            <a href="#" data-toggle="modal" data-target="#exampleModalcategory">
                <img src="../../icon/add.ico" alt="" width="25px">
            </a>
            <div class="modal fade" id="exampleModalcategory" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ເພີ່ມຂໍ້ມູນລະຫັດສາຂາວິຊາ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span a ria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ລະຫັດສາຂາວິຊາ</label>
                                    <input type="text" name="Course_ID" id="Course_ID" placeholder="ລະຫັດສາຂາວິຊາ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ຊື່ສາຂາວິຊາ</label>
                                    <input type="text" name="Course_Name" id="Course_Name" placeholder="ຊື່ສາຂາວິຊາ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ຄະນະ</label>
                                    <select name="Fac_ID" id="Fac_ID">
                                        <option value="" disabled selected>ເລືອກຄະນະ</option>
                                        <?php
                                            $faculty = mysqli_query($conn, "SELECT fac_id,fac_name,uni_name FROM faculty f left join university u on f.uni_id=u.uni_id where f.uni_id='$_SESSION[uni_id]'");
                                            foreach($faculty as $row){
                                                ?>
                                        <option value="<?= $row["fac_id"] ?>"><?= $row['fac_name'] ?> - <?= $row['uni_name'] ?></option>
                                        <?php
                                            }
                                            mysqli_free_result($faculty);
                                            mysqli_next_result($conn);
                                        ?>
                                    </select>
                                    <i class="fas fa-check-circle"></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ລະດັບຊັ້ນ</label>
                                    <select name="Level_ID" id="Level_ID">
                                        <option value="" disabled selected>ເລືອກລະດັບຊັ້ນ</option>
                                        <?php
                                            $level = mysqli_query($conn, "SELECT * FROM course_level");
                                            foreach($level as $lv){
                                                ?>
                                        <option value="<?= $lv["level_id"] ?>"><?= $lv['level_name'] ?></option>
                                        <?php
                                            }
                                            mysqli_free_result($level);
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

        <form action="course" id="formUpdate" method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂຂໍ້ມູນສາຂາວິຊາ </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ຊື່ສາຂາວິຊາ</label>
                                    <input type="hidden" name="Course_ID_update" id="Course_ID_update"
                                        placeholder="ລະຫັດສາຂາວິຊາ">
                                    <input type="text" name="Course_Name_update" id="Course_Name_update"
                                        placeholder="ຊື່ສາຂາວິຊາ" class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ຄະນະ</label>
                                    <select name="Fac_ID_update" id="Fac_ID_update">
                                        <option value="" disabled selected>ເລືອກຄະນະ</option>
                                        <?php
                                            $faculty2 = mysqli_query($conn, "SELECT fac_id,fac_name,uni_name FROM faculty f left join university u on f.uni_id=u.uni_id where f.uni_id='$_SESSION[uni_id]'");
                                            foreach($faculty2 as $row){
                                                ?>
                                        <option value="<?= $row["fac_id"] ?>"><?= $row['fac_name'] ?> - <?= $row['uni_name'] ?></option>
                                        <?php
                                            }
                                            mysqli_free_result($faculty2);
                                            mysqli_next_result($conn);
                                        ?>
                                    </select>
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ລະດັບຊັ້ນ</label>
                                    <select name="Level_ID_update" id="Level_ID_update">
                                        <option value="" disabled selected>ເລືອກລະດັບຊັ້ນ</option>
                                        <?php
                                            $level = mysqli_query($conn, "SELECT * FROM course_level");
                                            foreach($level as $lv){
                                                ?>
                                        <option value="<?= $lv["level_id"] ?>"><?= $lv['level_name'] ?></option>
                                        <?php
                                            }
                                            mysqli_free_result($level);
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
<div class="clearfix"></div><br>
<form method="post" action="course">
    <div class="table-responsive">
        <?php $obj->select_course($_SESSION['uni_id']);?>
        <div class="row">
            <div class="col-md-8">
                <button type="button" data-toggle="modal" data-target="#exampleModalDelete_many"
                    class="btn btn-danger"><i class="fa fa-trash"></i> ລົບ</button>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
    
                    <input type="text" class="form-control" id="inCus" placeholder="ຄົ້ນຫາ">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="button"><i class="fas fa-search"></i></button>
                    </div>
                    
                </div>
            </div>
        </div>

        <table id="table" data-search-selector="#inCus" data-pagination="true"
            data-custom-search="customSearch" data-search="true"  data-click-to-select="true"
            data-resizable="true" data-id-field="id"
            data-page-list="[10, 25, 50, 100, all]" data-search-highlight="true" data-search-align="left">
            <thead>
                <tr class="text-center">
                    <th data-field="state" data-checkbox="true"></th>
                    <th>ແກ້ໄຂ</th>
                    <th data-sortable="true">ລຳດັບ</th>
                    <th data-field="id" data-sortable="true">ລະຫັດສາຂາວິຊາ</th>
                    <th data-field="name" data-sortable="true">ຊື່ສາຂາວິຊາ</th>
                    <th data-field="fac" data-sortable="true">ຄະນະ</th>
                    <th data-field="fac_id" class="hide_col">ລະຫັດຄະນະ</th>
                    <th data-field="uni" data-sortable="true">ວິທະຍາໄລ</th>
                    <th data-field="level" data-sortable="true">ລະດັບຊັ້ນ</th>
                    <th data-field="level_id" class="hide_col">ລະດັບຊັ້ນ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=0;
                while ($row = mysqli_fetch_array($result_course)) {
                    $i++;
                
            ?>
                <tr>
                    <td></td>
                    <td class="text-center">
                        <a href="#" data-toggle="modal" data-target="#exampleModalUpdate"
                            class="fa fa-pen toolcolor btnUpdate_course"></a>
                    </td>
                    <td><?= $i ?>.</td>
                    <td><?= $row['course_id'] ?></td>
                    <td><?= $row['course_name'] ?></td>
                    <td><?= $row['fac_name'] ?></td>
                    <td><?= $row['fac_id'] ?></td>
                    <td><?= $row['uni_name'] ?></td>
                    <td><?= $row['level_name'] ?></td>
                    <td><?= $row['level_id'] ?></td>
                </tr>
                <?php
                }
                mysqli_free_result($result_course);  
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


<form action="course" id="formDelete" method="POST" enctype="multipart/form-data">
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
                $check_plan = mysqli_query($conn, "SELECT * FROM create_plan WHERE course_id='$checkid'"); //ກວດສອບຂໍ້ມູນໃນ create plan
                $check_adjust = mysqli_query($conn, "SELECT * FROM adjustdetail WHERE course_id='$checkid'"); //ກວດສອບຂໍ້ມູນໃນ adjustdetail
                if(mysqli_num_rows($check_plan) > 0){
                    $logic = 1;
                    echo"<script>";
                    echo"window.location.href='course?Checkdelete=true&&plan=$checkid';";
                    echo"</script>";
                    break;
                }
                if(mysqli_num_rows($check_adjust) > 0){
                    $logic = 1;
                    echo"<script>";
                    echo"window.location.href='course?Checkdelete=true&&adjust=$checkid';";
                    echo"</script>";
                    break;
                }
            }
            if($logic == 0){
                $delete = 0;
                foreach($_POST["btSelectItem"] as $id){
                    
                    $delete_many = mysqli_query($conn,"call delete_course('$id')");
                    if(!$delete_many){
                        $delete = 1;
                        echo"<script>";
                        echo"window.location.href='course?del=fail';";
                        echo"</script>";
                    }
                    mysqli_free_result($delete_many);  
                    mysqli_next_result($conn);
                }
                if($delete == 0){
                    echo"<script>";
                    echo"window.location.href='course?del2=success';";
                    echo"</script>";
                }
                
            }
        }
        else{
            echo"<script>";
            echo"window.location.href='course?Checkbox=null';";
            echo"</script>";
        }
}
?>

<script type="text/javascript">
const myform = document.getElementById('form1');
const Course_ID = document.getElementById('Course_ID');
const Course_Name = document.getElementById('Course_Name');
const Fac_ID = document.getElementById('Fac_ID');
const Level_ID = document.getElementById('Level_ID');
myform.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs();
});

function checkInputs() {
    const Course_IDValue = Course_ID.value.trim();
    const Course_NameValue = Course_Name.value.trim();
    const Fac_IDValue = Fac_ID.value.trim();
    const Level_IDValue = Level_ID.value.trim();

    if (Course_IDValue === '') {
        setErrorFor(Course_ID, 'ລະຫັດສາຂາວິຊາ');
    } else {
        setSuccessFor(Course_ID);
    }
    if (Course_NameValue === '') {
        setErrorFor(Course_Name, 'ຊື່ສາຂາວິຊາ');
    } else {
        setSuccessFor(Course_Name);
    }
    if (Fac_IDValue === '') {
        setErrorFor(Fac_ID, 'ຄະນະ');
    } else {
        setSuccessFor(Fac_ID);
    }
    if (Level_IDValue === '') {
        setErrorFor(Level_ID, 'ລະດັບຊັ້ນ');
    } else {
        setSuccessFor(Level_ID);
    }
    if (Course_IDValue !== '' && Course_NameValue !== '' && Fac_IDValue !== '' && Level_IDValue !== '') {
        document.getElementById("form1").action = "course";
        document.getElementById("form1").submit();
    }
}
</script>

<script type="text/javascript">
const myformUpdate = document.getElementById('formUpdate');
const Course_ID_update = document.getElementById('Course_ID_update');
const Course_Name_update = document.getElementById('Course_Name_update');
const Fac_ID_update = document.getElementById('Fac_ID_update');
const Level_ID_update = document.getElementById('Level_ID_update');
myformUpdate.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputsUpdate();
});

function checkInputsUpdate() {
    const Course_ID_updateValue = Course_ID_update.value.trim();
    const Course_Name_updateValue = Course_Name_update.value.trim();
    const Fac_ID_updateValue = Fac_ID_update.value.trim();
    const Level_ID_updateValue = Level_ID_update.value.trim();
    if (Course_ID_updateValue === '') {
        setErrorFor(Course_ID_update, 'ລະຫັດສາຂາວິຊາ');
    } else {
        setSuccessFor(Course_ID_update);
    }
    if (Course_Name_updateValue === '') {
        setErrorFor(Course_Name_update, 'ຊື່ສາຂາວິຊາ');
    } else {
        setSuccessFor(Course_Name_update);
    }
    if (Fac_ID_updateValue === '') {
        setErrorFor(Fac_ID_update, 'ກະລຸນາປ້ອນຄະນະ');
    } else {
        setSuccessFor(Fac_ID_update);
    }
    if (Level_ID_updateValue === '') {
        setErrorFor(Level_ID_update, 'ກະລຸນາປ້ອນລະດັບຊັ້ນ');
    } else {
        setSuccessFor(Level_ID_update);
    }
    if (Course_ID_updateValue !== '' && Course_Name_updateValue !== '' && Fac_ID_updateValue !== '' && Level_ID_updateValue !== '') {
        document.getElementById("formUpdate").action = "course";
        document.getElementById("formUpdate").submit();
    }
}
</script>

<!-- sweetalert -->
<?php
  // check if id exist
  if(isset($_GET['course_id'])=='same'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກລະຫັດສາຂາວິຊານີ້ມີແລ້ວ ກະລຸນາໃສ່ລະຫັດອື່ນ !!", "info");
    </script>';
  }
  // check if name exist
  if(isset($_GET['name'])=='same'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກຊື່ສາຂາວິຊານີ້ມີແລ້ວ ກະລຸນາໃສ່ຊື່ອື່ນ !!", "info");
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
    swal("", "ບໍ່ສາມາດແກ້ຂໍ້ມູນໄດ້ເນື່ອງຈາກຊື່ສາຂາວິຊານີ້ມີແລ້ວ ກະລຸນາໃສ່ຊື່ອື່ນ !!", "info");
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

  //if checkbox null
  if(isset($_GET['Checkbox'])=='null'){
    echo'<script type="text/javascript">
    swal("", "ກະລຸນາເລືອກຂໍ້ມູນທີ່ຕ້ອງການລົບ", "info");
    </script>';
  }

  //if id is use
  if(isset($_GET['Checkdelete'])=='true' && isset($_GET['plan'])){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນສາຂາວິຊານີ້ໄດ້ ເນື່ອງຈາກລະຫັດ '.$_GET["plan"].' ຖືກນຳໃຊ້ໃນຂໍ້ມູນສ້າງແຜນແລ້ວ", "info");
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
        return row.id.indexOf(text) > -1 || row.name.indexOf(text) > -1 || row.fac.indexOf(text) > -1 ||
            row.uni.indexOf(text) > -1 || row.level.indexOf(text) > -1
    })
}
</script>

<script>
$(document).on("click", ".btnUpdate_course", function(){
    $('#exampleModalUpdate').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#Course_ID_update').val(data[3]);
        $('#Course_Name_update').val(data[4]);
        $('#Fac_ID_update').val(data[6]);
        $('#Level_ID_update').val(data[9]);
});
$(document).on("click", ".btnDelete_course", function(){
        $('#exampleModalDelete').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[3]);
});
</script>