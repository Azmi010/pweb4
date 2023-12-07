<?php
    class Skpi extends Controller {
        public function index() {
            $this->view('skpi/index');
        }
        public function prestasi($action = 'index', $id = 0) {
            if ($action == 'delete') {
                $this->model('SkpiModel')->delete($id);
                header("Location: " . BASEURL . '?url=skpi/prestasi/');
                exit;
            }
            $data = $this->model('SkpiModel')->getAll();
            $skpiAttr = $this->model('SkpiAttrModel');
            $data['kategori'] = $skpiAttr->getAll('kategori');
            $data['unsur'] = $skpiAttr->getAll('unsur');
            $data['butir'] = $skpiAttr->getAll('butir');
            $data['sub_butir'] = $skpiAttr->getAll('sub_butir');
            $this->view("skpi/prestasi/$action", $data);
        }

        public function addPrestasi() {
            $row_count = $this->model('SkpiModel')->insert($_POST, $_FILES);
            if ($row_count > 0) {
                echo 'Berhasil ditambahkan';
            }
        }
    }
?>