<?php

class Pelajaran extends Controller
{
    public function __construct()
    {
        AuthHelper::redirectIfNotAuthenticated();
    }

    public function index()
    {
        $data['title'] = 'SMASYS | Guru';
        $data['is_pelajaran'] = true;
        $data['sort_type'] = $_POST['sort_type'];
        $data['keyword'] = $_POST['keyword'];

        if ($data['sort_type'] == 'nip') {
            $data['pelajarans'] = $this->model('PelajaranModel')->sortPelajaranByNip();
        } else if ($data['sort_type'] == 'guru') {
            $data['pelajarans'] = $this->model('PelajaranModel')->sortPelajaranByGuru();
        } else if ($data['sort_type'] == 'name') {
            $data['pelajarans'] = $this->model('PelajaranModel')->sortPelajaranByName();
        } 
        else {
            $data['pelajarans'] = $this->model('PelajaranModel')->searchPelajaran($data['keyword']);
        }

        $this->view('templates/sidebar', $data);
        $this->view('pelajaran/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'SMASYS | Detail Kelas';
        $data['is_pelajaran'] = true;
        $data['id_pelajaran'] = $id;
        
        $data['pelajaran'] = $this->model('PelajaranModel')->getPelajaranById($id);

        $this->view('templates/sidebar', $data);
        $this->view('pelajaran/detail', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = 'SMASYS | Add Guru';
        $data['is_pelajaran'] = true;

        $this->view('templates/sidebar', $data);
        $this->view('pelajaran/add', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        if ($this->model('PelajaranModel')->addPelajaran($_POST)) {
            Flasher::setFlasher('success', 'Berhasil menambahkan data');
            header('Location: ' . BASEURL . '/pelajaran/index');
            exit;
        } else {
            Flasher::setFlasher('error', 'Gagal menambahkan data');
            header('Location: ' . BASEURL . '/pelajaran/index');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('PelajaranModel')->updatePelajaran($_POST)) {
            Flasher::setFlasher('success', 'Berhasil menambahkan data');
            header('Location: ' . BASEURL . '/pelajaran/index');
            exit;
        } else {
            Flasher::setFlasher('error', 'Gagal menambahkan data');
            header('Location: ' . BASEURL . '/pelajaran/index');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('PelajaranModel')->deletePelajaran($id) > 0) {
            Flasher::setFlasher('success', 'Data berhasil dihapus');
            header('Location: ' . BASEURL . '/pelajaran');
            exit;
        } else {
            Flasher::setFlasher('error', 'Data gagal dihapus');
            header('Location: ' . BASEURL . '/pelajaran');
            exit;
        }
    }

}