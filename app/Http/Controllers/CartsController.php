<?php

namespace App\Http\Controllers;
use App\User;
use App\Cart;
use App\Dishes;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function index()
    {
       
        $user = \Auth::user();
        $currentToken = csrf_token();
        $carts = Cart::where('token', $currentToken)->get();

        //$carts = Cart::find($currentToken);
        //$carts->dishes()->where('id', $carts->dish_id)->get();
        // dd($carts);
        //$user = App\User::find(1);
        //$user->posts()->where('active', 1)->get();

        // if(isset($carts)){
        //     foreach ($carts as  $cart) {
        //         $dishes = Dishes::where('id', $cart->dish_id)->get();
        //     }
             return view('carts.index', [
            // 'dishes' => $dishes,
             'carts' => $carts
             ]);

        // } else {
        //     echo 'No dishes selected';
        // }

        

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
        $cart->price = $dish->price; 
        echo json_encode($cart);
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
        //
    }
}
