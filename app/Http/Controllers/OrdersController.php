<?php

namespace App\Http\Controllers;
use App\Cart;
use App\User;
use App\Order;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = Order::table('orders')
        //    ->join('carts', 'orders.id', '=', 'carts.order_id')
        //    ->join('carts', 'dish_id', '=', 'dishes.id')
        //    ->join('users', 'user_id', '=', 'users.id')
        //    ->select('orders.id','orders.total_amount','orders.tax_amount', 'orders.created_at', 'dishes.dish_name','users.name','users.address')
        //    ->get();
        // $users->
        // $orders->Order:all();
        // $carts->$user->posts()->where('active', 1)->get();
        // $dishes->

        return view('orders.index');

        
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
        $currentToken = csrf_token();
        
        $user = Auth::user();
        
        $tax_amount = 951; //  <- NOT FINISHED, NEED TO CALCULATE
        $total_amount = 753; //  <- NOT FINISHED, NEED TO CALCULATE

        $orderToSave =[
            'tax_amount' => $tax_amount,
            'total_amount' => $total_amount,
            'user_id' => $user->id
        ];

        $order = Order::create($orderToSave);
        $order_id = $order->id;

 
        // foreach ($carts as $cart) {
        //     Cart::update('order_id', $order_id);
        // }

         $carts = Cart::whereNull('order_id')->where('user_token', $currentToken)->update(['order_id' =>  $order_id]);
        // 2. set new order_id to carts



        // this stuff we will take from blade:
        // $user = Auth::user();
        //    foreach($carts as $cart){
        //         $dishes = $cart->dishes()->get();    
        //     }
        


        //   return view('orders.index', [
        //     'carts' => $carts
        // ]);
//------------------------------------------------------------------
      //  dump($carts);
       // dump($user);
       // dd($dishes);


        //Order::create($request);
        //return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
