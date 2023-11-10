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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/clientes', 'CustomerController@index')->name('customer.index');
Route::get('/clientes/nuevo', 'CustomerController@create')->name('customer.create');
Route::post('/clientes', 'CustomerController@store')->name('customer.store');
Route::get('/clientes/{customer}/editar', 'CustomerController@edit')->name('customer.edit');
Route::post('/clientes/{customer}', 'CustomerController@update')->name('customer.update');
Route::get('/clientes/{customer}/eliminar', 'CustomerController@delete')->name('customer.delete');
Route::post('/clientes/{customer}/eliminar', 'CustomerController@destroy')->name('customer.destroy');

Route::get('/productos', 'ProductController@index')->name('product.index');
Route::get('/productos/nuevo', 'ProductController@create')->name('product.create');
Route::post('/productos', 'ProductController@store')->name('product.store');
Route::get('/productos/{product}/editar', 'ProductController@edit')->name('product.edit');
Route::post('/productos/{product}', 'ProductController@update')->name('product.update');
Route::get('/productos/{product}/eliminar', 'ProductController@delete')->name('product.delete');
Route::post('/productos/{product}/eliminar', 'ProductController@destroy')->name('product.destroy');

Route::get('/habitaciones', 'RoomController@index')->name('room.index');
Route::get('/habitaciones/nuevo', 'RoomController@create')->name('room.create');
Route::post('/habitaciones', 'RoomController@store')->name('room.store');
Route::get('/habitaciones/{room}/editar', 'RoomController@edit')->name('room.edit');
Route::post('/habitaciones/{room}', 'RoomController@update')->name('room.update');
Route::get('/habitaciones/{room}/eliminar', 'RoomController@delete')->name('room.delete');
Route::post('/habitaciones/{room}/eliminar', 'RoomController@destroy')->name('room.destroy');

Route::get('/reservaciones/nuevo', 'BookingController@create')->name('booking.create');