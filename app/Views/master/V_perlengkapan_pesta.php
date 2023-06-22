<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>

<?php
$errors = $validation->getErrors();
if (!empty($errors)) {
    echo $validation->listErrors('list');
}
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal_add">
                    <span class="fas fa-plus"></span>
                    Tambah Data
                </button>

            </div>

            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Nama Perlengkapan</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Foto</th>
                        <th class="text-center">Aksi</th>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($data as $d) { ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?= $d->nama ?></td>
                                <td><?= $d->harga ?></td>
                                <td><?= $d->stok ?></td>
                                <td><img src="<?= base_url('file/gambar_peralatan/' . $d->foto); ?>" width="100"></td>
                                <td class="text-center" width="100px">
                                    <a class="btn btn-sm btn-success" href="javascript:void(0)" onclick="edit( 
                                                                                '<?= $d->id ?>', 
                                                                                '<?= $d->nama ?>', 
                                                                                '<?= $d->harga ?>',
                                                                                '<?= $d->jenis ?>',
                                                                                '<?= $d->stok ?>',
                                                                                '<?= $d->foto ?>'
                                                                               )">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="hapus('<?= $d->id ?>','<?= $d->nama ?>')">
                                        <i class="fas fa-trash"></i>
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
    function edit(id, nama, harga, jenis, stok, foto) {
        $('#id').val(id);
        $('#nama').val(nama);
        $('#harga').val(harga);
        $('#jenis').val(jenis);
        $('#stok').val(stok);
        $('#foto').val(foto);
        $('#edit_data').modal('show');
    }

    function hapus(id, nama) {
        $('#hid').val(id);
        $('#hnama').html(nama);
        $('#hapus_data').modal('show');
    }
</script>

<div class="modal fade" id="modal_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Data Perlengkapan Pesta</h4>
                <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="POST" enctype="multipart/form-data" action="<?php echo site_url('C_perlengkapan_pesta/save') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Perlengkapan</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis</label>
                        <select name="jenis" class="form-control" required>
                            <option selected disabled>PILIH</option>
                            <option value="1">Alat Pesta</option>
                            <option value="2">Baju Adat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" name="stok" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Perlengkapan Pesta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="POST" enctype="multipart/form-data" action="<?php echo site_url('C_perlengkapan_pesta/edit') ?>">
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Perlengkapan</label>
                            <input type="hidden" name="id" id="id" class="form-control" required>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis</label>
                            <select name="jenis" class="form-control" id="jenis" required>
                                <option disabled>PILIH</option>
                                <option value="1">Alat Pesta</option>
                                <option value="2">Baju Adat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="text" name="stok" id="stok" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_perlengkapan_pesta/delete') ?>">
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