<?php
require_once(__DIR__ . "/../../../autoload.php");
use \Model\Cart as Cart;
$cart = new Cart();
extract($_GET);

if($action == "add"){
    if($cart->add($ticket_id, $ticket_name, $quantity, $ticket_price)){
        echo "Add Success";
        header("Location: ../../../public/ticket_intro.php?ticket_id=$ticket_id");
    }
    else{
        echo "Add Failed";
    }
}
else if($action == "update"){
    if($cart->update($ticket_id, $quantity)){
        echo "Update Success";
        header("Location: ../../../public/cart.php");
    }
    else{
        echo "Update Failed";
    }
}
else if($action == "delete"){
    if($cart->remove($ticket_id)){
        echo "Delete Success";
        header("Location: ../../../public/cart.php");
    }
    else{
        echo "Delete Failed";
    }
}
else{

}

?>