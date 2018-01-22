<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
USE App\Country;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
       $countries = Country::all();
        return view('auth.register', [
            'countries' => $countries
        ]);
      
    }



     public function show()
    {
       $users = User::all();
        return view('home', [
            'users' => $users
        ]);
      
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:127',
            'surname' => 'required|string|max:127',
            'date_of_birth' => 'required|date|max:255', // need to be changed
            'address' => 'required|string|max:127',
            'city' => 'required|string|max:64',
            'country' => 'required|string|max:64',
            'phone_number' => 'required|string|max:20|regex:/^(\+)?\d+$/|unique:users',
            'zip_code' => 'required|string|max:10',
            'email' => 'required|string|email|max:127|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'date_of_birth' => $data['date_of_birth'],
            'address' => $data['address'],
            'city' => $data['city'],
            'country' => $data['country'],
            'phone_number' => $data['phone_number'],
            'zip_code' => $data['zip_code'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'user_type' => 1, // 1 means user
        ]);
    }



   

}
