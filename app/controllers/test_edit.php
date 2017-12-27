<?php
require_once("../model/ticket.php");

$ticket = new Ticket();

/*$test1 = "9";
$test2 = "456";
$test3 = "876686";
$test4 = "PPzhi";

$result = $ticket->addTicket($test1,$test2,$test3,$test4);*/

$row = $ticket->takeTicket();

foreach ($row as $k1 => $v1) {
	//echo "Array[$k1]<br>";
	foreach ($v1 as $k2 => $v2) {
		echo "[$k2]=>$v2 ";
	}
	echo "<br>";
}



/*if($result){
	echo"OK";
	
}*/

?>