<?php
namespace Render;

require_once(__DIR__ . "/../../autoload.php");
use \Model\Ticket as Ticket;
use \Model\Message as Message;

class TicketIntroRender{
    private $ticket;
    private $message;
    public $ticketId;

    public function __construct($ticketId){
        $this->ticket = new Ticket();
        $this->message = new Message();
        $this->ticketId = $ticketId;
    }

    public function renderTicket(){
        return $this->ticket->getTicket($this->ticketId);        
    }
    
    public function renderMessage(){
        return $this->message->getMessages($this->ticketId);
    }

    public function renderTotalMessage(){
        $count = 0;
        $messages = $this->message->getMessages($this->ticketId);
        foreach($messages as $message){
            ++$count;
        }
        return $count;
    }
}
?>

