<?php


class Pembayaran extends Controller
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
            "title" => "Pembayaran",
            'data' => $this->model('Pembayaran_model')->getAllPembayaran()
        ];
        $this->view('templates/header', $data);
        $this->view('pembayaran/index', $data);
        $this->view('templates/footer');
    }
    public function create()
    {
        $data = [   
            "title" => "Tambah Data Pembayaran"
        ];
        $this->view('templates/header', $data);
        $this->view('pembayaran/form', $data);
        $this->view('templates/footer');
    }
    public function store()
    {
        if($this->model('Pembayaran_model')->store($_POST) >0)
        {
            Flasher::setFlash('success','Data Pembayaran', 'berhasi di tambahkan');
            return header('Location:'.BASE_URL.'/pembayaran');
            exit;
        }else {
            Flasher::setFlash('danger', 'Data Pembayaran', 'gagal ditambahkan');
            return header('Lcation:'.BASE_URL.'/pembayaran');
            exit;
        }
    }
    public function edit($id)
    {
        $data = [
            "title" => 'Edit Data Pembayaran',
            "data" => $this->model('Pembayaran_model')->getPembayaran($id)

        ];
        $this->view('templates/header', $data);
        $this->view('pembayaran/form', $data);
        $this->view('templates/footer');
    }
    public function update($id)
    {
        if($this->model('Pembayaran_model')->update($_POST, $id) >0)
        {
            Flasher::setFlash('success','Data Pembayaran', 'berhasi di update');
            return header('Location:'.BASE_URL.'/pembayaran');
            exit;
        }else {
            Flasher::setFlash('danger', 'Data Pembayaran', 'gagal update');
            return header('Lcation:'.BASE_URL.'/pembayaran');
            exit;
        }
    }
    public function hapus($id)
    {
        if($this->model('Pembayaran_model')->delete($id) > 0)
        {
            Flasher::setFlash('success', 'Data Pembayaran', 'berhasil di hapus');
            return header('Location:'.BASE_URL.'/pembayaran');
            exit;
        }else {
            Flasher::setFlash('danger', 'Data Pembayaran', 'gagal di hapus');
            return header('Location:'.BASE_URL.'/pembayaran');
            exit;
        }
    }
}