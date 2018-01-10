<?php session_start();
if($_SESSION["user_logged_in"] == "yes" && $_SESSION['user_name'] != null){

	require_once("ticket.php");

	$ticket = new Ticket();
	extract($_POST);

	$name = $_POST["name"];
	$amount = $_POST["amount"];
	$price = $_POST["price"];
	$info = $_POST["info"];

	$result = $ticket->addTicket($name,$amount,$price,$info);

	if($result){
		echo "Success, wait..";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=edit.php>';
	}else{
		echo "Failed!!";
	}
}else{
    echo 'You cant see this page!!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}

?>