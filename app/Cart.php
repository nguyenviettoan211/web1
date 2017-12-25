<?php
namespace App;

class Cart{
	public $items = null;
	public $totalQuantity = 0;
	public $totalPrice = 0;

	public function __construct($oldCart)
	{
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQuantity = $oldCart->totalQuantity;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	function add($item,$id){
		$cart = ['quantity'=>0,'price'=>$item->unit_price,'item'=>$item];

		if($this->items){
			if(array_key_exists($id,$this->items)){
				$cart = $this->items[$id];
			}
		}
		$cart['quantity']++;
		//check price
		if($item->promotion_price == 0){
			$cart['price'] = $item->unit_price * $cart['quantity'];
		} else {
			$cart['price'] = $item->promotion_price * $cart['quantity'];
		}
		$this->items[$id] = $cart;
		$this->totalQuantity++;
		if($item->promotion_price == 0) {
			$this->totalPrice += $item->unit_price;
		} else {
			$this->totalPrice += $item->promotion_price;
		}
	}

	function removeItem($id){
		$this->totalQuantity -= $this->items[$id]['quantity'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);

	}
}