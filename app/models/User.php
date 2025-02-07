<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class User
{
    private $id;
    private $role_id;
    private $username;
    private $email;
    private $password;
    private $first_name;
    private $last_name;
    private $is_active;
    private $created_at;
    private $updated_at;

    private $db; 

    public function __construct() {
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject(__CLASS__);
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

}