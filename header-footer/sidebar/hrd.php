<!-- Sidebar Menu -->
<?php
if($_SESSION["uni_id"] == 'HRD1'){
?>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                    ຈັດການຟາຍ
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>Document/type" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ຈັດການປະເພດຟາຍ</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>Document/upload" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ອັບໂຫຼດຟາຍ</p>
                    </a>
                </li>
            </ul>

        </li>


        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    ຈັດການຂໍ້ມູນຫຼັກ
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>Management/group" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ຈັດການຂໍ້ມູນຂອງແຕ່ລະກົມ</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>Management/university" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ຈັດການຂໍ້ມູນມະຫາວິທະຍາໄລ</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>Management/level" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ຈັດການຂໍ້ມູນລະດັບຊັ້ນ</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>Management/" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ຈັດການຂໍ້ມູນສະຖິຕິ</p>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item">
            <a href="<?= $links ?>period/year" class="nav-link">
                <i class="fas fa fa-school nav-icon"></i>
                <p>
                    ເປີດສົກຮຽນ
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= $links ?>period/Add-Dept" class="nav-link">
                <i class="fas fa fa-school nav-icon"></i>
                <p>
                    ຈັດການກົມທີ່ເປີດສົກຮຽນ
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-graduate"></i>
                <p>
                    ແບ່ງປັນທຶນການສຶກສາ
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>divide/share" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ແບ່ງປັນທຶນ</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>divide/distribute" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ແຈກຢາຍທຶນ</p>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="nav-item">
            <a href="<?= $links ?>statistic/statistic" class="nav-link">
                <i class="fas fa fa-list-alt nav-icon"></i>
                <p>
                    ສະຖິຕິແຜນຮັບນັກຮຽນໃນແຕ່ລະປີ
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    ແກ້ໄຂການແຈກຢາຍ
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>edit-distribute/edit-distribute" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ແກ້ໄຂການແຈກຢາຍ</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    ລາຍງານ
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>report/report-supply" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ລາຍງານແຜນຮັບ</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>report/report-demand" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ລາຍງານແຜນສ້າງ</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>report/report-hrd" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ລາຍງານການແບ່ງປັນ</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                <i class="nav-icon fas fa-power-off"></i>
                <p>
                    ອອກຈາກລະບົບ
                </p>
            </a>
        </li>
    </ul>
</nav>
<?php
}
else{
?>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

      


      
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-graduate"></i>
                <p>
                    ແບ່ງປັນທຶນການສຶກສາ
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>divide/share" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ແບ່ງປັນທຶນ</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>divide/distribute" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ແຈກຢາຍທຶນ</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    ແກ້ໄຂການແຈກຢາຍ
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>edit-distribute/edit-distribute" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ແກ້ໄຂການແຈກຢາຍ</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    ລາຍງານ
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>report/report-hrd" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ລາຍງານການແບ່ງປັນ</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                <i class="nav-icon fas fa-power-off"></i>
                <p>
                    ອອກຈາກລະບົບ
                </p>
            </a>
        </li>
    </ul>
</nav>
<?php
}
?>
