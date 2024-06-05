<?php

class DetailPelajaran extends Controller
{

    public function store()
    {
        if ($this->model('DetailPelajaranModel')->addDetailPelajaran($_POST)) {
            Flasher::setFlasher('success', 'Berhasil menambahkan data');
            header('Location: ' . BASEURL . '/kelas/detail/' . $_POST['id_kelas']);
            exit;
        } else {
            Flasher::setFlasher('error', 'Gagal menambahkan data');
            header('Location: ' . BASEURL . '/kelas/detail/' . $_POST['id_kelas']);
            exit;
        }
    }

    public function delete($id, $id_kelas)
    {
        if ($this->model('DetailPelajaranModel')->deleteDetailPelajaran($id) > 0) {
            Flasher::setFlasher('success', 'Data berhasil dihapus');
            header('Location: ' . BASEURL . '/kelas/detail/' . $id_kelas);
            exit;
        } else {
            Flasher::setFlasher('error', 'Data gagal dihapus');
            header('Location: ' . BASEURL . '/kelas/detail/' . $id_kelas);
            exit;
        }
    }
}