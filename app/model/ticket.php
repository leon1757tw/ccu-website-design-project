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

	
}

?>