<?php
class Login_model
{
    private $db;
    private $table = 'users';


    public function __construct()
    {
        $this->db = new Database;
    }

    public function loginCheck($data)
    {
        $query = "SELECT * FROM users WHERE UserName = :UserName AND Passwd = :Passwd";
        $this->db->query($query);
        $this->db->bind('UserName', $data['UserName']);
        $this->db->bind('Passwd', $data['Passwd']);
        $data = $this->db->single();
        return $data;
    }

    public function _login()
    {
        $username = $_POST["UserName"];
        $password = $_POST["Passwd"];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE UserName=:UserName');
        $this->db->bind('UserName', $username);
        $user = $this->db->single();
        var_dump($username, $password);
        var_dump($user);

        // jika usernya ada
        if ($user) {
            if ($password == $user['Passwd']) {
                $data = [
                    'UserName' => $user['UserName'],
                ];
                $_SESSION = $data;

                Flasher::setFlash('Login', 'berhasil', 'success');
                header('Location: ' . BASEURL . '/home');
                exit;
            } else {
                Flasher::setFlash('Login gagal,', 'password salah', 'danger');
                header('Location: ' . BASEURL . '/login');
            }
        } else {
            Flasher::setFlash('Login gagal,', 'akun belum terdaftar', 'danger');
            header('Location: ' . BASEURL . '/login');
        }
    }
}
