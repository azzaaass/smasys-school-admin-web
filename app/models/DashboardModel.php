<?php

class DashboardModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getTotalGuru()
    {
        $this->db->query('SELECT COUNT(DISTINCT guru) AS total FROM pelajaran');
        return $this->db->single();
    }

    public function getTotalPelajaran()
    {
        $this->db->query('SELECT COUNT(DISTINCT nama) AS total FROM pelajaran');
        return $this->db->single();
    }

    public function getTotalSiswa()
    {
        $this->db->query('SELECT COUNT(*) AS total FROM siswa');
        return $this->db->single();
    }
    
    public function getTotalOrganisasi()
{
    $this->db->query('SELECT COUNT(*) AS total FROM organisasi');
    return $this->db->single();
}

}
?>
