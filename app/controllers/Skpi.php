<?php
// session_start();
class Skpi extends Controller {
    public function index() {
        
        $this->view('skpi/index');
    }
    
    public function prestasi($action = 'index', $id = 0) {
        $data['head_title'] = 'Input SKPI';
        $this->view('templates/header', $data);
        $data['id_mahasiswa'] = $_SESSION['id_mhs'];
        $data['nama_mahasiswa'] = $_SESSION['mahasiswa'];
        
        $data = $this->model('SkpiModel')->getAllOfMhs($data['id_mahasiswa']);
        if ($action == 'delete') {
            $this->model('SkpiModel')->delete($id);
            header("Location: " . BASEURL . "?url=Skpi/prestasi/");
            exit;
        }

        elseif ($action == 'edit') {
            $data = $this->model('SkpiModel')->getById($id);
            if (!isset($data)) $data = NULL;
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
        $row_count = $this->model('SkpiModel')->insert($_POST, $_FILES);
        if ($row_count > 0) echo 'success';
        else echo 'failed';
    }
    public function editPrestasi() {
        $row_count = $this->model('SkpiModel')->update($_POST, $_FILES);
        if ($row_count > 0) echo 'success';
        else echo 'failed';
    }
}
?>