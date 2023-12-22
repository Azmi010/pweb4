<?php

class Skpi extends Controller {
    public function index() {
        
        $this->view('skpi/index');
    }
    
    public function prestasi($action = 'index', $id = 0) {
        $data['judul'] = 'Input SKPI';
        $this->view('templates/header', $data);
        $data['id_mahasiswa'] = $_SESSION['id_mhs'];
        $data['nama_mahasiswa'] = $_SESSION['mahasiswa'];
        $data['nim'] = $_SESSION['nim'];
        
        $data['item_skpi'] = $this->model('SkpiModel')->getAllOfMhs($data['id_mahasiswa']);

        if ($action == 'delete') {
            $this->model('SkpiModel')->delete($id);
            header("Location: " . BASEURL . "?url=Skpi/prestasi/");
            exit;
        }
        
        elseif ($action == 'edit') {
            $data['item_skpi'] = $this->model('SkpiModel')->getById($id);
            $data['peserta'] = $this->model('SkpiModel')->getAllPeserta($id);

            if($data['item_skpi']['id_mahasiswa'] != $data['id_mahasiswa'] || !isset($data))
                $data = NULL;
        }


        $skpiAttr = $this->model('SkpiAttrModel');
        $data['kategori'] = $skpiAttr->getAll('kategori');
        $data['unsur'] = $skpiAttr->getAll('unsur');
        $data['butir'] = $skpiAttr->getAll('butir');
        $data['sub_butir'] = $skpiAttr->getAll('sub_butir');
        $this->view("skpi/prestasi/$action", $data);
    }

    public function addPrestasi() {
        session_start();
        $_POST['id_mahasiswa'] = $_SESSION['id_mhs'];
        $_POST['nim_mahasiswa'] = $_SESSION['nim'];
        $row_count = $this->model('SkpiModel')->insert($_POST, $_FILES);
        if ($row_count > 0) echo 'success';
        else echo 'failed';
    }

    public function editPrestasi() {
        session_start();
        $_POST['nim_mahasiswa'] = $_SESSION['nim'];
        $row_count = $this->model('SkpiModel')->update($_POST, $_FILES);
        if ($row_count > 0) echo 'success';
        else echo 'failed';
    }

    public function deletePeserta($id_peserta_item) {
        $this->model('SkpiModel')->deletePeserta($id_peserta_item);
    }
}
?>