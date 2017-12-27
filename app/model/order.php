<?php
require_once("./database.php");

class Order{
    private $db;

    //User
    public function __construct(){
        $this->db = new DBController();
    }

    public function getOrder($createUser){
        $result = $this->db->queryDB("SELECT * FROM order WHERE create_user = ?",
                                    array($createUser));
        return $result;
    }

    public function createOrder($items, $createUser, $totalPrice){  
        if(isset($items)){

        }
    }

    public function modifiedOrder(){

    }

    public function deleteOrder(){

    }

    //Admin
    public function getOrderByAdmin($ticketOwner){
        $tickets = $this->db->queryDB("SELECT ticket_id FROM ticket WHERE create_user = ?",
                                        array($ticketOwner));
        $orders = [];
        $count = 0;
        foreach($tickets as $ticket){
            $orders[$i++] = $this->db->queryDB("SELECT order_id FROM Order_Item WHERE ticket_id = ?",
                                            array($ticket));
        }
    }
}

?>