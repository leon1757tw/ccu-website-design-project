<?php
namespace Model;

require_once(__DIR__ . "/../../autoload.php");
use Model\DBController as DBController;

class Ticket{
	public $ticketId;
	public $createUser;
	public $ticketName;
	public $ticketQuantity;
	public $ticketPrice;
	public $ticketInfo;
	public $ticketImage;
	private $db;

	public function __construct(){
		$this->db = new DBController();
	}
	
	public function addTicket($ticketName, $createUser, $ticketQuantity, $ticketPrice, $ticketInfo, $ticketImage){
		$this->ticketId = null;
		$this->ticketName = $ticketName;
		$this->ticketQuantity = $ticketQuantity;
		$this->ticketPrice = $ticketPrice;
		$this->ticketInfo = $ticketInfo;
		$this->ticketImage = $ticketImage;
		
		$result = $this->db->executeDB("INSERT INTO Ticket VALUES (?, ?, ?, ?, ?, ?, ?)", 
                                        array($this->ticketId, $createUser, $this->ticketName, $this->ticketQuantity, $this->ticketPrice, $this->ticketInfo, $this->ticketImage));
        return $result;
	}
	//-----------------------------------

	public function getTicket($ticketId){
		$this->ticketId = $ticketId;
		$result = $this->db->queryDB("SELECT * FROM Ticket WHERE ticket_id = ?",
									array($this->ticketId));
		return $result;
	}

	public function getAllTickets(){
		$result = $this->db->queryDB("SELECT * FROM Ticket ORDER BY ticket_id DESC",
									array());
		return $result;
	}

	public function getTicketsByOwner($createUser){
		$this->createUser = $createUser;
		$result = $this->db->queryDB("SELECT * FROM Ticket WHERE create_user = ?", 
									array($this->createUser));
		return $result;
	}

	public function updateTicketQuantity($tickets){
		foreach($tickets as $ticketId => $ticketAttributes){
			$this->db->executeDB("UPDATE Ticket SET ticket_quantity = ticket_quantity - ? WHERE ticket_id= ?",
								array($ticketAttributes["quantity"], $ticketId));
        }
	}

	public function updateTicket($ticketId, $ticketName, $ticketQuantity, $ticketPrice, $ticketInfo, $ticketImage){
		$result = $this->db->executeDB("UPDATE Ticket SET ticket_name = ?, ticket_quantity = ?, ticket_price = ?, ticket_info = ?, ticket_image = ? WHERE ticket_id = ?",
										array($ticketName, $ticketQuantity, $ticketPrice, $ticketInfo, $ticketImage, $ticketId));
		return $result;
	}
}

?>