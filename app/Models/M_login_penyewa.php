<?php

namespace App\Models;

use CodeIgniter\Model;

class M_login_penyewa extends Model
{
    protected $table = 'penyewa';
    protected $allowedFields = ['id', 'nama', 'alamat', 'alamat', 'no_telepon', 'username', 'password'];
}
