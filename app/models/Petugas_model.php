<?php


class Petugas_model {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllPetugas()
    {
        $this->db->query("SELECT * FROM petugas_view WHERE role='petugas'");
        return $this->db->resultAll();
    }
    public function store($data)
    {
        $this->db->query("INSERT INTO pengguna(username, password, role) VALUES(:username, :password, :role)");
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', md5($data['password']));
        $this->db->bind('role', 'petugas');

        $lastInsertId = $this->db->exeGetId();

        $this->db->query("INSERT INTO petugas(nama, id_pengguna) VALUES(:nama, :id_pengguna)");
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('id_pengguna', ($lastInsertId));
        return $this->db->rowcount();
    }
    public function getPetugas($id)
    {
        $this->db->query("SELECT * FROM petugas WHERE id=:id");
        $this->db->bind("id", $id);
        return $this->db->single();
    }
    public function update($id, $data)
    {
        $this->db->query("UPDATE petugas SET nama=:nama WHERE id=:id");
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('id', $id);
        return $this->db->rowCount();

    }
    public function delete($id)
    {
        $this->db->query("DELETE FROM pengguna WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->rowCount();
    }
}