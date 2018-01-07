<?php
namespace Render;

require_once(__DIR__ . "/../../autoload.php");
use \Model\Ticket as Ticket;

class IndexRender{
    private $ticket;

    public function __construct(){
        $this->ticket = new Ticket();
    }

    public function renderTickets(){
        $result = $this->ticket->getAllTickets();
        return $result;
    }
}

?>