<?php

class Siswa extends Controller

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
            'title' => 'Siswa',
            'data' => $this->model('Siswa_model')->getAllSiswa()
        ];
        $this->view('templates/header', $data);
        $this->view('siswa/index', $data);
        $this->view('templates/footer');
    }
    public function show($id)
    {
        $data = [
            'title' => 'Detail Siswa',
            'data' => $this->model('Siswa_model')->showSiswa($id)
        ];
        $this->view('templates/header', $data);
        $this->view('siswa/show', $data);
        $this->view('templates/footer');
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Data Siswa',
            'kelas' => $this->model('Kelas_model')->getAllKelas(),
            'pembayaran' => $this->model('Pembayaran_model')->getAllPembayaran()   
        ];
        $this->view('templates/header', $data);
        $this->view('siswa/form', $data);
        $this->view('templates/footer');
    }
    public function store()
    {
        if($this->model('Siswa_model')->store($_POST) >0)
        {
            Flasher::setFlash('success', 'Data Siswa', 'berhasil ditambahkan');
            return header('Location:'.BASE_URL.'/siswa');
            exit;
        }else {
            Flasher::setFlash('danger', 'Data Siswa', 'gagal ditambahkan');
            return header('Lcation:'.BASE_URL.'/siswa');
            exit;
        }
    }
    public function edit($id)
    {
        $data = [
            "title" => 'Edit Data Siswa',
            'kelas' => $this->model('Kelas_model')->getAllKelas(),
            'pembayaran' => $this->model('Pembayaran_model')->getAllPembayaran(),   
            "data" => $this->model('Siswa_model')->getSiswa($id)

        ];
        $this->view('templates/header', $data);
        $this->view('siswa/form', $data);
        $this->view('templates/footer');
    }
    public function update($id)
    {
        if($this->model('Siswa_model')->update($id, $_POST))
        {
            Flasher::setFlash('success', 'Data Siswa', 'berhasil di update');
            return header('Location:'.BASE_URL.'/siswa');
            exit;
        }else {
            Flasher::setFlash('danger', 'Data Siswa', 'gagal di update');
            return header('Lcation:'.BASE_URL.'/siswa');
            exit;
        }
    }
    public function hapus($id)
    {
        if($this->model('Siswa_model')->delete($id))
        {
            Flasher::setFlash('success', 'Data Siswa', 'berhasil di hapus');
            return header('Location:'.BASE_URL.'/siswa');
            exit;
        }else {
            Flasher::setFlash('danger', 'Data Siswa', 'gagal di hapus');
            return header('Location:'.BASE_URL.'/siswa');
            exit;
        }
    }
}