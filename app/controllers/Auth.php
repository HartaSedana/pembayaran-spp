<?php


class Auth extends Controller 
{
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        $this->view('user/login', $data);
    }
    public function login()
    {
        $pengguna = $this->model('User_model')->login($_POST);
        if($pengguna)
        {
            return header('Location:'.BASE_URL.'/');
            exit;
        }else {
            Flasher::setFlash('danger', 'Gagal','Login' );
            return header('Location:'.BASE_URL.'/auth');
        }

    }
    public function logout()
    {
        session_destroy();
        return header('Location:'.BASE_URL.'/auth');
    }
}
