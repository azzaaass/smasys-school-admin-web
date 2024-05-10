<?php

class Kelas extends Controller
{
    public function index()
    {
        $data['title'] = 'SMASYS | Kelas';
        $this->view('templates/sidebar', $data);
        $this->view('kelas/index', $data);
        $this->view('templates/footer', $data);
    }
}