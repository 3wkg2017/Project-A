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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'DishesController@index')->name('welcome');

Auth::routes();

Route::get('/dishes_create', 'DishesController@create')->name('dishes_create')->middleware('isAdmin');
//Route::get('/dishes_show', 'DishesController@index')->name('dishes_show');
Route::post('/dishes_store', 'DishesController@store')->name('dishes_store')->middleware('isAdmin');
Route::get('/dishes_edit/{dish_id}', 'DishesController@edit')->name('dishes_edit')->middleware('isAdmin');
Route::post('/dishes_update/{dish_id}', 'DishesController@update')->name('dishes_update')->middleware('isAdmin');
Route::get('/dishes_destroy/{dish_id}', 'DishesController@destroy')->name('dishes_destroy')->middleware('isAdmin');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'Profile@edit')->name('profile.edit');
Route::post('/profile/{id}', 'Profile@update')->name('profile.update');

Route::resource('/carts', 'CartsController');
Route::resource('/orders', 'OrdersController');

//Route::get('/', 'DishesController@toHome')->name('welcome');
// Route::get('admin_area', ['middleware' => 'admin', function () {
// }]);

// Route::get()->middleware('isAdmin')->except('index');