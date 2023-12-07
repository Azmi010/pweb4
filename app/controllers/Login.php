<?php
session_start();

class Login extends Controller {

    public function index() {
        $data['judul'] = 'Login';
        $this->view('login/index', $data);
        $this->view('templates/footer');
    }

    public function processLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $loginModel = $this->model('Login_model');
            $user = $loginModel->checkLogin($username, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id_akun'];
                $_SESSION['mahasiswa'] = $user['nama_mahasiswa'];
                $_SESSION['id_mhs'] = $user['id_mahasiswa'];
                $_SESSION['tim_skpi'] = $user['nama_tim_skpi'];
                $_SESSION['operator_akademik'] = $user['nama_operator_akademik'];
                $_SESSION['dekan'] = $user['nama_dekan'];
                $_SESSION['nim'] = $user['nim'];
                $_SESSION['nip_tim_skpi'] = $user['nip_tim_skpi'];
                $_SESSION['nip_dekan'] = $user['nip_dekan'];
                $_SESSION['nip_operator_akademik'] = $user['nip_operator_akademik'];
                $_SESSION['role'] = $user['id_role'];

                $this->redirectToRole($user['id_role']);
            } else {
                echo "Login gagal. Periksa kembali username dan password Anda.";
            }
        }
    }

    private function redirectToRole($role) {
        switch ($role) {
            case 1:
                // var_dump($role);
                header("Location: " . BASEURL . "/?url=home");
                break;
            case 2:
                // var_dump($role);
                header("Location: " . BASEURL . "/?url=home");
                break;
            case 4:
                // var_dump($role);
                header("Location: " . BASEURL . "/?url=validasi");
                break;
            case 3:
                // var_dump($role);
                header("Location: " . BASEURL . "/?url=persetujuan");
                break;
            default:
                echo "Role tidak valid.";
                break;
        }

        exit();
    }
}
