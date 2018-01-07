<?php
namespace Model;

require_once(__DIR__ . "/../../autoload.php");
use Model\DBController as DBController;

class Message{

    private $db;

    public function __construct(){
        $this->db = new DBController();
    }

    public function getMessages($ticketId){
        $result = $this->db->queryDB("SELECT * FROM `Message` WHERE ticket_id = ?",
                                        array($ticketId));
        return $result;
    }
    

    public function addMessage($ticketId, $createUser, $messageContent){
        $date = new \DateTime();
        $date->setTimezone(new \DateTimeZone("Asia/Taipei"));
        $createDate = $date->format("Y-m-d H:i:s");

        $result = $this->db->executeDB("INSERT INTO `Message` VALUES (?, ?, ?, ?, ?)",
                                        array(NULL, $ticketId, $createUser, $createDate, $messageContent));
        return $result;
    }
}

?>