<?php 
class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Home';
        // $data['nama'] = $this->model('Login_model')->checkLogin();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
?>
