<?php
namespace Model;

class Cart
{
	protected $cartId;
	protected $cartMaxItem = 100;
	protected $itemMaxQuantity = 100;
	private $items = [];
    
	public function __construct()
	{
		if (!session_id()) {
			session_start();
		}
		$this->cartId = md5((isset($_SESSION["username"])) ? $_SESSION["username"] : 'SimpleCart') . '_cart';
		$this->read();
	}
	
	public function getItems(){
		return $this->items;
	}

	public function isEmpty(){
		return empty(array_filter($this->items));
	}
	
	public function getTotalItem(){
		$total = 0;
		foreach ($this->items as $item) {
			++$total;
		}
		return $total;
	}
	
	public function getTotalQuantity(){
		$quantity = 0;
		foreach ($this->items as $item) {
			$quantity += $item['quantity'];
		}
		return $quantity;
	}
	
	public function getTotalPrice(){
		$total = 0;
		foreach ($this->items as $item) {
			if (isset($item['price'])) {
				$total += $item['price'] * $item['quantity'];
			}
		}
		return $total;
	}
	
	public function clear(){
		$this->items = [];
		$this->write();
	}
	
	public function add($ticketId, $ticketName, $quantity = 1, $price){
		$quantity = (preg_match('/^\d+$/', $quantity)) ? $quantity : 1;
		if (isset($this->items[$ticketId])) {
            $this->items[$ticketId]['quantity'] += $quantity;
            $this->items[$ticketId]['quantity'] = ($this->items[$ticketId]['quantity'] > $this->itemMaxQuantity) ? $this->itemMaxQuantity : $this->items[$ticketId]['quantity'];
            $this->write();
            return true;	
        }
		$this->items[$ticketId] = [
			'name' => $ticketName,
			'quantity' => ($quantity > $this->itemMaxQuantity) ? $this->itemMaxQuantity : $quantity,
			'price' => $price,
		];
		$this->write();
		return true;
	}
	
	public function update($ticketId, $quantity = 1){
		$quantity = (preg_match('/^\d+$/', $quantity)) ? $quantity : 1;
		if ($quantity == 0) {
			$this->remove($ticketId);
			return true;
		}
		if (isset($this->items[$ticketId])) {
            $this->items[$ticketId]['quantity'] = $quantity;
            $this->items[$ticketId]['quantity'] = ($this->items[$ticketId]['quantity'] > $this->itemMaxQuantity) ? $this->itemMaxQuantity : $this->items[$ticketId]['quantity'];
            $this->write();
            return true; 
		}
		return false;
	}
	
	public function remove($ticketId){
		if (!isset($this->items[$ticketId])) {
			return false;
		}
		unset($this->items[$ticketId]);
		$this->write();
		return true;
	}
	
	public function destroy(){
		$this->items = [];
		unset($_SESSION[$this->cartId]);
	}
	
	private function read(){
		$this->items = json_decode((isset($_SESSION[$this->cartId])) ? $_SESSION[$this->cartId] : '[]', true);
	}
	
	private function write(){
		$_SESSION[$this->cartId] = json_encode(array_filter($this->items));
	}
}

?>