<?php

class Siswa extends Controller
{
    public function __construct()
    {
        AuthHelper::redirectIfNotAuthenticated();
    }
    public function index()
    {
        $data['title'] = 'SMASYS | Siswa';
        $data['is_siswa'] = true;
        $data['siswas'] = $this->model('SiswaModel')->getSiswaWithKelas();
        $data['siswas_not_kelas'] = $this->model('SiswaModel')->getSiswaNotKelas();

        $this->view('templates/sidebar', $data);
        $this->view('siswa/index', $data);
        $this->view('templates/footer');
    }
    
    public function add()
    {
        $data['title'] = 'SMASYS | Add Siswa';
        $data['is_siswa'] = true;
        $data['kelases'] = $this->model('KelasModel')->getKelas();

        $this->view('templates/sidebar', $data);
        $this->view('siswa/add', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        if ($this->model('SiswaModel')->addSiswa($_POST)) {
            Flasher::setFlasher('success', 'Berhasil menambahkan data');
            header('Location: ' . BASEURL . '/siswa/index');
            exit;
        } else {
            Flasher::setFlasher('error', 'Gagal menambahkan data');
            header('Location: ' . BASEURL . '/siswa/index');
            exit;
        }
    }

    public function detail($id)
    {
        $data['title'] = 'SMASYS | Preview Siswa';
        $data['is_siswa'] = true;
        $data['id_siswa'] = $id;
        $data['kelases'] = $this->model('KelasModel')->getKelas();
        $data['siswa'] = $this->model('SiswaModel')->getDetailSiswa($id);

        $this->view('templates/sidebar', $data);
        $this->view('siswa/detail', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        if ($this->model('SiswaModel')->updateSiswa($_POST)) {
            Flasher::setFlasher('success', 'Berhasil menambahkan data');
            header('Location: ' . BASEURL . '/siswa/index');
            exit;
        } else {
            Flasher::setFlasher('error', 'Gagal menambahkan data');
            header('Location: ' . BASEURL . '/siswa/index');
            exit;
        }
    }
public function search()
{
    $keyword = $_POST['keyword'];
    $search_type = $_POST['search_type'];
    
    $data['title'] = 'SMASYS | Siswa';
    $data['is_siswa'] = true;
    
    if ($search_type == 'nama') {
        $data['siswas'] = $this->model('SiswaModel')->searchSiswa($keyword);
    } else if ($search_type == 'kelas') {
        $data['siswas'] = $this->model('SiswaModel')->searchSiswaByKelas($keyword);
    }
    
    $this->view('templates/sidebar', $data);
    $this->view('siswa/index', $data);
    $this->view('templates/footer');
}

}