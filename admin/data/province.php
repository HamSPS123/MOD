<?php
  $title = "ຈັດການຂໍ້ມູນແຂວງ ແລະ ກະຊວງ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");
?>

<?php


  if(isset($_POST['Save'])){
    $obj->insert_province(trim($_POST['P_M_Name']),trim($_POST['p_stt']));
  }
  if(isset($_POST['btnUpdate'])){
    $obj->update_province(trim($_POST['P_M_ID_update']),trim($_POST['P_M_Name_update']),trim($_POST['p_stt_update']));
  }
//   if(isset($_POST['btnDelete'])){
//     $obj->delete_user(trim($_POST['id']));
//   }
?>
<div style="width: 100%;">
    <div style="width: 48%; float: left;">
        <b>ລາຍການ<?php echo $title?></b>&nbsp <img src="../../icon/hidemenu.ico" width="10px">
    </div>
    <div style="width: 46%; float: right;" align="right">
        <form action="province" id="form1" method="POST" enctype="multipart/form-data" class="needs-validation"
            novalidate>
            <a href="#" data-toggle="modal" data-target="#exampleModalcategory">
                <img src="../../icon/add.ico" alt="" width="25px">
            </a>
            <div class="modal fade" id="exampleModalcategory" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ເພີ່ມຂໍ້ມູນແຂວງ ຫຼື ກະຊວງ </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span a ria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6">
                                    <label>ຊື່ແຂວງ ຫຼື ກະຊວງ</label>
                                    <input type="text" class="form-control" name="P_M_Name" id="P_M_Name"
                                        placeholder="ຊື່ແຂວງ ຫຼື້ ກະຊວງ" required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນຊື່ແຂວງ ຫຼື ກະຊວງ
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <label>ສະຖານະ</label>
                                    <select name="p_stt" id="p_stt" class="form-control" required>
                                        <option value="" disabled selected>ເລືອກສະຖານະ</option>
                                        <option value="1">ແຂວງ</option>
                                        <option value="2">ກະຊວງ</option>
                                    </select>
                                    
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນຊື່ແຂວງ ຫຼື ກະຊວງ
                                    </div>
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

        <form action="province" id="formUpdate" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂຂໍ້ມູນແຂວງ ຫຼື ກະຊວງ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6 form-control2">
                                    <label>ຊື່ແຂວງ ຫຼື ກະຊວງ</label>
                                    <input type="hidden" name="P_M_ID_update" id="P_M_ID_update"
                                        placeholder="ລະຫັດຜູ້ໃຊ້">
                                    <input type="text" class="form-control" name="P_M_Name_update" id="P_M_Name_update"
                                        placeholder="ຊື່ແຂວງ ຫຼື້ ກະຊວງ" required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນຊື່ແຂວງ ຫຼື ກະຊວງ
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <label>ສະຖານະ</label>
                                    <select name="p_stt_update" id="p_stt_update" class="form-control" required>
                                        <option value="" disabled selected>ເລືອກສະຖານະ</option>
                                        <option value="1">ແຂວງ</option>
                                        <option value="2">ກະຊວງ</option>
                                    </select>
                                    
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນຊື່ແຂວງ ຫຼື ກະຊວງ
                                    </div>
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
   $obj->select_province();
?>
<form method="post" action="province">
    <div class="table-responsive">
        <div class="row">
            <div class="col-md-8">
                <button type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#exampleModalDelete_many"><i class="fa fa-trash"></i> ລົບ</button>
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

        <table id="table" data-search-selector="#inCus" data-pagination="true" data-custom-search="customSearch"
            data-search="true" data-click-to-select="true" data-resizable="true" data-id-field="id"
            data-page-list="[10, 25, 50, 100, all]" data-search-highlight="true" data-search-align="left">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th class="text-center">ແກ້ໄຂ</th>
                    <th data-sortable="true">ລຳດັບ</th>
                    <th data-field="id" data-sortable="true">ລະຫັດ</th>
                    <th data-field="name" data-sortable="true">ຊື່ແຂວງ ແລະ ກະຊ່ວງ</th>
                    <th data-field="p_stt" data-sortable="true">ສະຖານະ</th>
                    <th class="hide_col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                while($row = mysqli_fetch_array($result))
                {
                    $i++;
                ?>
                <tr>
                    <td></td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#exampleModalUpdate"
                            class="fa fa-pen toolcolor btnUpdate_user"></a>
                    </td>
                    <td><?= $i ?>.</td>
                    <td><?= $row["p_m_id"] ?></td>
                    <td><?= $row["p_m_name"] ?></td>
                    <td>
                        <?= $row["p_stt"] == 1 ? "ແຂວງ" : "ກະຊວງ"  ?>
                    </td>
                    <td  class="hide_col"><?= $row["p_stt"] ?></td>
                </tr>
                <?php
                }
                mysqli_free_result($result);  
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




<!-- sweetalert -->
<?php
    //ລົບຫຼາຍ user

    if(isset($_POST["btnDelete_many"])){
        $logic = 0;
        
            if(isset($_POST["btSelectItem"])){
                foreach($_POST["btSelectItem"] as $checkid){
                    $check_userDemand = mysqli_query($conn,"select * from demand_user where p_m_id='$checkid' and stt=1");//ກວດສອບອີເມວວ່າມີແລ້ວ ຫຼື ຍັງ
                    $check_quota = mysqli_query($conn,"select * from quota_distribute where p_m_id='$checkid' and stt=1");//ກວດສອບອີເມວວ່າມີແລ້ວ ຫຼື ຍັງ
                    if(mysqli_num_rows($check_userDemand) > 0){
                        $logic = 1;
                        echo"<script>";
                        echo"window.location.href='province?Checkdelete=true&&dem=$checkid';";
                        echo"</script>";
                        break;
                    }
                    if(mysqli_num_rows($check_quota) > 0){
                        $logic = 1;
                        echo"<script>";
                        echo"window.location.href='province?Checkdelete=true&&quo=$checkid';";
                        echo"</script>";
                        break;
                    }
                }
                if($logic == 0){
                    $delete = 0;
                    foreach($_POST["btSelectItem"] as $id){
                        
                        $delete_many = mysqli_query($conn,"call delete_province($id)");
                        if(!$delete_many){
                            $delete = 1;
                            echo"<script>";
                            echo"window.location.href='province?msg=fail';";
                            echo"</script>";
                        }
                        mysqli_free_result($delete_many);  
                        mysqli_next_result($conn);
                    }
                    if($delete == 0){
                        echo"<script>";
                        echo"window.location.href='province?msg=success';";
                        echo"</script>";
                    }
                    
                }
            }
            else{
                echo"<script>";
                echo"window.location.href='province?Checkbox=null';";
                echo"</script>";
            }
    }

    if (isset($_GET['msg'])) {
        if($_GET['msg']=='success'){
            echo'<script type="text/javascript">
            swal("", "ສຳເລັດ", "success");
            </script>';
        }
        if($_GET['msg']=='same'){
            echo'<script type="text/javascript">
            swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອຈາກຊື່ແຂວງ ຫຼື ກະຊວງນີ້ມີຢູ່ແລ້ວ ກະລຸນາລອງໃໝ່!!!", "info");
            </script>';
        }
        if($_GET['msg']=='fail'){
            echo'<script type="text/javascript">
            swal("", "ເກີດຂໍ້ຜິດພາດ", "error");
            </script>';
        }
    }
// check if not checkbox
if(isset($_GET['Checkbox'])=='null'){
    echo'<script type="text/javascript">
    swal("", "ກະລຸນາເລືອກຂໍ້ມູນທີ່ຈະລົບ", "info");
    </script>';
  }

  //check if ids have used
  if(isset($_GET['Checkdelete'])=='true' && isset($_GET['quo'])){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກໄອດີ '.$_GET['quo'].' ຖືກນຳໃຊ້ໃນການແບ່ງປັນແລ້ວ", "info");
    </script>';
  }

  if(isset($_GET['Checkdelete'])=='true' && isset($_GET['dem'])){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້ເນື່ອງຈາກໄອດີ '.$_GET['dem'].' ຖືກນຳໃຊ້ໃນຂໍ້ມູນຜູ້ແບ່ງປັນແລ້ວ", "info");
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
        return row.id.indexOf(text) > -1 || row.name.indexOf(text) > -1
    })
}
</script>

<script>
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

    $('#P_M_ID_update').val(data[3]);
    $('#P_M_Name_update').val(data[4]);
    $('#p_stt_update').val(data[6]);

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