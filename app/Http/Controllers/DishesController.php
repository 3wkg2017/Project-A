<?php

namespace App\Http\Controllers;

use App\User;
use App\Dishes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dishes::all();
        return view('dishes.dishes_show', [
            'dishes' => $dishes
        ]);
    }


    protected function validator(Request $data) 
    {
       
        return Validator::make($data->all(), [
            'dish_name' => 'required|string|max:127',
            'dish_price' => 'required|numeric|max:10',
            'dish_description' => 'required|string|max:255', 
            'dish_picture' => 'required|string|max:127',
        ]);



    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create()
    {
        return view('dishes.dishes_create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        $this->validator($data);
        $path = $data->file('dish_picture')->storePublicly('public/dishes');
        $post = $data->except('_token');
        $path = $this->pathModificator($path);
        $post['dish_picture'] = $path;
        Dishes::create($post);
        return redirect()->route('dishes_show');
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
    public function edit($id)
    {
        //
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
        //
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

     public function pathModificator($path){
           $path = explode('/', $path);
           $path[0] = 'storage';
           $path = implode('/', $path);
        return $path;       
        }
}