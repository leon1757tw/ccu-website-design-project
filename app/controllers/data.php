<?php
require_once("./../model/account.php");
require_once("./../model/ticket.php");
require_once("./../model/cart.php");

class Data{

    public function __construct(){

    }

    public function getAccountInfo($username){
        $user = Account::findByUsername($username);
        return array("username" => $user->username,
                        "phone" => $user->phone,
                        "email" => $user->email);
    }

    public function getAllTickets(){
        $tickets = new Ticket();
        return $tickets->getAllTickets();
    }

    public function getCartItems(){
        $items = new Cart();
        return $items->getItems();
    }

    public function getCartTotalPrice(){
        $items = new Cart();
        return $items->getTotalPrice();     
    }

    public function getCartTotalItems(){
        $items = new Cart();
        return $items->getTotalItem();
    }
}
?>