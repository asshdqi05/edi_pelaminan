<?php

namespace App\Controllers;

class C_laporan extends BaseController
{
    public function index()
    {
        $data['judul_halaman'] = 'Laporan';
        return view('laporan/V_index', $data);
    }

    public function laporan_perlengkapan_pesta()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Laporan Perlengkapan Pesta';
        $data['data'] = $db->table('perlengkapan_pesta')->get()->getResult();
        return view('laporan/V_laporan_perlengkapan_pesta', $data);
    }

    public function laporan_penyewa()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Laporan Penyewa';
        $data['data'] = $db->table('penyewa')->get()->getResult();
        return view('laporan/V_laporan_penyewa', $data);
    }

    public function laporan_penyewaan()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Laporan Penyewaan Perlengkapan Pesta';
        $tanggal_awal = $this->request->getPost('tgl_awal');
        $tanggal_akhir = $this->request->getPost('tgl_akhir');
        $data['tgl_awal'] = $tanggal_awal;
        $data['tgl_akhir'] = $tanggal_akhir;
        $data['data'] = $db->table('pembayaran')->select('*,penyewaan.id as id_penyewaan')
            ->join('penyewaan', 'penyewaan.id=pembayaran.id_penyewaan', 'left')
            ->where('penyewaan.tanggal >=', $tanggal_awal)
            ->where('penyewaan.tanggal <=', $tanggal_akhir)
            ->orderBy('penyewaan.tanggal', 'desc')
            ->get()->getResult();
        return view('laporan/V_laporan_penyewaan', $data);
    }

    public function laporan_pengembalian()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Laporan Pengembalian Perlengkapan Pesta';
        $tanggal_awal = $this->request->getPost('tgl_awal');
        $tanggal_akhir = $this->request->getPost('tgl_akhir');
        $data['tgl_awal'] = $tanggal_awal;
        $data['tgl_akhir'] = $tanggal_akhir;
        $data['data'] = $db->table('pembayaran')->select('*,penyewaan.id as id_penyewaan')
            ->join('penyewaan', 'penyewaan.id=pembayaran.id_penyewaan', 'left')
            ->where('penyewaan.status_sewa', 2)
            ->where('penyewaan.tanggal >=', $tanggal_awal)
            ->where('penyewaan.tanggal <=', $tanggal_akhir)
            ->orderBy('penyewaan.tanggal', 'desc')
            ->get()->getResult();
        return view('laporan/V_laporan_pengembalian', $data);
    }

    public function laporan_uang_keluar()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Laporan Uang Keluar';
        $tanggal_awal = $this->request->getPost('tgl_awal');
        $tanggal_akhir = $this->request->getPost('tgl_akhir');
        $data['tgl_awal'] = $tanggal_awal;
        $data['tgl_akhir'] = $tanggal_akhir;
        $data['data'] = $db->table('uang_keluar')->select('*')
            ->where('tanggal >=', $tanggal_awal)
            ->where('tanggal <=', $tanggal_akhir)
            ->orderBy('tanggal', 'desc')
            ->get()->getResult();
        return view('laporan/V_laporan_uang_keluar', $data);
    }

    public function saldo()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Laporan Saldo';
        $data['data_dp'] = $db->table('pembayaran')->selectSum('dp')->where('status', 3)->get()->getRow();
        $data['data_lunas'] = $db->table('pembayaran')->selectSum('total_pembayaran_sewa')->where('status', 4)->get()->getRow();
        $data['data_denda'] = $db->table('pembayaran')->selectSum('denda')->where('status', 4)->get()->getRow();
        $data['data_uang_keluar'] = $db->table('uang_keluar')->selectSum('jumlah')->get()->getRow();
        return view('laporan/V_saldo', $data);
    }
}
