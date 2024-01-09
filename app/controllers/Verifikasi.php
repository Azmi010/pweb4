<?php 

class Verifikasi extends Controller {
    public function index()
    {
        $data['head_title'] = 'Verifikasi SKPI';
        $data['verif'] = $this->model('Verifikasi_model')->getAllVerifikasi();
        $data['peserta'] = $this->model('Verifikasi_model')->getAllName();
        $this->view('templates/header', $data);
        $this->view('verifikasi_skpi/index', $data);
        $this->view('templates/footer');
    }
    public function updateVerification() {
        $this->model('Verifikasi_model')->updateVerificationStatus($_POST['id']);
    }
    public function revertVerification() {
        $this->model('Verifikasi_model')->revertVerificationStatus($_POST['id']);
    }
    public function filebukti($id) {
        $data['file_bukti'] = $this->model('SkpiModel')->getAllFileBukti($id);
        $data['head_title'] = 'File Bukti';
        $this->view('templates/header', $data);
        $this->view('verifikasi_skpi/files', $data);
    }
}