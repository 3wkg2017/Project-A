<?php

namespace App\Http\Controllers;
use App\Cart;
use App\User;
use App\Order;
use App\Dishes;
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
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();
        $carts = Cart::all();
        return view('orders.index', [
           'orders' => $orders,
           'carts' => $carts,
           'user' => $user
        ]);
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

        $carts = Cart::whereNull('order_id')->where('token', $currentToken)->get();

        $total_amount = 0;
        foreach($carts as $cart){
            $dish = $cart->dishes;
            $dish_price = $dish->dish_price;
            $total_amount += $dish_price;
        }

        $tax_amount = $total_amount*0.21;

        $orderToSave =[
            'tax_amount' => $tax_amount,
            'total_amount' => $total_amount,
            'user_id' => $user->id
        ];

        $order = Order::create($orderToSave);

        $order_id = $order->id;
        $carts = Cart::whereNull('order_id')->where('token', $currentToken)->update(['order_id' =>  $order_id]);

        //$carts = Cart::where('order_id', $order_id)->get();


        // user->order | order->cart | dish->cart

        $orders = Order::where('user_id', $user->id)->get();
        // $carts = Cart::where('order_id', $order_id)->get();
        $carts = Cart::all();
        // $orderM = new Order();
        // $carts = $orderM->carts();
        // $cartsM = new Cart();
        // $dishes = $cartsM->dishes();


          return view('orders.index', [
             'orders' => $orders,
             'carts' => $carts,
             'user' => $user
          ]);

      //  //return redirect()->route('orders.index');
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
