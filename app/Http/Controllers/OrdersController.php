<?php

namespace App\Http\Controllers;
use App\Cart;
use App\User;
use App\Order;
use App\Dishes;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use WebToPay;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){

          if(Auth::user()->role == 'user'){   // user
              $user = Auth::user();
              $orders = Order::where('user_id', $user->id)->paginate(15);
            
              return view('orders.index', [
                     'orders' => $orders,
                     'user' => $user,
                     
                  ]);
          }
          else {                        // admin
              $allOrders = Order::all();
              $allOrders = count($allOrders);
              $orders = Order::paginate(15);
              return view('orders.index', [
                     'orders' => $orders,
                      'allOrders' => $allOrders
                  ]);
          }
        }
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

        // pakeisti i helperio klases metodus
        $total_amount = 0;
        foreach($carts as $cart){
            $dish = $cart->dishes;
            $dish_price = $dish->dish_price;
            $total_amount += $dish_price;
        }

        $tax_amount = $total_amount*0.21;

        $order_status = 'new';

        $orderToSave =[
            'tax_amount' => $tax_amount,
            'total_amount' => $total_amount,
            'user_id' => $user->id,
            'order_status' => $order_status
        ];

        $order = Order::create($orderToSave);
        $order_id = $order->id;
        $carts = Cart::whereNull('order_id')->where('token', $currentToken)->update(['order_id' =>  $order_id]);


       $total_amount = $total_amount * 100; // for Paysera Only

        try {
               // $self_url = get_self_url();
             
                $request = WebToPay::redirectToPayment(array(
                    'projectid'     => env('PROJECT_ID'), 
                    'sign_password' => env('SIGN_PASSWORD'),
                    'orderid'       => $order_id,
                    'amount'        => $total_amount,
                    'currency'      => 'EUR',
                    'country'       => 'LT',
                    'accepturl'     => url('accept'),
                    'cancelurl'     => url('cancel'),
                    'callbackurl'   => url('callback'),
                    'test'          => 1,
                ));
            } catch (WebToPayException $e) {
                // handle exception
            } 


     // return redirect()->route('orders.index');
   
           

      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
       
    }


    public function accept()
    {
       //
        $orderId = $this->responser();

        $order = Order::where('id', $orderId)
            ->update(['order_status' => 'ordered' ]);

        return view('payments.accept');
    }

    public function cancel()
    {
        return view('payments.cancel');
    }

    public function callback()
    {
        $orderId = $this->responser();
        $order = Order::where('id', $orderId)
            ->update(['order_status' => 'paid' ]);
        return view('payments.accept');

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
        //dd($order);
        $order->delete();
        //return view('orders.index');
        return redirect()->route('orders.index');
    }

    public function getDish($order){
        $carts = Cart::where('order_id', $order)->get(); // many Carts
        $dishName = [];
        foreach($carts as $cart){
            $dishName = $cart->dishes->dish_name;
            array_push($dishContainer, $dishName);
        }
        return $dishContainer;
    }

    public function responser(){

        try {
        $response = WebToPay::checkResponse($_GET, array(
        'projectid'     => env('PROJECT_ID'),
        'sign_password' => env('SIGN_PASSWORD')
        ));
        


        $orderId = $response['orderid'];
        return $orderId;

        echo 'OK';
        } catch (Exception $e) {
            echo get_class($e) . ': ' . $e->getMessage();
        }
 
    }

    


}

