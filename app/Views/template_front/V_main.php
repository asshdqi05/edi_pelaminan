<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="shortcut icon" href="<?= base_url('assets_front') ?>/img/pelaminan.png">


    <title>Edi Pelaminan</title>
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

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div data-aos="fade-in">
                <div class="hero-logo">
                    <img class="" src="<?= base_url('assets_front') ?>/img/pelaminan.png" width="250" alt="Edi Pelaminan">
                </div>

                <h1>Welcome to Edi Pelaminan</h1>
                <h2>Menyediakan <span class="typed" data-typed-items="Perlengkapan  Pesta, Baju Adat"></span></h2>
                <div class="actions">
                    <a href="#about" class="btn-get-started">Get Started</a>
                    <a href="#testimonials" class="btn-services">Login / Registrasi</a>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="#" class="logo mr-auto"><img src="<?= base_url('assets_front') ?>/img/pelaminan.png" alt=""> Edi Pelaminan</a>
            <!-- Uncomment below if you prefer to use a text logo -->
            <!-- <h1 class="logo mr-auto"><a href="index.html">Imperial</a></h1> -->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto " href="#portfolio">Perlengkapan Pesta</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                    <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
                    <li><a class="nav-link scrollto" href="#testimonials">Login / Registrasi</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
                    <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li> -->
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="section-title">Perlengkapan Pesta</h3>
                        <div class="section-title-divider"></div>
                        <p class="section-description"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">Perlengkapan</li>
                            <li data-filter=".filter-card">Baju Adat</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container">
                    <?php foreach ($perlengkapan as $d) : ?>
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="pic">
                                <img src="<?= base_url('file/gambar_peralatan/' . $d->foto); ?>" width="350" height="250" alt="">
                            </div>
                            <div class="portfolio-info">
                                <h4><?= $d->nama ?></h4>
                                <p><?= "Rp. " . number_format($d->harga)  ?></p>
                                <a href="<?= base_url('file/gambar_peralatan/' . $d->foto); ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= $d->nama . "<br> Rp. " . number_format($d->harga) ?>"><i class="bi bi-eye"></i></a>
                            </div>
                        </div>
                    <?php endforeach ?>

                    <?php foreach ($baju_adat as $d) : ?>
                        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                            <div class="pic">
                                <img src="<?= base_url('file/gambar_peralatan/' . $d->foto); ?>" width="350" height="250" alt="">
                            </div>
                            <div class="portfolio-info">
                                <h4><?= $d->nama ?></h4>
                                <p><?= "Rp. " . number_format($d->harga)  ?></p>
                                <a href="<?= base_url('file/gambar_peralatan/' . $d->foto); ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= $d->nama . "<br> Rp. " . number_format($d->harga) ?>"><i class="bi bi-eye"></i></a>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= About Section ======= -->
        <section id="about">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="section-title">Tentang</h3>
                        <div class="section-title-divider"></div>
                        <p class="section-description"></p>
                    </div>
                </div>
            </div>
            <div class="container about-container" data-aos="fade-up" data-aos-delay="200">
                <div class="row">

                    <div class="col-lg-6 about-img">
                        <img src="<?= base_url('assets_front') ?>/img/bg.jpg" alt="">
                    </div>

                    <div class="col-md-6 about-content">
                        <h2 class="about-title">Edi Pelaminan</h2>
                        <p class="about-text">
                            Edi Pelaminan Merupakan perusahaan yang bergerak dibidang jasa penyewaan
                            Perlengkapan Pesta. Disini Terdapat Berbagai Perlengkapan pesta Seperti
                            Pelaminan, Baju Adat, MUA, dan Berbagai kebutuhan lainnya untuk kepentingan
                            Pesta.
                        </p>
                        <p class="about-text">
                            Edi Pelaminan Berdiri Tanggal 6 Juni 2016, Beralamat di Jalan Koto raya (kampung Ilalang laweh), Kecamatan Lengayang, Kabupaten Pesisir Selatan.
                            Didirikan Oleh Edi Sitohang.
                        </p>
                        <p class="about-text">

                        </p>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services">
            <div class="container">
                <div class="row" data-aos="fade-up">
                    <div class="col-md-12">
                        <h3 class="section-title">Layanan</h3>
                        <div class="section-title-divider"></div>
                        <p class="section-description">Edi Pelaminan Melayani Penyewaan Perlengkapan Pesta</p>
                    </div>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-lg-4 col-md-6 service-item">
                        <div class="service-icon"><i class="bi bi-ui-checks"></i></div>
                        <h4 class="service-title"><a href="">Pelaminan</a></h4>
                        <p class="service-description">Menyediakan Berbagai Pelaminan.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 service-item">
                        <div class="service-icon"><i class="bi bi-card-checklist"></i></div>
                        <h4 class="service-title"><a href="">Baju Adat</a></h4>
                        <p class="service-description">Menyediakan Berbagai Jenis baju adat untuk acara pernikahan dan acara lainnya.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 service-item">
                        <div class="service-icon"><i class="bi bi-brush"></i></div>
                        <h4 class="service-title"><a href="">MUA</a></h4>
                        <p class="service-description">Menyediakan Make Up Artist.</p>
                    </div>
                </div>
            </div>
        </section><!-- End Services Section -->

        <!-- ======= Subscrbe Section ======= -->
        <!-- End Subscrbe Section -->



        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="section-title">Registrasi / Login</h3>
                        <div class="section-title-divider"></div>
                        <p class="section-description">Jika Belum Punya Akun, Silahkan Registrasi Terlebih Dahulu. </p>
                    </div>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <a href="<?= site_url('C_front/registrasi') ?>" class="btn btn-success btn-lg" type="button">Registrasi</a>
                    <a href="<?= site_url('C_front/login') ?>" class="btn btn-primary btn-lg" type="button">Login</a>
                </div>



            </div>
        </section><!-- End Testimonials Section -->



        <!-- ======= Contact Section ======= -->
        <section id="contact">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="section-title">Contact</h3>
                        <div class="section-title-divider"></div>
                        <p class="section-description">Hubungi Kami</p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="info">
                            <div>
                                <i class="bi bi-geo-alt"></i>
                                <p>Koto raya (kampung Ilalang laweh), Kecamatan Lengayang, Kabupaten Pesisir Selatan</p>
                            </div>

                            <div>
                                <i class="bi bi-envelope"></i>
                                <p>info@example.com</p>
                            </div>

                            <div>
                                <i class="bi bi-phone"></i>
                                <p>082268453882</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('assets') ?>/myscript.js"></script>
</body>

</html>