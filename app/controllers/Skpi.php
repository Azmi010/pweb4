<?php
    class Skpi extends Controller {
        public function index() {
            $this->view('skpi/index', $_POST);
        }

        public function create() {
            $this->view('skpi/create');
        }
    }
?>