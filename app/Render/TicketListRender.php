<?php
namespace Render;

require_once(__DIR__ . "/../../autoload.php");
use \Model\Ticket as Ticket;

class TicketListRender{
    private $ticket;

    public function __construct(){
        $this->ticket = new Ticket();
    }

    public function renderTickets(){
        return $this->ticket->getAllTickets();
    }
}

?>