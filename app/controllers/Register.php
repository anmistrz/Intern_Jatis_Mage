<?php
class Register extends Controller
{

    public function index()
    {
        $data['title'] = 'Register';
        $this->view('templates/header', $data);
        $this->view('register/index', $data);
        $this->view('templates/footer');
    }

    public function addAccount()
    {
        if ($this->model('Register_model')->register($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/register');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/register');
            exit;
        }
    }
}
