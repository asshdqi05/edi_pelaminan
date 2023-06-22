<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>

<div class="col-md-12">
    <div class="card card-teal card-outline">
        <div class="card-header">
            <a href="<?= site_url('C_konfirmasi_sewa') ?>" class="btn btn-primary btn-flat">
                <span class="fas fa-arrow-circle-left"></span>
                Kembali
            </a>
        </div>

        <div class="invoice col-sm-12 p-3 mb-3">
            <!-- title row -->
            <div id="div1">

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
                                    <th colspan="4">DP Yang harus dibayar</th>
                                    <th colspan="2"><?= "Rp " . number_format($total / 2) ?></th>
                                </tr>


                            </tbody>

                        </table>
                    </div>
                    <!-- /.col -->
                </div>

            </div>

            <?php
            $db   = \Config\Database::connect();
            $data_bayar = $db->table('pembayaran')->getWhere(['id_penyewaan' => $data_penyewaan->id_penyewaan])->getRow();
            ?>

            <div class="row no-print">
                <div class="col-sm-12">
                    <div class="alert alert-info alert-dismissible">
                        <h5><i class="icon fas fa-info"></i> Bukti Pembayaran</h5>
                        <img src="<?= base_url('file/bukti_pembayaran/' . $data_bayar->bukti_pembayaran); ?>" width="300">
                    </div>
                    <a href="<?= site_url('C_konfirmasi_sewa/konfirmasi_sewa/' . $data_penyewaan->id_penyewaan) ?>" class="btn btn-primary float-right"><i class="fa fa-check"></i> Konfirmasi Pembayaran</a>
                    <a href="<?= site_url('C_konfirmasi_sewa/tolak_sewa/' . $data_penyewaan->id_penyewaan) ?>" class="btn btn-danger float-left"><i class="fas fa-times"></i> Tolak Pembayaran</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>