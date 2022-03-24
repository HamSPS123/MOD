<?php
  $title = "ຈັດການຂໍ້ມູນຜູ້ໃຊ້";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>

<?php


  if(isset($_POST['stt_id'])){
    $obj->insert_user(trim($_POST['stt_id']));
  }
  if(isset($_POST['User_ID_update'])){
    $obj->update_user(trim($_POST['User_ID_update']),trim($_POST['Stt_ID_update']));
  }
  if(isset($_POST['btnDelete'])){
    $obj->delete_user(trim($_POST['id']));
  }
?>
<div style="width: 100%;">
    <div style="width: 48%; float: left;">
        <b>ລາຍການ<?php echo $title?></b>&nbsp <img src="../../icon/hidemenu.ico" width="10px">
    </div>
    <div style="width: 46%; float: right;" align="right">
        <form action="user" id="form1" method="POST" enctype="multipart/form-data">
            <a href="#" data-toggle="modal" data-target="#exampleModalcategory">
                <img src="../../icon/add.ico" alt="" width="25px">
            </a>
            <div class="modal fade" id="exampleModalcategory" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ເພີ່ມຂໍ້ມູນຜູ້ໃຊ້ </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span a ria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ສະຖານະຜູ້ໃຊ້ລະບົບ</label>
                                    <input type="hidden" name="User_ID" id="User_ID" placeholder="ລະຫັດຜູ້ໃຊ້">
                                    <select name="stt_id" id="stt_id">
                                        <option value="" disabled selected>ເລືອກສະຖານະຜູ້ໃຊ້ລະບົບ</option>
                                        <?php
                                            $user_status = mysqli_query($conn, "select * from user_status ORDER BY stt_name ASC");
                                            
                                            foreach($user_status as $row) {
                                                echo '<option value="'.$row['stt_id'].'">'.$row['stt_name'].'</option>';
                                            }
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
                            <button type="submit" name="Save" id="Save" class="btn btn-outline-primary"
                                onclick="">ບັນທຶກ</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="user" id="formUpdate" method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂຂໍ້ມູນຜູ້ໃຊ້</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ສະຖານະຜູ້ໃຊ້ລະບົບ</label>
                                    <input type="hidden" name="User_ID_update" id="User_ID_update"
                                        placeholder="ລະຫັດຜູ້ໃຊ້">
                                    <select name="Stt_ID_update" id="stt_id_update">
                                        <option value="" disabled selected>ເລືອກສະຖານະຜູ້ໃຊ້ລະບົບ</option>
                                        <?php
                                            $user_status = mysqli_query($conn, "select * from user_status ORDER BY stt_name ASC");
                                            
                                            foreach($user_status as $row) {
                                                echo '<option value="'.$row['stt_id'].'">'.$row['stt_name'].'</option>';
                                            }
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
<div class="clearfix"></div><br>
<?php
   $obj->select_user();
?>
<form method="post" action="user">
    <div class="table-responsive">
        <div class="row">
            <div class="col-md-8">
                <button type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#exampleModalDelete_many"><i class="fa fa-trash"></i> ລົບ</button>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="inCus" placeholder="ຄົ້ນຫາຜູ້ໃຊ້">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <table id="table" data-search-selector="#inCus" data-pagination="true"
            data-custom-search="customSearch" data-search="true" data-click-to-select="true" data-resizable="true"
            data-id-field="u_id" data-page-list="[10, 25, 50, 100, all]" data-search-highlight="true"
            data-search-align="left">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th class="text-center">ເຄື່ອງມື</th>
                    <th data-sortable="true">ລຳດັບ</th>
                    <th data-field="u_id" data-sortable="true">ລະຫັດຜູ້ໃຊ້</th>
                    <th class="hide_col" data-field="s_id" data-sortable="true">ສະຖານະຜູ້ໃຊ້ລະບົບ</th>
                    <th data-field="name" data-sortable="true">ຊື່ສະຖານະຜູ້ໃຊ້ລະບົບ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                while($row = mysqli_fetch_array($resultuser))
                {
                    $i++;
                ?>
                <tr>
                    <td></td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#exampleModalUpdate"
                            class="fa fa-pen toolcolor btnUpdate_user"></a>&nbsp; &nbsp;
                        <a href="#" data-toggle="modal" data-target="#exampleModalDelete"
                            class="fa fa-trash toolcolor btnDelete_user"></a>
                    </td>
                    <td><?= $i ?>.</td>
                    <td><?= $row["user_id"] ?></td>
                    <td class="hide_col"><?= $row["stt_id"] ?></td>
                    <td><?= $row["stt_name"] ?></td>
                </tr>
                <?php
                }
                mysqli_free_result($resultuser);  
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
                    <h5 class="modal-title" id="exampleModalLabel">ຢືນຢັນ</h5>
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


<form action="user" id="formDelete" method="POST" enctype="multipart/form-data">
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
const stt_id = document.getElementById('stt_id');
// const stt_id2 = document.getElementById('stt_id2');
myform.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputs();
});

function checkInputs() {

    const stt_idValue = stt_id.value.trim();
    // const stt_id2Value = stt_id2.value.trim();

    if (stt_idValue === '') {
        setErrorFor(stt_id, 'ກະລຸນາປ້ອນສະຖານະຜູ້ໃຊ້ລະບົບ');
    } else {
        setSuccessFor(stt_id);
    }
    // if (stt_id2Value === '') {
    //     setErrorFor(stt_id2, 'ກະລຸນາປ້ອ2');
    // } else {
    //     setSuccessFor(stt_id2);
    // }
    if (stt_idValue !== '') {
        document.getElementById("form1").action = "user";
        document.getElementById("form1").submit();
    }
}
</script>

<script type="text/javascript">
const myformUpdate = document.getElementById('formUpdate');
const stt_id_update = document.getElementById('stt_id_update');

myformUpdate.addEventListener('submit', (e) => {
    e.preventDefault();
    checkInputsUpdate();
});

function checkInputsUpdate() {
    const stt_id_updateValue = stt_id_update.value.trim();
    if (stt_id_updateValue === '') {
        setErrorFor(stt_id_update, 'ກະລຸນາເລືອກສະຖານະຜູ້ໃຊ້ລະບົບ');
    } else {
        setSuccessFor(stt_id_update);
    }
    if (stt_id_updateValue !== '') {
        document.getElementById("formUpdate").action = "user";
        document.getElementById("formUpdate").submit();
    }
}
</script>



<!-- sweetalert -->
<?php

    //ລົບຫຼາຍ user

    if(isset($_POST["btnDelete_many"])){
        $logic = 0;
        
            if(isset($_POST["btSelectItem"])){
                foreach($_POST["btSelectItem"] as $checkid){
                    $check_userHRD = mysqli_query($conn,"select * from hrd_user where user_id='$checkid'");//ກວດສອບອີເມວວ່າມີແລ້ວ ຫຼື ຍັງ
                    $check_userDemand = mysqli_query($conn,"select * from demand_user where user_id='$checkid'");//ກວດສອບອີເມວວ່າມີແລ້ວ ຫຼື ຍັງ
                    $check_userSupply = mysqli_query($conn,"select * from supply_user where user_id='$checkid'");//ກວດສອບອີເມວວ່າມີແລ້ວ ຫຼື ຍັງ
                    if(mysqli_num_rows($check_userHRD) > 0){
                        $logic = 1;
                        echo"<script>";
                        echo"window.location.href='user?Checkdelete=true&&hrd=$checkid';";
                        echo"</script>";
                        break;
                    }
                    if(mysqli_num_rows($check_userDemand) > 0){
                        $logic = 1;
                        echo"<script>";
                        echo"window.location.href='user?Checkdelete=true&&dem=$checkid';";
                        echo"</script>";
                        break;
                    }
                    if(mysqli_num_rows($check_userSupply) > 0){
                        $logic = 1;
                        echo"<script>";
                        echo"window.location.href='user?Checkdelete=true&&sup=$checkid';";
                        echo"</script>";
                        break;
                    }
                }
                if($logic == 0){
                    $delete = 0;
                    foreach($_POST["btSelectItem"] as $id){
                        
                        $delete_many = mysqli_query($conn,"call delete_user($id)");
                        if(!$delete_many){
                            $delete = 1;
                            echo"<script>";
                            echo"window.location.href='user?del=fail';";
                            echo"</script>";
                        }
                        mysqli_free_result($delete_many);  
                        mysqli_next_result($conn);
                    }
                    if($delete == 0){
                        echo"<script>";
                        echo"window.location.href='user?del2=success';";
                        echo"</script>";
                    }
                    
                }
            }
            else{
                echo"<script>";
                echo"window.location.href='user?Checkbox=null';";
                echo"</script>";
            }
    }

// check if not checkbox
if(isset($_GET['Checkbox'])=='null'){
    echo'<script type="text/javascript">
    swal("", "ກະລຸນາເລືອກຂໍ້ມູນທີ່ຈະລົບ", "info");
    </script>';
  }

  //check if ids have used
  if(isset($_GET['Checkdelete'])=='true' && isset($_GET['hrd'])){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກໄອດີ '.$_GET['hrd'].' ຖືກນຳໃຊ້ແລ້ວ", "info");
    </script>';
  }

  if(isset($_GET['Checkdelete'])=='true' && isset($_GET['dem'])){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກໄອດີ '.$_GET['dem'].' ຖືກນຳໃຊ້ແລ້ວ", "info");
    </script>';
  }

  if(isset($_GET['Checkdelete'])=='true' && isset($_GET['sup'])){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກໄອດີ '.$_GET['sup'].' ຖືກນຳໃຊ້ແລ້ວ", "info");
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
  // check if delete user exist
  if(isset($_GET['check'])=='fail'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດລົບຜູ້ໃຊ້ນີ້ໄດ້ເນື່ອງຈາກຜູ້ໃຊ້ນີ້ເຄີຍນຳໃຊ້ແລ້ວ !!", "info");
    </script>';
  }
?>






<?php
 include ("../../header-footer/footer.php");
?>

<script>
$(document).ready(function() {
    $('#table').bootstrapTable();

});

function customSearch(data, text) {
    return data.filter(function(row) {
        return row.u_id.indexOf(text) > -1 || row.name.indexOf(text) > -1
    })
}
</script>

<script>
// $(document).ready(function() {
//     $('.btnDelete_user').on('click', function() {
//         $('#exampleModalDelete').modal('show');
//         $tr = $(this).closest('tr');
//         var data = $tr.children("td").map(function() {
//             return $(this).text();
//         }).get();

//         console.log(data);

//         $('#id').val(data[3]);
//     });

//     $('.btnUpdate_user').on('click', function() {
//         $('#exampleModalUpdate').modal('show');
//         $tr = $(this).closest('tr');
//         var data = $tr.children("td").map(function() {
//             return $(this).text();
//         }).get();

//         console.log(data);

//         $('#User_ID_update').val(data[3]);
//         $('#stt_id_update').val(data[4]);
//     });
// });
$(document).on("click", ".btnDelete_user", function() {

    $('#exampleModalDelete').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    console.log(data);

    $('#id').val(data[3]);

});
$(document).on("click", ".btnUpdate_user", function() {

    $('#exampleModalUpdate').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    console.log(data);

    $('#User_ID_update').val(data[3]);
    $('#stt_id_update').val(data[4]);

});
</script>