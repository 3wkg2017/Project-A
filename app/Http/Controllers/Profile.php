<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
USE Illuminate\Http\Request;
USE App\Country;
use DB;

class Profile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
          // public function show($id)

           $users = DB::table('users')
               ->join('countries', 'users.country', '=', 'countries.id')
               ->select('users.id','users.name','users.surname', 'users.email', 'users.date_of_birth','users.phone_number',
               'users.address','users.city','users.zip_code','users.role','countries.name AS c_name')
               ->get();
       return view('auth.users', [
           'users' => $users
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $countries = Country::all();
        $user = \Auth::user();
        return view('auth.edit', [
        'user' => $user,
        'countries' => $countries
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $this->validator($request);
      $updatableUser = User::findOrFail($id);
      $post = $request->except('_token');
      $updatableUser->update($post);
      return redirect()->route('welcome');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $userToDestroy = User::findOrFail($id);
        $userToDestroy->delete();
        return redirect()->route('profile.users');

    }

  protected function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'required|string|max:127',
            'surname' => 'required|string|max:127',
            'date_of_birth' => 'required|date|max:255', // need to be changed
            'address' => 'required|string|max:127',
            'city' => 'required|string|max:64',
            'country' => 'required|string|max:64',
            'phone_number' => 'required|string|max:20|regex:/^(\+)?\d+$/|unique:users',
            'zip_code' => 'required|numeric|max:999999',
            'email' => 'required|string|email|max:127|unique:users',
            ]);
    }

}
