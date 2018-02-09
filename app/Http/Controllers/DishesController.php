<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
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
    // public function index()
    // {
    //     $dishes = Dishes::all();
    //     return view('dishes.dishes_show', [
    //         'dishes' => $dishes
    //     ]);
    // }

  public function index()
    {
      
       $dishes = Dishes::paginate(5);
        return view('welcome', [
            'dishes' => $dishes
        ]);
    }


    public function dishesByCart($id)
    {
        return $dishes = Dishes::findOrFail('$id');
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
        $path = $this->pathModificator($path, 's');
        $post['dish_picture'] = $path;
        Dishes::create($post);
        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dishes = [Dishes::findOrFail($id)];

        return view('welcome', [
            'dishes' => $dishes
        ]);
    }

    public function showOneDish($id)
    {
        $dish = [Dishes::findOrFail($id)];
        return view('dishes.showOneDish', [
            'dish' => $dish
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dishes::findOrFail($id);
        return view('dishes.dishes_edit', [
            'dish' => $dish
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, $id)
    {
        $dishToSave = Dishes::findOrFail($id);
        $this->validator($data);
        $post = $data->except('_token');
        if(!isset($post['dish_picture'])){ // old web link
            $dishToSave->update($post);
        } else { // new image from PC
            $path = $data->file('dish_picture')->storePublicly('public/dishes'); 
            $path = $this->pathModificator($path, 's');
            $post['dish_picture'] = $path;
            $dishToSave->update($post);
        }
        return redirect()->route('welcome');
         //return redirect()->route('dishes_show');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dishToDestroy = Dishes::findOrFail($id);
        $path = $dishToDestroy['dish_picture'];
        $path = $this->pathModificator($path, 'd');
   //     dump($path);
       Storage::disk('public')->delete($path);
       $dishToDestroy->delete();
      
        return redirect()->route('welcome');

       //return redirect()->route('dishes_show');
    }

     public function pathModificator($path, $direction){
       
        $path = explode('/', $path);
        if($direction == 'd'){
            $path[0] = '';
        } else {
           $path[0] = 'storage';  
        }
        $path = implode('/', $path);
        return $path;       
        }
}

