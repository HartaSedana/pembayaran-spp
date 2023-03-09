<?php
class Kelas extends Controller 
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
            'title' => 'Kelas',
            'data' => $this->model('Kelas_model')->getAllKelas()
        ];
        $this->view('templates/header', $data);
        $this->view('kelas/index', $data);
        $this->view('templates/footer');
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Data Kelas',
        ];
        $this->view('templates/header', $data);
        $this->view('kelas/form', $data);
        $this->view('templates/footer');
    }
    public function store()
    {
        if($this->model('Kelas_model')->store($_POST) >0)
        {
            Flasher::setFlash('success', 'Data Kelas', 'berhasil ditambahkan');
            return header('Location:'.BASE_URL.'/kelas');
            exit;
        }else {
            Flasher::setFlash('danger', 'Data Kelas', 'gagal ditambahkan');
            return header('Lcation:'.BASE_URL.'/kelas');
            exit;
        }
    }
    public function edit($id)
    {
        $data = [
            "title" => 'Edit Data Kelas',
            "data" => $this->model('Kelas_model')->getKelas($id)

        ];
        $this->view('templates/header', $data);
        $this->view('kelas/form', $data);
        $this->view('templates/footer');
    }
    public function update($id)
    {
        if($this->model('Kelas_model')->update($_POST, $id) >0)
        {
            Flasher::setFlash('success', 'Data Kelas', 'berhasil di update');
            return header('Location:'.BASE_URL.'/kelas');
            exit;
        }else {
            Flasher::setFlash('danger', 'Data Kelas', 'gagal di update');
            return header('Lcation:'.BASE_URL.'/kelas');
            exit;
        }
    }
    public function hapus($id)
    {
        if($this->model('Kelas_model')->delete($id) > 0)
        {
            Flasher::setFlash('success', 'Data Kelas', 'berhasil di hapus');
            return header('Location:'.BASE_URL.'/kelas');
            exit;
        }else {
            Flasher::setFlash('danger', 'Data Kelas', 'gagal di hapus');
            return header('Location:'.BASE_URL.'/kelas');
            exit;
        }
    }
}

?>