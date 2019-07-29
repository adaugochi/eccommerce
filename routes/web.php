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
    $products = \App\Product::all();
    return view('welcome', compact('products'));
});

Auth::routes();
Route::post('/product/charge', 'CartController@addCheckOut');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/home', 'AdminController@index');
Route::get('/customer', 'AdminController@getCustomer');

Route::post('/product', 'ProductController@store');
Route::post('/product/{product}', 'ProductController@update');
Route::get('/product', 'ProductController@index');
Route::get('/product/new', 'ProductController@create');
Route::get('/product/{product}/edit', 'ProductController@edit');
Route::get('/product/{product}/view', 'ProductController@show');
Route::delete('product/{product}', 'ProductController@delete');


Route::get('/remove-one/{product}', 'CartController@removeOneProduct');
Route::get('/remove-all/{product}', 'CartController@removeAllProduct');
Route::get('/increase-one/{product}', 'CartController@increaseOneProduct');
Route::get('/add-to-cart/{product}', 'CartController@addToCart');
Route::get('/product/shopping-cart', 'CartController@getCart');
Route::get('/product/check-out', 'CartController@getCheckOut');

Route::get('/order', 'OrderController@index');
Route::get('/order/{order}/view', 'OrderController@view');
Route::post('/order/{order}', 'OrderController@deliver');




