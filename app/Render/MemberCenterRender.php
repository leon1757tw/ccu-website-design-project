<?php
namespace Render;

require_once(__DIR__ . "/../../autoload.php");
use \Model\Order as Order;
use \Model\Account as Account;
use \Model\Ticket as Ticket;

class MemberCenterRender{
    private $order;
    private $ticket;

    public function __construct(){
        $this->order = new Order();
        $this->ticket = new Ticket();
    }
    
    public function renderAccountInfo($username){
        $user = Account::findByUsername($username);
        return array("username" => $user->username,
                        "phone" => $user->phone,
                        "email" => $user->email);
    }

    public function renderOrders($username){
        return $this->order->getOrder($username);
    }

    public function renderOrderItems($orderId){   
        return $this->order->getOrderItem($orderId);
    }

    public function renderTicketInfo($ticketID){
        $ticket = $this->ticket->getTicket($ticketID);
        return array("ticket_name" => $ticket[0]["ticket_name"],
                    "ticket_price" => $ticket[0]["ticket_price"]);
    }
}

?>