<?php

class Login extends Controller
{
    public function index()
    {
        $data['title'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('login/index', $data);
        $this->view('templates/footer');
    }

    public function loginProcess()
    {
        if ($row = $this->model('Login_model')->loginCheck($_POST) > 0) {
            if (isset($_POST['remember'])) {
                // buat cookie
                setcookie('UserName', $_POST['UserName'], time() + 30);
                setcookie('Passwd', $_POST['Passwd'], time() + 30);
            } else {
                session_start();
                $_SESSION['UserName'] = $row['UserName'];
                $_SESSION['Passwd'] = $row['Passwd'];
                $_SESSION['session_login'] = 'sudah login';
                header('location: ' . BASEURL . '/home');
            }
            session_start();
            $_SESSION['UserName'];
            $_SESSION['Passwd'];
            header('location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash('Username / Password', 'salah.', 'danger');
            header('location: ' . BASEURL . '/login');
            exit;
        }
    }
}
