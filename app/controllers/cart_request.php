<?php

class CartRequest{

    public $route;

    public function __construct($route){
        $this->route = $route;
    }

    public function addItem($ticketId, $ticketName, $ticketPrice){
        $href = $this->route . "?action=add" .
				"&ticket_id=" . $ticketId . 
				"&ticket_name=" . $ticketName .
                "&ticket_price=" . $ticketPrice;
        return $href;
    }

    public function deleteItem($ticketId){
        $href = $this->route . "?action=delete" .
				"&ticket_id=" . $ticketId; 
        return $href;
    }
}

?>