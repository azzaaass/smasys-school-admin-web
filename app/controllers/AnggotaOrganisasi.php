<?php

class AnggotaOrganisasi extends Controller
{
    public function delete($id, $id_organisasi)
    {
        if ($this->model('AnggotaOrganisasiModel')->deleteAnggotaOrganisasi($id) > 0) {
            Flasher::setFlasher('success', 'Data berhasil dihapus');
            header('Location: ' . BASEURL . '/organisasi/detail/' . $id_organisasi);
            exit;
        } else {
            Flasher::setFlasher('error', 'Data gagal dihapus');
            header('Location: ' . BASEURL . '/organisasi/detail/' . $id_organisasi);
            exit;
        }
    }

    public function store()
    {
        if ($this->model('AnggotaOrganisasiModel')->addAnggotaOrganisasi($_POST)) {
            Flasher::setFlasher('success', 'Berhasil menambahkan data');
            header('Location: ' . BASEURL . '/organisasi/detail/' . $_POST['id_organisasi']);
            exit;
        } else {
            Flasher::setFlasher('error', 'Gagal menambahkan data');
            header('Location: ' . BASEURL . '/organisasi/detail/' . $_POST['id_organisasi']);
            exit;
        }
    }
}