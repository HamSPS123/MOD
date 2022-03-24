<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>ກະຊວງສຶກສາທິການແລະກິລາ</title>
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="./assets/vendors/aos/dist/aos.css/aos.css" />
    <link rel="stylesheet" href="./assets/vendors/owl.carousel/dist/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="./assets/vendors/owl.carousel/dist/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="image/logo.png" />
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="dist/css/alt/style.css">
    <!-- endinject -->
    <style>
    .img-fit {
        width: 250px;
        height: 200px;
        object-fit: cover;
    }

    /* .text-show {
        line-clamp: 2;
        white-space: nowrap;
	    overflow: hidden;
        text-overflow: ellipsis ;
    } */
    </style>
</head>

<body>

    <div class="container-scroller">
        <div class="main-panel">

            <?php
include ("oop/connect.php");
include ("./navbar.php");

$sql = "";
$act = "";
$tittle = "ໜ້າຫຼັກ";

if(isset($_GET['type'])){
    $sql = $_GET['type'];
    $act = "type";
    $type = mysqli_query($conn, "SELECT * From document_type WHERE doc_id='$sql'");
    $doc = mysqli_fetch_array($type,MYSQLI_ASSOC);
    $tittle = "ປະເພດ - ".$doc['doc_name'];
}

if(isset($_GET['fy'])){
    $sql = $_GET['fy'];
    $act = "fy";
    $tittle = "ແຜນປີ: ". $sql ;
}

if(isset($_GET['search'])){
    $sql = $_GET['search'];
    $act = "search";
    $tittle = "ຄົ້ນຫາ: ".$sql;
}

?>

            <div class="container">
                <div class="world-news">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-flex position-relative  float-left">
                                <h3 class="section-title"><?= $tittle ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3" id="result">
                        <!-- <div id="result"></div> -->
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- inject:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="./assets/vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="./assets/js/demo.js"></script>
    <script src="./dist/js/jquery.min.js"></script>
    <!-- End custom js for this page-->

    <script>
        var start = 0;
        var limit = 6;
        var act = "<?= $act ?>";
        var sql = "<?= $sql ?>";

        var reachedMax = false;

        $(window).scroll(function(){

            if($(window).scrollTop() >= $(document).height() - $(window).height()){
                getData(act,sql);
            }
        });



        $(document).ready(function(){
            getData(act,sql);
        });

        function getData(act,sql){
            if(reachedMax){
                return;
            }
                $.ajax({
                    url: 'data.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        getData: 1,
                        start: start,
                        limit: limit,
                        act: act,
                        sql: sql
                    },
                    success:  function(response){
                            if (response == "reachedMax"){
                                reachedMax = true;
                            }else{
                                start += limit;
                                $("#result").append(response);
                            }
                        }
                });
            
        }
    </script>
</body>

</html>