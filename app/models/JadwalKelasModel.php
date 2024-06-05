<?php

class JadwalKelasModel {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getJadwalKelasByKelasByHari($id_kelas, $hari)
    {
        $this->db->query('SELECT jadwal_kelas.id, jadwal_kelas.jam, pelajaran.nama, pelajaran.guru
        FROM jadwal_kelas INNER JOIN pelajaran ON jadwal_kelas.id_pelajaran = pelajaran.id
        WHERE jadwal_kelas.id_kelas = :id_kelas AND jadwal_kelas.hari = :hari ORDER BY jadwal_kelas.jam ASC');
        $this->db->bind('id_kelas', $id_kelas);
        $this->db->bind('hari', $hari);

        $this->db->execute();
        return $this->db->resultSet();
    }

    public function addJadwalKelas($data)
    {
        $this->db->query("INSERT INTO jadwal_kelas VALUES('', :id_kelas, :id_pelajaran, :hari, :jam)");
        $this->db->bind('id_kelas', $data['id_kelas']);
        $this->db->bind('id_pelajaran', $data['id_pelajaran']);
        $this->db->bind('hari', $data['hari']);
        $this->db->bind('jam', $data['jam']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteJadwalKelas($id)
    {
        $this->db->query("DELETE FROM  jadwal_kelas WHERE id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
        
        return $this->db->rowCount();
    }
}