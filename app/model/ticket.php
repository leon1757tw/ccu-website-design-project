<?php
require_once("../model/database.php");

/**
* 
*/
class Ticket
{
	public $ticketId;
	public $ticketName;
	public $ticketAmount;
	public $ticketPrice;
	public $ticketInfo;
	private $db;

	function __construct()
	{
		$this->db = new DBController();
	}



	public function addTicket($ticketName,$ticketAmount,$ticketPrice,$ticketInfo){
		$this->ticketId = null;
		$this->ticketName = $ticketName;
		$this->ticketAmount = $ticketAmount;
		$this->ticketPrice = $ticketPrice;
		$this->ticketInfo = $ticketInfo;
		
		$result = $this->db->executeDB("INSERT INTO ticket VALUES (?, ?, ?, ?, ?)", 
                                        array($this->ticketId, $this->ticketName, $this->ticketAmount, $this->ticketPrice, $this->ticketInfo));
        return $result;
	}

	public function takeTicket(){
		$result = $this->db->executeDB_selc("SELECT * FROM ticket");
		$row = $result->fetchAll(PDO::FETCH_ASSOC);
		return $row;
		//$row = $result->fetchAll();
		/*while(){
			print_r($row);
		}*/
		/*foreach ($row as $key => $value) {
			echo "$key: $value<br>";
		}*/
		//print_r ($row = $result->fetchAll());
	}
	
}

?>