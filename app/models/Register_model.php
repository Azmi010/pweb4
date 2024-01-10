<?php

class Register_model {
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

    public function registerMahasiswa($nama, $nip_nim, $prodi, $password) {
        $roleID = $this->getRoleID('Mahasiswa');
        $prodiID = $this->getProdiID($prodi);
        
        $queryAkun = "INSERT INTO akun (password, id_role) VALUES (?, ?)";
        $stmtAkun = $this->conn->prepare($queryAkun);
        $stmtAkun->bind_param("si", $password, $roleID);
        $stmtAkun->execute();
        $stmtAkun->close();

        $id_akun = $this->conn->insert_id;

        $queryMahasiswa = "INSERT INTO mahasiswa (nama, nim, id_prodi, id_akun) VALUES (?, ?, ?, ?)";
        $stmtMahasiswa = $this->conn->prepare($queryMahasiswa);
        $stmtMahasiswa->bind_param("ssii", $nama, $nip_nim, $prodiID, $id_akun);
        $stmtMahasiswa->execute();
        $stmtMahasiswa->close();
    }

    public function registerTimSkpi($nama, $nip_nim, $password) {
        $roleID = $this->getRoleID('Tim SKPI');
        
        $queryAkun = "INSERT INTO akun (password, id_role) VALUES (?, ?)";
        $stmtAkun = $this->conn->prepare($queryAkun);
        $stmtAkun->bind_param("si", $password, $roleID);
        $stmtAkun->execute();
        $stmtAkun->close();

        $id_akun = $this->conn->insert_id;

        $queryTimSkpi = "INSERT INTO tim_skpi (nama, nip, id_akun) VALUES (?, ?, ?)";
        $stmtTimSkpi = $this->conn->prepare($queryTimSkpi);
        $stmtTimSkpi->bind_param("ssi", $nama, $nip_nim, $id_akun);
        $stmtTimSkpi->execute();
        $stmtTimSkpi->close();
    }

    public function registerOperatorAkademik($nama, $nip_nim, $password) {
        $roleID = $this->getRoleID('Operator Akademik');
        
        $queryAkun = "INSERT INTO akun (password, id_role) VALUES (?, ?)";
        $stmtAkun = $this->conn->prepare($queryAkun);
        $stmtAkun->bind_param("si", $password, $roleID);
        $stmtAkun->execute();
        $stmtAkun->close();

        $id_akun = $this->conn->insert_id;

        $queryOperatorAkademik = "INSERT INTO operator_akademik (nama, nip, id_akun) VALUES (?, ?, ?)";
        $stmtOperatorAkademik = $this->conn->prepare($queryOperatorAkademik);
        $stmtOperatorAkademik->bind_param("ssi", $nama, $nip_nim, $id_akun);
        $stmtOperatorAkademik->execute();
        $stmtOperatorAkademik->close();
    }

    public function registerDekan($nama, $nip_nim, $password) {
        $roleID = $this->getRoleID('Wakil Dekan');
        
        $queryAkun = "INSERT INTO akun (password, id_role) VALUES (?, ?)";
        $stmtAkun = $this->conn->prepare($queryAkun);
        $stmtAkun->bind_param("si", $password, $roleID);
        $stmtAkun->execute();
        $stmtAkun->close();

        $id_akun = $this->conn->insert_id;

        $queryDekan = "INSERT INTO wadek (nama, nip, id_akun) VALUES (?, ?, ?)";
        $stmtDekan = $this->conn->prepare($queryDekan);
        $stmtDekan->bind_param("ssi", $nama, $nip_nim, $id_akun);
        $stmtDekan->execute();
        $stmtDekan->close();
    }
    
    private function getRoleID($role) {
        $query = "SELECT id_role FROM role WHERE nama_role = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $role);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row['id_role'];
        } else {
            echo "ID Role tidak ditemukan.";
            return null;
        }
    }

    private function getProdiID($namaprodi) {
        $query = "SELECT id_prodi FROM prodi WHERE nama_prodi = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $namaprodi);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row['id_prodi'];
        } else {
            echo "ID Role tidak ditemukan.";
            return null;
        }
    }

    public function getRoles() {
        $query = "SELECT * FROM role";
        $result = $this->conn->query($query);

        if (!$result) {
            die("Query error: " . $this->conn->error);
        }

        $roles = [];
        while ($row = $result->fetch_assoc()) {
            $roles[] = $row;
        }

        return $roles;
    }

    public function getProdi() {
        $query = "SELECT * FROM prodi";
        $result = $this->conn->query($query);

        if (!$result) {
            die("Query error: " . $this->conn->error);
        }

        $prodi = [];
        while ($row = $result->fetch_assoc()) {
            $prodi[] = $row;
        }

        return $prodi;
    }
}
