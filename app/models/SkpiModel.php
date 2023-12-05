<?php
class SkpiModel extends Model 
{
    public function __construct() {
        $this->table = "item_skpi";
    }

    public function insert($data) {
        $query = "INSERT INTO item_skpi 
                    VALUES
                    ('', :judul, :tanggal_pelaksanaan, :file_bukti, :status, :id_mahasiswa, :id_unsur)";
    }

    public function update($data) {
        $query = "UPDATE $this->table 
                  SET judul = :judul,
                      tanggal_pelaksanaan = :tanggal_pelaksanaan,
                      file_bukti = :file_bukti,
                      status = :status,
                      id_mahasiswa = :id_mahasiswa,
                      id_unsur = :id_unsur 
                  WHERE id_item_skpi = :id_item_skpi";
    }
}
?>