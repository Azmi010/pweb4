<?php

class Register_model {
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

    public function getValidRoles() {
        $query = "SHOW COLUMNS FROM mahasiswa LIKE 'role'";
        $result = $this->conn->query($query);

        if (!$result) {
            die("Query error: " . $this->conn->error);
        }

        $enumStr = $result->fetch_assoc()['Type'];
        $enumStr = str_replace(["enum('", "')"], ['', ''], $enumStr);

        return explode("','", $enumStr);
    }

    public function registerUser($nama, $nim, $fakultas, $prodi, $role, $password) {

        $query = "INSERT INTO mahasiswa (nama, nim, fakultas, prodi, role, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssss", $nama, $nim, $fakultas, $prodi, $role, $password);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
