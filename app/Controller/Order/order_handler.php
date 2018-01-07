<?php
require_once(__DIR__ . "/../../../autoload.php");
use \Model\Cart as Cart;
use \Model\Order as Order;
use \Model\Ticket as Ticket;

extract($_GET);
session_start();

$cart = new Cart();
$order = new Order();
$ticket = new Ticket();

if(isset($_SESSION["username"])){
    if($action == "create"){
        $order->createOrder($_SESSION["username"], $cart->getItems(), $cart->getTotalPrice());
        $ticket->updateTicketQuantity($cart->getItems());
        $cart->clear();
        header("Location: ../../../public/cart.php");
    }
}
else{
    echo("<script> alert('Please Login First')</script>");
    header("Refresh:0 url=../../../public/cart.php");
}

?>
