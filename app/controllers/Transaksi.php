<?php

class Transaksi extends Controller
{
    public function __construct()
    {
        if(!($_SESSION['login']))
        {
            return header('Location:'.BASE_URL.'/auth');
            exit;
        }
    }
    public function index()
    {
        $data = [
            "title" => "Transaksi",
            'data' => $this->model('Transaksi_model')->getAllTransaksi()
        ];
        $this->view('templates/header', $data);
        $this->view('transaksi/index', $data);
        $this->view('templates/footer');
    }
    public function create()
    {
        $data = [   
            "title" => "Tambah Data Transaksi",
            "pembayaran" => $this->model('Pembayaran_model')->getAllPembayaran(),
            "siswa" => $this->model('Siswa_model')->getAllSiswa()
        ];
        $this->view('templates/header', $data);
        $this->view('transaksi/form', $data);
        $this->view('templates/footer');
    }
    public function store()
    {
        if($this->model('Transaksi_model')->store($_POST) > 0)
        {
            Flasher::setFlash('success','Data Transaksi', 'berhasi di tambahkan');
            return header('Location:'.BASE_URL.'/transaksi');
            exit;
        }else {
            Flasher::setFlash('danger', 'Data Transaksi', 'gagal ditambahkan');
            return header('Lcation:'.BASE_URL.'/transaksi');
            exit;
        }
    }
    public function edit($id)
    {
        $data = [
            "title" => 'Edit Data Transaksi',
            "data" => $this->model('Transaksi_model')->getTransaksi($id),
            "pembayaran" => $this->model('Pembayaran_model')->getAllPembayaran(),
            "siswa" => $this->model('Siswa_model')->getAllSiswa()
        ];
        $this->view('templates/header', $data);
        $this->view('transaksi/form', $data);
        $this->view('templates/footer');
    }
    public function update($id)
    {
        if($this->model('Transaksi_model')->update($id,$_POST) >0)
        {
            Flasher::setFlash('success','Data Transaksi', 'berhasi di update');
            return header('Location:'.BASE_URL.'/transaksi');
            exit;
        }else {
            Flasher::setFlash('danger', 'Data Transaksi', 'gagal update');
            return header('Lcation:'.BASE_URL.'/transaksi]');
            exit;
        }
    }
    public function hapus($id)
    {
        if($this->model('Transaksi_model')->delete($id) > 0)
        {
            Flasher::setFlash('success', 'Data Transaksi', 'berhasil di hapus');
            return header('Location:'.BASE_URL.'/transaksi');
            exit;
        }else {
            Flasher::setFlash('danger', 'Data Transaksi', 'gagal di hapus');
            return header('Location:'.BASE_URL.'/transaksi');
            exit;
        }
    }
}