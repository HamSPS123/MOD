<?php
    session_start();
    include (''.$path.'oop/obj.php');
    if($_SESSION['mod_ses_status_id'] == 1){
         $stt = 1;
    }
    if($_SESSION['mod_ses_status_id'] == 2){
       $stt = 2;
    }
    if($_SESSION['mod_ses_status_id'] == 3){
        $stt = 3;
        $university_id = $_SESSION['uni_id'];
    }
    if($_SESSION['mod_ses_status_id'] == 4){
        $stt = 4;
    }
    if($_SESSION['mod_ses_status_id'] == 5){
        $stt = 5;
    }
    if($_SESSION['mod_user_ses_id'] == ''){
        echo"<meta http-equiv='refresh' content='1;URL=index'>";        
   }
   else if($_SESSION['mod_ses_status_id'] != $stt){
        echo"<meta http-equiv='refresh' content='1;URL=index'>";        
   }
   else{
       $user_id = $_SESSION["user_id"];
   }
   if(isset($_POST['btnLogout'])){
        $obj->logout($stt);
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo $path; ?>image/logo.png">
    <title><?php echo $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $path ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tcususdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo $path ?>plugins/tcususdominus-bootstrap-4/css/tcususdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo $path ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo $path ?>plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $path ?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo $path ?>dist/css/alt/style.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo $path ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo $path ?>plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo $path ?>plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css">

    
    <link rel="stylesheet" href="<?php echo $path ?>dist/css/bootstrap-table.min.css">
    <link href="<?php echo $path ?>dist/css/jquery.resizableColumns.css" rel="stylesheet">
    <script src="<?php echo $path ?>dist/js/jquery.min.js"></script>
    
    
    <script src="<?php echo $path ?>dist/js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="<?php echo $path ?>dist/css/alt/pageload.css">
    <!-- bootstrap select -->
    <link rel="stylesheet" href="<?php echo $path ?>dist/css/bootstrap-select.min.css">

</head>


<body class="hold-transition sidebar-mini layout-fixed">
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light font14">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href=""><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link"><?php echo $title; ?></a>
                </li>
            </ul>

            <?php
// input text search in header 
  if ($title == "ຂໍ້ມູນພະນັກງານ"){
echo '<form action="employee" class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" name="search" id="search" type="search" placeholder="ຄົ້ນຫາ" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
        </div>
      </form>';
}
else{
echo"";
}




    ?>

            <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="ຄົ້ນຫາ" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 font14">
            <!-- Brand Logo -->
            <a href="../Main" class="brand-link">
                <img src="<?php echo $path ?>image/logo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light" style="font-size: 17px;">ກະຊວງສຶກສາທິການແລະກິລາ</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <!-- <?php
            if($_SESSION['img_path'] == ''){
              ?>
              <img src="<?php echo $path ?>image/image.jpeg" class="img-circle elevation-2" alt="User Image">
              <?php

            }
            else{
              ?>
                   <img src="<?php echo $path ?>image/<?php echo $_SESSION['img_path'] ?>" class="img-circle elevation-2" alt="User Image">
              <?php
            }
          ?> -->

                        <img src="<?php echo $path ?>image/image.jpeg" class="img-circle elevation-2" alt="User Image">

                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php // echo $_SESSION['emp_name']
                            if($stt == 1 || $stt == 4){
                                echo $_SESSION['hrd_name'];
                            }else if($stt == 2){
                                echo $_SESSION['demand_name'];
                            }else if($stt == 5){
                                echo $_SESSION['usr_name'];
                            }else{
                                echo $_SESSION['sup_name'];
                            }
                        ?></a>
                    </div>
                </div>



                <?php 
                    if($stt == 1 ){
                        include "sidebar/hrd.php";
                    }
                    if($stt == 2){
                        include "sidebar/demand.php";
                    }
                    if($stt == 3){
                        include "sidebar/supply.php";
                    }
                    if($stt == 4){
                        include "sidebar/admin.php";
                    }
                    if($stt == 5){
                        include "sidebar/department.php";
                    }
                ?>
                <!-- end side bar -->
            </div>
            <!-- end aside -->
        </aside>
        <form action="#" method="POST" id="formLogout">
            <div class="modal fade font14" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ຢຶນຢັນ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" align="center">
                            ທ່ານຕ້ອງການອອກຈາກລະບົບ ຫຼື ບໍ່ ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-dismiss="modal">ຍົກເລີກ</button>
                            <button type="submit" name="btnLogout" class="btn btn-outline-danger">ອອກຈາກລະບົບ</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="main-footer">