<?php
require_once("./database.php");

class Message{
    private $db;

    public function __construct(){
        $this->db = new DBController();
    }

    public function getMessages($ticketId){
        $result = $this->db->queryDB("SELECT * FROM message WHERE ticket_id = ?",
                                        array($ticketId));
        return $result;
    }

    public function addMessage($ticketId, $createUser, $messageContent){
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone("Asia/Taipei"));
        $createDate = $date->format("Y-m-d H:i:s");

        $result = $this->db->executeDB("INSERT INTO message VALUES (?, ?, ?, ?, ?)",
                                        array(NULL, $ticketId, $createUser, $createDate, $messageContent));
        return $result;
    }
}

?>