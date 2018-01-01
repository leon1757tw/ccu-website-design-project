<?php
require_once("../model/database.php");

class Account{
    public $username;
    public $password;
    public $email;
    public $phone;
    private $db;

    public function __construct(){
        $this->db = new DBController();
    }

    public static function findByUsername($username){
        $instance = new self();
        $result = $instance->db->queryDB("SELECT * FROM account WHERE username = ?", 
                                            array($username));
        if(!empty($result)){
            $instance->username = $result[0]["username"];
            $instance->password = $result[0]["password"];
            $instance->email = $result[0]["email"];
            $instance->phone = $result[0]["phone"];
        }
        return $instance;
    }

    public function encryptPassword($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPassword($password){
        return password_verify($password, $this->password);
    }

    public function isUserExist($username){
        $result = $this->db->queryDB("SELECT * FROM account WHERE username = ?", 
                                    array($username));
        if(!empty($result)){
            return true;
        } else {
            return false;
        }
    }

    public function createAccount(){
        $result = $this->db->executeDB("INSERT INTO account VALUES (?, ?, ?, ?)", 
                                        array($this->username, $this->password, $this->email, $this->phone));
        return $result;
    }

    public function modifiedPassword($newPassword){
        $this->password = $this->encryptPassword($newPassword);
        $result = $this->db->executeDB("UPDATE account SET password = ? WHERE username = ?",
                                        array($this->password, $this->username));
        return $result;
    }
}

?>