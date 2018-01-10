<?php
	require_once("ticket.php");
	$ticket = new Ticket();

	$myTicket = $ticket->takeTicket();
	
	$t_name = $myTicket[0]["t_name"];
	$t_amount = $myTicket[0]["t_amount"];
	$t_price = 100000;
	$t_info = "GGININDER";
	$t_id = $myTicket[2]["t_id"];

	//$result = $ticket->updateTicket($t_name,$t_amount,$t_price,$t_info,$t_id);
	$result = $ticket->deleteTicket($t_id);

	if($result){
		echo "success";
	}else{
		echo "GG";
	}

	//print_r($myTicket[0]);
?>