<?php 
class Home extends Controller {
    public function index()
    {
        $data['head_title'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
?>
