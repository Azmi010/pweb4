<?php 

class Validasi extends Controller {
    public function index()
    {
        $data['head_title'] = 'Validasi SKPI';
        $data['mhs'] = $this->model('Validasi_model')->getAllValidasi();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('validasi_skpi/index', $data);
        $this->view('templates/footer');
    }
    public function detail_validasi($id) {
        $data['head_title'] = 'Detail Validasi';
        $data['mhs'] = $this->model('Validasi_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('validasi_skpi/detail_validasi', $data);
        $this->view('templates/footer');
    }
    public function updateValidationStatus($id_item_skpi) {
        $data['update'] = $this->model('Validasi_model')->updateValidationStatus($id_item_skpi);
        if ($data['update']) {
            echo "Success";
        } else {
            echo "Error";
        }
    }
}