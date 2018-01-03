<?php
require_once("../model/database.php");

class Ticket
{
	public $ticketId;
	public $createUser;
	public $ticketName;
	public $ticketQuantity;
	public $ticketPrice;
	public $ticketInfo;
	private $db;

	public function __construct(){
		$this->db = new DBController();
	}

	public function addTicket($ticketName,$ticketQuantity,$ticketPrice,$ticketInfo){
		$this->ticketId = null;
		$this->ticketName = $ticketName;
		$this->ticketQuantity = $ticketQuantity;
		$this->ticketPrice = $ticketPrice;
		$this->ticketInfo = $ticketInfo;
		
		$result = $this->db->executeDB("INSERT INTO Ticket VALUES (?, ?, ?, ?, ?)", 
                                        array($this->ticketId, $this->ticketName, $this->ticketQuantity, $this->ticketPrice, $this->ticketInfo));
        return $result;
	}
	//-----------------------------------
	public function getTicket($ticketId){
		$result = $this->db->queryDB("SELECT * FROM Ticket WHERE ticket_id = ?",
									array($ticketId));
		return $result;
	}

	public function getAllTickets(){
		$result = $this->db->queryDB("SELECT * FROM Ticket ORDER BY ticket_id DESC",
									array());
		return $result;
	}
	//-----------------------------------

	public function updateTicket($ticketName,$ticketQuantity,$ticketPrice,$ticketInfo,$ticketId){
		$this->ticketId = $ticketId;
		$this->ticketName = $ticketName;
		$this->ticketQuantity = $ticketQuantity;
		$this->ticketPrice = $ticketPrice;
		$this->ticketInfo = $ticketInfo;

		$result = $this->db->executeDB("UPDATE Ticket SET t_name=?, t_amount=?, t_price=?, t_info=?
WHERE t_id=$this->ticketId;",array($this->ticketName,$this->ticketQuantity,$this->ticketPrice,$this->ticketInfo));

		return $result;

	}

	public function deleteTicket($ticketId){
		$this->ticketId = $ticketId;

		$result = $this->db->executeDB("DELETE FROM ticket WHERE t_id=?",array($this->ticketId));

		return $result;
	}
	
}

?>