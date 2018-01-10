<?php session_start(); 

if($_SESSION["user_logged_in"] == "yes" && $_SESSION['user_name'] != null){
	require_once("ticket.php");
	$ticket = new Ticket();

	$myTicket = $ticket->takeTicket();

	
	foreach($myTicket as $key1 => $value1){

		foreach($value1 as $key2 => $value2){
			echo "[$key2]=>$value2  ";
		}
		echo "<br>";

	}
	echo '<a href="toModify.php">modify</a>';
	echo '<a href="toNew.php">new</a>';
	echo '<a href="logout.php">logout</a>';
}else
{
        echo 'You cant see this page!!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>