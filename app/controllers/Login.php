<?php
// session_start();

class Login extends Controller {

    public function index() {
        $data['head_title'] = 'Login';
        if (isset($_SESSION['flash_message'])) {
            $data['error_message'] = $_SESSION['flash_message'];
            unset($_SESSION['flash_message']);
        }
        $this->view('login/index', $data);
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
                echo "Login gagal";
            }
        }
    }

    private function redirectToRole($role) {
        var_dump($role);
        switch ($role) {
            case 1:
                // var_dump($role);
                header("Location: " . BASEURL . "/?url=Skpi");
                break;
            case 2:
                header("Location: " . BASEURL . "/?url=Verifikasi");
                break;
            case 3:
                header("Location: " . BASEURL . "/?url=Validasi");
                break;
            case 4:
                header("Location: " . BASEURL . "/?url=Persetujuan");
                break;
            default:
            var_dump($role);
                echo "Role tidak valid.";
                break;
        }

        exit();
    }

    public function logout() {
        header("Location:" . BASEURL . "/?url=Login");
        session_destroy();  
        exit();
    }
}
