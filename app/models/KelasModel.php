<?php

class KelasModel
{
    private $table = 'kelas';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getKelas()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    
    public function getDetailKelas($id)
    {
        $this->db->query('SELECT * FROM kelas WHERE id=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function getKelasWithJurusan()
    {
        $this->db->query('SELECT kelas.id, kelas.nama, kelas.ketua_kelas, kelas.wali_kelas, kelas.tingkat, kelas.tahun_ajar, jurusan.nama AS jurusan_nama FROM kelas INNER JOIN jurusan ON kelas.id_jurusan = jurusan.id');
        return $this->db->resultSet();
    }

    public function addKelas($data)
    {
        $query = "INSERT INTO kelas VALUES('', :id_jurusan, :nama, :ketua_kelas, :wali_kelas, :tingkat, :tahun_ajar)";
        $this->db->query($query);

        $this->db->bind('id_jurusan', $data['id_jurusan']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('ketua_kelas', $data['ketua_kelas']);
        $this->db->bind('wali_kelas', $data['wali_kelas']);
        $this->db->bind('tingkat', $data['tingkat']);
        $this->db->bind('tahun_ajar', $data['tahun_ajar']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteKelas($id)
    {
        $query = "DELETE FROM kelas WHERE id= :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

}