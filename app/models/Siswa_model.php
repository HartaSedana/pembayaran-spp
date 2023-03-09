<?php

class Siswa_model 
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllSiswa()
    {
        $this->db->query("SELECT * FROM siswa_view");
        return $this->db->resultAll();
    }
    public function showSiswa($id)
    {
        $this->db->query("SELECT * FROM siswa_view WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function store($data)
    {
        try{
            $this->db->beginTransaction();

            $this->db->query("INSERT INTO pengguna(username, password, role) VALUES(:username, :password, :role)");
            $this->db->bind('username', $data['nis']);
            $this->db->bind('password', md5($data['password']));
            $this->db->bind('role', 'siswa');
            $lastInsertId = $this->db->exeGetId();
    
            $this->db->query("INSERT INTO siswa(nisn, nis, nama, alamat, telepon, id_kelas, id_pembayaran, id_pengguna) VALUES(:nisn, :nis, :nama, :alamat, :telepon, :id_kelas, :id_pembayaran, :id_pengguna)");
            $this->db->bind('nisn', $data['nisn']);
            $this->db->bind('nis', $data['nis']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('alamat', $data['alamat']);
            $this->db->bind('telepon', $data['telepon']);
            $this->db->bind('id_kelas', $data['id_kelas']);
            $this->db->bind('id_pembayaran', $data['id_pembayaran']);
            $this->db->bind('id_pengguna', $lastInsertId);
            $this->db->execute();
    
            $this->db->commit();
            return 1;
        }catch(PDOException){
            $this->db->rollBack();
            return 0;
        }
    }
    public function getSiswa($id)
    {
        $this->db->query("SELECT * FROM siswa WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function update($id, $data)
    {
        try{
            $this->db->beginTransaction();
            if(!empty($data['password']))
            {
                $this->db->query("UPDATE pengguna SET username=:username, password=:password WHERE id=:id_pengguna");
                $this->db->bind('username', $data['nis']);
                $this->db->bind('password',md5( $data['password']));
                $this->db->bind('id_pengguna', $data['id_pengguna']);
                $this->db->execute();
            }else
            {
                $this->db->query("UPDATE pengguna SET username=:username WHERE id=:id_pengguna");
                $this->db->bind('username', $data['nis']);
                $this->db->bind('id_pengguna', $data['id_pengguna']);
                $this->db->execute();
            }
            $this->db->query("UPDATE siswa SET nisn=:nisn, nis=:nis, nama=:nama, alamat=:alamat, telepon=:telepon, id_pembayaran=:id_pembayaran, id_kelas=:id_kelas WHERE id=:id");
            $this->db->bind('nisn', $data['nisn']);
            $this->db->bind('nis', $data['nis']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('alamat', $data['alamat']);
            $this->db->bind('telepon', $data['telepon']);
            $this->db->bind('id_pembayaran', $data['id_pembayaran']);
            $this->db->bind('id_kelas', $data['id_kelas']);
            $this->db->bind('id', $id);
            $this->db->execute();

            $this->db->commit();
            return true;
        }catch(PDOException){
            $this->db->rollBack();
            return false;
        }
    }
    public function delete($id)
    {
        $idPengguna = $this->showSiswa($id)['id_pengguna'];
        try{
            $this->db->beginTransaction();
            $this->db->query("DELETE FROM pengguna WHERE id=:id");
            $this->db->bind('id', $idPengguna);
            $this->db->execute();

            $this->db->query("DELETE FROM siawa WHERE id=:id");
            $this->db->bind('id', $id);
            $this->db->execute();
            $this->db->commit();
            return true;
        }catch(PDOException)
        {
            $this->db->rollBack();
            return false;
        }
    }
}