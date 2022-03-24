<style>
.dropdown-menu li:hover {
    background-color: #2DBF62;
}
</style>
<header id="header">
    <div class="container">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <nav class="navbar navbar-inverse">
                <div class="navbar-bottom-menu">
                    <button class="navbar-toggler" type="button" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse justify-content-center collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav d-lg-flex justify-cgitontent-between align-items-center">
                            <li>
                                <button class="navbar-close">
                                    <i class="mdi mdi-close"></i>
                                </button>
                            </li>
                            <li>
                                <a class="navbar-brand" href="#"><img src="image/logo.png" alt="" width="70px"
                                        height="70px" /></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link active" href="index.php" style="">ໜ້າຫຼັກ</a>
                            </li>
                            <li class="dropdown nav-item">
                                <a data-toggle="dropdown" class="dropdown-toggle nav-link" href="#"
                                    style="">ປະເພດເອກະສານ<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <?php
                                        $result_type = mysqli_query($conn, "SELECT * FROM document_type");
                                        if (mysqli_num_rows($result_type) > 0) {
                                            foreach($result_type as $type){
                                            ?>
                                    <li>
                                        <a href="index?type=<?= $type['doc_id'] ?>" class="nav-link"
                                            style="margin-left: 20px;"> <?= $type['doc_name'] ?></a>
                                    </li>
                                    <?php
                                        }
                                    }else{
                                        echo '<li><a class="nav-link text-center">ບໍ່ມີຂໍ້ມູນ</a></li>';
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li class="dropdown nav-item">
                                <a data-toggle="dropdown" class="dropdown-toggle nav-link" href="#" style="">ແຜນປີ<b
                                        class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <?php
                                        $result_fy = mysqli_query($conn, "SELECT * FROM fy");
                                        if(mysqli_num_rows($result_fy) > 0){
                                            foreach($result_fy as $fy){
                                                ?>
                                    <li>
                                        <a href="index?fy=<?= $fy['fy_id'] ?>" class="nav-link"
                                            style="margin-left: 20px;"> <?= $fy['fy_id'] ?></a>
                                    </li>
                                    <?php
                                            }
                                        }else{
                                        echo '<li><a class="nav-link text-center">ບໍ່ມີຂໍ້ມູນ</a></li>';
                                        }
                                    ?>
                                    <!-- <li><a href="role.php" class="nav-link" style="margin-left: 20px;"> ຫ້ອງການ 1</a>
                                    </li>
                                    <li><a href="role.php" class="nav-link" style="margin-left: 20px;">ຫ້ອງການ 2</a>
                                    </li>
                                    <li><a href="role.php" class="nav-link" style="margin-left: 20px; "> ຫ້ອງການ 3</a>
                                    </li> -->
                                </ul>
                            </li>
                            <li class="dropdown nav-item">
                                <a data-toggle="dropdown" class="dropdown-toggle nav-link" href="#"
                                    style="">ເຂົ້າໃຊ້ລະບົບ<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="hrd/index" class="nav-link"
                                            style="margin-left: 20px; ">ແບ່ງປັນທຶນການສຶກສາ</a></li>
                                    <li><a href="demand/index" class="nav-link"
                                            style="margin-left: 20px; ">ຂໍທຶນການສຶກສາ</a></li>
                                    <li><a href="supply/index" class="nav-link"
                                            style="margin-left: 20px; ">ແຜນຮັບນັກ​ຮຽນ</a></li>
                                    <li><a href="department/index" class="nav-link"
                                            style="margin-left: 20px; ">ກົມການສຶກສາ</a></li>
                                    <!-- <li><a href="admin/index" class="nav-link" style="margin-left: 20px; ">ບໍລິຫານ</a>
                                    </li> -->
                                </ul>
                            </li>

                            <li class="nav-item">
                                <form action="index" method="GET" class="navbar-form form-inline">
                                    <div class="input-group search-box">
                                        <input type="text" id="search" name="search" class="form-control" placeholder="ຄົ້ນຫາ...">
                                        <div class="input-group-append">
                                            <button class="btn btn-navbar" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
    </div>
</header>