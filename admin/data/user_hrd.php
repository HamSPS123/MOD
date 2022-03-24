<?php
  $title = "ຂໍ້ມູນຜູ້ໃຊ້ແບ່ງປັນທຶນການສຶກສາ ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
  ?>



<?php
  
  
    if(isset($_POST['btnDelete'])){
      $obj->delete_hrd(trim($_POST['id']));
    }
    if(isset($_POST['HRD_Name'])){
      $obj->insert_HRD(trim($_POST['HRD_Name']),trim($_POST['Surname']),trim($_POST['Gender']),trim($_POST['Tel']),trim($_POST['Email']),trim($_POST['Pass']),trim($_POST['User_ID']),trim($_POST['Uni_ID']));
    }
    if(isset($_POST['HRD_Name_update'])){
        $obj->update_HRD(trim($_POST['HRD_Name_update']),trim($_POST['Surname_update']),trim($_POST['Gender_update']),trim($_POST['Tel_update']),trim($_POST['Email_update']),trim($_POST['Pass_update']),trim($_POST['Uni_ID_update']),trim($_POST['HRD_ID_update']));
    }
  ?>
<div style="width: 100%;">
    <div style="width: 48%; float: left;">
        <b>ລາຍການ<?php echo $title?></b>&nbsp <img src="../../icon/hidemenu.ico" width="10px">
    </div>
    <div style="width: 46%; float: right;" align="right">
        <form action="user-hrd" id="form1" method="POST" enctype="multipart/form-data">
            <a href="#" data-toggle="modal" data-target="#exampleModalcategory">
                <img src="../../icon/add.ico" alt="" width="25px">
            </a>
            <div class="modal fade" id="exampleModalcategory" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ເພີ່ມຂໍ້ມູນແບ່ງປັນທຶນການສຶກສາ </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span a ria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ຊື່ຜູ້ໃຊ້ລະບົບ</label>
                                    <input type="text" name="HRD_Name" id="HRD_Name" placeholder="ຊື່ຜູ້ໃຊ້ລະບົບ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ນາມສະກຸນ</label>
                                    <input type="text" name="Surname" id="Surname" placeholder="ນາມສະກຸນ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ເພດ</label>
                                    <select name="Gender" id="Gender">
                                        <option value="" disabled selected>------ ເລືອກເພດ ------</option>
                                        <option value="ຊາຍ">ຊາຍ</option>
                                        <option value="ຍິງ">ຍິງ</option>
                                    </select>
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ເບີໂທລະສັບ</label>
                                    <input type="text" name="Tel" id="Tel" placeholder="ເບີໂທລະສັບ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ອີເມວ</label>
                                    <input type="text" name="Email" id="Email" placeholder="ອີເມວ" class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ລະຫັດເຂົ້າໃຊ້ລະບົບ</label>
                                    <input type="password" name="Pass" id="Pass" placeholder="ລະຫັດເຂົ້າໃຊ້ລະບົບ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ຜູ້ໃຊ້</label>
                                    <select name="User_ID" id="User_ID">
                                        <option value="">--- ເລືອກຜູ້ໃຊ້ ---</option>
                                        <?php
                                        //select user that not use
                                            $user_id = mysqli_query($conn, "call select_package_user()");
                                            
                                            foreach($user_id as $row) {
                                                echo '<option value="'.$row['user_id'].'">'.$row['user_id'].': '.$row['stt_name'].'</option>';
                                            }
                                            mysqli_free_result($user_id);
                                            mysqli_next_result($conn);
                                        ?>
                                    </select>
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ລະຫັດວິທະຍາໄລ</label>
                                    <select name="Uni_ID" id="Uni_ID">
                                        <option value="">--- ເລືອກວິທະຍາໄລ ---</option>
                                        <?php
                                        //ສະແດງຂໍ້ມູນມະຫາວິທະຍາໄລ
                                            $university = mysqli_query($conn, "SELECT * FROM university ORDER BY uni_name ASC");
                                            
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

        <form action="user-hrd" id="formUpdate" method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂຂໍ້ມູນກົມການສຶກສາ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ຊື່ຜູ້ໃຊ້ລະບົບ</label>
                                    <input type="hidden" name="HRD_ID_update" id="HRD_ID_update"
                                        placeholder="ລະຫັດຜູ້ແບ່ງປັນທຶນ">
                                    <input type="text" name="HRD_Name_update" id="HRD_Name_update"
                                        placeholder="ຊື່ຜູ້ໃຊ້ລະບົບ" class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ນາມສະກຸນ</label>
                                    <input type="text" name="Surname_update" id="Surname_update" placeholder="ນາມສະກຸນ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ເພດ</label>
                                    <select name="Gender_update" id="Gender_update">
                                        <option value="" disabled selected>------ ເລືອກເພດ ------</option>
                                        <option value="ຊາຍ">ຊາຍ</option>
                                        <option value="ຍິງ">ຍິງ</option>
                                    </select>
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ເບີໂທລະສັບ</label>
                                    <input type="text" name="Tel_update" id="Tel_update" placeholder="ເບີໂທລະສັບ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ອີເມວ</label>
                                    <input type="text" name="Email_update" id="Email_update" placeholder="ອີເມວ"
                                        class="form-control">
                                    <i class="fas fa-check-circle "></i>
                                    <i class="fas fa-exclamation-circle "></i>
                                    <small class="">Error message</small>
                                </div>
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ລະຫັດເຂົ້າໃຊ້ລະບົບ</label>
                                    <input type="password" name="Pass_update" id="Pass_update"
                                        placeholder="ລະຫັດເຂົ້າໃຊ້ລະບົບ" class="form-control">
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
                                            $university2 = mysqli_query($conn, "SELECT * FROM university ORDER BY uni_name ASC");
                                            
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
<!-- <div class="clearfix"></div><br> -->
<form method="post" action="user-hrd">
    <div class="table-responsive">
        <?php 
       $obj->select_userHRD();
       ?>
        <div class="row">
            <div class="col-md-8 mt-2">
                <button type="button" data-toggle="modal" data-target="#exampleModalDelete_many"
                    class="btn btn-danger"><i class="fa fa-trash"></i> ລົບ</button>
            </div>
            <div class="col-md-4 mt-2">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="inCus" placeholder="ຄົ້ນຫາ ຊື່ ແລະ ນາມສະກຸນ"
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <table id="table" data-search-selector="#inCus" data-pagination="true" data-custom-search="customSearch"
            data-search="true" data-click-to-select="true" data-resizable="true" data-id-field="user"
            data-page-list="[10, 25, 50, 100, all]" data-search-highlight="true" style="width: 2000px;">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th></th>
                    <th data-sortable="true">ລຳດັບ</th>
                    <th data-field="id" data-sortable="true">ລະຫັດຜູ້ແບ່ງປັນທຶນ</th>
                    <th data-field="name" data-sortable="true">ຊື່ຜູ້ໃຊ້ລະບົບ</th>
                    <th data-field="surname" data-sortable="true">ນາມສະກຸນ</th>
                    <th data-field="gender" data-sortable="true">ເພດ</th>
                    <th data-field="tel" data-sortable="true">ເບີໂທລະສັບ</th>
                    <th data-field="uni" data-sortable="true">ມະຫາວິທະຍາໄລ</th>
                    <th data-field="dept" data-sortable="true">ກົມການສິກສາ</th>
                    <th data-field="email" data-sortable="true">ອີເມວ</th>
                    <th data-field="pass" data-sortable="true">ລະຫັດເຂົ້າໃຊ້ລະບົບ</th>
                    <th data-field="user_name" data-sortable="true">ຜູ້ໃຊ້</th>
                    <th data-field="user" class="hide_col">ລະຫັດຜູ້ໃຊ້</th>
                    <th class="hide_col">ລະຫັດວິທະຍາໄລ</th>
                </tr>

            </thead>
            <tbody>
                <?php
                        $i=0;
                        while($row = mysqli_fetch_array($result_hrd))
                        {
                            $i++;
                    ?>
                <tr>
                    <td></td>
                    <td class="text-center">
                        <a href="#" data-toggle="modal" data-target="#exampleModalUpdate"
                            class="fa fa-pen toolcolor btnUpdate_hrd"></a>&nbsp; &nbsp;
                        <a href="#" data-toggle="modal" data-target="#exampleModalDelete"
                            class="fa fa-trash toolcolor btnDelete_hrd"></a>
                    </td>
                    <td><?= $i ?>.</td>
                    <td><?= $row["hrd_id"] ?></td>
                    <td><?= $row["hrd_name"] ?></td>
                    <td><?= $row["surname"] ?></td>
                    <td><?= $row["gender"] ?></td>
                    <td><?= $row["tel"] ?></td>
                    <td><?= $row["uni_name"] ?></td>
                    <td><?= $row["dept_name"] ?></td>
                    <td><?= $row["email"] ?></td>
                    <td><?= $row["pass"] ?></td>
                    <td><?= $row["stt_name"] ?></td>
                    <td class="hide_col"><?= $row["user_id"] ?></td>
                    <td class="hide_col"><?= $row["uni_id"] ?></td>

                </tr>
                <?php
                        }
                        mysqli_free_result($result_hrd);  
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
            foreach($_POST["btSelectItem"] as $checkid){
                $check_quota = mysqli_query($conn, "SELECT * FROM quota_distribute WHERE user_id = '$checkid'"); //ກວດສອບວ່າລະຫັ້ນນີ້ເຄີຍນຳໃຊ້ຫຼືຍັງ
                $check_fy = mysqli_query($conn, "SELECT * FROM fy WHERE user_id = '$checkid'"); //ກວດສອບວ່າລະຫັ້ນນີ້ເຄີຍນຳໃຊ້ຫຼືຍັງ
                if(mysqli_num_rows($check_quota) > 0){
                    $logic = 1;
                    echo"<script>";
                    echo"window.location.href='user-hrd?Checkdelete=true&&quota=$checkid';";
                    echo"</script>";
                    break;
                }
                if(mysqli_num_rows($check_fy) > 0){
                    $logic = 1;
                    echo"<script>";
                    echo"window.location.href='user-hrd?Checkdelete=true&&fy=$checkid';";
                    echo"</script>";
                    break;
                }
            }
            if($logic == 0){
                $delete = 0;
                foreach($_POST["btSelectItem"] as $id){
                    
                    $delete_many = mysqli_query($conn,"call delete_hrd($id)");
                    if(!$delete_many){
                        $delete = 1;
                        echo"<script>";
                        echo"window.location.href='user-hrd?del=fail';";
                        echo"</script>";
                    }
                    mysqli_free_result($delete_many);  
                    mysqli_next_result($conn);
                }
                if($delete == 0){
                    echo"<script>";
                    echo"window.location.href='user-hrd?del2=success';";
                    echo"</script>";
                }
                
            }
        }
        else{
            echo"<script>";
            echo"window.location.href='user-hrd?Checkbox=null';";
            echo"</script>";
        }
}
?>


<form action="user-hrd" id="formDelete" method="POST" enctype="multipart/form-data">
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
const HRD_Name = document.getElementById('HRD_Name');
const Surname = document.getElementById('Surname');
const Gender = document.getElementById('Gender');
const Tel = document.getElementById('Tel');
const Email = document.getElementById('Email');
const Pass = document.getElementById('Pass');
const User_ID = document.getElementById('User_ID');
const Uni_ID = document.getElementById('Uni_ID');
myform.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs();
});

function checkInputs() {
    const HRD_NameValue = HRD_Name.value.trim();
    const SurnameValue = Surname.value.trim();
    const GenderValue = Gender.value.trim();
    const TelValue = Tel.value.trim();
    const EmailValue = Email.value.trim();
    const PassValue = Pass.value.trim();
    const User_IDValue = User_ID.value.trim();
    const Uni_IDValue = Uni_ID.value.trim();
    if (HRD_NameValue === '') {
        setErrorFor(HRD_Name, 'ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້ລະບົບ');
    } else {
        setSuccessFor(HRD_Name);
    }

    if (SurnameValue === '') {
        setErrorFor(Surname, 'ກະລຸນາປ້ອນນາມສະກຸນ');
    } else {
        setSuccessFor(Surname);
    }

    if (GenderValue === '') {
        setErrorFor(Gender, 'ກະລຸນາປ້ອນເພດ');
    } else {
        setSuccessFor(Gender);
    }
    if (TelValue === '') {
        setErrorFor(Tel, 'ກະລຸນາປ້ອນເບີໂທລະສັບ');
    } else {
        setSuccessFor(Tel);
    }

    if (EmailValue === '') {
        setErrorFor(Email, 'ກະລຸນາປ້ອນອີເມວ');
    } else {
        setSuccessFor(Email);
    }

    if (PassValue === '') {
        setErrorFor(Pass, 'ກະລຸນາປ້ອນເຂົ້າໃຊ້ລະບົບ');
    } else {
        setSuccessFor(Pass);
    }
    if (User_IDValue === '') {
        setErrorFor(User_ID, 'ກະລຸນາເລືອກຜູ້ໃຊ້');
    } else {
        setSuccessFor(User_ID);
    }
    if (Uni_IDValue === '') {
        setErrorFor(Uni_ID, 'ກະລຸນາເລືອກລະຫັດວິທະຍາໄລ');
    } else {
        setSuccessFor(Uni_ID);
    }
    if (HRD_NameValue !== '' && SurnameValue !== '' && GenderValue !== '' && TelValue !== '' && EmailValue !== '' &&
        PassValue !== '' && User_IDValue !== '' && Uni_IDValue !== '') {
        document.getElementById("form1").action = "user-hrd";
        document.getElementById("form1").submit();
    }
}
</script>

<script type="text/javascript">
const myformUpdate = document.getElementById('formUpdate');
const HRD_Name_update = document.getElementById('HRD_Name_update');
const Surname_update = document.getElementById('Surname_update');
const Gender_update = document.getElementById('Gender_update');
const Tel_update = document.getElementById('Tel_update');
const Email_update = document.getElementById('Email_update');
const Pass_update = document.getElementById('Pass_update');
const Uni_ID_update = document.getElementById('Uni_ID_update');
myformUpdate.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputsUpdate();
});

function checkInputsUpdate() {
    const HRD_Name_updateValue = HRD_Name_update.value.trim();
    const Surname_updateValue = Surname_update.value.trim();
    const Gender_updateValue = Gender_update.value.trim();
    const Tel_updateValue = Tel_update.value.trim();
    const Email_updateValue = Email_update.value.trim();
    const Pass_updateValue = Pass_update.value.trim();
    const Uni_ID_updateValue = Uni_ID_update.value.trim();
    if (HRD_Name_updateValue === '') {
        setErrorFor(HRD_Name_update, 'ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້ລະບົບ');
    } else {
        setSuccessFor(HRD_Name_update);
    }

    if (Surname_updateValue === '') {
        setErrorFor(Surname_update, 'ກະລຸນາປ້ອນນາມສະກຸນ');
    } else {
        setSuccessFor(Surname_update);
    }

    if (Gender_updateValue === '') {
        setErrorFor(Gender_update, 'ກະລຸນາປ້ອນເພດ');
    } else {
        setSuccessFor(Gender_update);
    }
    if (Tel_updateValue === '') {
        setErrorFor(Tel_update, 'ກະລຸນາປ້ອນເບີໂທລະສັບ');
    } else {
        setSuccessFor(Tel_update);
    }

    if (Email_updateValue === '') {
        setErrorFor(Email_update, 'ກະລຸນາປ້ອນອີເມວ');
    } else {
        setSuccessFor(Email_update);
    }

    if (Pass_updateValue === '') {
        setErrorFor(Pass_update, 'ກະລຸນາປ້ອນເຂົ້າໃຊ້ລະບົບ');
    } else {
        setSuccessFor(Pass_update);
    }
    if (Uni_ID_updateValue === '') {
        setErrorFor(Uni_ID_update, 'ກະລຸນາເລືອກລະຫັດວິທະຍາໄລ');
    } else {
        setSuccessFor(Uni_ID_update);
    }
    if (HRD_Name_updateValue !== '' && Surname_updateValue !== '' && Gender_updateValue !== '' && Tel_updateValue !==
        '' && Email_updateValue !== '' && Pass_updateValue !== '' && Uni_ID_updateValue !== '') {
        document.getElementById("formUpdate").action = "user-hrd";
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
    // check if hrd exist in quota
    if(isset($_GET['delete'])=='warning'){
      echo'<script type="text/javascript">
      swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນຜູ້ໃຊ້ນີ້ໄ້ດເນື່ອງຈາກລະຫັດຜູ້ໃຊ້ນີ້ເຄີຍໝູນໃຊ້ໃນການແຈກຢາຍທືນແລ້ວ", "error");
      </script>';
    }

    // check if hrd exist in fy
    if(isset($_GET['delete2'])=='warning'){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນຜູ້ໃຊ້ນີ້ໄ້ດເນື່ອງຈາກລະຫັດຜູ້ໃຊ້ນີ້ເຄີຍໝູນໃຊ້ໃນຂໍ້ມູນສົກຮຽນແລ້ວ", "error");
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
    // check email
    if(isset($_GET['email'])=='same'){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກອີເມວນີ້ໄດ້ຖືກນຳໃຊ້ແລ້ວ ກະລຸນາໃສ່ອີເມວອື່ນ !!", "info");
        </script>';
      }
      //check user
      if(isset($_GET['user_id'])=='same'){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກສິດຜູ້ໃຊ້ນີ້ຖືກນຳໃຊ້ແລ້ວ ກະລຸນາເລືອກຜູ້ໃຊ້ອື່ນ !!", "info");
        </script>';
      }
      //check user status
      if(isset($_GET['stt'])=='not'){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກສິດການນຳໃຊ້ຂອງທ່ານບໍ່ຖືກຕ້ອງ ກະລຸນາເລືອກຜູ້ໃຊ້ອື່ນ !!", "info");
        </script>';
      }

      //if checkbox is null
      if(isset($_GET['Checkbox'])=='null'){
        echo'<script type="text/javascript">
        swal("", "ກະລຸນາເລືອກຜູ້ໃຊ້ທີ່ຕ້ອງການລົບ", "warning");
        </script>';
      }

      //ຖ້າລະຫັດຖືກໃຊ້
    if(isset($_GET['Checkdelete'])=='true' && isset($_GET['hrd'])){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດດຳເນີນການຕໍ່ໄດ້ເນື່ອງຈາກໄອດີ '.$_GET['hrd'].' ຖືກນຳໃຊ້ແລ້ວ", "warning");
        </script>';
      }
      if(isset($_GET['Checkdelete'])=='true' && isset($_GET['fy'])){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດດຳເນີນການຕໍ່ໄດ້ເນື່ອງຈາກໄອດີ '.$_GET['fy'].' ຖືກນຳໃຊ້ແລ້ວ", "warning");
        </script>';
      }
  ?>






<?php
   include ("../../header-footer/footer.php");
  ?>

<script>
$(function() {
    $('#table').bootstrapTable({
            formatSearch: function() {
                return 'ຄົ້ນຫາ ຊື່ ແລະ ນາມສະກຸນ';
            }
        }

    );

});

function customSearch(data, text) {
    return data.filter(function(row) {
        return row.id.indexOf(text) > -1 || row.name.indexOf(text) > -1 || row.surname.indexOf(text) > -1 ||
            row.uni.indexOf(text) > -1 || row.dept.indexOf(text) > -1 || row.email.indexOf(text) > -1 ||
            row.user_name.indexOf(text) > -1
    })
}
</script>

<script>
$(document).on("click", ".btnUpdate_hrd", function() {

    $('#exampleModalUpdate').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    console.log(data);

    $('#HRD_ID_update').val(data[3]);
    $('#HRD_Name_update').val(data[4]);
    $('#Surname_update').val(data[5]);
    $('#Gender_update').val(data[6]);
    $('#Tel_update').val(data[7]);
    $('#Email_update').val(data[10]);
    $('#Pass_update').val(data[11]);
    $('#Uni_ID_update').val(data[14]);

});

$(document).on("click", ".btnDelete_hrd", function() {

    $('#exampleModalDelete').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    console.log(data);

    $('#id').val(data[13]);

});
</script>