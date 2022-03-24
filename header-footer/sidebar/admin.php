<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->



        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    ຈັດການຂໍ້ມູນຜູ້ໃຊ້ລະບົບ
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>data/user" class="nav-link">
                        <i class="fas fa fa- nav-icon"></i>
                        <p>
                            ຈັດການຂໍ້ມູນຜູ້ໃຊ້
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $links ?>data/user-demand" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ຈັດການຂໍ້ມູນຜູ້ຂໍທຶນການສຶກສາ </p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>data/user-supply" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ຈັດການຂໍ້ມູນຜູ້ໃຊ້ແຜນຮັບພະນັກງານ</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>data/user-department" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ຈັດການຂໍ້ມູນຜູ້ໃຊ້ກົມການສຶກສາ</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>data/user-hrd" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p style="font-size: 13px">ຈັດການຂໍ້ມູນຜູ້ໃຊ້ແບ່ງປັນທຶນການສຶກສາ</p>
                    </a>
                </li>
            </ul>

        </li>

        <li class="nav-item">
            <a href="<?= $links ?>data/province" class="nav-link">
                <i class="fas fa fa-pen nav-icon"></i>
                <p>
                    ຈັດການຂໍ້ມູນແຂວງ ແລະ ກະຊວງ
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-pencil-ruler"></i>
                <p>
                    ແກ້ໄຂການແບ່ງປັນທຶນ
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>edit/share" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ແກ້ໄຂການແບ່ງປັນ</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= $links ?>edit/edit-distribute" class="nav-link">
                        <i class="far fas fa- nav-icon"></i>
                        <p>ແກ້ໄຂການແຈກຢາຍ</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="<?= $links ?>edit/edit-demand" class="nav-link">
                <i class="fas fa fa-pen nav-icon"></i>
                <p>
                    ແກ້ໄຂແຜນສ້າງນັກຮຽບ
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= $links ?>edit/edit-supply" class="nav-link">
                <i class="fas fa fa-edit nav-icon"></i>
                <p>
                    ແກ້ໄຂແຜນຮັບນັກຮຽບ
                </p>
            </a>
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