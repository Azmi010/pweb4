<?php 

class Validasi extends Controller {
    public function index()
    {
        $data['judul'] = 'Validasi SKPI';
        $data['mhs'] = $this->model('Validasi_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('validasi_skpi/index', $data);
        $this->view('templates/footer');
    }
    public function detail_validasi($id) {
        $data['judul'] = 'Detail Validasi';
        $data['mhs'] = $this->model('Validasi_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('validasi_skpi/detail_validasi', $data);
        $this->view('templates/footer');
    }
}