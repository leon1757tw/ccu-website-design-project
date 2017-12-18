<?php
require_once("../model/database.php");

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
		$this->cartId = md5((isset($_SERVER['HTTP_HOST'])) ? $_SERVER['HTTP_HOST'] : 'SimpleCart') . '_cart';
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
		foreach ($this->items as $items) {
			foreach ($items as $item) {
				++$total;
			}
		}
		return $total;
	}
	
	public function getTotalQuantity(){
		$quantity = 0;
		foreach ($this->items as $items) {
			foreach ($items as $item) {
				$quantity += $item['quantity'];
			}
		}
		return $quantity;
	}
	
	public function getTotalPrice(){
		$total = 0;
		foreach ($this->items as $items) {
			foreach ($items as $item) {
				if (isset($item['attributes']['price'])) {
					$total += $item['attributes']['price'] * $item['quantity'];
				}
			}
		}
		return $total;
	}
	
	public function clear(){
		$this->items = [];
		$this->write();
	}
	
	public function isItemExists($id, $attributes = []){
		$attributes = (is_array($attributes)) ? array_filter($attributes) : [$attributes];
		if (isset($this->items[$id])) {
			$hash = md5(json_encode($attributes));
			foreach ($this->items[$id] as $item) {
				if ($item['hash'] == $hash) {
					return true;
				}
			}
		}
		return false;
	}
	
	public function add($id, $quantity = 1, $price){
		$quantity = (preg_match('/^\d+$/', $quantity)) ? $quantity : 1;
		if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] += $quantity;
            $this->items[$id]['quantity'] = ($this->items[$id]['quantity'] > $this->itemMaxQuantity) ? $this->itemMaxQuantity : $this->items[$id]['quantity'];
            $this->write();
            return true;	
        }
		$this->items[$id] = [
			'quantity' => ($quantity > $this->itemMaxQuantity) ? $this->itemMaxQuantity : $quantity,
			'price' => $price,
		];
		$this->write();
		return true;
	}
	
	public function update($id, $quantity = 1, $price){
		$quantity = (preg_match('/^\d+$/', $quantity)) ? $quantity : 1;
		if ($quantity == 0) {
			$this->remove($id);
			return true;
		}
		if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] = $quantity;
            $this->items[$id]['quantity'] = ($this->items[$id]['quantity'] > $this->itemMaxQuantity) ? $this->itemMaxQuantity : $this->items[$id]['quantity'];
            $this->write();
            return true; 
		}
		return false;
	}
	
	public function remove($id){
		if (!isset($this->items[$id])) {
			return false;
		}
		unset($this->items[$id]);
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