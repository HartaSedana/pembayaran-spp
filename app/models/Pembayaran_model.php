<?php


class Pembayaran_model 
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllPembayaran()
    {
        $this->db->query("SELECT * FROM pembayaran");
        return $this->db->resultAll();
    }
    public function getPembayaran($id)
    {
        $this->db->query('SELECT * FROM pembayaran WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function store($data)
    {
        $this->db->query("INSERT INTO pembayaran (tahun_ajaran, nominal) VALUES (:tahun_ajaran, :nominal)");
        $this->db->bind('tahun_ajaran', $data['tahun_ajaran']);
        $this->db->bind('nominal', $data['nominal']);
        return $this->db->rowCount();
    }
    public function update($data, $id)
    {
        $this->db->query("UPDATE pembayaran SET tahun_ajaran=:tahun_ajaran, nominal=:nominal  WHERE id=:id");
        $this->db->bind('id', $id);
        $this->db->bind('tahun_ajaran', $data['tahun_ajaran']);
        $this->db->bind('nominal', $data['nominal']);
        return $this->db->rowCount();
    }
    public function delete($id)
    {
        $this->db->query("DELETE FROM pembayaran WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->rowCount();
    }
}