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
                        <th>Status Sewa</th>
                        <th class="text-center">Aksi</th>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($data as $d) {
                            if ($d->tipe_sewa == 1) {
                                $tipe_sewa = "Di Tempat";
                            } else if ($d->tipe_sewa == 2) {
                                $tipe_sewa = "Online";
                            }

                            if ($d->status_sewa == 1) {
                                $status_sewa = "Sedang Disewa";
                            } else if ($d->status_sewa == 2) {
                                $status_sewa = "Selesai";
                            } else if ($d->status_sewa == 3) {
                                $status_sewa = "Batal";
                            }

                        ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?= date('d M Y', strtotime($d->tanggal)) ?></td>
                                <td><?= $d->nama ?></td>
                                <td><?= $tipe_sewa ?></td>
                                <td><?= $status_sewa ?></td>
                                <td class="text-center" width="100px">
                                    <a class="btn btn-sm btn-success" href="<?= site_url('C_pengembalian/detail_sewa/') . $d->id_penyewaan ?>">
                                        Pembayaran <i class="fas fa-money-bill-wave"></i>
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
                <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_penyewa/delete') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="hid">
                    Anda yakin hapus data <strong><span id="hnama"></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>