<?php

class Login_model {

    private $conn;

    public function __construct()
    {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'skpi';

        $this->conn = new mysqli($host, $username, $password, $database);

        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }

    public function checkLogin($username, $password) {
        $query = "SELECT a.*, m.id_mahasiswa, m.nim, m.nama as nama_mahasiswa, ts.id_tim_skpi, ts.nip as nip_tim_skpi, ts.nama as nama_tim_skpi, 
                  d.id_wadek, d.nip as nip_dekan, d.nama as nama_dekan, oa.id_operator_akademik, oa.nip as nip_operator_akademik, oa.nama as nama_operator_akademik 
                  FROM akun a
                  LEFT JOIN mahasiswa m ON a.id_akun = m.id_akun AND a.id_role = 1
                  LEFT JOIN tim_skpi ts ON a.id_akun = ts.id_akun AND a.id_role = 3
                  LEFT JOIN wadek d ON a.id_akun = d.id_akun AND a.id_role = 4
                  LEFT JOIN operator_akademik oa ON a.id_akun = oa.id_akun AND a.id_role = 2
                  WHERE (m.nim = ? OR ts.nip = ? OR d.nip = ? OR oa.nip = ?)";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $username, $username, $username, $username);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();

                // Verifikasi password
                if ($password == $user['password']) {
                    return $user;
                } else {
                    echo "Password tidak sesuai.";
                }
            } else {
                echo "Identifikasi tidak ditemukan.";
            }
        } else {
            echo "Query error: " . $this->conn->error;
        }

        return null;
    }
    
}