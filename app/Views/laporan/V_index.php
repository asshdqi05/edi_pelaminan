<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-teal card-outline">
            <div class="card-body">
                <div class="row no-gutters">

                    <div class="col-md-4">
                        <form method="POST" action="<?php echo site_url('C_laporan/laporan_perlengkapan_pesta') ?>">
                            <table>
                                <tr>
                                    <div class="col-md">
                                        <div class="card card-solid">
                                            <div class="card-header bg-teal">
                                                <div class="card-title">Laporan Perlengkapan Pesta</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-xs">
                                                    <button type="submit" class="btn btn-block bg-teal"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>

                    <div class="col-md-4">
                        <form method="POST" action="<?php echo site_url('C_laporan/laporan_penyewa') ?>">
                            <table>
                                <tr>
                                    <div class="col-md">
                                        <div class="card card-solid">
                                            <div class="card-header bg-teal">
                                                <div class="card-title">Laporan Penyewa</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-xs">
                                                    <button type="submit" class="btn btn-block bg-teal"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>

                    <div class="col-md-4">
                        <form method="POST" action="<?php echo site_url('C_laporan/saldo') ?>">
                            <table>
                                <tr>
                                    <div class="col-md">
                                        <div class="card card-solid">
                                            <div class="card-header bg-teal">
                                                <div class="card-title">Laporan Saldo</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-xs">
                                                    <button type="submit" class="btn btn-block bg-teal"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>

                    <div class="col-md-4">
                        <form method="POST" action="<?php echo site_url('C_laporan/laporan_penyewaan') ?>">
                            <table>
                                <tr>
                                    <div class="col-md">
                                        <div class="card card-solid">
                                            <div class="card-header bg-teal">
                                                <div class="card-title">Laporan Penyewaan Perperiode</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Tanggal Awal</label>
                                                    <input type="date" name="tgl_awal" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Akhir</label>
                                                    <input type="date" name="tgl_akhir" class="form-control" required>
                                                </div>
                                                <div class="col-xs">
                                                    <button type="submit" class="btn btn-block bg-teal"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>

                    <div class="col-md-4">
                        <form method="POST" action="<?php echo site_url('C_laporan/laporan_pengembalian') ?>">
                            <table>
                                <tr>
                                    <div class="col-md">
                                        <div class="card card-solid">
                                            <div class="card-header bg-teal">
                                                <div class="card-title">Laporan Pengembalian Perperiode</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Tanggal Awal</label>
                                                    <input type="date" name="tgl_awal" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Akhir</label>
                                                    <input type="date" name="tgl_akhir" class="form-control" required>
                                                </div>
                                                <div class="col-xs">
                                                    <button type="submit" class="btn btn-block bg-teal"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>

                    <div class="col-md-4">
                        <form method="POST" action="<?php echo site_url('C_laporan/laporan_uang_keluar') ?>">
                            <table>
                                <tr>
                                    <div class="col-md">
                                        <div class="card card-solid">
                                            <div class="card-header bg-teal">
                                                <div class="card-title">Laporan Uang Keluar Perperiode</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Tanggal Awal</label>
                                                    <input type="date" name="tgl_awal" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Akhir</label>
                                                    <input type="date" name="tgl_akhir" class="form-control" required>
                                                </div>
                                                <div class="col-xs">
                                                    <button type="submit" class="btn btn-block bg-teal"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>