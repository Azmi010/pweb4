<?php 
class Home extends Controller {
    public function index()
    {
        $data['head_title'] = 'Home';
        // $data['nama'] = $this->model('Login_model')->checkLogin();
        $data['poin'] = $this->model('Poin')->getTotalPoin($_SESSION['nim']);
        $data['poin_minimal'] = $this->model('Poin')->getMinimumPoin(date('Y'));
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
?>
