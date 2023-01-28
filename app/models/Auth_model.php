
<?php

class Auth_model extends Controller
{
    private $db;
    private $table = 'users';


    public function __construct()
    {
        $this->db = new Database;
    }

    public function _login()
    {
        $username = $_POST["UserName"];
        $password = $_POST["Passwd"];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE UserName=:UserName');
        $this->db->bind('UserName', $username);
        $user = $this->db->single();

        // jika usernya ada
        if ($user) {
            if (password_verify($password, $user['Passwd'])) {
                $data = [
                    'UserName' => $user['UserName'],
                ];
                $_SESSION = $data;

                header('Location: ' . BASEURL . '/home');
                exit;
            } else {
                Flasher::setFlash('Login gagal,', 'password salah', 'danger');
                header('Location: ' . BASEURL . '/auth/signin');
            }
        } else {
            Flasher::setFlash('Login gagal,', 'akun belum terdaftar', 'danger');
            header('Location: ' . BASEURL . '/auth/signin');
        }
    }

    public function register($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $query = "INSERT INTO users VALUES ('', :UserName, :fullname, :email, :Passwd, :OldPassword1, :OldPassword2, :DateCreated, :DateUpdated)";
        $this->db->query($query);
        $this->db->bind('UserName', $data['UserName']);
        $this->db->bind('fullname', $data['fullname']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('Passwd', password_hash($data['Passwd'], PASSWORD_DEFAULT));
        $this->db->bind('OldPassword1', null);
        $this->db->bind('OldPassword2', null);
        $this->db->bind('DateCreated', date("Y-m-d H:i:s"));
        $this->db->bind('DateUpdated', null);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function _updatePassword($id)
    {
        $username = $_SESSION['UserName'];
        $oldPassword = $_POST['OldPassword'];
        $newPassword = $_POST['Passwd'];
        $confirmPassword = $_POST['ConfirmNewPassword'];
        $password1 = null;
        $password2 = null;
        $queryUser = $this->model('User_model')->getUserByUsername($username);
        if (password_verify($oldPassword, $queryUser['Passwd'])) {
            if ($newPassword == $confirmPassword) {
                date_default_timezone_set("Asia/Jakarta");
                if ($_POST['OldPassword1'] != null) {
                    $password1 = $_POST['OldPassword1'];
                }
                if ($_POST['OldPassword2'] != null) {
                    $password2 = $_POST['OldPassword2'];
                }
                $query = "UPDATE users SET UserName=:UserName, Passwd=:Passwd, OldPassword1=:OldPassword1, OldPassword2=:OldPassword2, DateUpdated=:DateUpdated WHERE UserId=:UserId";
                $this->db->query($query);
                $this->db->bind('UserId', $id);
                $this->db->bind('UserName', $username);
                $this->db->bind('OldPassword1', password_hash($oldPassword, PASSWORD_DEFAULT));
                $this->db->bind('OldPassword2', password_hash($password1, PASSWORD_DEFAULT));
                $this->db->bind('Passwd', password_hash($newPassword, PASSWORD_DEFAULT));
                $this->db->bind('DateUpdated', date("Y-m-d H:i:s"));
                $this->db->execute();
                Flasher::setFlash('Kata sandi', 'berhasil diubah', 'success');
                header('Location: ' . BASEURL . '/auth/changepassword');
                return $this->db->rowCount();
            } else {
                Flasher::setFlash('Kata sandi', 'gagal diubah', 'danger');
                header('Location: ' . BASEURL . '/auth/changepassword');
            }
        } else {
            Flasher::setFlash('Kata sandi', 'gagal diubah', 'danger');
            header('Location: ' . BASEURL . '/auth/changepassword');
        }
    }

    public function checkEmail($data)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $this->db->query($query);
        $this->db->bind('email', $data['email']);
        //$this->db->execute();
        //return $this->db->rowCount();
        $data =  $this->db->single();
        $_SESSION['UserId'] = $data['UserId'];
        return $data;
    }

    public function updateResetPassword($data)
    {
        $query = "UPDATE users SET Passwd=:Passwd WHERE UserId=:UserId";
        $this->db->query($query);
        $this->db->bind('UserId', $data['UserId']);
        $this->db->bind('Passwd', password_hash($data['Passwd'], PASSWORD_DEFAULT));
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function cekUsername()
    {
        $username = $_POST['UserName'];
        $this->db->query("SELECT * FROM users WHERE UserName = :UserName");
        $this->db->bind('UserName', $username);
        return $this->db->single();
    }

    public function cekEmailSignUp()
    {
        $email = $_POST['email'];
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind('email', $email);
        return $this->db->single();
    }
}
