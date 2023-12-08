<?php
    class SkpiAttrModel {
        private $db;

        public function __construct() {
            $this->db = new DatabasePDO;
        }

        public function getAll($table) {
            $query = "SELECT * FROM $table";

            $this->db->query($query);
            $this->db->execute();
            return $this->db->resultSet();
        }
    }
?>