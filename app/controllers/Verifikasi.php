<?php 

class Verifikasi extends Controller {
    public function index()
    {
        $data['head_title'] = 'Verifikasi SKPI';
        $data['verif'] = $this->model('Verifikasi_model')->getAllVerifikasi();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('verifikasi_skpi/index', $data);
        $this->view('templates/footer');
    }
    public function draft_skpi($id) {
        $data['head_title'] = 'Draft SKPI';
        $this->view('templates/header', $data);
        $this->view('verifikasi_skpi/draft_skpi', $data);
        $this->view('templates/footer');
    }
    public function updateVerification() {
        $this->model('Verifikasi_model')->updateVerificationStatus($_POST['id']);
    }
    public function revertVerification() {
        $this->model('Verifikasi_model')->revertVerificationStatus($_POST['id']);
    }
}