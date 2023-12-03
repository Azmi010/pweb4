<?php

session_start();
class Register extends Controller {

    public function index() {
        $data['judul'] = 'Register';
        $data['roles'] = $this->model('Register_model')->getValidRoles();
        $this->view('templates/sidebar');
        $this->view('templates/header', $data);
        $this->view('register/index', $data);
        $this->view('templates/footer');
    }

    public function processRegistration() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $fakultas = $_POST['fakultas'];
            $prodi = $_POST['prodi'];
            $role = $_POST['role'];
            $password = $_POST['password'];

            $registerModel = $this->model('Register_model');
            $success = $registerModel->registerUser($nama, $nim, $fakultas, $prodi, $role, $password);

            if ($success) {
                // echo "Registrasi berhasil. Silakan login dengan akun yang baru dibuat.";
                header("Location: " . BASEURL . "/login");
                exit();
            } else {
                echo "Registrasi gagal. Silakan coba lagi.";
            }
        }
    }
}
