<?php
  $title = "ຈັດການຂໍ້ມູນລະດັບຊັ້ນ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ($path."header-footer/header.php");
?>



<?php


//   if(isset($_POST['btnDelete'])){
//     $obj->delete_department(trim($_POST['id']));
//   }
  if(isset($_POST['Save'])){
    $obj->insert_level(trim($_POST['Level_ID']),trim($_POST['Level_Name']));
  }
  if(isset($_POST['btnUpdate'])){
    $obj->update_level(trim($_POST['Level_ID_update']),trim($_POST['Level_Name_update']));
  }
?>
<div style="width: 100%;">
    <div style="width: 48%; float: left;">
        <b>ລາຍການ<?php echo $title?></b>&nbsp <img src="../../icon/hidemenu.ico" width="10px">
    </div>
    <div style="width: 46%; float: right;" align="right">
        <form action="level" id="form1" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <a href="#" data-toggle="modal" data-target="#exampleModalcategory">
                <img src="../../icon/add.ico" alt="" width="25px">
            </a>
            <div class="modal fade" id="exampleModalcategory" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ເພີ່ມຂໍ້ມູນລະດັບຊັ້ນ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span a ria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6">
                                    <label>ລະຫັດຊັ້ນ</label>
                                    <input type="text" name="Level_ID" id="Level_ID" placeholder="ລະຫັດລະດັບຊັ້ນ (ປ້ອນເປັນຕົວເລກ)"
                                        class="form-control" required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນລະຫັດລະດັບຊັ້ນ
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <label>ຊື່ລະດັບຊັ້ນ</label>
                                    <input type="text" name="Level_Name" id="Level_Name" placeholder="ຊື່ກົມການສຶກສາ"
                                        class="form-control" required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນຊື່ລະດັບຊັ້ນ
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

        <form action="level" id="formUpdate" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
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
                                <div class="col-md-12 col-sm-6">
                                    <label>ຊື່ລະດັບຊັ້ນ</label>
                                    <input type="hidden" name="Level_ID_update" id="Level_ID_update"
                                        placeholder="ລະຫັດກົມການສຶກສາ" required>
                                    <input type="text" name="Level_Name_update" id="Level_Name_update"
                                        placeholder="ຊື່ລະດັບຊັ້ນ" class="form-control" required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນຊື່ລະດັບຊັ້ນ
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
   $obj->select_level();
?>
<form method="post" action="level">
    <div class="table-responsive">
        <div class="row">
            <div class="col-md-8 my-1">
                <button type="button" data-toggle="modal" data-target="#exampleModalDelete_many"
                    class="btn btn-danger"><i class="fa fa-trash"></i> ລົບ</button>
            </div>
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
            data-search="true" data-advanced-search="true" data-click-to-select="true" data-resizable="true"
            data-id-field="id" data-page-list="[10, 25, 50, 100, all]" data-search-highlight="true">
            <thead>
                <tr class="text-center">
                    <th data-field="state" data-checkbox="true"></th>
                    <th>ແກ້ໄຂ</th>
                    <th data-sortable="true">ລຳດັບ</th>
                    <th data-field="id" data-sortable="true">ລະຫັດລະດັບຂັ້ນ</th>
                    <th data-field="name" data-sortable="true">ຊື່ລະດັບຊັ້ນ</th>
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
                    <td></td>
                    <td class="text-center" style="width: 100px;">
                        <a href="#" data-toggle="modal" data-target="#exampleModalUpdate"
                            class="fa fa-pen toolcolor btnUpdate_group"></a>
                    </td>
                    <td class="text-center"><?= $i ?>.</td>
                    <td><?= $row["level_id"] ?></td>
                    <td><?= $row["level_name"] ?></td>
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
      // check if id exist
  if($_GET["msg"] == "same-id"){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກລະຫັດລະດັບຊັ້ນນີ້ມີແລ້ວ ກະລຸນາໃສ່ຊື່ອື່ນ !!", "info");
    </script>';
  }
  // check if name exist
  if($_GET['msg']=='same-name'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດເພີ່ມຂໍ້ມູນໄດ້ເນື່ອງຈາກຊື່ລະດັບຊັ້ນນີ້ມີແລ້ວ ກະລຸນາໃສ່ຊື່ອື່ນ !!", "info");
    </script>';
  }
  //check save
  if($_GET['msg']=='fail'){
    echo'<script type="text/javascript">
    swal("", "ບັນທຶກຂໍ້ມູນບໍ່ສຳເລັດ", "error");
    </script>';
  }
  if($_GET['msg']=='success'){
    echo'<script type="text/javascript">
    swal("", "ສຳເລັດ", "success");
    </script>';
  }
}
//   //ຖ້າ checkbox = null
  if(isset($_GET['Checkbox'])=='null'){
    echo'<script type="text/javascript">
    swal("", "ກະລຸນາເລືອກຂໍ້ມູນທີ່ຕ້ອງການລົບ", "warning");
    </script>';
  }
  //ຖ້າລະຫັດຖືກໃຊ້
  if(isset($_GET['Checkdelete'])=='true' && isset($_GET['course'])){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດດຳເນີນການຕໍ່ໄດ້ເນື່ອງຈາກໄອດີ '.$_GET['course'].' ຖືກນຳໃຊ້ໃນຂໍ້ມູນວິທະຍາໄລແລ້ວ", "warning");
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
        return row.id.indexOf(text) > -1 || row.name.indexOf(text) > -1
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

    $('#Level_ID_update').val(data[3]);
    $('#Level_Name_update').val(data[4]);
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