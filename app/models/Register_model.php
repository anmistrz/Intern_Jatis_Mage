<?php
class Register_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $query = "INSERT INTO users VALUES ('', :UserName, :Passwd, :OldPassword1, :OldPassword2, :DateCreated, :DateUpdated)";
        $this->db->query($query);
        $this->db->bind('UserName', $data['UserName']);
        $this->db->bind('Passwd', $data['Passwd']);
        $this->db->bind('OldPassword1', null);
        $this->db->bind('OldPassword2', null);
        $this->db->bind('DateCreated', date("Y-m-d H:i:s"));
        $this->db->bind('DateUpdated', null);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
