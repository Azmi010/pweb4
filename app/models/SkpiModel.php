<?php
session_start();

class SkpiModel extends Model 
{
    public function __construct() {
        parent::__construct();
        $this->table = "item_skpi";
    }

    public function insert($data, $file = NULL) {
        $query = "SELECT MAX(id_item_skpi) FROM $this->table";
        $this->db->query($query);
        $last_id = $this->db->single(PDO::FETCH_NUM)[0];
        if ($last_id == 0) $last_id = 1;

        $file_name = $last_id . $file['file_bukti']['name'];

        $id_poin = $data['kategori'] . $data['unsur'] . $data['butir'] . $data['sub_butir'];

        $query = "INSERT INTO item_skpi 
                    VALUES
                    ('', :judul, :tanggal_pelaksanaan, :file_bukti, :validasi, :verifikasi, :id_mahasiswa, :id_poin)";

        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('tanggal_pelaksanaan', $data['tanggal_pelaksanaan']);
        $this->db->bind('file_bukti', $file_name);
        $this->db->bind('validasi', $data['validasi'] = 0);
        $this->db->bind('verifikasi', $data['verifikasi'] = 0);
        $this->db->bind('id_mahasiswa', $data['id_mahasiswa']);
        $this->db->bind('id_poin', $id_poin);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update($data) {
        $query = "UPDATE $this->table 
                  SET judul = :judul,
                      tanggal_pelaksanaan = :tanggal_pelaksanaan,
                      file_bukti = :file_bukti,
                      status = :status,
                      id_mahasiswa = :id_mahasiswa,
                      id_poin = :id_poin 
                  WHERE id_item_skpi = :id_item_skpi";

        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('tanggal_pelaksanaan', $data['tanggal_pelaksanaan']);
        $this->db->bind('file_bukti', $data['file_bukti']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('id_mahasiswa', $data['id_mahasiswa']);
        $this->db->bind('id_poin', $data['id_poin']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
?>