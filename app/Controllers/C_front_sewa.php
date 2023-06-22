<?php

namespace App\Controllers;

class C_front_sewa extends BaseController
{

    public function index()
    {
        $session = session();
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Data Penyewaan Perlengkapan Pesta';
        $data['data'] = $db->table('penyewaan')->select('*,penyewaan.id as id_penyewaan')
            ->join('penyewa', 'penyewa.id=penyewaan.id_penyewa')
            ->where('penyewaan.id_penyewa', $session->id)
            ->orderBy('penyewaan.tanggal', 'desc')
            ->get()->getResult();
        $data['session'] = session();
        return view('front_penyewaan/V_list_penyewaan', $data);
    }


    public function add_penyewaan()
    {
        $db   = \Config\Database::connect();
        $data['session'] = session();
        $data['judul_halaman'] = 'Tambah Penyewaan Perlengkapan Pesta';
        $data['penyewa'] = $db->table('penyewa')->get()->getResult();
        return view('front_penyewaan/V_add_penyewaan', $data);
    }

    public function list_perlengkapan()
    {
        $db   = \Config\Database::connect();
        $data['perlengkapan_pesta'] = $db->table('perlengkapan_pesta')->get()->getResult();
        return view('front_penyewaan/V_list_perlengkapan', $data);
    }

    public function save_temp_sewa()
    {
        $db   = \Config\Database::connect();
        $dt['id_penyewa'] = $this->request->getVar('id_penyewa');
        $id_perlengkapan = $this->request->getVar('id_perlengkapan');
        $data = [
            'id_penyewa' => $this->request->getVar('id_penyewa'),
            'id_perlengkapan' => $this->request->getVar('id_perlengkapan'),
            'nama' => $this->request->getVar('nama_perlengkapan'),
            'harga' => $this->request->getVar('harga'),
            'qty' => $this->request->getVar('qty'),
        ];
        $db->table('temp_penyewaan')->insert($data);
        $alat = $db->table('perlengkapan_pesta')->getWhere(['id' => $id_perlengkapan])->getRow();
        $stok = $alat->stok - $this->request->getVar('qty');
        $data = [
            'stok' => $stok,
        ];
        $db->table('perlengkapan_pesta')->update($data, array('id' => $id_perlengkapan));
        return view('front_penyewaan/V_temp_sewa', $dt);
    }

    public function delete_temp_sewa()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getVar('id');
        $data_temp = $db->table('temp_penyewaan')->getWhere(['id' => $id])->getRow();
        $alat = $db->table('perlengkapan_pesta')->getWhere(['id' => $data_temp->id_perlengkapan])->getRow();
        $stok = $alat->stok + $data_temp->qty;
        $data = [
            'stok' => $stok,
        ];
        $db->table('perlengkapan_pesta')->update($data, array('id' => $data_temp->id_perlengkapan));

        $dt['id_penyewa'] = $this->request->getVar('id_penyewa');
        $db->table('temp_penyewaan')->delete(array('id' => $id));
        return view('front_penyewaan/V_temp_sewa', $dt);
    }

    public function save_sewa()
    {
        $db   = \Config\Database::connect();
        $id_penyewa = $this->request->getPost('id_penyewa');
        $data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'id_penyewa' => $this->request->getPost('id_penyewa'),
            'tipe_sewa' => 2,
            'status_sewa' => 3
        );
        $db->table('penyewaan')->insert($data);
        $id_penyewaan = $db->insertID();

        $total = 0;
        $data = $db->table('temp_penyewaan')->getWhere(['id_penyewa' => $id_penyewa])->getResult();
        foreach ($data as $d) {
            // $alat = $db->table('perlengkapan_pesta')->getWhere(['id' => $d->id_perlengkapan])->getRow();
            // $stok = $alat->stok - $d->qty;
            // $data = [
            //     'stok' => $stok,
            // ];
            // $db->table('perlengkapan_pesta')->update($data, array('id' => $d->id_perlengkapan));

            $sub = $d->harga * $d->qty;
            $total = $total + $sub;
        }
        $dp = $total / 2;


        $data = array(
            'id_penyewaan' => $id_penyewaan,
            'dp' => $dp,
            'total_pembayaran_sewa' => $total,
            'status' => 1
        );
        $db->table('pembayaran')->insert($data);

        $db->query("INSERT INTO detail_penyewaan (id_penyewaan,id_perlengkapan_pesta,nama,harga,qty)SELECT '$id_penyewaan',id_perlengkapan,nama,harga,qty from temp_penyewaan where id_penyewa='$id_penyewa'");
        $db->table('temp_penyewaan')->delete(array('id_penyewa' => $id_penyewa));

        session()->setflashdata('sukses', 'Data Penyewaan Berhasil Di Simpan.');
        return redirect()->to(base_url('C_front_sewa'));
    }

    public function bukti_sewa($id = "")
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Bukti Penyewaan Perlengkapan Pesta';
        $data['data_penyewaan'] = $db->table('penyewaan')->select('*,penyewaan.id as id_penyewaan')
            ->join('penyewa', 'penyewa.id=penyewaan.id_penyewa')
            ->where('penyewaan.id', $id)->get()->getRow();
        $data['detail_penyewaan'] = $db->table('detail_penyewaan')->getWhere(['id_penyewaan' => $id])->getResult();
        return view('front_penyewaan/V_bukti_penyewaan', $data);
    }

    public function pembayaran($id = "")
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Pembayaran Penyewaan Perlengkapan Pesta';
        $data['data_penyewaan'] = $db->table('penyewaan')->select('*,penyewaan.id as id_penyewaan')
            ->join('penyewa', 'penyewa.id=penyewaan.id_penyewa')
            ->where('penyewaan.id', $id)->get()->getRow();
        $data['detail_penyewaan'] = $db->table('detail_penyewaan')->getWhere(['id_penyewaan' => $id])->getResult();
        return view('front_penyewaan/V_pembayaran', $data);
    }

    public function pembatalan()
    {
        $db   = \Config\Database::connect();
        $id_penyewaan = $this->request->getPost('id');

        $data = [
            'status_sewa' => 4
        ];
        $db->table('penyewaan')->update($data, array('id' => $id_penyewaan));

        $data_pem = [
            'dp' => 0,
            'total_pembayaran_sewa' => 0,
            'status' => 6
        ];
        $db->table('pembayaran')->update($data_pem, array('id_penyewaan' => $id_penyewaan));

        $data = $db->table('detail_penyewaan')->getWhere(['id_penyewaan' => $id_penyewaan])->getResult();
        foreach ($data as $d) {
            $alat = $db->table('perlengkapan_pesta')->getWhere(['id' => $d->id_perlengkapan_pesta])->getRow();
            $stok = $alat->stok + $d->qty;
            $data = [
                'stok' => $stok,
            ];
            $db->table('perlengkapan_pesta')->update($data, array('id' => $d->id_perlengkapan_pesta));
        }

        session()->setflashdata('sukses', 'Penyewaan Berhasil Dibatalkan.');
        return redirect()->to(base_url('C_front_sewa'));
    }

    public function konfirmasi_pembayaran()
    {
        $db   = \Config\Database::connect();

        $id_penyewaan = $this->request->getPost('id_penyewaan');
        $validation = $this->validate([
            'bukti' => 'uploaded[bukti]
            |mime_in[bukti,image/jpg,image/jpeg,image/gif,image/png,image]
            |max_size[bukti,4096]'
        ]);

        if ($validation == FALSE) {
            $val = \Config\Services::validation();
            session()->setflashdata('error', $val->listErrors());
            return redirect()->to(base_url('C_front_sewa/pembayaran/' . $id_penyewaan));
        } else {
            $upload = $this->request->getFile('bukti');
            $newName = $upload->getRandomName();
            $upload->move(WRITEPATH . '../file/bukti_pembayaran/', $newName);

            $data = [
                'tanggal_dp' => date('Y-m-d'),
                'status' => 2,
                'bukti_pembayaran' => $newName
            ];
            $db->table('pembayaran')->update($data, ['id_penyewaan' => $id_penyewaan]);
            session()->setflashdata('sukses', 'Konfirmasi Pembayaran berhasil. Silahkan menunggu Admin untuk Mengkonfirmasi Penyewaan.');
            return redirect()->to(base_url('C_front_sewa'));
        }
    }
}
