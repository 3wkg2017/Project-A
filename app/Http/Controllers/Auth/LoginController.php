<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\Helpers\CartCalculator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';




   // protected $redirectTo = '/carts';


    protected function redirectTo()
    {

      $cart = new CartCalculator();
      $cart = $cart->getCarts();
     
      //dd($cart);
      //dd(count($cart));
      
      if(count($cart)>0) {
        return '/carts';
      } else {
        return '/orders';
      }
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }







    // protected function authenticated(Request $request, $user)
    // {
    //     dd($user);
    // }
}
