<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
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
//Auth::routes();
Route::get('/', 'HomeController@index');

Route::resource('products','ProductsController')->only(['index', 'show']);



Route::get('/login', 'AuthController@signin');
Route::get('/signup', 'AuthController@signup');

Route::get('/card', 'PurchaseController@card');
Route::get('/checkout', 'PurchaseController@checkout');
// Route::middleware('auth:api')->get('/user', 'UserController@AuthRouteAPI');


