<?php

namespace App\Controllers;

use CodeIgniter\Validation\Rules;

use App\Models\M_login_penyewa;

class C_front extends BaseController
{

    public function index()
    {
        $db   = \Config\Database::connect();
        $data['all_perlengkapan'] = $db->table('perlengkapan_pesta')->get()->getResult();
        $data['perlengkapan'] = $db->table('perlengkapan_pesta')->getWhere(['jenis' => 1])->getResult();
        $data['baju_adat'] = $db->table('perlengkapan_pesta')->getWhere(['jenis' => 2])->getResult();
        return view('template_front/V_main', $data);
    }

    public function login()
    {
        return view('template_front/V_login');
    }

    public function registrasi()
    {
        return view('template_front/V_registrasi');
    }

    public function save_reg()
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
            session()->setflashdata('sukses', 'Registrasi Akun Berhasil. Silahkan Login');
            return redirect()->to(base_url('C_front/login'));
        } else {
            $val = \Config\Services::validation();
            session()->setflashdata('error', $val->listErrors());
            return redirect()->to(base_url('C_front/registrasi'));
        }
    }

    public function proses_login()
    {
        $session = session();
        $model = new M_login_penyewa();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'            => $data['id'],
                    'nama'          => $data['nama'],
                    'no_telepon'    => $data['no_telepon'],
                    'alamat'        => $data['alamat'],
                    'username'      => $data['username'],
                    'password'      => $data['password'],
                    'logged_in_penyewa'     => TRUE
                ];
                $session->set($ses_data);
                $session->setflashdata('sukses_login', 'Login Berhasil.');
                return redirect()->to(base_url('C_home_penyewa'));
            } else {
                $session->setFlashdata('error', 'Password Anda Salah!');
                return redirect()->to(base_url('C_front/login'));
            }
        } else {
            $session->setFlashdata('error', 'Username Tidak Terdaftar!');
            return redirect()->to(base_url('C_front/login'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('C_front/login'));
    }
}
