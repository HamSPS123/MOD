<?php
  $title = "ຈັດການຂໍ້ມູນ";
  $path = "../../";
  $links = "../";
  $session_path = "../";
  include ("../../header-footer/header.php");
?>
<div class="row">
    <a href="<?php echo $links ?>Management/group-st" class="m-a">
        <div class="btn btn-light mainlink">
            ຈັດການຂໍ້ມູນກຸ່ມ
        </div>
    </a>
    <a href="<?php echo $links ?>Management/statistic" class="m-a">
        <div class="btn btn-light mainlink">
            ຈັດການຂໍ້ມູນສະຖິຕິ
        </div>
    </a>
</div>

<?php
 include ("../../header-footer/footer.php");
?>