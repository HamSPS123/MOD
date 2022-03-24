<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->



        <li class="nav-item">
            <a href="<?= $links ?>create/new-demand" class="nav-link">
                <i class="fas fa fa-list-alt nav-icon"></i>
                <p>
                    ສະເໜີແຜນສ້າງ
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= $links ?>edit/edit-demand" class="nav-link">
                <i class="fas fa fa-edit nav-icon"></i>
                <p>
                    ແກ້ໄຂແຜນສ້າງນັກຮຽບ
                </p>
            </a>
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