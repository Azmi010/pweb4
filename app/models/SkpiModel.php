<?php
// session_start();

class SkpiModel extends Model 
{
    public function __construct() {
        parent::__construct();
        $this->table = "item_skpi";
    }

    public function getAllOfMhs($id_mahasiswa)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_mahasiswa=:id_mahasiswa');
        $this->db->bind('id_mahasiswa', $id_mahasiswa);

        return $this->db->resultSet();
    }
    public function insert($data, $file = NULL) {
        $query = "SELECT MAX(id_item_skpi) FROM $this->table";
        $this->db->query($query);
        $last_id = $this->db->single(PDO::FETCH_NUM)[0];
        if ($last_id == 0) $last_id = 1;

        $file_name = $last_id + 1 . $file['file_bukti']['name'];
        $file_tmp = $file['file_bukti']['tmp_name'];


        $id_poin = $data['kategori'] . $data['unsur'] . $data['butir'] . $data['sub_butir'];

        $query = "INSERT INTO item_skpi 
                    VALUES
                    ('', :judul, :tanggal_pelaksanaan, :file_bukti, :verifikasi, :validasi, :id_mahasiswa, :id_poin)";

        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('tanggal_pelaksanaan', $data['tanggal_pelaksanaan']);
        $this->db->bind('file_bukti', $file_name);
        $this->db->bind('verifikasi', $data['verifikasi'] = 0);
        $this->db->bind('validasi', $data['validasi'] = 0);
        $this->db->bind('id_mahasiswa', $data['id_mahasiswa']);
        $this->db->bind('id_poin', $id_poin);

        $upload_path ='../app/upload/' . $file_name;
        if (move_uploaded_file($file_tmp, $upload_path)) $this->db->execute();

        return $this->db->rowCount();
    }

    public function update($data, $file = NULL) {
        $query = "UPDATE $this->table 
                  SET judul = :judul,
                      tanggal_pelaksanaan = :tanggal_pelaksanaan,
                      verifikasi = :verifikasi, 
                      validasi = :validasi, 
                      id_poin = :id_poin";

        $file_name = $data['id_item_skpi'] . $file['file_bukti']['name'];
        $file_tmp = $file['file_bukti']['tmp_name'];

        $id_poin = $data['kategori'] . $data['unsur'] . $data['butir'] . $data['sub_butir'];
        $file_ok = $file['file_bukti']['error'] == UPLOAD_ERR_OK;

        if($file_ok) $query .= ",file_bukti = :file_bukti";

        $query .= " WHERE id_item_skpi = :id_item_skpi";

        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('tanggal_pelaksanaan', $data['tanggal_pelaksanaan']);
        if($file_ok) $this->db->bind('file_bukti', $file_name);
        $this->db->bind('verifikasi', $data['verifikasi'] = 0);
        $this->db->bind('validasi', $data['validasi'] = 0);
        $this->db->bind('id_poin', $id_poin);
        $this->db->bind('id_item_skpi', $data['id_item_skpi']);

        $upload_path ='../app/upload/' . $file_name;
        if ($file_ok && (move_uploaded_file($file_tmp, $upload_path))) {
            $this->db->execute();
        } else {
            $this->db->execute();
        }

        return $this->db->rowCount();
    }
}
?>