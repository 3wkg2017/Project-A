<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
USE Illuminate\Http\Request;
USE App\Country;

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
    public function show($id)
    {
        
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
      return redirect()->route('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
            'zip_code' => 'required|string|max:10',
            'email' => 'required|string|email|max:127|unique:users',
            ]);
    }

}
