<?php
require_once("../config/config.php");

class DBController{
    private $server = DB_SERVER;
    private $database = DB_NAME;
    private $account = DB_ACCOUNT;
    private $password = DB_PASSWORD;
    private $conn;

    public function __construct(){
        try{
            $this->conn = new PDO("mysql:host=$this->server;dbname=$this->database;charset=utf8", $this->account, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch ( PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function executeDB($sql, $arr){
        try{
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($arr);
            return $result;
        } catch (PDOException $e){
            echo "Database Error:" . $e->getMessage();
        }
    }

    public function executeDB_selc($sql){
        try{
            
            $result = $this->conn->query($sql);
            return $result;
        }catch (PDOException $e){
            echo "GG" . $e->getMessage();
        }
    }

    public function queryDB($sql, $arr){
        try{
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($arr);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e){
            echo "Database Error:" . $e->getMessage();
        }
    }
}

?>