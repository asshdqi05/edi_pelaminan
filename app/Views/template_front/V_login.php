<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Edi Pelaminan | Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
    <meta property="og:title" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="">

    <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">

    <!-- Favicons -->
    <link href="<?= base_url('assets_front') ?>/img/pelaminan.png" rel="icon">
    <link href="<?= base_url('assets_front') ?>/img/pelaminan.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets_front') ?>/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('assets_front') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets_front') ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets_front') ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('assets_front') ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets_front') ?>/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Imperial - v5.7.0
  * Template URL: https://bootstrapmade.com/imperial-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="#" class="logo mr-auto"><img src="<?= base_url('assets_front') ?>/img/pelaminan.png" alt=""> Edi Pelaminan</a>
            <!-- Uncomment below if you prefer to use a text logo -->
            <!-- <h1 class="logo mr-auto"><a href="index.html">Imperial</a></h1> -->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto " href="<?= site_url('C_front') ?>">Home</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">


        <!-- ======= Portfolio Details Section ======= -->
        <section id="services">
            <section class="inner-page">
                <div class="container">

                    <center>
                        <div class="card col-sm-5">
                            <div class=" card-header text-center" id="card_header">
                                <img class="img-fluid" src="<?= base_url('assets_front') ?>/img/pelaminan.png" width="200" alt="">
                            </div>
                            <form method="POST" class="needs-validation" action="<?= site_url('C_front/proses_login') ?>" novalidate>
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <?php if (session()->getFlashdata('error')) : ?>
                                            <div class="alert alert-danger alert-dismissible">
                                                <?= session()->getFlashdata('error') ?>
                                            </div>
                                        <?php elseif (session()->getFlashdata('sukses')) :  ?>
                                            <div class="alert alert-success alert-dismissible">
                                                <?= session()->getFlashdata('sukses') ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <h4 class="text-center">Login Akun</h4>
                                    <div class="input-group mb-3">
                                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="bi bi-person-badge"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text ">
                                                <span class="bi bi-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary" type="submit">Login</button>
                                        <a href="<?= site_url('C_front/registrasi') ?>" class="btn btn-success">Registrasi</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </center>


                </div>
            </section>
        </section>
        <!-- End Portfolio Details Section -->

    </main><!-- End #main -->

    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        &copy; Copyright <strong>Edi Pelaminan</strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Imperial
          -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets_front') ?>/vendor/aos/aos.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/typed.js/typed.min.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('assets_front') ?>/js/main.js"></script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>

</body>

</html>