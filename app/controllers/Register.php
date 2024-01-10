<?php

session_start();
class Register extends Controller {

    public function index() {
        $data['head_title'] = 'Register';
        $registerModel = $this->model('Register_model');
        $data['roles'] = $registerModel->getRoles();
        $data['prodi'] = $registerModel->getProdi();
        $this->view('register/index', $data);
    }

    public function processRegister() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $nip_nim = $_POST['nip_nim'];
            $status = $_POST['status'];
            $prodi = $_POST['prodi'];
            $password = $_POST['password'];

            $registerModel = $this->model('Register_model');

            switch ($status) {
                case 'Mahasiswa':
                    $registerModel->registerMahasiswa($nama, $nip_nim, $prodi, $password);
                    header("Location: " . BASEURL . "/?url=Login");
                    break;
                case 'Tim SKPI':
                    $registerModel->registerTimSkpi($nama, $nip_nim, $password);
                    header("Location: " . BASEURL . "/?url=Login");
                    break;
                case 'Operator Akademik':
                    $registerModel->registerOperatorAkademik($nama, $nip_nim, $password);
                    header("Location: " . BASEURL . "/?url=Login");
                    break;
                case 'Wakil Dekan':
                    $registerModel->registerDekan($nama, $nip_nim, $password);
                    header("Location: " . BASEURL . "/?url=Login");
                    break;
                default:
                    echo "Status tidak valid.";
                    break;
            }

            echo "Registrasi berhasil!";
        }
    }
}
