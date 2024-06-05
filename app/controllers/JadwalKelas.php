<?php

class JadwalKelas extends Controller{
    public function store()
    {
        if ($this->model('JadwalKelasModel')->addJadwalKelas($_POST)) {
            Flasher::setFlasher('success', 'Berhasil menambahkan data');
            header('Location: ' . BASEURL . '/kelas/detail/' . $_POST['id_kelas']);
            exit;
        } else {
            Flasher::setFlasher('error', 'Gagal menambahkan data');
            header('Location: ' . BASEURL . '/kelas/detail/'  . $_POST['id_kelas']);
            exit;
        }
    }
    
    public function delete($id, $id_kelas)
    {
        if ($this->model('JadwalKelasModel')->deleteJadwalKelas($id)) {
            Flasher::setFlasher('success', 'Berhasil menghapus data');
            header('Location: ' . BASEURL . '/kelas/detail/' . $id_kelas);
            exit;
        } else {
            Flasher::setFlasher('error', 'Gagal menghapus data');
            header('Location: ' . BASEURL . '/kelas/detail/'  . $id_kelas);
            exit;
        }
    }
}