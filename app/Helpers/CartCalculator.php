<?php
namespace App\Helpers;
use App\Cart;
class CartCalculator
{

	public function getCarts(){
		$currentToken = csrf_token();
        $carts = Cart::whereNull('order_id')->where('token', $currentToken)->get();
        return $carts;
	}

	public function getTotalPrice(){
		$carts=$this->getCarts();
 		$carts_total = 0;
 		foreach ($carts as $cart) {
            $carts_total += $cart->dishes->dish_price;
        }
        return $carts_total;
	}

	public function getSize(){
		$carts=$this->getCarts();
		$carts_size = count($carts);
		return $carts_size;
	}


	public function getVAT(){
		$carts=$this->getCarts();
		return $this->getTotalPrice($carts)*0.21;
	}
}