<?php 

class Persetujuan extends Controller {
    public function index()
    {
        $data['judul'] = 'Persetujuan SKPI';
        $this->view('templates/header', $data);
        $this->view('persetujuan_skpi/index', $data);
        $this->view('templates/footer');
    }
    public function draft_skpi() {
        $data['judul'] = 'Detail Validasi';
        $this->view('templates/header', $data);
        $this->view('persetujuan_skpi/draft_skpi');
        $this->view('templates/footer');
    }
}