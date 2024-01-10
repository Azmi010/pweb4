<?php

class Upload extends Controller {
    public function index()
    {
        $this->view('upload/index');
    }
    public function save(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $gambar = $_FILES['gambar']['name'];
            $x = explode('.', $gambar);
            $file_tmp = $_FILES['gambar']['tmp_name'];
            
            move_uploaded_file($file_tmp, 'C:\xampp\htdocs\mvc\public\images/'.$gambar);
        }
    }
}