<input type="hidden" id="id_pen" value="<?= $id_penyewa ?>">
<table class="table table-bordered">
    <tr>
        <th width=10>No</th>
        <th>Nama Perlengkapan Pesta</th>
        <th>Harga</th>
        <th>QTY</th>
        <th>Sub Total</th>
        <th width=100>Aksi</th>
    </tr>
    <?php
    $db   = \Config\Database::connect();
    $no = 0;
    $total = 0;
    $data = $db->table('temp_penyewaan')->getWhere(['id_penyewa' => $id_penyewa])->getResult();
    foreach ($data as $d) {
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
            <td><button type="button" class="btn btn-danger btn-xs" id="<?= $d->id ?>" name="hapus_temp" value="<?= $d->id  ?>">HAPUS <i class="fas fa-trash"></i></button></td>
        </tr>
        <script>
            $('#<?= $d->id  ?>').click(function() {
                // var base_url = '<?= base_url() ?>';
                var id = $("#<?= $d->id  ?>").val();
                var id_penyewa = $("#id_pen").val();
                $.ajax({
                    url: "delete_temp_sewa",
                    type: 'POST',
                    data: {
                        id: id,
                        id_penyewa: id_penyewa
                    },
                    dataType: 'html',
                    success: function(responsed) {
                        $('#data_temp').html(responsed);
                        $('#id_perlengkapan').val("");
                        $('#nama_perlengkapan').val("");
                        $('#harga').val("");
                        $('#stok').val("");
                        $('#qty').val("");
                        load_perlengkapan();
                    },
                })
            });
        </script>
    <?php } ?>
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
</table>