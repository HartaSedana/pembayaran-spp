<?php


class Transaksi_model 
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllTransaksi()
    {
        $this->db->query("SELECT * FROM transaksi_view");
        return $this->db->resultAll();
    }
    public function getTransaksi($id)
    {
        $this->db->query("SELECT * FROM transaksi WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function getTransaksiById($id)
    {
        $this->db->query("SELECT * FROM transaksi WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function getBulan($data)
    {
        $this->db->query("SELECT * FROM transaksi WHERE bulan_bayar=:bulan_bayar AND tahun_bayar=:tahun_bayar");
        $this->db->bind('bulan_bayar', $data['bulan_bayar']);
        $this->db->bind('tahun_bayar', date('Y', strtotime($data['tanggal_bayar'])));
        if($this->db->single() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function store($data)
    {
            try{
                $this->db->beginTransaction();
                $this->db->query("INSERT INTO transaksi (id_siswa, id_petugas, id_pembayaran, tanggal_bayar, bulan_bayar, tahun_bayar) VALUES(:id_siswa, :id_petugas, :id_pembayaran, :tanggal_bayar, :bulan_bayar, :tahun_bayar)");
                $this->db->bind('id_siswa', $data['id_siswa']);
                $this->db->bind('id_petugas', $_SESSION['user']['petugas_id']);
                $this->db->bind('id_pembayaran', $data['id_pembayaran']);
                $this->db->bind('tanggal_bayar', $data['tanggal_bayar']);
                $this->db->bind('bulan_bayar', $data['tanggal_bayar']);
                $this->db->bind('tahun_bayar', date('Y', strtotime($data['tanggal_bayar'])));
                $this->db->execute();
                $this->db->commit();
                return 1;
            }catch(PDOException)
            {
                $this->db->rollBack();
                return 0;
            }
    }
    public function update($id, $data)
    {
        try{
            $this->db->beginTransaction();
            $this->db->query("UPDATE transaksi SET id_siswa=:id_siswa, id_petugas=:id_petugas, id_pembayaran=:id_pembayaran, tanggal_bayar=:tanggal_bayar, bulan_bayar=:bulan_bayar, tahun_bayar=:tahun_bayar WHERE id=:id");
            $this->db->bind('id_siswa', $data['id_siswa']);
            $this->db->bind('id_petugas', $_SESSION['user']['petugas_id']);
            $this->db->bind('id_pembayaran', $data['id_pembayaran']);
            $this->db->bind('tanggal_bayar', $data['tanggal_bayar']);
            $this->db->bind('bulan_bayar', $data['bulan_bayar']);
            $this->db->bind('tahun_bayar', date('Y', strtotime($data['tanggal_bayar'])));
            $this->db->bind('id', $id);
            $this->db->execute();
            $this->db->commit();
            return 1;
        }catch(PDOException){
            $this->db->rollBack();
            return 0;
        }
    }
    public function delete($id)
    {
        try{
            $this->db->beginTransaction();
            $this->db->query("DELETE FROM transaksi WHERE id=:id");
            $this->db->bind('id', $id);
            $this->db->execute();
            $this->db->commit();
            return 1;
        }catch(PDOException){
            $this->db->rollBack();
            return 0;
        }
    }
}