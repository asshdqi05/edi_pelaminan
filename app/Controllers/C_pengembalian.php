<?php

namespace App\Controllers;

class C_pengembalian extends BaseController
{

    public function index()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Data Pengembalian Perlengkapan Pesta';
        $data['data'] = $db->table('penyewaan')->select('*,penyewaan.id as id_penyewaan')
            ->join('penyewa', 'penyewa.id=penyewaan.id_penyewa')
            ->where('penyewaan.status_sewa', 1)
            ->get()->getResult();
        return view('pengembalian/V_list_pengembalian', $data);
    }

    public function detail_sewa($id = "")
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Detail Penyewaan Perlengkapan Pesta';
        $data['data_penyewaan'] = $db->table('penyewaan')->select('*,penyewaan.id as id_penyewaan')
            ->join('penyewa', 'penyewa.id=penyewaan.id_penyewa')
            ->where('penyewaan.id', $id)->get()->getRow();
        $data['detail_penyewaan'] = $db->table('detail_penyewaan')->getWhere(['id_penyewaan' => $id])->getResult();
        return view('pengembalian/V_detail_penyewaan', $data);
    }

    public function save()
    {
        $db   = \Config\Database::connect();

        $id_penyewaan = $this->request->getPost('id_penyewaan');

        $status_sewa = [
            'tanggal_kembali' => date('Y-m-d'),
            'status_sewa' => 2
        ];
        $db->table('penyewaan')->update($status_sewa, array('id' => $id_penyewaan));

        $denda = [
            'tanggal_lunas' => date('Y-m-d'),
            'denda' => $this->request->getPost('denda'),
            'ket_denda' => $this->request->getPost('ket_denda'),
            'status' => 4,
        ];
        $db->table('pembayaran')->update($denda, array('id_penyewaan' => $id_penyewaan));

        $data = $db->table('detail_penyewaan')->getWhere(['id_penyewaan' => $id_penyewaan])->getResult();
        foreach ($data as $d) {
            $alat = $db->table('perlengkapan_pesta')->getWhere(['id' => $d->id_perlengkapan_pesta])->getRow();
            $stok = $alat->stok + $d->qty;
            $data = [
                'stok' => $stok,
            ];
            $db->table('perlengkapan_pesta')->update($data, array('id' => $d->id_perlengkapan_pesta));
        }

        session()->setflashdata('sukses', 'Data Penyewaan Berhasil Di Simpan.');
        return redirect()->to(base_url('C_pengembalian'));
    }
}
