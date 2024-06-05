<?php

class UserModel {

    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function getUserByUsername($username) {
        $this->db->query("SELECT * FROM users WHERE username = :username");
        $this->db->bind(':username', $username);
        $this->db->execute();
        return $this->db->single();
    }
    
    public function verifyPassword($inputPassword, $storedHash) {
        return password_verify($inputPassword, $storedHash);
    }
}