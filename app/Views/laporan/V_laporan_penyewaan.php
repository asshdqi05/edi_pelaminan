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
                                        <h3>Laporan Penyewaan Perperiode</h3>
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
                                    <th rowspan="2" width=10>No</th>
                                    <th rowspan="2" class="text-center">Tanggal </th>
                                    <th rowspan="2" class="text-center">Nama Penyewa </th>
                                    <th rowspan="2" class="text-center">Tipe Sewa</th>
                                    <th rowspan="2" class="text-center">Status Sewa</th>
                                    <th colspan="4" class="text-center">Sewa</th>
                                    <!-- <th rowspan="2" class="text-center">Sisa Pembayaran</th>
                                    <th rowspan="2" class="text-center">Denda</th> -->
                                    <!-- <th rowspan="2" class="text-center">Sudah Dibayar</th> -->
                                    <th rowspan="2" class="text-center">Total Akhir</th>
                                </tr>
                                <tr>
                                    <th>Perlengkapan Pesta</th>
                                    <th>QTY</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $total = 0;
                                $sudah_dibayar = 0;
                                $sisa = 0;
                                foreach ($data as $d) :
                                    $no++;

                                    if ($d->status_sewa == 1) {
                                        $sudah_dibayar = $d->dp;
                                    } else if ($d->status_sewa == 2) {
                                        $sudah_dibayar = $d->denda + $d->total_pembayaran_sewa;
                                    }

                                    if ($d->tipe_sewa == 1) {
                                        $tipe_sewa = "Di Tempat";
                                    } else if ($d->tipe_sewa == 2) {
                                        $tipe_sewa = "Online";
                                    }

                                    if ($d->status_sewa == 1) {
                                        $status_sewa = "Sedang Disewa";
                                        $sisa = $d->dp;
                                        $sudah_dibayar = $d->dp;
                                    } else if ($d->status_sewa == 2) {
                                        $status_sewa = "Selesai";
                                        $sisa = 0;
                                        $sudah_dibayar = $d->denda + $d->total_pembayaran_sewa;
                                    } else if ($d->status_sewa == 3) {
                                        $status_sewa = "Menunggu Pembayaran";
                                        $sisa = 0;
                                        $sudah_dibayar = 0;
                                    } else if ($d->status_sewa == 4) {
                                        $status_sewa = "Batal";
                                        $sisa = 0;
                                        $sudah_dibayar = 0;
                                    }
                                    $total = $total + $d->total_pembayaran_sewa;
                                    // $total = $total + $sudah_dibayar;
                                    $db   = \Config\Database::connect();
                                    $penyewa = $db->table('penyewa')->getWhere(['id' => $d->id_penyewa])->getRow();

                                    $detail = $db->table('detail_penyewaan')->getWhere(['id_penyewaan' => $d->id])->getResult();
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= date('d M Y', strtotime($d->tanggal)) ?></td>
                                        <td><?= $penyewa->nama ?></td>
                                        <td><?= $tipe_sewa ?></td>
                                        <td><?= $status_sewa ?></td>

                                        <td align=left>
                                            <table>
                                                <?php foreach ($detail as $b) : ?>
                                                    <tr>
                                                        <td><?= $b->nama ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </td>
                                        <td>
                                            <table style="border: 0px; width: 100%;" border="">
                                                <?php foreach ($detail as $b) : ?>
                                                    <tr>
                                                        <td style="text-align:center ;"><?= $b->qty ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </td>
                                        <td>
                                            <table>
                                                <?php foreach ($detail as $b) : ?>
                                                    <tr>
                                                        <td><?= "Rp " . number_format($b->harga) ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </td>
                                        <td>
                                            <table>
                                                <?php foreach ($detail as $b) : ?>
                                                    <tr>
                                                        <td><?= "Rp " . number_format($b->harga * $b->qty) ?> </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </td>

                                        <!-- <td><?= "Rp " . number_format($sisa) ?></td>
                                        <td><?= "Rp " . number_format($d->denda) ?></td> -->
                                        <!-- <td><?= "Rp " . number_format($sudah_dibayar) ?></td> -->
                                        <td><?= "Rp " . number_format($d->total_pembayaran_sewa) ?></td>
                                    </tr>
                                <?php endforeach ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="9">Total</th>
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