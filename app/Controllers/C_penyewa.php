<?php

namespace App\Controllers;

class C_penyewa extends BaseController
{
    public function index()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Data Penyewa';
        $data['data'] = $db->table('penyewa')->get()->getResult();
        return view('master/V_penyewa', $data);
    }

    public function save()
    {
        $db   = \Config\Database::connect();
        $validation = $this->validate([
            'username' => [
                'rules' => 'is_unique[penyewa.username]',
                'errors' => ['is_unique' => 'Username Sudah Terdaftar!!, Silahkan Masukan Username Lain.'],
            ]
        ]);

        if ($validation == TRUE) {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'alamat' => $this->request->getPost('alamat'),
                'no_telepon' => $this->request->getPost('no_telepon'),
                'username' => $this->request->getpost('username'),
                'password' => password_hash($this->request->getpost('password'), PASSWORD_DEFAULT),
            ];
            $db->table('penyewa')->insert($data);
            session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
            return redirect()->to(base_url('C_penyewa'));
        } else {
            $val = \Config\Services::validation();
            session()->setflashdata('error', $val->listErrors());
            return redirect()->to(base_url('C_penyewa'));
        }
    }

    public function edit()
    {
        $db   = \Config\Database::connect();
        if ($this->request->getVar('password') == "") {
            $pw = $this->request->getVar('old_password');
        } else {
            $pw = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }
        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'username' => $this->request->getpost('username'),
            'password' => $pw
        ];
        $id = $this->request->getPost('id');
        $db->table('penyewa')->update($data, array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Update.');
        return redirect()->to(base_url('C_penyewa'));
    }

    public function delete()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $db->table('penyewa')->delete(array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_penyewa'));
    }
}
