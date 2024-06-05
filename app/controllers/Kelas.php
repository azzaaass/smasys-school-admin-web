<?php

class Kelas extends Controller
{

    public function __construct()
    {
        AuthHelper::redirectIfNotAuthenticated();
    }
    public function index()
    {
        $data['title'] = 'SMASYS | Kelas';
        $data['is_kelas'] = true;
        $data['kelases'] = $this->model('KelasModel')->getKelasWithJurusan();
        
        $this->view('templates/sidebar', $data);
        $this->view('kelas/index', $data);
        $this->view('templates/footer');
    }
    
    public function detail($id)
    {
        $data['title'] = 'SMASYS | Detail Kelas';
        $data['is_kelas'] = true;
        $data['id_kelas'] = $id;
        $data['siswas'] = $this->model('SiswaModel')->getSiswaByKelas($id);
        $data['detail_pelajarans'] = $this->model('DetailPelajaranModel')->getDetailPelajaranByKelas($id);
        $data['pelajarans'] = $this->model('PelajaranModel')->getPelajaran();
        $data['senins'] = $this->model('JadwalKelasModel')->getJadwalKelasByKelasByHari($id, 1);
        $data['selasas'] = $this->model('JadwalKelasModel')->getJadwalKelasByKelasByHari($id, 2);
        $data['rabus'] = $this->model('JadwalKelasModel')->getJadwalKelasByKelasByHari($id, 3);
        $data['kamises'] = $this->model('JadwalKelasModel')->getJadwalKelasByKelasByHari($id, 4);
        $data['jumats'] = $this->model('JadwalKelasModel')->getJadwalKelasByKelasByHari($id, 5);

        // var_dump($data['detail_pelajarans']);

        $this->view('templates/sidebar', $data);
        $this->view('kelas/detail', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = 'SMASYS | Add Kelas';
        $data['is_kelas'] = true;

        $this->view('templates/sidebar', $data);
        $this->view('kelas/add', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        if ($this->model('KelasModel')->addKelas($_POST)) {
            Flasher::setFlasher('success', 'Berhasil menambahkan data');
            header('Location: ' . BASEURL . '/kelas/index');
            exit;
        } else {
            Flasher::setFlasher('error', 'Gagal menambahkan data');
            header('Location: ' . BASEURL . '/kelas/index');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('KelasModel')->deleteKelas($id) > 0) {
            Flasher::setFlasher('success', 'Data berhasil dihapus');
            header('Location: ' . BASEURL . '/kelas/index');
            exit;
        } else {
            Flasher::setFlasher('error', 'Data gagal dihapus');
            header('Location: ' . BASEURL . '/kelas/index');
            exit;
        }
    }

}