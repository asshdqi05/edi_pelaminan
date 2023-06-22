<?= $this->extend('template_penyewa/V_main') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= site_url('C_front_sewa/add_penyewaan') ?>" class="btn btn-primary btn-flat">
                    <span class="fas fa-plus"></span>
                    Tambah Data
                </a>

            </div>

            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Tanggal</th>
                        <th>Nama Penyewa</th>
                        <th>Jenis Sewa</th>
                        <th>Status Sewa</th>
                        <th>Status Pembayaran</th>
                        <th class="text-center">Aksi</th>
                    </thead>

                    <tbody>
                        <?php
                        $db   = \Config\Database::connect();
                        $no = 1;
                        foreach ($data as $d) {
                            if ($d->tipe_sewa == 1) {
                                $tipe_sewa = "Di Tempat";
                            } else if ($d->tipe_sewa == 2) {
                                $tipe_sewa = "Online";
                            }

                            if ($d->status_sewa == 1) {
                                $status_sewa = "<a class='btn btn-block btn-outline-primary btn-sm'>Sedang Disewa</a>";
                            } else if ($d->status_sewa == 2) {
                                $status_sewa = "<a class='btn btn-block btn-outline-success btn-sm'>Selesai</a>";
                            } else if ($d->status_sewa == 3) {
                                $status_sewa = "<a class='btn btn-block btn-outline-info btn-sm'>Menunggu Pembayaran</a>";
                            } else if ($d->status_sewa == 4) {
                                $status_sewa = "<a class='btn btn-block btn-outline-danger btn-sm'>Batal</a>";
                            }


                            $pembayaran = $db->table('pembayaran')->getWhere(['id_penyewaan' => $d->id_penyewaan])->getRow();
                            if ($pembayaran->status == 1) {
                                $ket = "<a class='btn btn-block btn-outline-info btn-sm'>Belum Bayar DP</a>";
                            } else if ($pembayaran->status == 2) {
                                $ket = "<a class='btn btn-block btn-outline-info btn-sm'>Menunggu Konfirmasi</a>";
                            } else if ($pembayaran->status == 3) {
                                $ket = "<a class='btn btn-block btn-outline-primary btn-sm'>Sudah Bayar DP</a>";
                            } else if ($pembayaran->status == 4) {
                                $ket = "<a class='btn btn-block btn-outline-success btn-sm'>Lunas</a>";
                            } else if ($pembayaran->status == 5) {
                                $ket = "<a class='btn btn-block btn-outline-danger btn-sm'>Ditolak</a>";
                            } else if ($pembayaran->status == 6) {
                                $ket = "<a class='btn btn-block btn-outline-danger btn-sm'>Dibatalkan</a>";
                            }
                        ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?= date('d M Y', strtotime($d->tanggal)) ?></td>
                                <td><?= $d->nama ?></td>
                                <td><?= $tipe_sewa ?></td>
                                <td><?= $status_sewa ?></td>
                                <td><?= $ket ?></td>
                                <td class="text-center" width="200px">
                                    <?php if ($pembayaran->status == 1) { ?>
                                        <a class="btn btn-xs btn-info" href="<?= site_url('C_front_sewa/pembayaran/') . $d->id_penyewaan ?>">
                                            <i class="fas fa-money-bill"> Pembayaran</i>
                                        </a>
                                        <a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="hapus('<?= $d->id_penyewaan ?>','<?= $d->nama ?>')">
                                            <i class="fas fa-times-circle"> Batal</i>
                                        </a>
                                    <?php  } else if ($pembayaran->status == 2) { ?>
                                        <a class="btn btn-xs btn-success" href="<?= site_url('C_front_sewa/bukti_sewa/') . $d->id_penyewaan ?>">
                                            <i class="fas fa-file-invoice"> Bukti Penyewaan</i>
                                        </a>
                                    <?php  } else if ($pembayaran->status == 3) { ?>
                                        <a class="btn btn-xs btn-success" href="<?= site_url('C_front_sewa/bukti_sewa/') . $d->id_penyewaan ?>">
                                            <i class="fas fa-file-invoice"> Bukti Penyewaan</i>
                                        </a>
                                    <?php  } else if ($pembayaran->status == 4) { ?>
                                        <a class="btn btn-xs btn-success" href="<?= site_url('C_front_sewa/bukti_sewa/') . $d->id_penyewaan ?>">
                                            <i class="fas fa-file-invoice"> Bukti Penyewaan</i>
                                        </a>
                                    <?php  } else if ($pembayaran->status == 5) { ?>
                                        <a class="btn btn-xs btn-info" href="<?= site_url('C_front_sewa/pembayaran/') . $d->id_penyewaan ?>">
                                            <i class="fas fa-money-bill"> Pembayaran</i>
                                        </a>
                                        <a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="hapus('<?= $d->id_penyewaan ?>','<?= $d->nama ?>')">
                                            <i class="fas fa-times-circle"> Batal</i>
                                        </a>

                                    <?php  } else if ($pembayaran->status == 6) { ?>
                                        <p>---</p>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    function hapus(id, nama) {
        $('#hid').val(id);
        $('#hnama').html(nama);
        $('#hapus_data').modal('show');
    }
</script>



<div class="modal fade" id="hapus_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembatalan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_front_sewa/pembatalan') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="hid">
                    <strong><span id=""> Anda yakin Membatalkan Sewa</span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Ya</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>