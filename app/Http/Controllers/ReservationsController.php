<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


class ReservationsController extends Controller
{


protected function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'required|string|max:32',
            'persons' => 'required|numeric|max:3',
            'date' => 'required',
            'time' => 'required',
            'phone' => 'required|string|max:16',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $reservations = Reservation::paginate(5);
      $user = Auth::user();
       return view('reservations.index', [
           'reservations' => $reservations,
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
        $user = \Auth::user();
        $today = now();
        $today->toDateString();



        return view('reservations.create', [
        'user' => $user, 
        'today' => $today
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request);
        $post = $request->except('_token');
        Reservation::create($post);
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $reservation = Reservation::findOrFail($id);
      return view('reservations.edit', [
      'reservation' => $reservation
      ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $reservationToSave = Reservation::findOrFail($request->id);
        $this->validator($request);
        $post = $request->except('_token');
        $reservationToSave->update($post);
       


       
        return view('reservations.index');

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
        $reservationToDestroy = Reservation::findOrFail($id);
        $reservationToDestroy->delete();
        return redirect()->route('reservations.index');
    }
}
