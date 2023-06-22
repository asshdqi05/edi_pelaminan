<?= $this->extend('template_penyewa/V_main') ?>

<?= $this->section('content') ?>

<?php $session = session(); ?>
<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header bg-teal">
            <h1 class="card-title">
                <h3>Selamat Datang <?= $session->nama ?></h3>
            </h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <center>

                <div id="carouselExampleIndicators" class="carousel slide col-md-9" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="<?= base_url('assets_front') ?>/img/pelaminan.jpeg" height="400" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?= base_url('assets_front') ?>/img/bg.jpg" height="400" alt="Second slide">
                        </div>
                        <!-- <div class="carousel-item">
                            <img class="d-block w-100" src="<?= base_url('assets_front') ?>/img/3.jpeg" height="400" alt="Third slide">
                        </div> -->
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </center>
            <br>

            <div class="row">
                <div class="col-4">
                    <img src="<?= base_url('assets_front') ?>/img/1.jpg" class="img-thumbnail" alt="...">
                </div>
                <div class="col-4">
                    <img src="<?= base_url('assets_front') ?>/img/2.jpeg" class="img-thumbnail" alt="...">
                </div>
                <div class="col-4">
                    <img src="<?= base_url('assets_front') ?>/img/4.jpeg" class="img-thumbnail" alt="...">
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


<?= $this->endSection() ?>