<?php
class Login_model
{
    private $db;

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
}
