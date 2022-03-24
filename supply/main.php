<?php
  $title = "ໜ້າຫຼັກ";
  $path = "../";
  $links = "";
  $session_path = "";
  include ("../header-footer/header.php");
?>
<div class="row">
    <a href="<?php echo $links ?>Management/faculty" class="m-a">
        <div class="btn btn-light mainlink">
            ຈັດການຂໍ້ມູນຂອງແຕ່ລະຄະນະ
        </div>
    </a>
    <a href="<?php echo $links ?>Management/course" class="m-a">
        <div class="btn btn-light mainlink">
            ຈັດການຂໍ້ມູນສາຂາວິຊາ
        </div>
    </a>
    <a href="<?php echo $links ?>create/new-supply" class="m-a">
        <div class="btn btn-light mainlink">
            ສ້າງແຜນຮັບນັກ​ຮຽນ
        </div>
    </a>
    <a href="<?php echo $links ?>edit/edit-supply" class="m-a">
        <div class="btn btn-light mainlink">
            ແກ້ໄຂແຜນຮັບ
        </div>
    </a>
    <a href="<?php echo $links ?>report/report-supply" class="m-a">
        <div class="btn btn-light mainlink">
            ລາຍງານແຜນຮັບ
        </div>
    </a>
    <a href="<?php echo $links ?>report/report-hrd" class="m-a">
        <div class="btn btn-light mainlink">
            ລາຍງາບແບ່ງປັນ
        </div>
    </a>
    
</div>

<?php
 include ("../header-footer/footer.php");
?>