<?php 

class Validasi extends Controller {
    public function index()
    {
        $data['judul'] = 'Validasi SKPI';
        $data['mhs'] = $this->model('Validasi_model')->getAllValidasi();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('validasi_skpi/index', $data);
        $this->view('templates/footer');
    }
    public function detail_validasi($id) {
        $data['judul'] = 'Detail Validasi';
        $data['mhs'] = $this->model('Validasi_model')->getMahasiswaById($id);
        // $data['update'] = $this->model('Validasi_model')->updateValidasi($id);
        $this->view('templates/header', $data);
        $this->view('validasi_skpi/detail_validasi', $data);
        $this->view('templates/footer');
    }
}