<?php 

class Validasi extends Controller {
    public function index()
    {
        $data['judul'] = 'Validasi SKPI';
        $this->view('templates/header', $data);
        $this->view('validasi_skpi/index', $data);
        $this->view('templates/footer');
    }
    public function detail_validasi() {
        $data['judul'] = 'Detail Validasi';
        $this->view('templates/header', $data);
        $this->view('validasi_skpi/detail_validasi');
        $this->view('templates/footer');
    }
}