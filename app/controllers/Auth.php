<?php

class Auth extends Controller
{
    public function index()
    {
        if (isset($_SESSION['UserName'])) {
            Flasher::setFlash('Anda sudah', 'login', 'danger');
            header('Location: ' . BASEURL);
        } else {
            $data['title'] = 'Login';
            $this->view('templates/auth_header', $data);
            $this->view('auth/login', $data);
            $this->view('templates/auth_footer');
        }
    }

    public function login()
    {
        $this->model("Auth_model")->_login();
    }
    public function register()
    {
        $data['title'] = 'Register';
        $this->view('templates/auth_header', $data);
        $this->view('auth/register', $data);
        $this->view('templates/auth_footer');
    }
    public function create()
    {

        if ($_POST['Passwd'] == $_POST['ConfirmPasswd']) {
            if ($this->model('Auth_model')->register($_POST) > 0) {
                Flasher::setFlash('Registrasi berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/auth/register');
                exit;
            } else {
                Flasher::setFlash('Registrasi gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/auth/register');
                exit;
            }
        } else {
            Flasher::setFlash('Registrasi gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/auth/register');
            exit;
        }
    }

    public function logout()
    {
        unset($_SESSION['UserName']);
        Flasher::setFlash('Logout', 'berhasil', 'success');
        header('Location: ' . BASEURL . '/auth');
        exit;
    }

    public function changePassword()
    {
        $data['title'] = 'Ubah Kata Sandi';
        $data['user'] = $this->model('User_model')->getUserByUsername($_SESSION['UserName']);
        $this->view('templates/auth_header', $data);
        $this->view('auth/changepassword', $data);
        $this->view('templates/auth_footer');
    }

    public function updatePassword($id)
    {
        $this->model('Auth_model')->_updatePassword($id);
    }
}
