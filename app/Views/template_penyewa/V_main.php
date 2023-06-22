<!DOCTYPE html>

<html lang="en">

<?php

if (!session()->has('logged_in_penyewa')) {


    session()->setFlashdata('error', 'Anda Harus Login Terlebih Dahulu!!');
?>

    <script>
        window.location.href = '<?= BASE ?>/C_front/login'
    </script>

<?php } ?>


<head>
    <meta charset="utf-8">

    <link rel="shortcut icon" href="<?= base_url('assets_front') ?>/img/pelaminan.png">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edi Pelaminan</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css?v=3.2.0">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <script>
        (function(w, d) {
            ! function(a, e, t, r, z) {
                a.zarazData = a.zarazData || {}, a.zarazData.executed = [], a.zarazData.tracks = [], a.zaraz = {
                    deferred: []
                };
                var s = e.getElementsByTagName("title")[0];
                s && (a.zarazData.t = e.getElementsByTagName("title")[0].text), a.zarazData.w = a.screen.width, a.zarazData.h = a.screen.height, a.zarazData.j = a.innerHeight, a.zarazData.e = a.innerWidth, a.zarazData.l = a.location.href, a.zarazData.r = e.referrer, a.zarazData.k = a.screen.colorDepth, a.zarazData.n = e.characterSet, a.zarazData.o = (new Date).getTimezoneOffset(), a.dataLayer = a.dataLayer || [], a.zaraz.track = (e, t) => {
                    for (key in a.zarazData.tracks.push(e), t) a.zarazData["z_" + key] = t[key]
                }, a.zaraz._preSet = [], a.zaraz.set = (e, t, r) => {
                    a.zarazData["z_" + e] = t, a.zaraz._preSet.push([e, t, r])
                }, a.dataLayer.push({
                    "zaraz.start": (new Date).getTime()
                }), a.addEventListener("DOMContentLoaded", (() => {
                    var t = e.getElementsByTagName(r)[0],
                        z = e.createElement(r);
                    z.defer = !0, z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData))), t.parentNode.insertBefore(z, t)
                }))
            }(w, d, 0, "script");
        })(window, document);
    </script>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand-md navbar-dark navbar-teal">
            <div class="container">
                <a href="" class="navbar-brand">
                    <img src="<?= base_url('assets') ?>/dist/img/pelaminan.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Edi Pelaminan</span>
                </a>
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse order-3" id="navbarCollapse">

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= site_url('C_home_penyewa') ?>" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i> Dashboard</a>

                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('C_front_sewa') ?>" class="nav-link">
                                <i class="fas fa-handshake"></i> Penyewaan</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('C_profil_penyewa') ?>" class="nav-link">
                                <i class="fas fa-user"></i> Profil</a>
                        </li>

                    </ul>


                </div>

                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

                    <a class="nav-link" href="<?= site_url('C_front/logout') ?>" role="button">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </ul>
            </div>
        </nav>


        <div class="content-wrapper">

            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm">
                            <h1 class="m-0"> <?= $judul_halaman ?></h1>
                        </div>
                    </div>
                </div>
            </div>


            <div class="content">

                <div class="container">
                    <div class="container-fluid">


                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="flash-data" data-flashdata_error="<?= session()->getFlashdata('error') ?>"></div>
                        <?php elseif (session()->getFlashdata('sukses')) :  ?>
                            <div class="flash-data" data-flashdata="<?= session()->getFlashdata('sukses') ?>"></div>
                        <?php endif; ?>

                    </div>

                    <?= $this->renderSection('content') ?>

                </div>
            </div>

        </div>


        <aside class="control-sidebar control-sidebar-dark">

        </aside>


        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                V.0.1
            </div>

            <strong>Copyright &copy; 2022 <a href="#">Edi Pelaminan</a>.</strong> All rights reserved.
        </footer>
    </div>



    <script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>

    <script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js?v=3.2.0"></script>

    <script src="<?= base_url('assets') ?>/dist/js/demo.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('assets') ?>/myscript.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#example3').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#example4').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                responsive: true,
            });
        });
    </script>


    <script>
        /*** add active class and stay opened when selected ***/
        var url = window.location;

        // for sidebar menu entirely but not cover treeview
        $('ul.nav-sidebar a').filter(function() {
            if (this.href) {
                return this.href == url || url.href.indexOf(this.href) == 0;
            }
        }).addClass('active');

        // for the treeview
        $('ul.nav-treeview a').filter(function() {
            if (this.href) {
                return this.href == url || url.href.indexOf(this.href) == 0;
            }
        }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
    </script>


    <?php if (session()->getFlashdata('sukses_login')) { ?>
        <script type="text/javascript">
            $(function() {
                swal.fire({
                    title: 'Login Berhasil!',
                    text: 'Mulai bekerja dengan بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيْم ',
                    icon: 'success',
                    width: 900,
                    confirmButtonClass: 'btn btn-primary',

                });
            });
        </script>
    <?php } ?>
</body>

</html>