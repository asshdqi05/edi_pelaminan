<?php

namespace App\Controllers;

class C_profil_penyewa extends BaseController
{

    public function index()
    {
        $session = session();
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Profil Penyewa';
        $data['data'] = $db->table('penyewa')->getWhere(['id' => $session->id])->getRow();
        $data['session'] = session();
        return view('profil_penyewa/V_profil', $data);
    }

    public function update()
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
        return redirect()->to(base_url('C_profil_penyewa'));
    }
}
