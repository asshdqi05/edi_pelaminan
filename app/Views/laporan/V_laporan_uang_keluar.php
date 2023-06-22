<?= $this->extend('template/V_header') ?>
<?= $this->section('content') ?>

<div class="col-md-12">
    <div class="card card-teal card-outline">
        <div class="card-header">
            <a href="<?= site_url('C_laporan') ?>" class="btn btn-primary btn-flat">
                <span class="fas fa-arrow-circle-left"></span>
                Kembali
            </a>
        </div>

        <div class="invoice col-sm-12 p-3 mb-3">
            <!-- title row -->
            <div id="div1">
                <div class="row">
                    <div class="col-12">
                        <table>
                            <tr>
                                <td width=400>
                                    <img src="<?= base_url('assets') ?>/dist/img/pelaminan.png" width="150" alt="">
                                </td>
                                <td>
                                    <center>
                                        <h1>EDI PELAMINAN</h1>
                                        <h3>Laporan Uang Keluar Perperiode</h3>
                                    </center>
                                </td>
                                <td>

                                </td>
                            </tr>
                        </table>
                        <hr>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->

                <div class="row">
                    <div class="col-sm-2">
                        <div class="col-sm">
                            <p>Tanggal </p>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="col-sm">
                            <p>:</p>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="col-sm">
                            <strong>
                                <p><?= date('d F Y', strtotime($tgl_awal)) ?> - <?= date('d F Y', strtotime($tgl_akhir)) ?></p>
                            </strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th width=10>No</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $total = 0;
                                foreach ($data as $d) :
                                    $no++;
                                    $total = $total + $d->jumlah;
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= date('d F Y', strtotime($d->tanggal)) ?></td>
                                        <td><?= $d->keterangan ?></td>
                                        <td><?= "Rp " . number_format($d->jumlah) ?></td>
                                    </tr>
                                <?php endforeach ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3">Total Semua</th>
                                    <th><?= "Rp " . number_format($total) ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>

            </div>


            <div class="row no-print">
                <div class="col-sm-12">
                    <button onclick="printContent('div1')" class="btn btn-primary float-right"><i class="fa fa-print"></i>Cetak</button>
                </div>

            </div>

        </div>
    </div>
</div>


<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>




<?= $this->endSection() ?>