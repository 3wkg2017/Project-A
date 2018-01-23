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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/dishes_create', 'DishesController@create')->name('dishes_create');
Route::get('/dishes_show', 'DishesController@index')->name('dishes_show');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'Profile@edit')->name('profile.edit');
Route::post('/profile/{id}', 'Profile@update')->name('profile.update');
Route::get('admin_area', ['middleware' => 'admin', function () {
}]);

