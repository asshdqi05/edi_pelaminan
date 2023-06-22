<?php

namespace App\Controllers;

class C_sewa extends BaseController
{

    public function index()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Data Penyewaan Perlengkapan Pesta';
        $data['data'] = $db->table('penyewaan')->select('*,penyewaan.id as id_penyewaan')
            ->join('penyewa', 'penyewa.id=penyewaan.id_penyewa')->get()->getResult();
        return view('penyewaan/V_list_penyewaan', $data);
    }


    public function add_penyewaan()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Tambah Penyewaan Perlengkapan Pesta';
        $data['penyewa'] = $db->table('penyewa')->get()->getResult();
        return view('penyewaan/V_add_penyewaan', $data);
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
            'tipe_sewa' => 1,
            'status_sewa' => 1
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
            'tanggal_dp' => date('Y-m-d'),
            'id_penyewaan' => $id_penyewaan,
            'dp' => $dp,
            'total_pembayaran_sewa' => $total,
            'status' => 3
        );
        $db->table('pembayaran')->insert($data);

        $db->query("INSERT INTO detail_penyewaan (id_penyewaan,id_perlengkapan_pesta,nama,harga,qty)SELECT '$id_penyewaan',id_perlengkapan,nama,harga,qty from temp_penyewaan where id_penyewa='$id_penyewa'");
        $db->table('temp_penyewaan')->delete(array('id_penyewa' => $id_penyewa));

        session()->setflashdata('sukses', 'Data Penyewaan Berhasil Di Simpan.');
        return redirect()->to(base_url('C_sewa'));
    }

    public function bukti_sewa($id = "")
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Bukti Penyewaan Perlengkapan Pesta';
        $data['data_penyewaan'] = $db->table('penyewaan')->select('*,penyewaan.id as id_penyewaan')
            ->join('penyewa', 'penyewa.id=penyewaan.id_penyewa')
            ->where('penyewaan.id', $id)->get()->getRow();
        $data['detail_penyewaan'] = $db->table('detail_penyewaan')->getWhere(['id_penyewaan' => $id])->getResult();
        return view('penyewaan/V_bukti_penyewaan', $data);
    }
}
