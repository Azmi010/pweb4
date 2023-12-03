<?php

class Login_model {

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

    public function checkLogin($username, $password) {
        $username = $this->conn->real_escape_string($username);
        $password = $this->conn->real_escape_string($password);

        $query = "SELECT * FROM mahasiswa WHERE nama = '$username' AND password = '$password'";
        $result = $this->conn->query($query);

        if (!$result) {
            die("Query error: " . $this->conn->error);
        }
        $user = $result->fetch_assoc();

        return $user;
    }
}
