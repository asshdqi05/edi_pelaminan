<?php

namespace App\Controllers;

class C_perlengkapan_pesta extends BaseController
{
    public function index()
    {
        $db   = \Config\Database::connect();
        if (!$this->validate([])) {
            $data['validation'] = $this->validator;
        }
        $data['judul_halaman'] = 'Data Perlengkapan Pesta';
        $data['data'] = $db->table('perlengkapan_pesta')->get()->getResult();
        return view('master/V_perlengkapan_pesta', $data);
    }

    public function save()
    {
        $db   = \Config\Database::connect();

        $validation = $this->validate([
            'foto' => 'uploaded[foto]
            |mime_in[foto,image/jpg,image/jpeg,image/gif,image/png,image]
            |max_size[foto,4096]'
        ]);

        if ($validation == FALSE) {
            return $this->index();
        } else {
            $upload = $this->request->getFile('foto');
            $newName = $upload->getRandomName();
            $upload->move(WRITEPATH . '../file/gambar_peralatan/', $newName);

            $data = [
                'nama' => $this->request->getPost('nama'),
                'jenis' => $this->request->getPost('jenis'),
                'harga' => $this->request->getPost('harga'),
                'stok' => $this->request->getPost('stok'),
                'foto' => $newName
            ];
            $db->table('perlengkapan_pesta')->insert($data);
            session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        }
        return redirect()->to(base_url('C_perlengkapan_pesta'));
    }



    public function edit()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $validation = $this->validate([
            'foto' => 'uploaded[foto]
            |mime_in[foto,image/jpg,image/jpeg,image/gif,image/png,image]
            |max_size[foto,4096]'
        ]);

        if ($validation == FALSE) {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'jenis' => $this->request->getPost('jenis'),
                'harga' => $this->request->getPost('harga'),
                'stok' => $this->request->getPost('stok')
            ];
        } else {
            $dt = $db->table('perlengkapan_pesta')->getWhere(['id' => $id])->getRow();
            $gambar = $dt->foto;
            $path = './file/gambar_peralatan/';
            unlink($path . $gambar);
            $upload = $this->request->getFile('foto');
            $newName = $upload->getRandomName();
            $upload->move(WRITEPATH . '../file/gambar_peralatan/', $newName);
            $data = array(
                'nama' => $this->request->getPost('nama'),
                'jenis' => $this->request->getPost('jenis'),
                'harga' => $this->request->getPost('harga'),
                'stok' => $this->request->getPost('stok'),
                'foto' => $newName
            );
        }
        $db->table('perlengkapan_pesta')->update($data, array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Update.');
        return redirect()->to(base_url('C_perlengkapan_pesta'));
    }

    public function delete()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $dt = $db->table('perlengkapan_pesta')->getWhere(['id' => $id])->getRow();
        $gambar = $dt->foto;
        $path = './file/gambar_peralatan/';
        @unlink($path . $gambar);
        $db->table('perlengkapan_pesta')->delete(array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_perlengkapan_pesta'));
    }
}
