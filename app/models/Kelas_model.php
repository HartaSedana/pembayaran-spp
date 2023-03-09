<?php



class Kelas_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllKelas()
    {
        $this->db->query("SELECT * FROM kelas");
        return $this->db->resultAll();
    }
    public function store($data)
    {
        $this->db->query("INSERT INTO kelas (nama, kompetensi_keahlian) VALUES (:nama, :kompetensi_keahlian)");
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kompetensi_keahlian', $data['kompetensi_keahlian']);
        return $this->db->rowCount();
    }
    public function getKelas($id)
    {
        $this->db->query('SELECT * FROM kelas WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function update($data, $id)
    {
        $this->db->query("UPDATE kelas SET nama=:nama, kompetensi_keahlian=:kompetensi_keahlian  WHERE id=:id");
        $this->db->bind('id', $id);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kompetensi_keahlian', $data['kompetensi_keahlian']);
        return $this->db->rowCount();
    }
    public function delete($id)
    {
        $this->db->query("DELETE FROM kelas WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->rowCount();
    }
}