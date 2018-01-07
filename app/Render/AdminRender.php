<?php
namespace Render;

require_once(__DIR__ . "/../../autoload.php");
use \Model\Ticket as Ticket;

class AdminRender{
    private $ticket;

    public function __construct(){
        $this->ticket = new Ticket();
    }

    public function renderOwnTickets($createUser){
        return $this->ticket->getTicketsByOwner($createUser);
    }
}

?>