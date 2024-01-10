<?php

class Verifikasi_model {

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

    public function getAllVerifikasi() {
        $query = "SELECT i.*, m.*, k.*, pn.*, b.*, sb.*
        FROM item_skpi i
        LEFT JOIN mahasiswa m ON i.id_mahasiswa = m.id_mahasiswa
        LEFT JOIN prodi p ON m.id_prodi = p.id_prodi
        LEFT JOIN poin pn ON i.id_poin = pn.id_poin
        LEFT JOIN kategori k ON pn.id_kategori = k.id_kategori
        LEFT JOIN butir b ON pn.id_butir = b.id_butir
        LEFT JOIN sub_butir sb ON pn.id_sub_butir = sb.id_sub_butir";
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

    public function getAllName() {
        $query = "SELECT pi.*, m.nama
        FROM peserta_item pi
        JOIN item_skpi i ON pi.id_item_skpi = i.id_item_skpi
        JOIN mahasiswa m ON pi.nim_peserta = m.nim";

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

    public function updateVerificationStatus($id_item_skpi) {
        $sql = "UPDATE item_skpi SET verifikasi = 1 WHERE id_item_skpi = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_item_skpi);
        
        if ($stmt->execute()) {
            echo "Success";
        } else {
            echo "Error : " . $stmt->error;
        }
    }

    public function revertVerificationStatus($id_item_skpi) {
        $sql = "UPDATE item_skpi SET verifikasi = 0 WHERE id_item_skpi = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_item_skpi);

        if ($stmt->execute()) {
            echo "Reverted";
        } else {
            echo "Error : " . $stmt->error;
        }
    }
}