<?= $this->extend('template/V_header') ?>
<?= $this->section('content') ?>

<div class="col-md-12">
    <div class="card card-teal card-outline">
        <div class="card-header">
            <a href="<?= site_url('C_pengembalian') ?>" class="btn btn-primary btn-flat">
                <span class="fas fa-arrow-circle-left"></span>
                Kembali
            </a>
        </div>
        <form method="POST" action="<?= site_url('C_pengembalian/save') ?>" name="frm">
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
                            <table class="table table-bordered table-striped">
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
                                        <th colspan="3">Total</th>
                                        <th colspan="2"><?= "Rp " . number_format($total) ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">DP</th>
                                        <th colspan="2"><?= "Rp " . number_format($total / 2) ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">Sisa Pembayaran</th>
                                        <th colspan="2">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    Rp.
                                                </span>
                                                <input type="text" readonly name="sisa" value="<?= $total / 2 ?>" class="form-control">
                                            </div>
                                        </th>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Denda</th>
                                        <th>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    Rp.
                                                </span>
                                                <input type="number" name="denda" onkeyup="cari_jumlah()" class="form-control" required>
                                            </div>
                                        </th>
                                        <th>
                                            <textarea class="form-control" name="ket_denda" placeholder="Keterangan Denda" required></textarea>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Total Pembayaran</th>
                                        <th>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    Rp.
                                                </span>
                                                <input type="text" readonly name="total" class="form-control">
                                            </div>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>

                </div>

                <input type="hidden" name="id_penyewaan" value="<?= $data_penyewaan->id_penyewaan ?>">
                <div class="row no-print">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                    </div>

                </div>

            </div>
        </form>
    </div>
</div>



<script>
    function cari_jumlah() {
        var sis = document.frm.sisa.value;
        var den = document.frm.denda.value;

        document.frm.total.value = parseInt(sis) + parseInt(den);
    }
</script>

<?= $this->endSection() ?>