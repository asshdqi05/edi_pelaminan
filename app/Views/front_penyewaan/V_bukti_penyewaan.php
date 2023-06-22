<?= $this->extend('template_penyewa/V_main') ?>
<?= $this->section('content') ?>

<div class="col-md-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <a href="<?= site_url('C_front_sewa') ?>" class="btn btn-primary btn-flat">
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
                                <td width=300>
                                    <img src="<?= base_url('assets') ?>/dist/img/logo.png" width="150" alt="">
                                </td>
                                <td>
                                    <center>
                                        <h1>EDI PELAMINAN</h1>
                                        <h3>Bukti Penyewaan Perlengkapan Pesta</h3>
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
                            <p>Nama Penyewa </p>
                            <p>No Telepon</p>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="col-sm">
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="col-sm">
                            <strong>
                                <p><?= date('d F Y', strtotime($data_penyewaan->tanggal)) ?></p>
                                <p><?= $data_penyewaan->nama ?></p>
                                <p><?= $data_penyewaan->no_telepon ?></p>
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
                                    <th>Nama Perlengkapan Pesta</th>
                                    <th>Harga</th>
                                    <th>QTY</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $total = 0;
                                foreach ($detail_penyewaan as $d) :
                                    $no++;
                                    $sub = $d->harga * $d->qty;
                                    $total = $total + $sub;
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $d->nama ?></td>
                                        <td><?= $d->harga ?></td>
                                        <td><?= $d->qty ?></td>
                                        <td><?= "Rp " . number_format($d->harga * $d->qty) ?></td>
                                    </tr>
                                <?php endforeach ?>
                                <tr>
                                    <th colspan="4">Total</th>
                                    <th colspan="2"><?= "Rp " . number_format($total) ?></th>
                                </tr>
                                <tr>
                                    <th colspan="4">DP</th>
                                    <th colspan="2"><?= "Rp " . number_format($total / 2) ?></th>
                                </tr>
                                <tr>
                                    <th colspan="4">Sisa Pembayaran</th>
                                    <th colspan="2"><?= "Rp " . number_format($total / 2) ?></th>
                                </tr>
                                <?php if ($data_penyewaan->status_sewa == 2) {
                                    $db   = \Config\Database::connect();
                                    $data_bayar = $db->table('pembayaran')->getWhere(['id_penyewaan' => $data_penyewaan->id_penyewaan])->getRow();
                                ?>

                                    <tr>
                                        <th colspan="4">Denda</th>
                                        <th colspan="2"><?= "Rp " . number_format($data_bayar->denda) ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Jumlah Bayar</th>
                                        <th colspan="2"><?= "Rp " . number_format($data_bayar->denda + $data_bayar->dp) ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Status</th>
                                        <th colspan="2">
                                            <h3>Lunas</h3>
                                        </th>
                                    </tr>
                                <?php } else {  ?>
                                    <tr>
                                        <th colspan="4">Status</th>
                                        <th colspan="2">
                                            <h3>Belum Lunas</h3>
                                        </th>
                                    </tr>
                                <?php } ?>

                            </tbody>

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