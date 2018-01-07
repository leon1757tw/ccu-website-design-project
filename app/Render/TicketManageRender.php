<?php
namespace Render;

require_once(__DIR__ . "/../../autoload.php");
use \Model\Ticket as Ticket;
use \Model\Order as Order;
use \Model\Message as Message;

class TicketManageRender{
    public $ticketId;
    private $ticket;
    private $order;
    private $message;

    public function __construct($ticketId){
        $this->ticket = new Ticket();
        $this->order = new Order();
        $this->message = new Message();
        $this->ticketId = $ticketId;
    }

    public function renderTicket(){
        return $this->ticket->getTicket($this->ticketId);        
    }
    
    public function renderOrder(){ 
        return $this->order->getOrderByTicketId($this->ticketId);
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