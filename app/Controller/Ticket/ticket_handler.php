<?php
require_once(__DIR__ . "/../../../autoload.php");
use \Model\Ticket as Ticket;
extract($_POST);
session_start();

print_r($_POST);

if(isset($_SESSION["username"]) && $_SESSION["identity"] == "admin"){
    $ticket = new Ticket();
    if($action == "add"){
        if($ticket->addTicket($ticketName, $_SESSION["username"], $ticketQuantity, $ticketPrice, $ticketInfo, $ticketImage)){
            echo("<script> alert('Add Success')</script>");
            header("Refresh:0 url=../../../public/admin.php");
        }
        else{

        }
    }
    else if($action == "update"){
        if($ticket->updateTicket($ticketId, $ticketName, $ticketQuantity, $ticketPrice, $ticketInfo, $ticketImage)){
            echo("<script> alert('Update Success')</script>");
            header("Refresh:0 url=../../../public/ticket_manage.php?ticket_id=$ticketId");
        }
    }
}
else{
    echo("<script> alert('Please Login First')</script>");
    header("Refresh:0 url=../../../public/ticket_intro.php?ticket_id=$ticketId");
}
?>