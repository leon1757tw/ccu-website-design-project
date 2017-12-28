<?php
require_once("../model/database.php");

/**
*大致上都打好了拉，最後改個資料表的名稱以及每個欄位的名稱就降 
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
		$result = $this->db->queryDB("SELECT * FROM ticket",array());
		return $result;
	}

	public function updateTicket($ticketName,$ticketAmount,$ticketPrice,$ticketInfo,$ticketId){
		$this->ticketId = $ticketId;
		$this->ticketName = $ticketName;
		$this->ticketAmount = $ticketAmount;
		$this->ticketPrice = $ticketPrice;
		$this->ticketInfo = $ticketInfo;

		$result = $this->db->executeDB("UPDATE ticket SET t_name=?, t_amount=?, t_price=?, t_info=?
WHERE t_id=$this->ticketId;",array($this->ticketName,$this->ticketAmount,$this->ticketPrice,$this->ticketInfo));

		return $result;

	}

	public function deleteTicket($ticketId){
		$this->ticketId = $ticketId;

		$result = $this->db->executeDB("DELETE FROM ticket WHERE t_id=?",array($this->ticketId));

		return $result;
	}
	
}

?>