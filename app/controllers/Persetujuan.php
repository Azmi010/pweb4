<?php 

class Persetujuan extends Controller {
    public function index()
    {
        $data['judul'] = 'Persetujuan SKPI';
        $data['mhs'] = $this->model('Persetujuan_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('persetujuan_skpi/index', $data);
        $this->view('templates/footer');
    }
    public function draft_skpi($id) {
        $data['judul'] = 'Draft SKPI';
        $data['mhs'] = $this->model('Persetujuan_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('persetujuan_skpi/draft_skpi', $data);
        $this->view('templates/footer');
    }
}