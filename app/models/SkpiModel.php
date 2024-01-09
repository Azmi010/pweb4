<?php
// session_start();

class SkpiModel extends Model 
{
    public function __construct() {
        parent::__construct();
        $this->table = "item_skpi";
    }

    public function getAllOfMhs($id_mahasiswa, $kategori = NULL)
    {
        switch ($kategori) {
            case 'prestasi':
                $id_kategori = 'k1';
                break;
            case 'kegiatan':
                $id_kategori = 'k2';
                break;
            case 'sertifikasi':
                $id_kategori = 'k3';
                break;
            case 'mbkm':
                $id_kategori = 'k4';
                break;
            default:
                $kategori = NULL;
                $id_kategori = NULL;
                break;
        }

        $query ='SELECT * FROM ' . $this->table . ' WHERE id_mahasiswa=:id_mahasiswa';
        // if (isset($kategori)) $query .= " AND id_poin LIKE '" . $id_kategori ."%'";
        $query .= " AND LEFT(id_poin, 2)='" . $id_kategori ."'";
        $this->db->query($query);
        $this->db->bind('id_mahasiswa', $id_mahasiswa);
        // if (isset($kategori)) $this->db->bind('kategori', $id_kategori);

        return $this->db->resultSet();
    }

    public function insert($data, $file = NULL) {
        var_dump($data);
        var_dump($file);

        $query = "SELECT MAX(id_item_skpi) FROM $this->table";
        $this->db->query($query);
        $last_id = $this->db->single(PDO::FETCH_NUM)[0];
        if ($last_id == 0) $last_id = 1;

        $id_poin = $data['kategori'] . $data['unsur'] . $data['butir'] . $data['sub_butir'];

        $query = "INSERT INTO item_skpi 
                    VALUES
                    ('', :judul, :tanggal_pelaksanaan, :tanggal_berakhir, :verifikasi, :validasi, :id_mahasiswa, :id_poin)";

        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('tanggal_pelaksanaan', $data['tanggal_pelaksanaan']);
        $tanggal_berakhir = isset($data['tanggal_berakhir']) ? $data['tanggal_berakhir'] : NULL;
        $this->db->bind('tanggal_berakhir', $tanggal_berakhir);
        $this->db->bind('verifikasi', $data['verifikasi'] = 0);
        $this->db->bind('validasi', $data['validasi'] = 0);
        $this->db->bind('id_mahasiswa', $data['id_mahasiswa']);
        $this->db->bind('id_poin', $id_poin);

        $this->db->execute();

        $id_item_skpi = $this->db->getLastId();

        foreach ($file['file_bukti']['name'] as $key => $file_name) {
            $file_name = $id_item_skpi . '_' . $file_name;
            // var_dump($file_name);
            
            $upload_path ='../app/upload/' . $file_name;
            if (file_exists($upload_path)) continue;

            $file_tmp = $file['file_bukti']['tmp_name'][$key];
            // var_dump($file_tmp);
            
            $this->insertFileBukti($id_item_skpi, $file_name, $file_tmp, $upload_path);
        }

        foreach ($data['peserta'] as $nim) {
            $this->insertPesertaItem($id_item_skpi, $nim);
        }

        return $this->db->rowCount();
    }

    public function insertPesertaItem($id_item_skpi, $nim) {
        $query = "INSERT INTO peserta_item (id_item_skpi, nim_peserta) VALUES (:id_item_skpi, :nim)";

        $this->db->query($query);
        $this->db->bind('id_item_skpi', $id_item_skpi);
        $this->db->bind('nim', $nim);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function insertFileBukti($id_item_skpi, $file_name, $file_tmp, $upload_path) {
        $query = "SELECT file_name FROM file_bukti";
        $this->db->query($query);

        $files = $this->db->resultSet(PDO::FETCH_COLUMN);

        if (in_array($file_name, $files)) return 0;

        $query = "INSERT INTO file_bukti (id_item_skpi, file_name) VALUES (:id_item_skpi, :file_name)";

        $this->db->query($query);
        $this->db->bind('id_item_skpi', $id_item_skpi);
        $this->db->bind('file_name', $file_name);

        if (move_uploaded_file($file_tmp, $upload_path)) {
            $this->db->execute();
        }

        return $this->db->rowCount();
    }

    public function updatePesertaItem($id_peserta_item, $nim_peserta) {
        $query = "UPDATE peserta_item SET nim_peserta = :nim_peserta WHERE id_peserta_item = :id_peserta_item";

        $this->db->query($query);
        $this->db->bind('id_peserta_item', $id_peserta_item);
        $this->db->bind('nim_peserta', $nim_peserta);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAllPeserta($id_item_skpi) {
        $query = "SELECT * FROM peserta_item WHERE id_item_skpi = :id_item_skpi";

        $this->db->query($query);
        $this->db->bind('id_item_skpi', $id_item_skpi);
        return $this->db->resultSet();
    }

    public function getAllFileBukti($id_item_skpi) {
        $query = "SELECT * FROM file_bukti WHERE id_item_skpi = :id_item_skpi";
        
        $this->db->query($query);
        $this->db->bind('id_item_skpi', $id_item_skpi);
        return $this->db->resultSet();
    }

    public function getFileBukti($id_file_bukti) {
        $query = "SELECT file_name FROM file_bukti WHERE id_file_bukti = :id_file_bukti";
        
        $this->db->query($query);
        $this->db->bind('id_file_bukti', $id_file_bukti);
        return $this->db->single(PDO::FETCH_NUM)[0];
    }

    public function deletePeserta($id_peserta_item) {
        $query = 'DELETE FROM peserta_item WHERE id_peserta_item = :id_peserta_item';
        
        $this->db->query($query);
        $this->db->bind('id_peserta_item', $id_peserta_item);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deletePesertaByItem($id_item_skpi) {
        $query = 'DELETE FROM peserta_item WHERE id_item_skpi = :id_item_skpi';
        
        $this->db->query($query);
        $this->db->bind('id_item_skpi', $id_item_skpi);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteFileBukti($id_file_bukti) {
        $file_name = $this->getFileBukti($id_file_bukti);

        $query = 'DELETE FROM file_bukti WHERE id_file_bukti = :id_file_bukti';
        
        $this->db->query($query);
        $this->db->bind('id_file_bukti', $id_file_bukti);

        $file_path = '../app/upload/' . $file_name;
        $this->db->execute();
        unlink($file_path);

        return $this->db->rowCount();
    }

    public function update($data, $file = NULL) {
        $id_item_skpi = $data['id_item_skpi'];
        $query = "UPDATE $this->table 
                  SET judul = :judul,
                      tanggal_pelaksanaan = :tanggal_pelaksanaan,
                      tanggal_berakhir = :tanggal_berakhir,
                      id_poin = :id_poin
                  WHERE id_item_skpi = :id_item_skpi";

        $id_poin = $data['kategori'] . $data['unsur'] . $data['butir'] . $data['sub_butir'];

        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('tanggal_pelaksanaan', $data['tanggal_pelaksanaan']);
        $tanggal_berakhir = isset($data['tanggal_berakhir']) ? $data['tanggal_berakhir'] : NULL;
        $this->db->bind('tanggal_berakhir', $tanggal_berakhir);
        $this->db->bind('id_poin', $id_poin);
        $this->db->bind('id_item_skpi', $id_item_skpi);
        $this->db->execute();

        if (!empty($file)) {
            foreach ($file['file_bukti']['name'] as $key => $file_name) {
                $file_name = $id_item_skpi . '_' . $file_name;
                var_dump($file_name);
                
                $upload_path ='../app/upload/' . $file_name;
                if (file_exists($upload_path)) continue;
                
                $file_tmp = $file['file_bukti']['tmp_name'][$key];
                var_dump($file_tmp);
                
                $this->insertFileBukti($id_item_skpi, $file_name, $file_tmp, $upload_path);
            }
        }

        $old_peserta = $this->getAllPeserta($id_item_skpi);

        foreach ($old_peserta as $old)
            $old_peserta_array[] = $old['nim_peserta'];

        var_dump($old_peserta);
        var_dump($old_peserta_array);
        $new_peserta = array_diff($data['peserta'], $old_peserta_array);

        foreach ($new_peserta as $key => $nim_peserta) {
            var_dump($key);
            var_dump($nim_peserta);
            if(isset($old_peserta[$key]))
                $id_peserta_change = $old_peserta[$key]['id_peserta_item'];
            else
                $id_peserta_change = NULL;
            var_dump($id_peserta_change);
            if(is_null($id_peserta_change))
                $this->insertPesertaItem($id_item_skpi, $nim_peserta);
            else
                $this->updatePesertaItem($id_peserta_change, $nim_peserta);

        }

        return $this->db->rowCount();
    }
}
?>