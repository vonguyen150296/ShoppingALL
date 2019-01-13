<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){ //initilisation objet
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id){ //add 1 product in the cart
		$price = $item->unit_price;
		if($item->promotion_price != 0){
			$price = $item->promotion_price;
		}
		$cart = ['qty'=>0, 'price' =>$price , 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$cart = $this->items[$id];
			}
		}
		$cart['qty']++;
		$cart['price'] = $price * $cart['qty'];
		$this->items[$id] = $cart;
		$this->totalQty++;
		$this->totalPrice += $price;
	}

	public function add_multi($item, $id, $quantity){
		$price = $item->unit_price;
		if($item->promotion_price != 0){
			$price = $item->promotion_price;
		}
		$cart = ['qty'=>0, 'price' =>$price , 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$cart = $this->items[$id];
			}
		}
		$cart['qty']+= $quantity;
		$cart['price'] = $price * $cart['qty'];
		$this->items[$id] = $cart;
		$this->totalQty+= $quantity;
		$this->totalPrice += $price*$quantity;
	}


	//reduce 1 of item
	public function reduceByOne($id){
		$price = $this->items[$id]['item']['unit_price'];
		if($this->items[$id]['item']['promotion_price']!=0){
			$price = $this->items[$id]['item']['promotion_price'];
		}
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $price;
		$this->totalQty--;
		$this->totalPrice -= $price;
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//remove 1 product
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
