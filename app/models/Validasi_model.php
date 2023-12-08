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
        // $query = "SELECT m.nim, m.nama, p.nama_prodi, i.*
        // FROM mahasiswa m
        // JOIN prodi p ON m.id_prodi = p.id_prodi
        // JOIN item_skpi i ON m.id_mahasiswa = i.id_mahasiswa WHERE i.verifikasi = 1";
        $query = "SELECT m.*, p.nama_prodi FROM mahasiswa m
        JOIN prodi p ON m.id_prodi = p.id_prodi";
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
        WHERE m.id_mahasiswa = $id";
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

    public function updateValidasi($id) {
        $query = "UPDATE item_skpi SET validasi = 1 WHERE id_mahasiswa = $id";
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc($result);
        return $row;
    }
}