<?php

class Mahasiswa_model {

    private $conn;

    public function __construct()
    {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'mvc';

        $this->conn = new mysqli($host, $username, $password, $database);

        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }

    public function getAllMahasiswa() {
        $query = 'SELECT * FROM mahasiswa';
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
        $query = "SELECT * FROM mahasiswa WHERE id_mahasiswa = $id";
        $result = $this->conn->query($query);
    
        if (!$result) {
            die("Query error: " . $this->conn->error);
        }
    
        $data = $result->fetch_assoc();
    
        return $data;
    }    
}