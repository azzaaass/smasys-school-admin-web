<?php

class Organisasi extends Controller {

    public function __construct()
    {
        AuthHelper::redirectIfNotAuthenticated();
    }
    public function index()
    {
        $data['title'] = 'SMASYS | Organisasi';
        $data['is_organisasi'] = true;
        $data['organisasis'] = $this->model('OrganisasiModel')->getOrganisasi();

        $this->view('templates/sidebar', $data);
        $this->view('organisasi/index', $data);
        $this->view('templates/footer');
    }
    
    public function detail($id)
    {
        $data['title'] = 'SMASYS | Detail Kelas';
        $data['is_organisasi'] = true;
        $data['id_organisasi'] = $id;

        $data['anggota_organisasis'] = $this->model('AnggotaOrganisasiModel')->getAnggotaOrganisasiByOrganisasi($id);
        $data['siswas'] = $this->model('SiswaModel')->getSiswaWithKelas();
        // var_dump($data['anggota_organisasis']);
        $this->view('templates/sidebar', $data);
        $this->view('organisasi/detail', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = 'SMASYS | Add Organisasi';
        $data['is_organisasi'] = true;

        $this->view('templates/sidebar', $data);
        $this->view('organisasi/add', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        if ($this->model('OrganisasiModel')->addOrganisasi($_POST)) {
            Flasher::setFlasher('success', 'Berhasil menambahkan data');
            header('Location: ' . BASEURL . '/organisasi/index');
            exit;
        } else {
            Flasher::setFlasher('error', 'Gagal menambahkan data');
            header('Location: ' . BASEURL . '/organisasi/index');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('OrganisasiModel')->deleteOrganisasi($id)) {
            Flasher::setFlasher('success', 'Berhasil menghapus data');
            header('Location: ' . BASEURL . '/organisasi/index');
            exit;
        } else {
            Flasher::setFlasher('error', 'Gagal menghapus data');
            header('Location: ' . BASEURL . '/organisasi/index');
            exit;
        }
    }
}