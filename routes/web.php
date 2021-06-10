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
Route::resource('cart', 'CartController')->only(['index', 'store']);
Route::get('user', 'UserController@index');


// middleware for authenticator
Route::middleware(['auth-permission'])->group(function () {
    Route::get('log-in', 'AuthController@signin');
    Route::post('log-in', 'AuthController@signin_post');
    Route::get('sign-up', 'AuthController@signup');
    Route::post('sign-up', 'AuthController@signup_post');
});

Route::get('logout', 'AuthController@logout');
Route::get('valid-email/{username}/{email}', 'AuthController@email_valid');


// request admin with middleware
Route::middleware(['user-permission'])->group(function () {
    Route::prefix('be-admin')->group(function () {
        Route::get('', 'AdminController@index');
        Route::resource('products', 'AdminProductsController');
        Route::resource('users', 'AdminUsersController');
        Route::resource('taxonomies', 'AdminTaxonomiesController');
        Route::resource('orders', 'AdminOrdersController')
            ->only(['index', 'destroy', 'update']);
        Route::resource('comments', 'AdminCommentsController')
            ->only(['index', 'destroy']);
    });
});

// request not middleware
Route::prefix('be-admin')->group(function () {
    Route::resource('comments', 'AdminCommentsController')
        ->only(['store']);
});
// Route::middleware('auth:api')->get('/user', 'UserController@AuthRouteAPI');


