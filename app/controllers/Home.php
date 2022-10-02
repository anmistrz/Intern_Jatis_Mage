<?php
class Home extends Controller
{
    public function index()
    {

        if (isset($_SESSION['UserName'])) {
            $data['title'] = 'Home';
            $this->view('templates/header', $data);
            $this->view('home/index', $data);
            $this->view('templates/footer');
        } else {
            header('Location: ' . BASEURL . '/auth/login');
        }
    }
}
