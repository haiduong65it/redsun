<?php

namespace App;


class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
    	if ($oldCart){
    		$this->items = $oldCart->items;
    		$this->totalQty = $oldCart->totalQty;
    		$this->totalPrice = $oldCart->totalPrice;
    	}
    }

    public function add($item, $id, $detail, $qty){
    	$giohang = ['qty' => 0, 'price' => $detail->dongia, 'item' =>$item, 'detail' => $detail];
    	if ($this->items){
    		if (array_key_exists($id, $this->items)){
    			$giohang = $this->items[$id];
    		}
    	}
    	$giohang['qty'] += $qty;
    	$giohang['price'] = $detail->dongia * $giohang['qty'];
    	$this->items[$id] = $giohang;
    	$this->totalQty += $qty;
    	$this->totalPrice += $giohang['price'];
    }
    //Xóa 1
    public function reduceByOne($id){
    	$this->items[$id]['qty']--;
    	$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
    	$this->totalQty--;
    	$this->totalPrice -= $this->items[$id]['item']['price'];
    	if ($this->items[$id]['qty'] <= 0){
    		unset($this->items[$id]);
    	}
    } 
    //Xóa nhiều
    public function removeItem($id){
    	$this->totalQty -= $this->items[$id]['qty'];
    	$this->totalPrice -= $this->items[$id]['price'];
    	unset($this->items[$id]);
    }
}
