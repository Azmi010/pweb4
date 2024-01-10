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
        $query = "SELECT m.id_mahasiswa, m.nama, m.nim, p.nama_prodi, i.validasi, i.id_mahasiswa
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
        $query = "SELECT i.*, m.nama, m.nim, p.nama_prodi, pn.id_kategori
        FROM item_skpi i
        JOIN mahasiswa m ON i.id_mahasiswa = m.id_mahasiswa
        JOIN prodi p ON m.id_prodi = p.id_prodi
        JOIN poin pn ON i.id_poin = pn.id_poin
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

    public function getBukti() {
        $query = "SELECT fb.*
        FROM file_bukti fb
        JOIN item_skpi i ON fb.id_item_skpi = i.id_item_skpi";
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

    function updateValidationStatus($id_item_skpi) {
        $sql = "UPDATE item_skpi SET validasi = 1 WHERE id_item_skpi = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_item_skpi);

        if ($stmt->execute()) {
            echo "Success";            
        } else {
            echo "Error : " . $stmt->error;
        }
    }

    function updateInvalidationStatus($id_item_skpi) {
        $sql = "UPDATE item_skpi SET validasi = 0 WHERE id_item_skpi = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_item_skpi);

        if ($stmt->execute()) {
            echo "Reverted";            
        } else {
            echo "Error : " . $stmt->error;
        }
    }

    public function getPointById($id) {
        $query = "SELECT COALESCE(SUM(p.poin), 0) as totalPoin, m.nama
                FROM poin p 
                JOIN item_skpi i ON p.id_poin = i.id_poin 
                JOIN mahasiswa m ON i.id_mahasiswa = m.id_mahasiswa 
                WHERE i.id_mahasiswa = $id AND i.validasi = 1";

        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();
        return $row;
    }
}