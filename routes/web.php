<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ProductController@show');

Route::get('cart', 'CartController@show')->name('cart.show');
Route::get('cart/add/{id}', 'CartController@add')->name('cart.add');
Route::get('cart/remove/{rowId}', 'CartController@removeItem')->name('cart.remove');
Route::get('cart/removeAll', 'CartController@removeAllItem')->name('cart.removeAll');
Route::post('cart/update', 'CartController@update')->name('cart.update');
