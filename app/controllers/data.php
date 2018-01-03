<?php
require_once("./../model/account.php");
require_once("./../model/ticket.php");

class Data{

    public function __construct(){

    }

    public function getAccountInfo($username){
        $user = Account::findByUsername($username);
        $data = array("username" => $user->username,
                        "phone" => $user->phone,
                        "email" => $user->email);
        return $data;
    }

    public function getAllTickets(){
        $tickets = new Ticket();
        $data = $tickets->getAllTickets();
        return $data;
    }
}
?>