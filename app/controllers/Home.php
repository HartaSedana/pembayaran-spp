<?php

class Home extends Controller {

    public function __construct()
    {
        if(!($_SESSION['login']))
        {
            return header('Location:'.BASE_URL.'/auth');
            exit;
        }
    }
    public function index() {
        $data = [
            'title' => 'Dashboard'
        ];
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}


?>