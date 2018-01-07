<?php
namespace Render;

require_once(__DIR__ . "/../../autoload.php");
use \Model\Cart as Cart;

class CartRender{
    private $cart;

    public function __construct(){
        $this->cart = new Cart();
    }

    public function renderCartItems(){
        $items = new Cart();
        return $items->getItems();
    }

    public function renderCartTotalPrice(){
        $items = new Cart();
        return $items->getTotalPrice();     
    }

    public function renderCartTotalItems(){
        $items = new Cart();
        return $items->getTotalItem();
    }
}
?>