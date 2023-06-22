<?= $this->extend('template_penyewa/V_main') ?>
<?= $this->section('content') ?>

<div class="card card-teal">
    <div class="card-header">
        <h3 class="card-title">Penyewaan Perlengkapan Pesta</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="<?= site_url('C_front_sewa/save_sewa') ?>" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>Penyewa</label>
                        <input type="hidden" readonly class="form-control" id="id_penyewa" value="<?= $session->id ?>" name="id_penyewa">
                        <div class="input-group">
                            <input type="text" readonly class="form-control" id="nama_penyewa" value="<?= $session->nama ?>" name="penyewa" required>
                            <!-- <span class="input-group-append">
                                <button type="button" data-toggle="modal" data-target="#cari_penyewa" class="btn btn-warning">Cari <i class="fas fa-search"></i></button>
                            </span> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Perlengkapan pesta</label>
                        <input type="hidden" readonly class="form-control" id="id_perlengkapan" name="id_perlengkapan">
                        <div class="input-group">
                            <span class="input-group-append">
                                <button type="button" data-toggle="modal" data-target="#cari_perlengkapan" class="btn btn-warning">Cari <i class="fas fa-search"></i></button>
                            </span>
                            <input type="text" readonly class="form-control" id="nama_perlengkapan" name="perlengkapan">
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label>stok</label>
                        <input type="text" readonly class="form-control" id="stok" name="stok">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" readonly class="form-control" id="harga" name="harga">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>QTY</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="qty" name="qty">
                            <span class="input-group-append">
                                <button type="button" id="tambah" class="btn btn-success"><i class="fas fa-plus-square"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="data_temp">

            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan <i class="fas fa-save"></i></button>
        </div>
    </form>
</div>
<!-- jQuery -->
<script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        load_perlengkapan();
    });

    function pilih_penyewa(id, nama) {
        $('#id_penyewa').val(id);
        $('#nama_penyewa').val(nama);
        $('#cari_penyewa').modal('hide');
    }

    function load_perlengkapan() {
        $.ajax({
            url: 'list_perlengkapan',
            method: 'POST',
            dataType: 'html',
            beforeSend: function(e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            cache: false,
            success: function(data) {
                $('#data_perlengkapan').html(data);
            }
        });
        return true;
    };

    function pilih_perlengkapan(id, nama, harga, stok) {
        $('#id_perlengkapan').val(id);
        $('#nama_perlengkapan').val(nama);
        $('#harga').val(harga);
        $('#stok').val(stok);
        $('#cari_perlengkapan').modal('hide');
    }

    $('#tambah').on('click', function() {
        var id_penyewa = $('#id_penyewa').val();
        var id_perlengkapan = $('#id_perlengkapan').val();
        var nama_perlengkapan = $('#nama_perlengkapan').val();
        var harga = $('#harga').val();
        var stok = $('#stok').val();
        var qty = $('#qty').val();
        if (id_penyewa != "" && id_perlengkapan != "" && stok != "") {
            if (eval(stok) < qty) {
                alert('Stok Tidak Mencukupi!');
            } else {
                $.ajax({
                    url: "save_temp_sewa",
                    type: "POST",
                    data: {
                        id_penyewa: id_penyewa,
                        id_perlengkapan: id_perlengkapan,
                        nama_perlengkapan: nama_perlengkapan,
                        harga: harga,
                        stok: stok,
                        qty: qty
                    },
                    dataType: 'html',
                    success: function(response) {
                        $('#id_perlengkapan').val("");
                        $('#nama_perlengkapan').val("");
                        $('#harga').val("");
                        $('#stok').val("");
                        $('#qty').val("");
                        $('#data_temp').html(response);
                        load_perlengkapan();
                    },
                })
            }
        } else {
            alert('Anda harus mengisi data dengan lengkap !');
        }
        return false;
    });
</script>

<div class="modal fade" id="cari_penyewa">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Penyewa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <table id="example3" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($penyewa as $d) :
                            $no++; ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?= $d->nama ?></td>
                                <td><?= $d->alamat ?></td>
                                <td><?= $d->no_telepon ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="return pilih_penyewa('<?= $d->id ?>','<?= $d->nama ?>')">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cari_perlengkapan">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Perlengkapan Pesta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <div class="table-responsive" id="data_perlengkapan">

                    </>

                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>