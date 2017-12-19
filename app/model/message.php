<?php
require_once("./database.php");

$date = new DateTime();
$date->setTimezone(new DateTimeZone("Asia/Taipei"));
$createDate = $date->format("Y-m-d H:i:s");

$message = new MessageManage();



class MessageManage{

    private $db;

    public function __construct(){
        $this->db = new DBController();
    }

    public function getMessages($ticketId){
        $result = $this->db->queryDB("SELECT * FROM message WHERE ticket_id = ?",
                                        array($ticketId));
        return $result;
    }

    public function add($ticketId, $createUser, $createDate, $message){
       // $date = new DateTime();
        //$date->setTimezone(new DateTimeZone("Asia/Taipei"));

        $result = $this->db->executeDB("INSERT INTO message VALUES (?, ?, ?, ?)",
                                        array($ticketId, $createUser, $createDate, $message));
        return $result;
    }
}

?>