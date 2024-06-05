<?php

class NilaiModel
{
    private $table = 'nilai';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getNilaiWithPelajaranBySiswa($id_siswa)
    {
        $this->db->query('SELECT nilai.id, nilai.id_siswa, nilai.id_pelajaran, nilai.nilai, pelajaran.nama FROM nilai INNER JOIN pelajaran ON nilai.id_pelajaran = pelajaran.id WHERE id_siswa=:id_siswa');
        $this->db->bind('id_siswa', $id_siswa);

        return $this->db->resultSet();
    }

    public function getNilaiNull($id, $id_kelas)
    {
        $this->db->query('CREATE TEMPORARY TABLE _nilai AS SELECT id, id_pelajaran, nilai FROM nilai WHERE nilai.id_siswa = :id_siswa;');
        $this->db->bind('id_siswa', $id);
        $this->db->execute();
        
        $this->db->query('CREATE TEMPORARY TABLE _detail_pelajaran AS
        SELECT detail_pelajaran.id, detail_pelajaran.id_kelas, detail_pelajaran.id_pelajaran, pelajaran.nama
        FROM detail_pelajaran INNER JOIN pelajaran ON detail_pelajaran.id_pelajaran = pelajaran.id WHERE id_kelas = :id_kelas;');
        $this->db->bind('id_kelas', $id_kelas);
        $this->db->execute();

        $this->db->query('SELECT _detail_pelajaran.id, _detail_pelajaran.nama, _nilai.id_pelajaran, _detail_pelajaran.id_pelajaran as id_pelajaran_target FROM _detail_pelajaran
        LEFT OUTER JOIN _nilai ON _detail_pelajaran.id_pelajaran = _nilai.id_pelajaran WHERE _nilai.id_pelajaran IS NULL;');
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getNilaiDelete($id, $id_kelas)
    {
        $this->db->query('CREATE TEMPORARY TABLE _nilai AS SELECT nilai.id, nilai.id_pelajaran, nilai.nilai, pelajaran.nama FROM nilai INNER JOIN pelajaran ON nilai.id_pelajaran = pelajaran.id WHERE nilai.id_siswa = :id_siswa;');
        $this->db->bind('id_siswa', $id);
        $this->db->execute();
        
        $this->db->query('CREATE TEMPORARY TABLE _detail_pelajaran AS SELECT detail_pelajaran.id, detail_pelajaran.id_kelas, detail_pelajaran.id_pelajaran, pelajaran.nama FROM detail_pelajaran INNER JOIN pelajaran ON detail_pelajaran.id_pelajaran = pelajaran.id WHERE id_kelas = :id_kelas;');
        $this->db->bind('id_kelas', $id_kelas);
        $this->db->execute();

        $this->db->query('SELECT _nilai.id, _nilai.id_pelajaran, _nilai.nama FROM _nilai LEFT OUTER JOIN _detail_pelajaran ON _detail_pelajaran.id_pelajaran = _nilai.id_pelajaran WHERE _detail_pelajaran.id_pelajaran IS NULL;');
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function addNilai($data)
    {
        $this->db->query("INSERT INTO nilai VALUES('', :id_siswa, :id_pelajaran, :nilai)");
        $this->db->bind('id_siswa', $data['id_siswa']);
        $this->db->bind('id_pelajaran', $data['id_pelajaran']);
        $this->db->bind('nilai', $data['nilai']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateNilai($data)
    {
        $this->db->query("UPDATE nilai SET nilai=:nilai WHERE id=:id");
        $this->db->bind('id', $data['id_nilai']);
        $this->db->bind('nilai', $data['nilai']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteNilai($data)
    {
        $this->db->query("DELETE FROM nilai WHERE id=:id");
        $this->db->bind('id', $data['id_nilai']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}