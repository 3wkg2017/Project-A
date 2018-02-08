<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

// Route::middleware(['SharedCartInfo'])->group(function () {
//     Route::get('/', function () {
//     });
// });



Route::get('/', 'DishesController@index')->name('welcome');
Route::get('/dishes_create', 'DishesController@create')->name('dishes_create')->middleware('isAdmin');
Route::post('/dishes_store', 'DishesController@store')->name('dishes_store')->middleware('isAdmin');
Route::get('/dishes_edit/{dish_id}', 'DishesController@edit')->name('dishes_edit')->middleware('isAdmin');
Route::post('/dishes_update/{dish_id}', 'DishesController@update')->name('dishes_update')->middleware('isAdmin');
Route::get('/dishes_destroy/{dish_id}', 'DishesController@destroy')->name('dishes_destroy')->middleware('isAdmin');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'Profile@edit')->name('profile.edit');
Route::post('/profile/{id}', 'Profile@update')->name('profile.update');
Route::get('/users', 'Profile@show')->name('profile.users')->middleware('isAdmin');
Route::get('/users/{id}', 'Profile@destroy')->name('profile.destroy')->middleware('isAdmin');
Route::resource('/carts', 'CartsController');
Route::resource('/orders', 'OrdersController');
Route::resource('/reservations', 'ReservationsController');
//Route::get('/', 'DishesController@index')->name('showAll');
Route::get('/{id}', 'DishesController@show')->name('show');
Route::get('/{id}', 'DishesController@showOneDish')->name('showOneDish');


//Route::get('/', 'DishesController@index')->name('showAll');

