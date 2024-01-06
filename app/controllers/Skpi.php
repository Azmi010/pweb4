<?php

class Skpi extends Controller {
    private $data;

    public function __construct() {
        $this->data = $_SESSION;
        $skpiAttr = $this->model('SkpiAttrModel');
        $this->data['kategori'] = $skpiAttr->getAll('kategori');
        $this->data['unsur'] = $skpiAttr->getAll('unsur');
        $this->data['butir'] = $skpiAttr->getAll('butir');
        $this->data['sub_butir'] = $skpiAttr->getAll('sub_butir');
    }

    public function index($item = NULL) {
        $data = $this->data;
        $_SESSION['item'] = $item;

        $kategori_list = ['prestasi', 'kegiatan', 'sertifikasi', 'mbkm'];

        if (in_array($item, $kategori_list)) {
            $data['head_title'] = ($item == 'mbkm') ? strtoupper($item) : ucfirst($item);
            $data['item_skpi'] = $this->model('SkpiModel')->getAllOfMhs($data['id_mhs'], $_SESSION['item']);
            $this->view('templates/header', $data);
            $this->view("skpi/prestasi/index", $data);
        }

        else {
            $data['head_title'] = 'Home';
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('home/index', $data);
            $this->view('templates/footer');
        }
    }

    public function add($item) {
        $data = $this->data;
        $_SESSION['item'] = $item;

        $kategori_list = ['prestasi', 'kegiatan', 'sertifikasi', 'mbkm'];
        $judul_kategori = ($item == 'mbkm') ? strtoupper($item) : ucfirst($item);
        $data['head_title'] = "Input $judul_kategori";
        $this->view('templates/header', $data);

        if (in_array($item, $kategori_list))
            $this->view("skpi/prestasi/add", $data);
        else
            header("Location: ?url=skpi/index/");
    }

    public function delete($id) {
        $this->model('SkpiModel')->deletePesertaByItem($id);
        
        $file_bukti = $this->model('SkpiModel')->getAllFileBukti($id);
        foreach ($file_bukti as $file) {
            $this->model('SkpiModel')->deleteFileBukti($file['id_file_bukti']);
        }

        $this->model('SkpiModel')->delete($id);
        header("Location: " . BASEURL . "?url=Skpi/index/{$_SESSION['item']}");
        exit;
    }

    public function edit($item, $id) {
        $data = $this->data;
        $_SESSION['item'] = $item;
        
        switch ($item) {
            case 'prestasi':
                $kategori = 1;
                break;
            case 'kegiatan':
                $kategori = 2;
                break;
            case 'sertifikasi':
                $kategori = 3;
                break;
            case 'mbkm':
                $kategori = 4;
                break;
            }
                    
        $data['item_skpi'] = $this->model('SkpiModel')->getById($id);
        $data['peserta'] = $this->model('SkpiModel')->getAllPeserta($id);
        $data['file_bukti'] = $this->model('SkpiModel')->getAllFileBukti($id);

        if($data['item_skpi']['id_mahasiswa'] != $data['id_mhs'] || $data['item_skpi']['id_poin'][1] != $kategori || !isset($data)) {
            $data = NULL;
            header("Location: ?url=skpi/index/$item");
            exit();
        }

        $kategori_list = ['prestasi', 'kegiatan', 'sertifikasi', 'mbkm'];
        $judul_kategori = ($item == 'mbkm') ? strtoupper($item) : ucfirst($item);
        $data['head_title'] = "Edit $judul_kategori"; 
        $this->view('templates/header', $data);

        if (in_array($item, $kategori_list)) {
            $id_poin = $data['item_skpi']['id_poin'];
            $id_poin = preg_split("/[a-z]/", $id_poin);
            $data['item_skpi']['id_unsur'] = $id_poin[2];
            $data['item_skpi']['id_butir'] = $id_poin[3];
            $data['item_skpi']['id_sub_butir'] = $id_poin[4];
            $data['unsur'] = $this->getOptions("k$kategori");
            $data['butir'] = $this->getOptions("k$kategori"."u$id_poin[2]");
            $data['sub_butir'] = $this->getOptions("k$kategori"."u$id_poin[2]"."b$id_poin[3]");
            $this->view("skpi/prestasi/edit", $data);
        }
        else
            header("Location: ?url=skpi/index/");


    }

    public function addItem() {
        $_POST['id_mahasiswa'] = $_SESSION['id_mhs'];
        $_POST['nim_mahasiswa'] = $_SESSION['nim'];
        var_dump($_POST);
        var_dump($_SESSION);
        $row_count = $this->model('SkpiModel')->insert($_POST, $_FILES);
        if ($row_count > 0) echo 'success';
        else echo 'failed';
    }

    public function editItem() {
        $_POST['nim_mahasiswa'] = $_SESSION['nim'];
        $row_count = $this->model('SkpiModel')->update($_POST, $_FILES);
        if ($row_count > 0) echo 'success';
        else echo 'failed';
    }

    public function deletePeserta($id_peserta_item) {
        $this->model('SkpiModel')->deletePeserta($id_peserta_item);
    }
    public function deleteFileBukti($id_file_bukti) {
        $this->model('SkpiModel')->deleteFileBukti($id_file_bukti);
    }

    public function getOptions($val = NULL) {
        $skpiAttr = $this->model('SkpiAttrModel');
        $unsur = $skpiAttr->getAll('unsur');
        $butir = $skpiAttr->getAll('butir');
        $sub_butir = $skpiAttr->getAll('sub_butir');

        $butirs = [
            'k2u6' => [1, 24, 4, 5, 15, 16]
        ];

        $sub_butirs = [
            'k1u1' => range(1,5),
            'k2u4' => range(7,11),
            'k2u5' => [11, 12],
            'k2u6' => [7, 12, 11],
            'k2u12a' => range(13,17),
            'k2u12b' => [5,18]
        ];

        $attrPairs = [
            'k1' => [
                'type' => 'unsur',
                'options' => [1, 2, 3]
            ],
            'k1u1' => [
                'type' => 'butir',
                'options' => [1, 2, 3, 4, 5]
            ],
            'k1u1b1' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k1u1']
            ],
            'k1u1b2' => [
                'type' => 'sub_butir',
                'options' => range(1, 6)
            ],
            'k1u1b3' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k1u1']
            ],
            'k1u1b4' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k1u1']
            ],
            'k1u1b5' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k1u1']
            ],
            'k1u2' => [
                'type' => 'butir',
                'options' => [1, 24, 4]
            ],
            'k1u3' => [
                'type' => 'butir',
                'options' => [6, 7, 8, 9, 10, 11, 12, 13, 14]
            ],
            'k2' => [
                'type' => 'unsur',
                'options' => range(4, 14)
            ],
            'k2u4' => [
                'type' => 'butir',
                'options' => [5, 15, 16, 17, 18]
            ],
            'k2u4b5' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u4']
            ],
            'k2u4b15' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u4']
            ],
            'k2u4b16' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u4']
            ],
            'k2u5' => [
                'type' => 'butir',
                'options' => [1, 24, 4]
            ],
            'k2u5b1' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u5']
            ],
            'k2u5b24' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u5']
            ],
            'k2u5b4' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u5']
            ],
            'k2u6' => [
                'type' => 'butir',
                'options' => $butirs['k2u6']
            ],
            'k2u6b1' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u6b24' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u6b4' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u6b5' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u6b15' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u6b16' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u7' => [
                'type' => 'butir',
                'options' => $butirs['k2u6']
            ],
            'k2u7b1' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u7b24' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u7b4' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u7b5' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u7b15' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u7b16' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u8' => [
                'type' => 'butir',
                'options' => $butirs['k2u6']
            ],
            'k2u8b1' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u8b24' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u8b4' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u8b5' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u8b15' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u8b16' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u9' => [
                'type' => 'butir',
                'options' => $butirs['k2u6']
            ],
            'k2u9b1' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u9b24' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u9b4' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u9b5' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u9b15' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u9b16' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u6']
            ],
            'k2u10' => [
                'type' => 'butir',
                'options' => [5, 15]
            ],
            'k2u10b5' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u4']
            ],
            'k2u10b15' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u4']
            ],
            'k2u11' => [
                'type' => 'butir',
                'options' => [5, 15]
            ],
            'k2u11b5' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u4']
            ],
            'k2u11b15' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u4']
            ],
            'k2u12' => [
                'type' => 'butir',
                'options' => range(19,23)
            ],
            'k2u12b19' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u12a']
            ],
            'k2u12b20' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u12a']
            ],
            'k2u12b21' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u12b']
            ],
            'k2u12b22' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u12b']
            ],
            'k2u12b23' => [
                'type' => 'sub_butir',
                'options' => $sub_butirs['k2u12b']
            ],
            'k2u13' => [
                'type' => 'butir',
                'options' => [1, 24, 5, 15, 16]
            ],
            'k2u14' => [
                'type' => 'butir',
                'options' => [5, 15]
            ],
            'k3' => [
                'type' => 'unsur',
                'options' => [0]
            ],
            'k3u0' => [
                'type' => 'butir',
                'options' => [25, 26]
            ],
            'k4' => [
                'type' => 'unsur',
                'options' => [0]
            ]
        ];

        if (isset($val)) $selected_val = $val;
        else $selected_val = $_POST['select_val'];

        preg_match_all('/[a-z]/', $selected_val, $selected_type);
        $selected_type = end($selected_type[0]);
        $child_types = [
            'k' => 'unsur',
            'u' => 'butir',
            'b' => 'sub_butir',
        ];

        $options_type = isset($attrPairs[$selected_val]['type']) ? $attrPairs[$selected_val]['type'] : $child_types[$selected_type];

        $options = isset($attrPairs[$selected_val]['options']) ? $attrPairs[$selected_val]['options'] : [0];

        if (isset($val)) {
            $options_data = [];
            foreach ($options as $option) {
                /*
                $options_data[$option]['text'] =
                $options_data[$option]['id'] =
                */
                if ($option == 0) $options_data[$option] = '-';
                else $options_data[$option] = $$options_type[$option - 1]["nama_" . $options_type];
            }

            $data['options'] = $options_data;
        }
        else {
            $options_html = NULL;

            // $options_html = "<option value>-- Pilih Opsi --</option> ";

            $option_format = "<option value='%s%d'>%s</option> ";
            foreach ($options as $option) {
                if ($option == 0) $option_text = '-';
                else $option_text = $$options_type[$option - 1]["nama_" . $options_type];
                $options_html .= sprintf($option_format, $options_type[0], $option, $option_text);
            }
            
            $data['options'] = $options_html;
        }

        $data['type'] = $options_type;


        if (isset($val)) return $data;
        else echo json_encode($data);
    }
}
?>