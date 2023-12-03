<?php
session_start();

class Login extends Controller {

    public function index() {
        $data['judul'] = 'Login';
        $this->view('templates/sidebar');
        $this->view('templates/header', $data);
        $this->view('login/index', $data);
        $this->view('templates/footer');
    }

    public function processLogin() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->model('Login_model')->checkLogin($username, $password);

        if ($user) {
            // Login berhasil, implementasikan sesuai kebutuhan aplikasi Anda
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['nama'];

            header("Location: " . BASEURL . "/home");
            exit();
        } else {
            // Login gagal, mungkin tampilkan pesan kesalahan atau redirect ke halaman login
            echo "Login gagal. Periksa kembali username dan password Anda.";
        }
    }
}
