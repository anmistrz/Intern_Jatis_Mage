<?php
class User_model
{
    private $db;
    private $nama = 'Hijri';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUser()
    {
        return $this->nama;
    }


    public function getUserByUsername($username)
    {
        $this->db->query('SELECT * FROM users WHERE UserName=:UserName');
        $this->db->bind('UserName', $username);
        return $this->db->single();
    }
}
