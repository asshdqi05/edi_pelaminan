<?php

namespace App\Controllers;

class C_home_penyewa extends BaseController
{

    public function index()
    {
        $data['judul_halaman'] = 'Dashboard';
        return view('V_home_penyewa', $data);
    }
}
