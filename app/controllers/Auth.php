<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Auth extends Controller
{
    public function index()
    {
        if (isset($_SESSION['UserName'])) {
            Flasher::setFlash('Anda sudah', 'login', 'danger');
            header('Location: ' . BASEURL);
        } else {
            $data['title'] = 'Make a good excel reader ';
            $this->view('templates/auth_header', $data);
            $this->view('auth/introduction', $data);
            $this->view('templates/auth_footer');
        }
    }

    public function signin()
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

    public function submitEmail()
    {
        $data['title'] = 'Reset Kata Sandi';
        $this->view('templates/auth_header', $data);
        $this->view('auth/submitemail', $data);
        $this->view('templates/auth_footer');
    }

    public function resetPassword()
    {
        $data['title'] = 'Halaman Reset Password';
        $this->view('templates/auth_header', $data);
        $this->view('auth/resetpassword', $data);
        $this->view('templates/auth_footer');
    }

    public function verificationEmail()
    {
        if ($row = $this->model('Auth_model')->checkEmail($_POST) > 0) {
            Flasher::setFlash('Email', 'ditemukan.', 'success');
            header('location: ' . BASEURL . '/auth/resetpassword');
        } else {
            Flasher::setFlash('Email', 'tidak terdaftar.', 'danger');
            header('location: ' . BASEURL . '/auth/submitemail');
            exit;
        }
    }
    public function updateResetPassword()
    {

        if ($_POST['Passwd'] == $_POST['ConfirmNewPasswd']) {
            if ($this->model('Auth_model')->updateResetPassword($_POST) > 0) {
                Flasher::setFlash('Berhasil', 'diupdate', 'success');
                header('location: ' . BASEURL . '/auth/signin');
                exit;
            } else {
                Flasher::setFlash('Gagal', 'diupdate', 'danger');
                header('location: ' . BASEURL . '/auth/resetpassword');
                exit;
            }
        } else {
            Flasher::setFlash('Gagal', 'password tidak sama.', 'danger');
            header('location: ' . BASEURL . '/auth/resetpassword');
            exit;
        }
    }

    public function saveUser()
    {
        if ($_POST['Passwd'] == $_POST['ConfirmPasswd']) {
            $row = $this->model('Auth_model')->cekUsername();
            $data = $this->model('Auth_model')->cekEmailSignUp();
            if ($row['UserName'] == $_POST['UserName']) {
                Flasher::setFlash('Gagal', 'Username yang anda masukan sudah pernah digunakan!', 'danger');
                header('location: ' . BASEURL . '/auth/register');
                exit;
            } else if ($data['email'] == $_POST['email']) {
                Flasher::setFlash('Gagal', 'Email yang anda masukan sudah pernah digunakan!', 'danger');
                header('location: ' . BASEURL . '/auth/register');
                exit;
            } else {
                if ($this->model('Auth_model')->register($_POST) > 0) {
                    // Modal::flash('Berhasil','ditambahkan','success');
                    $email_pengirim = 'anasardiansyah003@gmail.com';
                    $nama_pengirim = 'MAGER TEAM';
                    $email_penerima = $_POST['email'];
                    $subjek = 'Aktivasi Pendaftaran Member MAGER';
                    $pesan = "Terima kasih telah mendaftar di MAGER. Silahkan klik link berikut untuk mengaktifkan akun anda : " . BASEURL . "/auth/register";
                    $mail = new PHPMailer(true);
                    $mail->SMTPDebug = 2;
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = $email_pengirim;
                    $mail->Password = 'ftpfpqqwexztezdv';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;
                    $mail->setFrom($email_pengirim, $nama_pengirim);
                    $mail->addAddress($email_penerima);
                    $mail->isHTML(true);
                    $mail->Subject = $subjek;
                    $mail->Body = $pesan;
                    $send = $mail->send();
                    if ($send) {
                        Flasher::setFlash('Berhasil', 'didaftarkan', 'success');
                        header('location: ' . BASEURL . '/auth/signin');
                        exit;
                    } else {
                        Flasher::setFlash('Gagal', 'didaftarkan', 'danger');
                        header('location: ' . BASEURL . '/auth/register');
                        exit;
                    }
                } else {
                    Flasher::setFlash('Gagal', 'didaftarkan', 'danger');
                    header('location: ' . BASEURL . '/auth/register');
                    exit;
                }
            }
        } else {
            Flasher::setFlash('Gagal', 'password tidak sama.', 'danger');
            header('location: ' . BASEURL . '/auth/register');
            exit;
        }
    }
}
