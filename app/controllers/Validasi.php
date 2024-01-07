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
    public function updateValidation() {
        $this->model('Validasi_model')->updateValidationStatus($_POST['id']);
    }
    public function updateInvalidation() {
        $this->model('Validasi_model')->updateInvalidationStatus($_POST['id']);
    }
    public function getPoint() {
        echo json_encode($this->model('Validasi_model')->getPointById($_POST['id']));
    }
}