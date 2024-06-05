<?php

class OrganisasiModel {
    private $table = 'siswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getOrganisasi()
    {
        $this->db->query('SELECT * FROM organisasi');
        return $this->db->resultSet();
    }

    public function addOrganisasi($data)
    {
        $this->db->query("INSERT INTO organisasi VALUES('', :nama, :ketua, :penanggung_jawab)");
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('ketua', $data['ketua']);
        $this->db->bind('penanggung_jawab', $data['penanggung_jawab']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteOrganisasi($id)
    {
        $this->db->query("DELETE FROM organisasi WHERE id=:id");
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}