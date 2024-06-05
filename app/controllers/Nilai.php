<?php

class nilai extends Controller
{

    public function detailNilai($id_kelas, $id)
    {
        $data['title'] = 'SMASYS | Detail Nilai';
        $data['is_siswa'] = true;
        $data['id_kelas'] = $id_kelas;
        $data['id_siswa'] = $id;
        // $data['siswa'] = $this->model('SiswaModel')->getDetailSiswa($id);
        $data['nilais'] = $this->model('NilaiModel')->getNilaiWithPelajaranBySiswa($id);
        // $data['pelajarans'] = $this->model('DetailPelajaranModel')->getDetailPelajaranByKelas($id_kelas);
        $data['nilai_nulls'] = $this->model('NilaiModel')->getNilaiNull($id, $id_kelas);
        $data['nilai_deletes'] = $this->model('NilaiModel')->getNilaiDelete($id, $id_kelas);
        // var_dump($data['nilai_deletes']);

        $this->view('templates/sidebar', $data);
        $this->view('siswa/detailNilai', $data);
        $this->view('templates/footer');
    }
    public function store()
    {
        if ($this->model('NilaiModel')->addNilai($_POST)) {
            Flasher::setFlasher('success', 'Berhasil menambahkan data');
            header('Location: ' . BASEURL . '/nilai/detailnilai/' . $_POST['id_kelas'] . '/' . $_POST['id_siswa']);
            exit;
        } else {
            Flasher::setFlasher('error', 'Gagal menambahkan data');
            header('Location: ' . BASEURL . '/nilai/detailnilai/' . $_POST['id_kelas'] . '/' . $_POST['id_siswa']);
            exit;
        }
    }

    public function update()
    {
        if ($this->model('NilaiModel')->updateNilai($_POST)) {
            $data = $this->model('SiswaModel')->getSiswaAVG($_POST['id_siswa']);
            $this->model('SiswaModel')->updateNilaiSiswa($_POST['id_siswa'], $data['nilai_avg']);
            Flasher::setFlasher('success', 'Berhasil update data');
            header('Location: ' . BASEURL . '/nilai/detailnilai/' . $_POST['id_kelas'] . '/' . $_POST['id_siswa']);
            exit;
        } else {
            Flasher::setFlasher('error', 'Gagal update data');
            header('Location: ' . BASEURL . '/nilai/detailnilai/' . $_POST['id_kelas'] . '/' . $_POST['id_siswa']);
            exit;
        }
    }

    public function delete()
    {
        if ($this->model('NilaiModel')->deleteNilai($_POST)) {
            Flasher::setFlasher('success', 'Berhasil menghapus data');
            header('Location: ' . BASEURL . '/nilai/detailnilai/' . $_POST['id_kelas'] . '/' . $_POST['id_siswa']);
            exit;
        } else {
            Flasher::setFlasher('error', 'Gagal menghapus data');
            header('Location: ' . BASEURL . '/nilai/detailnilai/' . $_POST['id_kelas'] . '/' . $_POST['id_siswa']);
            exit;
        }
    }
}