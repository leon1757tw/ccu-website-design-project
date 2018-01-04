<?php
require_once("../model/cart.php");

extract($_GET);

$cart = new Cart();

if($action == "add"){
    if($cart->add($ticket_id, $ticket_name, $quantity, $ticket_price)){
        echo "Add Success";
        header("Location: ./../view/cart.php");
    }
    else{
        echo "Add Failed";
    }
}
else if($action == "update"){
    if($cart->update($ticket_id, $quantity)){
        echo "Update Success";
        header("Location: ./../view/cart.php");
    }
    else{
        echo "Update Failed";
    }
}
else if($action == "delete"){
    if($cart->remove($ticket_id)){
        echo "Delete Success";
        header("Location: ./../view/cart.php");
    }
    else{
        echo "Delete Failed";
    }
}
else{

}

?>