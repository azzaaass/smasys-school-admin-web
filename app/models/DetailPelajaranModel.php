<?php

class DetailPelajaranModel
{
    private $table = 'detail_pelajaran';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getDetailPelajaranByKelas($id_kelas)
    {
        $this->db->query('SELECT detail_pelajaran.id, detail_pelajaran.id_kelas, detail_pelajaran.id_pelajaran, pelajaran.nama, pelajaran.guru FROM detail_pelajaran INNER JOIN pelajaran ON detail_pelajaran.id_pelajaran = pelajaran.id WHERE detail_pelajaran.id_kelas=:id_kelas');
        $this->db->bind('id_kelas', $id_kelas);

        return $this->db->resultSet();
    }

    public function addDetailPelajaran($data)
    {
        $query = "INSERT INTO detail_pelajaran VALUES('', :id_kelas, :id_pelajaran)";
        $this->db->query($query);
        $this->db->bind('id_kelas', $data['id_kelas']);
        $this->db->bind('id_pelajaran', $data['id_pelajaran']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteDetailPelajaran($id)
    {
        $query = "DELETE FROM detail_pelajaran WHERE id= :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}