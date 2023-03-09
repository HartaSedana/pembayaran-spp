<?php
class Petugas extends Controller
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
            "title" => "Petugas",
            'data' => $this->model('Petugas_model')->getAllPetugas()
        ];
        $this->view('templates/header', $data);
        $this->view('petugas/index', $data);
        $this->view('templates/footer');
    }
    public function create()
    {
        $data = [   
            "title" => "Tambah Data Petugas"
        ];
        $this->view('templates/header', $data);
        $this->view('petugas/form', $data);
        $this->view('templates/footer');
    }
    public function store()
    {
        if($this->model('Petugas_model')->store($_POST) >0)
        {
            Flasher::setFlash('success','Data Petugas', 'berhasi di tambahkan');
            return header('Location:'.BASE_URL.'/petugas');
            exit;
        }else {
            Flasher::setFlash('danger', 'Data Petugas', 'gagal ditambahkan');
            return header('Lcation:'.BASE_URL.'/petugas');
            exit;
        }
    }
    public function edit($id)
    {
        $data = [
            "title" => 'Edit Data Petugas',
            "data" => $this->model('Petugas_model')->getPetugas($id)

        ];
        $this->view('templates/header', $data);
        $this->view('petugas/form', $data);
        $this->view('templates/footer');
    }
    public function update($id)
    {
        if($this->model('Petugas_model')->update($id,$_POST) >0)
        {
            Flasher::setFlash('success','Data Petugas', 'berhasi di update');
            return header('Location:'.BASE_URL.'/petugas');
            exit;
        }else {
            Flasher::setFlash('danger', 'Data Petugas', 'gagal update');
            return header('Lcation:'.BASE_URL.'/petugas]');
            exit;
        }
    }
    public function hapus($id)
    {
        if($this->model('Petugas_model')->delete($id) > 0)
        {
            Flasher::setFlash('success', 'Data Petugas', 'berhasil di hapus');
            return header('Location:'.BASE_URL.'/petugas');
            exit;
        }else {
            Flasher::setFlash('danger', 'Data Petugas', 'gagal di hapus');
            return header('Location:'.BASE_URL.'/petugas');
            exit;
        }
    }
}