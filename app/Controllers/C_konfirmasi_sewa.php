<?php

namespace App\Controllers;

class C_konfirmasi_sewa extends BaseController
{

    public function index()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Data Penyewaan Perlengkapan Pesta';
        $data['data'] = $db->table('pembayaran')->select('*,penyewaan.id as id_penyewaan')
            ->join('penyewaan', 'penyewaan.id=pembayaran.id_penyewaan')
            ->where('pembayaran.status', 2)
            ->orderBy('penyewaan.tanggal', 'desc')
            ->get()->getResult();
        return view('penyewaan/V_list_konfirmasi', $data);
    }

    public function konfirmasi($id = "")
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Konfirmasi Pembayaran Penyewaan Perlengkapan Pesta';
        $data['data_penyewaan'] = $db->table('penyewaan')->select('*,penyewaan.id as id_penyewaan')
            ->join('penyewa', 'penyewa.id=penyewaan.id_penyewa')
            ->where('penyewaan.id', $id)->get()->getRow();
        $data['detail_penyewaan'] = $db->table('detail_penyewaan')->getWhere(['id_penyewaan' => $id])->getResult();
        return view('penyewaan/V_konfirmasi', $data);
    }

    public function konfirmasi_sewa($id_penyewaan = "")
    {
        $db   = \Config\Database::connect();

        $data = [
            'status_sewa' => 1
        ];
        $db->table('penyewaan')->update($data, array('id' => $id_penyewaan));

        $data_pem = [
            'status' => 3
        ];
        $db->table('pembayaran')->update($data_pem, array('id_penyewaan' => $id_penyewaan));

        session()->setflashdata('sukses', 'Penyewaan Berhasil Dikonfirmasi.');
        return redirect()->to(base_url('C_konfirmasi_sewa'));
    }

    public function tolak_sewa($id_penyewaan = "")
    {
        $db   = \Config\Database::connect();

        $data = [
            'status_sewa' => 3
        ];
        $db->table('penyewaan')->update($data, array('id' => $id_penyewaan));

        $data_pem = [
            'status' => 5
        ];
        $db->table('pembayaran')->update($data_pem, array('id_penyewaan' => $id_penyewaan));

        session()->setflashdata('sukses', 'Penyewaan Ditolak.');
        return redirect()->to(base_url('C_konfirmasi_sewa'));
    }
}
