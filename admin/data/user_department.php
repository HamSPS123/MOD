<?php
  $title = "ຂໍ້ມູນຜູ້ໃຊ້ຂອງກົມການສຶກສາ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
  ?>
<?php
    // if(isset($_POST['btnDelete'])){
    //   $obj->delete_userSupply(trim($_POST['id']));
    // }
    if(isset($_POST['btnInsert'])){
      $obj->insert_userDepartment(trim($_POST['usr_Name']),trim($_POST['Surname']),trim($_POST['Gender']),trim($_POST['Tel']),trim($_POST['Email']),trim($_POST['Pass']),trim($_POST['User_ID']),trim($_POST['dept_id']));
    }
    if(isset($_POST['btnUpdate'])){
      $obj->update_userDepartment(trim($_POST['usr_dept_id_update']),trim($_POST['usr_name_update']),trim($_POST['Surname_update']),trim($_POST['Gender_update']),trim($_POST['Tel_update']),trim($_POST['Email_update']),trim($_POST['Pass_update']),trim($_POST['dept_id_update']),trim($_POST['User_ID_update']));
    }
  ?>
<div style="width: 100%;">
    <div style="width: 48%; float: left;">
        <b>ລາຍການ<?php echo $title?></b>&nbsp <img src="../../icon/hidemenu.ico" width="10px">
    </div>
    <div style="width: 46%; float: right;" align="right">
        <form action="user-department" id="form1" method="POST" enctype="multipart/form-data" class="needs-validation"
            novalidate>
            <a href="#" data-toggle="modal" data-target="#exampleModalcategory">
                <img src="../../icon/add.ico" alt="" width="25px">
            </a>
            <div class="modal fade" id="exampleModalcategory" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ເພີ່ມຂໍ້ມູນຜູ້ໃຊ້ແຜນຮັບນັກຮຽນ </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span a ria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6 form-group">
                                    <label>ຊື່ຜູ້ໃຊ້ລະບົບ</label>
                                    <input type="text" name="usr_Name" id="usr_Name" placeholder="ຊື່ຜູ້ໃຊ້ລະບົບ"
                                        class="form-control" required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້ລະບົບ
                                    </div>

                                </div>
                                <div class="col-md-12 col-sm-6 form-group">
                                    <label>ນາມສະກຸນ</label>
                                    <input type="text" name="Surname" id="Surname" placeholder="ນາມສະກຸນ"
                                        class="form-control">
                                </div>
                                <div class="col-md-12 col-sm-6 form-group">
                                    <label>ເພດ</label>
                                    <select name="Gender" id="Gender" class="form-control" required>
                                        <option value="" disabled selected>------ ເລືອກເພດ ------</option>
                                        <option value="ຊາຍ">ຊາຍ</option>
                                        <option value="ຍິງ">ຍິງ</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        ກະລຸນາເລືອກເພດ
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6 form-group">
                                    <label>ເບີໂທລະສັບ</label>
                                    <input type="text" name="Tel" id="Tel" placeholder="ເບີໂທລະສັບ"
                                        class="form-control">

                                </div>
                                <div class="col-md-12 col-sm-6 form-group">
                                    <label>ອີເມວ</label>
                                    <input type="text" name="Email" id="Email" placeholder="ອີເມວ" class="form-control"
                                        required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນອີເມວ
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6 form-group">
                                    <label>ລະຫັດເຂົ້າໃຊ້ລະບົບ</label>
                                    <input type="password" name="Pass" id="Pass" placeholder="ລະຫັດເຂົ້າໃຊ້ລະບົບ"
                                        class="form-control" required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນລະຫັດເຂົ້າໃຊ້ລະບົບ
                                    </div>

                                </div>
                                <div class="col-md-12 col-sm-6 form-group">
                                    <label>ສິດຜູ້ໃຊ້</label>
                                    <select name="User_ID" id="User_ID" class="form-control" required>
                                        <option value="" disabled selected>ສິດຜູ້ໃຊ້</option>
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
                                    <div class="invalid-feedback">
                                        ກະລຸນາເລືອກສິດຜູ້ໃຊ້
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6 form-group">
                                    <label>ກົມການສຶກສາ</label>
                                    <select name="dept_id" id="dept_id" class="form-control" required>
                                        <option value="" disabled selected>ກະລຸນາເລືອກກົມການສຶກສາ</option>
                                        <?php
                                        //ສະແດງຂໍ້ມູນມະຫາວິທະຍາໄລ
                                            $university = mysqli_query($conn, "SELECT * FROM department ORDER BY dept_name ASC");
                                            
                                            foreach($university as $row) {
                                                echo '<option value="'.$row['dept_id'].'">'.$row['dept_name'].'</option>';
                                            }
                                            mysqli_free_result($university);
                                            mysqli_next_result($conn);
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        ກະລຸນາເລືອກກົມການສຶກສາ
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-dismiss="modal">ຍົກເລີກ</button>
                            <button type="submit" name="btnInsert" id="btnInsert" class="btn btn-outline-primary"
                                onclick="">ບັນທຶກ</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="user-department" id="formUpdate" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂຂໍ້ມູນຜູ້ໃຊ້ແຜນຮັບນັກຮຽນ </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ຊື່ຜູ້ໃຊ້ລະບົບ</label>
                                    <input type="hidden" name="usr_dept_id_update" id="usr_dept_id_update"
                                        placeholder="ລະຫັດສ້າງແຜນຮັບ">
                                    <input type="text" name="usr_name_update" id="usr_name_update"
                                        placeholder="ຊື່ຜູ້ໃຊ້ລະບົບ" class="form-control" required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້ລະບົບ
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6 form-group">
                                    <label>ນາມສະກຸນ</label>
                                    <input type="text" name="Surname_update" id="Surname_update" placeholder="ນາມສະກຸນ"
                                        class="form-control">
                                </div>
                                <div class="col-md-12 col-sm-6 form-group">
                                    <label>ເພດ</label>
                                    <select name="Gender_update" id="Gender_update" class="form-control" required>
                                        <option value="" disabled selected>------ ເລືອກເພດ ------</option>
                                        <option value="ຊາຍ">ຊາຍ</option>
                                        <option value="ຍິງ">ຍິງ</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        ກະລຸນາເລືອກເພດ
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6 form-group">
                                    <label>ເບີໂທລະສັບ</label>
                                    <input type="text" name="Tel_update" id="Tel_update" placeholder="ເບີໂທລະສັບ"
                                        class="form-control">

                                </div>
                                <div class="col-md-12 col-sm-6 form-group">
                                    <label>ອີເມວ</label>
                                    <input type="text" name="Email_update" id="Email_update" placeholder="ອີເມວ" class="form-control"
                                        required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນອີເມວ
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6 form-group">
                                    <label>ລະຫັດເຂົ້າໃຊ້ລະບົບ</label>
                                    <input type="password" name="Pass_update" id="Pass_update" placeholder="ລະຫັດເຂົ້າໃຊ້ລະບົບ"
                                        class="form-control" required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນລະຫັດເຂົ້າໃຊ້ລະບົບ
                                    </div>

                                </div>
                                <div class="col-md-12 col-sm-6 form-group">
                                    <label>ສິດຜູ້ໃຊ້</label>
                                    <select name="User_ID_update" id="User_ID_update" class="form-control" required>
                                        <option value="" disabled selected>ສິດຜູ້ໃຊ້</option>
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
                                    <div class="invalid-feedback">
                                        ກະລຸນາເລືອກສິດຜູ້ໃຊ້
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6 form-group">
                                    <label>ກົມການສຶກສາ</label>
                                    <select name="dept_id_update" id="dept_id_update" class="form-control" required>
                                        <option value="" disabled selected>ກະລຸນາເລືອກກົມການສຶກສາ</option>
                                        <?php
                                        //ສະແດງຂໍ້ມູນມະຫາວິທະຍາໄລ
                                            $university = mysqli_query($conn, "SELECT * FROM department ORDER BY dept_name ASC");
                                            
                                            foreach($university as $row) {
                                                echo '<option value="'.$row['dept_id'].'">'.$row['dept_name'].'</option>';
                                            }
                                            mysqli_free_result($university);
                                            mysqli_next_result($conn);
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        ກະລຸນາເລືອກກົມການສຶກສາ
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-dismiss="modal">ຍົກເລີກ</button>
                            <button type="submit" name="btnUpdate" id="btnUpdate" class="btn btn-outline-success"
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
$obj->select_userDepartment();
?>

<form method="post" action="user-department">
    <div class="table-responsive">
        <div class="row">
            <div class="col-md-8 mt-2">
                <button type="button" data-toggle="modal" data-target="#exampleModalDelete_many"
                    class="btn btn-danger"><i class="fa fa-trash"></i> ລົບ</button>
            </div>
            <div class="col-md-4 mt-2">
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
            data-search="true" data-click-to-select="true" data-resizable="true" data-id-field="Id"
            data-page-list="[10, 25, 50, 100, all]" data-search-highlight="true" style="width: 2000px;"
            data-search-align="left">

            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th>ເຄື່ອງມື</th>
                    <th data-sortable="true">ລຳດັບ</th>
                    <th data-field="Id" data-sortable="true">ລະຫັດ</th>
                    <th data-field="Name" data-sortable="true">ຊື່ຜູ້ໃຊ້ລະບົບ</th>
                    <th data-field="Surname" data-sortable="true">ນາມສະກຸນ</th>
                    <th data-field="Gender" data-sortable="true">ເພດ</th>
                    <th data-field="Tel" data-sortable="true">ເບີໂທລະສັບ</th>
                    <th data-field="Status" data-sortable="true">ສະຖານະຜູ້ໃຊ້</th>
                    <th data-field="University" data-sortable="true">ກົມການສຶກສາ</th>
                    <th data-field="Email" data-sortable="true">ອີເມວ</th>
                    <th data-field="Password" data-sortable="true">ລະຫັດເຂົ້າໃຊ້ລະບົບ</th>
                    <th data-field="user" class="hide_col">ລະຫັດຜູ້ໃຊ້</th>
                    <th class="hide_col">ລະຫັດແຂວງ</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $i=0;
            while($row = mysqli_fetch_array($result_sup))
            {
            $i++;
            ?>
                <tr>
                    <td></td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#exampleModalUpdate"
                            class="fa fa-pen toolcolor btnUpdate_sup"></a>&nbsp; &nbsp;
                        
                    </td>
                    <td><?= $i ?>.</td>
                    <td><?= $row["usr_dept_id"] ?></td>
                    <td><?= $row["usr_name"] ?></td>
                    <td><?= $row["surname"] ?></td>
                    <td><?= $row["gender"] ?></td>
                    <td><?= $row["tel"] ?></td>
                    <td><?= $row["stt_name"] ?></td>
                    <td><?= $row["dept_name"] ?></td>
                    <td><?= $row["email"] ?></td>
                    <td><?= $row["pass"] ?></td>
                    <td class="hide_col"><?= $row["user_id"] ?></td>
                    <td class="hide_col"><?= $row["dept_id"] ?></td>
                </tr>
                <?php
         }
         mysqli_free_result($result_sup);  
         mysqli_next_result($conn);
         ?>
            </tbody>
        </table>
    </div>

    <!-- modal ລົບຫຼາຍໆໄອດີ -->
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


<form action="user-department" id="formDelete" method="POST" enctype="multipart/form-data">
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
  
                $check_user = mysqli_query($conn,"SELECT * FROM adjustdetail WHERE `user_id`='$checkid';"); //ກວດສອບວ່າລະຫັ້ນນີ້ເຄີຍນຳໃຊ້ຫຼືຍັງ
                if(mysqli_num_rows($check_user) > 0){
                    $logic = 1;
                    echo"<script>";
                    echo"window.location.href='user-department?Checkdelete=true&&sup=$checkid';";
                    echo"</script>";
                    break;
                }
                else{
                    $delete_many = mysqli_query($conn,"call delete_userDepartment('$checkid');");
                }
            }
            if($logic == 0){
                echo"<script>";
                echo"window.location.href='user-department?del2=success';";
                echo"</script>";
            }
     
        }
        else{
            echo"<script>";
            echo"window.location.href='user-department?Checkbox=null';";
            echo"</script>";
        }
}
?>

<!-- sweetalert -->
<?php
//ກວດສອບຖ້າຫາກວີເມວຊ້ຳກັນ
if(isset($_GET['email'])=='same'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດບັນທຶກຂໍ້ມູນໄດ້ເນື່ອງຈາກອີເມວຖືກນຳໃຊ້ແລ້ວ ກະລຸນາປ້ອນອີເມວໃໝ່ !!", "warning");
    </script>';
  }
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

    //ຖ້າ user ສະຖານະບໍ່ກົງກັບຂໍ້ມູນໃຫ້ແຈ້ງເຕືອນ
    if(isset($_GET['stt'])=='not'){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກສະຖານະຜູ້ໃຊ້ບໍ່ຖືກຕ້ອງ ກະລຸນາເລືອກຜູ້ໃຊ້ໃໝ່", "info");
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
      swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນຜູ້ສ້າງແຜນຮັບນີ້ໄ້ດເນື່ອງຈາກລະຫັດຜູ້ສ້າງແຜນຮັບນີ້ເຄີຍໝູນໃຊ້ໃນການແບ່ງປັນທຶນແລ້ວ", "error");
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

    //ຖ້າຫາກ checkbox ເປັນຄ່າຫວ່າງ
    if(isset($_GET['Checkbox'])=='null'){
        echo'<script type="text/javascript">
        swal("", "ກະລຸນາເລືອກຜູ້ໃຊ້ທີ່ຕ້ອງການລົບ", "warning");
        </script>';
      }

      //ຖ້າຫາກ ລະຫັດຖືກນຳໃຊ້ແລ້ວ
    if(isset($_GET['Checkdelete'])=='true'){
        echo'<script type="text/javascript">
        swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນຜູ້ໃຊ້ນີ້ໄດ້ເນື່ອງຈາກລະຫັດ '.$_GET['sup'].'", "warning");
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
        return row.Id.indexOf(text) > -1 || row.Name.indexOf(text) > -1 || row.Surname.indexOf(text) > -1 ||
            row.Gender.indexOf(text) > -1 || row.University.indexOf(text) > -1 ||
            row.Email.indexOf(text) > -1
    })
}
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

<script>
$(document).on("click", ".btnUpdate_sup", function() {

    $('#exampleModalUpdate').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    console.log(data);

    $('#usr_dept_id_update').val(data[3]);
    $('#usr_name_update').val(data[4]);
    $('#Surname_update').val(data[5]);
    $('#Gender_update').val(data[6]);
    $('#Tel_update').val(data[7]);
    $('#Email_update').val(data[10]);
    $('#Pass_update').val(data[11]);
    $('#User_ID_update').val(data[12]);
    $('#dept_id_update').val(data[13]);

});
$(document).on("click", ".btnDelete_sup", function() {

    $('#exampleModalDelete').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    console.log(data);

    $('#id').val(data[12]);

});
</script>