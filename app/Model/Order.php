<?php
namespace Model;

require_once(__DIR__ . "/../../autoload.php");
use Model\DBController as DBController;

class Order{
    private $db;

    public function __construct(){
        $this->db = new DBController();
    }

    public function getOrder($createUser){
        $result = $this->db->queryDB("SELECT * FROM `Order` WHERE create_user = ? ORDER BY order_id ASC",
                                    array($createUser));
        return $result;
    }

    public function getOrderItem($orderId){
        $result = $this->db->queryDB("SELECT * FROM `Order_Item` WHERE order_id = ?",
                                    array($orderId));
        return $result;
    }

    public function getOrderByTicketId($ticketId){
        $orders = $this->db->queryDB("SELECT * FROM `Order_Item` WHERE ticket_id = ?",
                                        array($ticketId));
        $result = array();
        foreach($orders as $order){
            $data = $this->db->queryDB("SELECT * FROM `Order` WHERE order_id = ?",
                                        array($order["order_id"]));
            array_push($result, array("order_id" => $order["order_id"],
                                        "create_user" => $data[0]["create_user"],
                                        "create_date" => $data[0]["create_date"],
                                        "order_quantity" => $order["order_quantity"]));
        }
        return $result;
    }

    public function createOrder($createUser, $items, $orderPrice){        
        $date = new \DateTime();
        $date->setTimezone(new \DateTimeZone("Asia/Taipei"));
        $createDate = $date->format("Y-m-d H:i:s");

        $result = $this->db->executeDB("INSERT INTO `Order` VALUES (?, ?, ?, ?)",
                                        array(null, $createUser, $createDate, $orderPrice));

        $orderId = $this->db->getLastInsertId();
        foreach($items as $itemId => $itemAttributes){
            $this->db->executeDB("INSERT INTO `Order_Item` VALUES (?, ?, ?)",
                                array($orderId, $itemId, $itemAttributes["quantity"]));
        }
    }  
}

?>