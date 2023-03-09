<?php
class User_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function login($data)
    {
        $this->db->query("SELECT * FROM pengguna WHERE username=:username AND password=:password");
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', md5($data['password']));
        $pengguna = $this->db->single();
         if($pengguna) {
             $_SESSION['login'] = true;
             $_SESSION['user'] = $pengguna;
            if($pengguna['role'] != 'siswa') {
                $this->db->query("SELECT * FROM petugas WHERE id_pengguna=:pengguna_id");
                $this->db->bind('pengguna_id', $pengguna['id']);
                $petugas = $this->db->single();
                $_SESSION['user']['petugas_id'] = $petugas['id'];
            }else {
                $this->db->query("SELECT * FROM siswa WHERE id_pengguna=:pengguna_id");
                $this->db->bind('pengguna_id', $pengguna['id']);
                $siswa = $this->db->single();
                    $_SESSION['user']['siswa_id'] = $siswa['id'];
            }
            return true;
         }else {
            return false;
         }
    }
}