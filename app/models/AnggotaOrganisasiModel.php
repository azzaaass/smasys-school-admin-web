<?php

class AnggotaOrganisasiModel
{
    private $table = 'anggota_organisasi';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAnggotaOrganisasiByOrganisasi($id)
    {
        $query = "CREATE TEMPORARY TABLE _siswa AS
        SELECT siswa.id, siswa.nama, siswa.id_kelas, kelas.nama AS nama_kelas
        FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id;";
        $this->db->query($query);
        $this->db->execute();

        $query2 = "SELECT anggota_organisasi.id, anggota_organisasi.id_siswa, _siswa.nama, _siswa.nama_kelas 
        FROM anggota_organisasi INNER JOIN _siswa ON anggota_organisasi.id_siswa = _siswa.id 
        WHERE anggota_organisasi.id_organisasi = :id;";
        $this->db->query($query2);
        $this->db->bind('id', $id);


        $this->db->execute();
        return $this->db->resultSet();
    }

    public function addAnggotaOrganisasi($data)
    {
        $query = "INSERT INTO anggota_organisasi VALUES('', :id_organisasi, :id_siswa)";
        $this->db->query($query);

        $this->db->bind('id_organisasi', $data['id_organisasi']);
        $this->db->bind('id_siswa', $data['id_siswa']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteAnggotaOrganisasi($id)
    {
        $query = "DELETE FROM anggota_organisasi WHERE id= :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}