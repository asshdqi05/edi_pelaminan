<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-teal card-outline">
            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Tanggal</th>
                        <th>Nama Penyewa</th>
                        <th>Jenis Sewa</th>
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

                            $penyewa = $db->table('penyewa')->getWhere(['id' => $d->id_penyewa])->getRow();

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
                                <td><?= $penyewa->nama ?></td>
                                <td><?= $tipe_sewa ?></td>
                                <td><?= $ket ?></td>
                                <td class="text-center" width="200px">
                                    <a class="btn btn-sm btn-warning" href="<?= site_url('C_konfirmasi_sewa/konfirmasi/') . $d->id_penyewaan ?>">
                                        <i class="fas fa-clipboard-check"></i> Konfirmasi</i>
                                    </a>
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



<?= $this->endSection() ?>