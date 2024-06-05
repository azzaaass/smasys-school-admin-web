<?php

class Dashboard extends Controller
{
   
    public function index()
    {
        $data['title'] = 'SMASYS | Dashboard';
        $data['is_dashboard'] = true;
        
        $dashboardModel = $this->model('DashboardModel');
        $totalGuru = $dashboardModel->getTotalGuru();

        $totalPelajaran = $dashboardModel->getTotalPelajaran();
        $totalSiswa = $dashboardModel->getTotalSiswa();
        $totalOrganisasi = $dashboardModel->getTotalOrganisasi();
    
        $data['totalGuru'] = $totalGuru['total'];
        $data['totalPelajaran'] = $totalPelajaran['total'];
        $data['totalSiswa'] = $totalSiswa['total'];
        $data['totalOrganisasi'] = $totalOrganisasi['total'];
    
      
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
    
}

?>
