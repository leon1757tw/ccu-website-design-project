<?php
	require_once("ticket.php");
	$ticket = new Ticket();

	$myTicket = $ticket->takeTicket();
	//print_r($myTicket);

	foreach($myTicket as $key1 => $value1){
		foreach($value1 as $key2 => $value2){
			echo "[$key2]=>$value2  ";
		}
		echo "<br>";
	}
?>

	<input type="button" value="register" onclick="location.href='toRegister.html'"/>
	<input type="button" value="log" onclick="location.href='log.html'"/>