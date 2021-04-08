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

Route::get('/', 'WelcomeController@index');
// Route::get('/products', 'WelcomeController@index');
Route::get('/products/{id?}', 'ProductsController@index');
Route::get('/admin','WelcomeController@admin' )->middleware('checkpass');
Route::get('/login','WelcomeController@login' );
Route::get('/photos-action','WelcomeController@photos');
Route::resource("photos", "PhotoController");

