<?php

class HistoryTransaksi extends Controller
{
    public function index()
    {
        $data = [
            "title" => "History Transaksi"
        ];
        if($_SESSION['user']['role'] == 'siswa') {
            $data['data'] = $this->model('Transaksi_model')->getTransaksiById($_SESSION['user']['siswa_id']);
        }else {
            $data['data'] = $this->model('Transaksi_model')->getAllTransaksi();
        }
        $this->view("templates/header", $data);
        $this->view("history/index", $data);
        $this->view("templates/footer");
    }
    public function viewHistory()
    {
        $data = [
            'data' => $this->model('Transaksi_model')->getAllTransaksi()
        ];
        $this->view("history/show", $data);
    }
}