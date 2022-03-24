<?php
  $title = "ເປີດສົກຮຽນ";
  $path="../../";
  $links = "../";
  $session_path = "../../";
  include ("../../header-footer/header.php");

  if (isset($_POST['Save'])) {
      $obj->insert_fy(trim($_POST['Fy_ID']),trim($_POST['fy_year']),trim($_POST['Qty_s']),trim($_POST['Qty_c']),trim($_POST['Qty_i']),trim($_POST['Qty_q']),trim($_POST['status']),$_FILES['pdf']['name']);
  }
  if (isset($_POST['btnUpdate'])) {
    $obj->update_fy(trim($_POST['Fy_ID_update']),trim($_POST['fy_year_update']),trim($_POST['Qty_s_update']),trim($_POST['Qty_c_update']),trim($_POST['Qty_i_update']),trim($_POST['Qty_q_update']),trim($_POST['status_update']),$_FILES['file_update']['name']);
  }
  if(isset($_POST["btnDelete_many"])){
    $logic = 0;
    
        if(isset($_POST["btSelectItem"])){
            foreach($_POST["btSelectItem"] as $checkid){
                $check_adj_demand = mysqli_query($conn, "SELECT * FROM create_plan c LEFT JOIN adjust a ON c.adj_id=a.adj_id WHERE a.fy_id = '$checkid'"); //ກວດສອບວ່າລະຫັ້ນນີ້ເຄີຍນຳໃຊ້ຫຼືຍັງ
                $check_adj_supply = mysqli_query($conn, "SELECT * FROM adjustdetail c LEFT JOIN adjust a ON c.adj_id=a.adj_id WHERE a.fy_id = '$checkid'"); //ກວດສອບວ່າລະຫັ້ນນີ້ເຄີຍນຳໃຊ້ຫຼືຍັງ
                $check_doc = mysqli_query($conn,"SELECT * FROM document_upload WHERE fy_id='$checkid'");
                if(mysqli_num_rows($check_adj_demand) > 0){
                    $logic = 1;
                    echo"<script>";
                    echo"window.location.href='year?Checkdelete=true&&adj=$checkid';";
                    echo"</script>";
                    break;
                }
                if(mysqli_num_rows($check_adj_supply) > 0){
                    $logic = 1;
                    echo"<script>";
                    echo"window.location.href='year?Checkdelete=true&&adj=$checkid';";
                    echo"</script>";
                    break;
                }
                if(mysqli_num_rows($check_doc) > 0){
                    $logic = 1;
                    echo"<script>";
                    echo"window.location.href='year?Checkdelete=true&&doc=$checkid';";
                    echo"</script>";
                    break;
                }
            }

            if($logic == 0){
                $delete = 0;
                foreach($_POST["btSelectItem"] as $id){

                    $delete_many = mysqli_query($conn,"DELETE FROM adjust WHERE fy_id='$id';");
                    if(!$delete_many){
                        $delete = 1;
                        echo"<script>";
                        echo"window.location.href='year?del=fail';";
                        echo"</script>";
                        break;
                    }
                    else{
                        $pdf = mysqli_query($conn, "SELECT file_path FROM fy WHERE fy_id = '$id'"); //ກວດສອບຮູບພາບກ່ອນລົບ
                        $data = mysqli_fetch_array($pdf, MYSQLI_ASSOC);
                        $un_pdf = $path.'image/pdf/'.$data['file_path'];
                        $delete_fy = mysqli_query($conn,"DELETE FROM fy WHERE fy_id='$id';");
                        if(!$delete_fy){
                            echo"<script>";
                            echo"window.location.href='year?del=fail';";
                            echo"</script>";
                        }
                        else{
                            if(file_exists($un_pdf) && !empty($data['file_path'])){
                                unlink($un_pdf); //ລົບຮູບອອກ
                            }
                            echo"<script>";
                            echo"window.location.href='year?del2=success';";
                            echo"</script>";
                        } 
                    }
                }

                
            }
        }
        else{
            echo"<script>";
            echo"window.location.href='year?Checkbox=null';";
            echo"</script>";
        }
}

?>

<div style="width: 100%;">
    <div style="width: 48%; float: left;">
        <b>ລາຍການ<?php echo $title?></b>&nbsp <img src="../../icon/hidemenu.ico" width="10px">
    </div>
    <div style="width: 46%; float: right;" align="right">
        <form action="year" id="form1" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <a href="#" data-toggle="modal" data-target="#exampleModalcategory">
                <img src="../../icon/add.ico" alt="" width="25px">
            </a>
            <div class="modal fade" id="exampleModalcategory" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ເພີ່ມຂໍ້ມູນສົກຮຽນປີ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span a ria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" align="left">
                                <div class="col-md-12 col-sm-6">
                                    <label for="Fy_ID">ສົກຮຽນປີ</label>
                                    <input type="text" class="form-control" name="Fy_ID" id="Fy_ID" value=""
                                        placeholder="20XX-20XX" required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນສົກຮຽນ
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <label>ປີຮຽນ</label>
                                    <input type="text" name="fy_year" id="fy_year" class="form-control yearpicker"
                                        placeholder="ເລືອກປີ" autocomplete="off" required>
                                    <div class="year-selected"></div>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນປີຮຽນ
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <label>ຈຳນວນນັກຮຽນ ມ.7</label>
                                    <input type="text" class="form-control" name="Qty_s" id="Qty_s" placeholder="ຈຳນວນ"
                                        required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນຈຳນວນນັກຮຽນ ມ.7
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <label>ຈຳນວນນັກຮຽນຕໍ່ເນື່ອງ</label>
                                    <input type="text" class="form-control" name="Qty_c" id="Qty_c" placeholder="ຈຳນວນ"
                                        required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນຈຳນວນນັກຮຽນຕໍ່ເນື່ອງ
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <label>ຈຳນວນນັກຮຽນ ມ.7 ຮຽນຕໍ່ພາຍໃນ</label>
                                    <input type="text" class="form-control" name="Qty_i" id="Qty_i" placeholder="ຈຳນວນ"
                                        required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນຈຳນວນນັກຮຽນ ມ.7 ຮຽນຕໍ່ພາຍໃນ
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <label>ຈຳນວນນັກສືກສາລະບົບຕໍ່ເນື່ອງ</label>
                                    <input type="text" class="form-control" name="Qty_q" id="Qty_q" placeholder="ຈຳນວນ"
                                        required>
                                    <div class="invalid-feedback">
                                        ກະລຸນາປ້ອນຈຳນວນນັກສຶກສາລະບົບຕໍ່ເນື່ອງ
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <label>ສະຖານະ</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="" disabled selected>ເລືອກສະຖານະ</option>
                                        <option value="1">ເປີດ</option>
                                        <option value="0">ປິດ</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        ກະລຸນາເລືອກສະຖານະ
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                    <label>ຕິດຄັດເອກະສານ</label>
                                    <input type="file" class="form-control" name="pdf" id="file" accept=".pdf"
                                        placeholder="ຕິດຄັດເອກະສານ">
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




<div class="clearfix"><br></div>
<form action="year" method="POST">
    <div class="table-responsive">
        <div class="row">
            <div class="col-md-8">
                <button type="button" data-toggle="modal" data-target="#exampleModalDelete_many"
                    class="btn btn-danger"><i class="fa fa-trash"></i> ລົບ</button>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">

                    <input type="search" class="form-control" id="inCus" placeholder="ຄົ້ນຫາ"
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="button"><i class="fas fa-search"></i></button>
                    </div>
                    &nbsp; &nbsp;
                </div>
            </div>
        </div>
        

        <table id="table" data-search-selector="#inCus" data-pagination="true" data-search="true"
            data-click-to-select="true" data-id-table="advancedTable" data-resizable="true" data-id-field="id"
            data-page-list="[10, 25, 50, 100, all]" data-search-highlight="true" data-search-align="left"
            style="width: 1500px;">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th>ແກ້ໄຂ</th>
                    <th data-sortable="true">ລຳດັບ</th>
                    <th data-field="id" data-sortable="true">ສົກຮຽນປີ</th>
                    <th data-field="year" data-sortable="true">ປີ</th>
                    <th data-field="file" data-sortable="true">ເອກະສານຕິດຄັດ</th>
                    <th data-field="qty_s" data-sortable="true">ຈຳນວນນັກຮຽນ ມ.7</th>
                    <th data-field="qty_c" data-sortable="true">ຈຳນວນຮຽນຕໍ່ເນື່ອງ</th>
                    <th data-field="qty_i" data-sortable="true">ຈຳນວນນັກຮຽນ ມ.7 ພາຍໃນ</th>
                    <th data-field="qty_q" data-sortable="true">ຈຳນວນນັກຮຽນ-ພະນັກງານ ລະບົບຕໍ່ເນື່ອງ</th>
                    <th data-field="status" data-sortable="true">ສະຖານະ</th>
                    <th class="hide_col"></th>
                    <th class="hide_col"></th>
                    <th class="hide_col"></th>
                    <th class="hide_col"></th>
                    <th class="hide_col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $obj->select_fy();
                    $i=0;
                    foreach($result as $row){
                        $i++;
                ?>
                <tr>
                    <td></td>
                    <td class="text-center"> <a href="#" data-toggle="modal" data-target="#exampleModalUpdate"
                            class="fa fa-edit toolcolor btnUpdate_year"></a></td>
                    <td><?= $i ?></td>
                    <td><?= $row['fy_id'] ?></td>
                    <td><?= $row['year'] ?></td>
                    <td>
                        <a href="<?= $path ?>image/pdf/<?= $row['file_path'] ?>"
                            target="_blank"><?= $row['file_path'] ?></a>
                    </td>
                    <td class="text-right"><?= number_format($row['qty_student'],2) ?> ຄົນ</td>
                    <td class="text-right"><?= number_format($row['qty_con'],2) ?> ຄົນ</td>
                    <td class="text-right"><?= number_format($row['qty_student_inside'],2) ?> ຄົນ</td>
                    <td class="text-right"><?= number_format($row['qty_collegue_con'],2) ?> ຄົນ</td>
                    <td>
                        <?php 
                        if($row['status'] == 1){
                            echo 'ເປິດ';
                        }else{
                            echo 'ປິດ';
                        }
                         ?>
                    </td>
                    <td class="hide_col"><?= $row['status'] ?></td>
                    <td><?= $row['qty_student'] ?></td>
                    <td><?= $row['qty_con'] ?></td>
                    <td><?= $row['qty_student_inside'] ?></td>
                    <td><?= $row['qty_collegue_con'] ?></td>
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



<form action="year" id="formUpdate" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
    <div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ແກ້ໄຂຂໍ້ມູນສົກຮຽນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" align="left">
                        <div class="col-md-12 col-sm-6">
                            <label>ປີຮຽນ</label>
                            <input type="text" name="fy_year_update" id="fy_year_update" class="form-control yearpicker"
                                placeholder="ເລືອກປີ" autocomplete="off" required>
                            <div class="year-selected"></div>
                            <div class="invalid-feedback">
                                ກະລຸນາປ້ອນປີຮຽນ
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <input type="hidden" name="Fy_ID_update" id="Fy_ID_update">
                            <label>ຈຳນວນນັກຮຽນ ມ.7</label>
                            <input type="text" class="form-control" name="Qty_s_update" id="Qty_s_update"
                                placeholder="ຈຳນວນ" required>
                            <div class="invalid-feedback">
                                ກະລຸນາປ້ອນຈຳນວນນັກຮຽນ ມ.7
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <label>ຈຳນວນນັກຮຽນຕໍ່ເນື່ອງ</label>
                            <input type="text" class="form-control" name="Qty_c_update" id="Qty_c_update"
                                placeholder="ຈຳນວນ" required>
                            <div class="invalid-feedback">
                                ກະລຸນາປ້ອນຈຳນວນນັກຮຽນຕໍ່ເນື່ອງ
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <label>ຈຳນວນນັກຮຽນ ມ.7 ຮຽນຕໍ່ພາຍໃນ</label>
                            <input type="text" class="form-control" name="Qty_i_update" id="Qty_i_update"
                                placeholder="ຈຳນວນ" required>
                            <div class="invalid-feedback">
                                ກະລຸນາປ້ອນຈຳນວນນັກຮຽນ ມ.7 ຮຽນຕໍ່ພາຍໃນ
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <label>ຈຳນວນນັກສືກສາລະບົບຕໍ່ເນື່ອງ</label>
                            <input type="text" class="form-control" name="Qty_q_update" id="Qty_q_update"
                                placeholder="ຈຳນວນ" required>
                            <div class="invalid-feedback">
                                ກະລຸນາປ້ອນຈຳນວນນັກສຶກສາລະບົບຕໍ່ເນື່ອງ
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ສະຖານະ</label>
                            <!-- <input type="hidden" name="id_update" id="id_update"> -->
                            <select name="status_update" id="status_update">
                                <option value="" diasabled selected>ເລືອກສະຖານະ</option>
                                <option value="1">ເປີດ</option>
                                <option value="0">ປິດ</option>
                            </select>
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
                        </div>
                        <div class="col-md-12 col-sm-6 form-control2">
                            <label>ຕິດຄັດເອກະສານ</label>
                            <input type="file" name="file_update" id="file_update" placeholder="ອັບໂຫລດ">
                            <i class="fas fa-check-circle "></i>
                            <i class="fas fa-exclamation-circle "></i>
                            <small class="">Error message</small>
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




<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->

<script type="text/javascript">
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};

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
  // check if dept_id exist in university
  if(isset($_GET['delete'])=='warning'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນກົມນີ້ໄ້ດເນື່ອງຈາກລະຫັດກົມນີ້ເຄີຍໝູນໃຊ້ໃນຂໍ້ມູນວິທະຍາໄລແລ້ວ", "error");
    </script>';
  }
   // check if dept_id exist in adjust
   if(isset($_GET['delete2'])=='warning'){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດລົບຂໍ້ມູນກົມນີ້ໄ້ດເນື່ອງຈາກລະຫັດກົມນີ້ເຄີຍໝູນໃຊ້ໃນຂໍ້ມູນແບ່ງປັນແລ້ວ", "error");
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
  if(isset($_GET['Checkdelete'])=='true' && isset($_GET['adj'])){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດດຳເນີນການຕໍ່ໄດ້ເນື່ອງຈາກໄອດີ '.$_GET['adj'].' ຖືກນຳໃຊ້ໃນຂໍ້ມູນແບ່ງປັນທືນແລ້ວ", "warning");
    </script>';
  }

  if(isset($_GET['Checkdelete'])=='true' && isset($_GET['doc'])){
    echo'<script type="text/javascript">
    swal("", "ບໍ່ສາມາດດຳເນີນການຕໍ່ໄດ້ເນື່ອງຈາກໄອດີ '.$_GET['doc'].' ຖືກນຳໃຊ້ໃນຂໍ້ມູນເອກະສານແລ້ວ", "warning");
    </script>';
  }
?>


<?php
 include ($path."header-footer/footer.php");
?>

<script>
$(function() {
    $('#table').bootstrapTable();

});

$(document).on("click", ".btnUpdate_year", function() {
    $('#exampleModalUpdate').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    console.log(data);

    $('#Fy_ID_update').val(data[3]);
    $('#fy_year_update').val(data[4]);
    $('#status_update').val(data[11]);
    $('#Qty_s_update').val(data[12]);
    $('#Qty_c_update').val(data[13]);
    $('#Qty_i_update').val(data[14]);
    $('#Qty_q_update').val(data[15]);
});
</script>