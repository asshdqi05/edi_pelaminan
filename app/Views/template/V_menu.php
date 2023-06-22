<?php $session = session();
if ($session->get('level') == 1) {
    $level = "Admin";
} else if ($session->get('level') == 2) {
    $level = "Operator";
} else if ($session->get('level') == 3) {
    $level = "Pimpinan";
}
?>
<aside class="main-sidebar sidebar-light-teal elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link navbar-teal">
        <img src="<?= base_url('assets') ?>/dist/img/pelaminan.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light text-light">Edi Pelaminan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets') ?>/dist/img/ava1.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $session->get('nama_user'); ?> <span class="text-teal"> (<?= $level ?>) </span></a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <?php if ($session->get('level') == 1) { ?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="<?= site_url('C_home') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th-list"></i>
                            <p>
                                Master
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('C_perlengkapan_pesta') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Perlengkapan Pesta</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('C_penyewa') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Penyewa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('C_user') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>User</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-handshake"></i>
                            <p>
                                Penyewaan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('C_sewa') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Penyewaan Alat Pesta</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('C_konfirmasi_sewa') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Konfirmasi Penyewaan</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('C_pengembalian') ?>" class="nav-link">
                            <i class="nav-icon fas fa-exchange-alt"></i>
                            <p>
                                Pengembalian
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('C_uang_keluar') ?>" class="nav-link">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>
                                Uang Keluar
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('C_laporan') ?>" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Laporan
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        <?php } else if ($session->get('level') == 2) { ?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="<?= site_url('C_home') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-handshake"></i>
                            <p>
                                Penyewaan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('C_sewa') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Penyewaan Alat Pesta</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('C_konfirmasi_sewa') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Konfirmasi Penyewaan</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('C_pengembalian') ?>" class="nav-link">
                            <i class="nav-icon fas fa-exchange-alt"></i>
                            <p>
                                Pengembalian
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('C_uang_keluar') ?>" class="nav-link">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>
                                Uang Keluar
                            </p>
                        </a>
                    </li>



                </ul>
            </nav>
        <?php } else if ($session->get('level') == 3) { ?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="<?= site_url('C_home') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('C_laporan') ?>" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Laporan
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
        <?php } ?>
    </div>
    <!-- /.sidebar -->
</aside>