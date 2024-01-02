<?php

class Validasi_model {

    private $conn;

    public function __construct()
    {
        $host = DB_HOST;
        $username = DB_USER;
        $password = DB_PASS;
        $database = DB_NAME;

        $this->conn = new mysqli($host, $username, $password, $database);

        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }

    public function getAllValidasi() {
        $query = "SELECT m.id_mahasiswa, m.nama, m.nim, p.nama_prodi, i.validasi, COUNT(i.id_mahasiswa) as jumlah_item_skpi
        FROM mahasiswa m
        JOIN prodi p ON m.id_prodi = p.id_prodi
        JOIN item_skpi i ON m.id_mahasiswa = i.id_mahasiswa
        WHERE verifikasi = 1
        GROUP BY m.id_mahasiswa, m.nama, m.nim, p.nama_prodi";
        $result = $this->conn->query($query);

        if (!$result) {
            die("Query error: " . $this->conn->error);
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function getMahasiswaById($id) {
        $query = "SELECT i.*, m.nama, m.nim, p.nama_prodi, pn.id_kategori, fb.file_name
        FROM item_skpi i
        JOIN mahasiswa m ON i.id_mahasiswa = m.id_mahasiswa
        JOIN prodi p ON m.id_prodi = p.id_prodi
        JOIN poin pn ON i.id_poin = pn.id_poin
        LEFT JOIN file_bukti fb ON i.id_item_skpi = fb.id_item_skpi
        WHERE m.id_mahasiswa = $id AND i.verifikasi = 1";
        $result = $this->conn->query($query);
        
        if (!$result) {
            die("Query error: " . $this->conn->error);
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        
        return $data;
    }

    public function updateValidationStatus($id_item_skpi) {
        $sql = "UPDATE item_skpi SET validasi = 1 WHERE id_item_skpi = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_item_skpi);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

//     public function getPoinByIdItemSkpi($id_item_skpi) {
//     $query = "SELECT p.poin FROM poin p
//               JOIN item_skpi i ON p.id_poin = i.id_poin
//               WHERE i.id_item_skpi = $id_item_skpi";

//     $result = $this->conn->query($query);

//     if (!$result) {
//         die("Query error: " . $this->conn->error);
//     }

//     $data = [];
//         while ($row = $result->fetch_assoc()) {
//             $data[] = $row;
//         }
        
//     return $data;
// }
}