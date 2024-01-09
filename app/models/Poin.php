<?php
    class Poin {
        private $db;

        public function __construct() {
            $this->db = new DatabasePDO;
        }

        public function getTotalPoin($nim) {
            $query = "SELECT SUM(poin) FROM peserta_item pi
            JOIN item_skpi i ON i.id_item_skpi = pi.id_item_skpi
            JOIN poin p ON p.id_poin = i.id_poin
            WHERE verifikasi = 1 and validasi = 1 and nim_peserta = :nim";

            $this->db->query($query);
            $this->db->bind('nim', $nim);
            $this->db->execute();
            return $this->db->single(PDO::FETCH_NUM)[0];
        }

        public function getMinimumPoin($tahun) {
            $query = "SELECT poin_minimal FROM poin_minimal WHERE tahun = :tahun";
            $this->db->query($query);
            $this->db->bind('tahun', $tahun);
            $this->db->execute();
            return $this->db->single(PDO::FETCH_NUM)[0];
        }
    }
?>