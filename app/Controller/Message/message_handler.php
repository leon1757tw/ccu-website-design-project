<?php
require_once(__DIR__ . "/../../../autoload.php");
use \Model\Message as Message;

extract($_POST);
session_start();

if(isset($_SESSION["username"])){
    $message = new Message();
    if($message->addMessage($ticketId, $_SESSION["username"], $messageContent)){
        if($_SESSION["identity"] == "admin"){
            header("Location: ../../../public/ticket_manage.php?ticket_id=$ticketId");
        }
        else if($_SESSION["identity"] == "user"){
            header("Location: ../../../public/ticket_intro.php?ticket_id=$ticketId");
        }
    }
}
else{
    echo("<script> alert('Please Login First')</script>");
    header("Refresh:0 ../../../public/ticket_intro.php?ticket_id=$ticketId");
}

?>