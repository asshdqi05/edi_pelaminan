<table id="example4" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Perlengkapan</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 0;
        foreach ($perlengkapan_pesta as $d) :
            $no++; ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?= $d->nama ?></td>
                <td><?= $d->harga ?></td>
                <td><?= $d->stok ?></td>
                <td><img src="<?= base_url('file/gambar_peralatan/' . $d->foto); ?>" width="100"></td>
                <td>
                    <button type="button" class="btn btn-primary" onclick="return pilih_perlengkapan('<?= $d->id ?>','<?= $d->nama ?>','<?= $d->harga ?>','<?= $d->stok ?>')">
                        Pilih
                    </button>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>

<script>
    $(function() {
        $('#example4').DataTable({
            "paging": true,
            "lengthChange": false,
            searching: true,
            "ordering": false,
            "info": true,
            autoWidth: false,
            responsive: true,
        });
    });
</script>