<?php

class ChangePassword_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function _updatePasswd($id)
    {
        date_default_timezone_set("Asia/Jakarta");
        $username = $_SESSION['UserName'];
        $oldPassword = $_POST['OldPassword'];
        $newPassword = $_POST['Passwd'];
        $verifPassword = $_POST['Passwd1'];
        $password1 = null;
        $password2 = null;
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
        $this->db->bind('OldPassword1', $oldPassword);
        $this->db->bind('OldPassword2', $password1);
        $this->db->bind('Passwd', $newPassword);
        $this->db->bind('DateUpdated', date("Y-m-d H:i:s"));
        $this->db->execute();
        return $this->db->rowCount();
    }
}
