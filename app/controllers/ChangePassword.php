<?php
class ChangePassword extends Controller
{
    public function index()
    {
        $data['user'] = $this->model('User_model')->getUserByUsername($_SESSION['UserName']);
        // $data['user']['UserId'];
        $data['title'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('changepassword/index', $data);
        $this->view('templates/footer');
    }
    public function forgotPassword($id)
    {
        $this->model('ChangePassword_model')->_updatePasswd($id);
    }
}
