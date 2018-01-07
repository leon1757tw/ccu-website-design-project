<?php
namespace Render;

require_once(__DIR__ . "/../../autoload.php");

use \Model\Cart as Cart;
use \Model\Account as Account;

class HeaderRender{
    private $cart;
    private $account;

    public function __construct(){
        $this->cart = new Cart();
    }

    public function renderAccountInfo($username){
        $user = Account::findByUsername($username);
        return array("username" => $user->username,
                        "phone" => $user->phone,
                        "email" => $user->email);
    }

    public function renderCartTotalItem(){
        return $this->cart->getTotalItem();
    }
}
?>