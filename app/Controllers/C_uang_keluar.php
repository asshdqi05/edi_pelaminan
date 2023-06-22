<?php

namespace App\Controllers;

class C_uang_keluar extends BaseController
{
    public function index()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Data Uang Keluar';
        $data['data'] = $db->table('uang_keluar')->get()->getResult();
        return view('uang_keluar/V_uang_keluar', $data);
    }

    public function save()
    {
        $db   = \Config\Database::connect();
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'jumlah' => $this->request->getPost('jumlah'),
            'keterangan' => $this->request->getPost('keterangan')
        ];
        $db->table('uang_keluar')->insert($data);
        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to(base_url('C_uang_keluar'));
    }

    public function edit()
    {
        $db   = \Config\Database::connect();
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'jumlah' => $this->request->getPost('jumlah'),
            'keterangan' => $this->request->getPost('keterangan')
        ];
        $id = $this->request->getPost('id');
        $db->table('uang_keluar')->update($data, array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Update.');
        return redirect()->to(base_url('C_uang_keluar'));
    }

    public function delete()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $db->table('uang_keluar')->delete(array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_uang_keluar'));
    }
}
