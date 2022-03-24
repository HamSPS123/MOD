<?php
  $title = "ໜ້າຫຼັກ";
  $path = "../";
  $links = "";
  $session_path = "../";
  include ("../header-footer/header.php");
?>
<div class="row">
    <?php
    if ($_SESSION['uni_id'] == "HRD1") {
    ?>

    <a href="<?php echo $links ?>Document/type" class="m-a">
        <div class="btn btn-light mainlink">
            ຈັດການປະເພດເອກະສານ
        </div>
    </a>
    <a href="<?php echo $links ?>Document/upload" class="m-a">
        <div class="btn btn-light mainlink">
            ອັບໂຫຼດຟາຍ
        </div>
    </a>
    <a href="<?php echo $links ?>Management/group" class="m-a">
        <div class="btn btn-light mainlink">
            ຈັດການຂໍ້ມູນຂອງແຕ່ລະກົມ
        </div>
    </a>
    <a href="<?php echo $links ?>Management/university" class="m-a">
        <div class="btn btn-light mainlink">
            ຈັດການຂໍ້ມູນມະຫາວິທະຍາໄລ
        </div>
    </a>
    <a href="<?php echo $links ?>period/year" class="m-a">
        <div class="btn btn-light mainlink">
            ເປີດສົກຮຽນ
        </div>
    </a>
    <a href="<?php echo $links ?>divide/share" class="m-a">
        <div class="btn btn-light mainlink">
            ແບ່ງປັນທຶນການສຶກສາ
        </div>
    </a>
    <a href="<?php echo $links ?>divide/distribute" class="m-a">
        <div class="btn btn-light mainlink">
            ແຈກຢາຍທິນການສຶກສາ
        </div>
    </a>
    <a href="<?php echo $links ?>edit-distribute/edit-share" class="m-a">
        <div class="btn btn-light mainlink">
            ແກ້ໄຂການແບ່ງປັນ
        </div>
    </a>
    <a href="<?php echo $links ?>edit-distribute/edit-distribute" class="m-a">
        <div class="btn btn-light mainlink">
            ແກ້ໄຂການແຈກຢາຍ
        </div>
    </a>
    <a href="<?php echo $links ?>report/report-supply" class="m-a">
        <div class="btn btn-light mainlink">
            ລາຍງານແຜນຮັບ
        </div>
    </a>
    <a href="<?php echo $links ?>report/report-demand" class="m-a">
        <div class="btn btn-light mainlink">
            ລາຍງານແຜນສ້າງ
        </div>
    </a>
    <a href="<?php echo $links ?>report/report-hrd" class="m-a">
        <div class="btn btn-light mainlink">
            ລາຍງາບແບ່ງປັນ
        </div>
    </a>
    <?php
    }else{
        ?>
    <a href="<?php echo $links ?>divide/share" class="m-a">
        <div class="btn btn-light mainlink">
            ແບ່ງປັນທຶນການສຶກສາ
        </div>
    </a>
    <a href="<?php echo $links ?>divide/distribute" class="m-a">
        <div class="btn btn-light mainlink">
            ແຈກຢາຍທິນການສຶກສາ
        </div>
    </a>
    <a href="<?php echo $links ?>edit-distribute/edit-share" class="m-a">
        <div class="btn btn-light mainlink">
            ແກ້ໄຂການແບ່ງປັນ
        </div>
    </a>
    <a href="<?php echo $links ?>edit-distribute/edit-distribute" class="m-a">
        <div class="btn btn-light mainlink">
            ແກ້ໄຂການແຈກຢາຍ
        </div>
    </a>
    <a href="<?php echo $links ?>report/report-supply" class="m-a">
        <div class="btn btn-light mainlink">
            ລາຍງານແຜນຮັບ
        </div>
    </a>
    <a href="<?php echo $links ?>report/report-demand" class="m-a">
        <div class="btn btn-light mainlink">
            ລາຍງານແຜນສ້າງ
        </div>
    </a>
    <a href="<?php echo $links ?>report/report-hrd" class="m-a">
        <div class="btn btn-light mainlink">
            ລາຍງາບແບ່ງປັນ
        </div>
    </a>
    <?php
    }
    ?>

</div>

<?php
 include ("../header-footer/footer.php");
?>