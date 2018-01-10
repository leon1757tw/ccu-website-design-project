<?php session_start();
require_once("ticket.php");

$ticket = new Ticket();

if($_SESSION["user_logged_in"] == "yes" && $_SESSION['user_name'] != null){
	$ticket->showNewBox();
}else
{
    echo 'You cant see this page!!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}

?>