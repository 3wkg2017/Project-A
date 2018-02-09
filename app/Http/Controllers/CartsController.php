<?php

namespace App\Http\Controllers;
use App\User;
use App\Cart;
use App\Dishes;
use App\Helpers\CartCalculator;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CartsController extends Controller
{
    protected $CartCalculator;

    public function __construct(CartCalculator $CartCalculator){
         $this->CartCalculator = $CartCalculator;
    }

    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
       $carts = $this->CartCalculator->getCarts();
       $carts_total = $this->CartCalculator->getTotalPrice();
       $carts_size = $this->CartCalculator->getSize();
       return view('carts.index');
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cart = new Cart;
        $cart->token = $request->_token;
        $cart->dish_id = $request->dish_id;
        $cart->save();
        $dish = Dishes::where('id', $request->dish_id)->first();
        $dishes = Dishes::all;
        $cart->price = $dish->dish_price;
        //$carts=json_encode($cart);
        return new JsonResponse($cart);
        // return view('welcome', [
        //     'dishes' => $dishes,
        //    //  'carts' => $carts
        //      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('carts.index');
    }
}
