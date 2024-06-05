<?php

class PelajaranModel {
    private $table = 'pelajaran';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPelajaran()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPelajaranById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        
        return $this->db->single();
    }
    
    public function sortPelajaranByNip()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY nip ASC');
        return $this->db->resultSet();
    }

    public function sortPelajaranByNama()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY nama ASC');
        return $this->db->resultSet();
    }
    
    public function sortPelajaranByGuru()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY guru ASC');
        return $this->db->resultSet();
    }

    public function searchPelajaran($keyword)
    {
        $keyword = '%' . $keyword . '%';
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nip LIKE :nip OR nama LIKE :nama OR guru LIKE :guru');

        $this->db->bind('nip', $keyword);
        $this->db->bind('nama', $keyword);
        $this->db->bind('guru', $keyword);

        return $this->db->resultSet();
    }

    public function addPelajaran($data)
    {
        $query = "INSERT INTO pelajaran VALUES('', :nip, :nama, :guru)";
        $this->db->query($query);
        
        $this->db->bind('nip', $data['nip']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('guru', $data['guru']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updatePelajaran($data)
    {
        $query = "UPDATE pelajaran SET nip=:nip, guru=:guru, nama=:nama WHERE id=:id";
        $this->db->query($query);
        
        $this->db->bind('id', $data['id']);
        $this->db->bind('nip', $data['nip']);
        $this->db->bind('guru', $data['guru']);
        $this->db->bind('nama', $data['nama']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deletePelajaran($id)
    {
        $query = "DELETE FROM pelajaran WHERE id= :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

}