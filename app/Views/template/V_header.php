<!DOCTYPE html>
<html lang="en">


<?php

if (!session()->has('logged_in')) {


    session()->setFlashdata('msg', 'Anda Harus Login Terlebih Dahulu!!');
?>

    <script>
        window.location.href = '<?= BASE ?>/C_login'
    </script>

<?php } ?>


<head>
    <link rel="shortcut icon" href="<?= base_url('assets_front') ?>/img/pelaminan.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edi Pelaminan</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<?php $session = session();
if ($session->get('level') == 1) {
    $level = "Admin";
} else if ($session->get('level') == 2) {
    $level = "Operator";
} else if ($session->get('level') == 3) {
    $level = "Pimpinan";
}
?>

<body class="hold-transition sidebar-mini accent-teal">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-teal navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">

                </li>


                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('C_login/logout') ?>" role="button">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>

        <!-- /.navbar -->
        <?= $this->include('template/V_menu') ?>
        <!-- Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm">
                            <h1><?= $judul_halaman ?></h1>
                        </div>
                        <!-- <div class="col-sm-6">

                        </div> -->
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="flash-data" data-flashdata_error="<?= session()->getFlashdata('error') ?>"></div>
                    <?php elseif (session()->getFlashdata('sukses')) :  ?>
                        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('sukses') ?>"></div>
                    <?php endif; ?>
                </div>
                <?= $this->renderSection('content') ?>

                <?= $this->include('template/V_footer') ?>