<?php
require_once("../model/database.php");

class Account{
    public $username;
    public $password;
    public $email;
    public $phone;
    public $privilege;
    private $db;

    public function __construct(){
        $this->db = new DBController();
    }

    public static function findByUsername($username){
        $instance = new self();
        $result = $instance->db->queryDB("SELECT * FROM Account WHERE username = ?", 
                                            array($username));
        if(!empty($result)){
            $instance->username = $result[0]["username"];
            $instance->password = $result[0]["password"];
            $instance->email = $result[0]["email"];
            $instance->phone = $result[0]["phone"];
            $instance->privilege = $result[0]["privilege"];
        }
        return $instance;
    }

    public function encryptPassword($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPassword($password){
        return password_verify($password, $this->password);
    }

    public function setPrivilege($privilege){
        $user = 5;
        $admin = 10;

        if($privilege == "user"){
            return $user;
        }
        else if($privilege == "admin"){
            return $admin;
        }
        else{
            return 0;
        }
    }

    public function isUserExist($username){
        $result = $this->db->queryDB("SELECT * FROM Account WHERE username = ?", 
                                    array($username));
        if(!empty($result)){
            return true;
        } else {
            return false;
        }
    }

    public function createAccount(){
        $result = $this->db->executeDB("INSERT INTO Account VALUES (?, ?, ?, ?, ?)", 
                                        array($this->username, $this->password, $this->email, $this->phone, $this->privilege));
        return $result;
    }

    public function modifiedPassword($newPassword){
        $this->password = $this->encryptPassword($newPassword);
        $result = $this->db->executeDB("UPDATE Account SET password = ? WHERE username = ?",
                                        array($this->password, $this->username));
        return $result;
    }

    public function modifiedAccountInfo(){
        $result = $this->db->executeDB("UPDATE Account SET phone = ?, email = ? WHERE username = ?",
                                        array($this->phone, $this->email, $this->username));
        return $result;
    }
}

?>