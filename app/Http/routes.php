<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', ['middleware' => 'guest', 'uses' => 'HomeController@index']);
Route::get('register/confirm/{token}', 'Auth\AuthController@confirmEmail');

Route::group(['prefix' => 'api/v1/'], function() {
    // list available API routes
    Route::get('products', 'api\v1\ProductApiController@index');
    Route::get('products/{products}', 'api\v1\ProductApiController@show');
});

// id could be a concatenated name and surname string identifier. Not yet implemented, so you can type-hint anything.
// Calling convention (example): store.dev/1/users

Route::group(['prefix' => 'customer', 'middleware' => ['auth', 'customer']], function() {
    Route::get('/', 'HomeController@index');
    Route::put('customers/{customers}', ['middleware' => 'auth', 'uses' => 'CustomerController@update']);
    Route::get('my-profile', 'HomeController@profile');
    Route::get('my-settings', 'HomeController@settings');
    Route::get('my-orders', 'HomeController@orders');
    Route::get('purchase', ['as' => 'purchase', 'uses' => 'PurchaseController@index']);
    Route::post('purchase', ['as' => 'purchase', 'uses' => 'PurchaseController@store']);
    Route::post('purchase/buy', 'PurchaseController@create');
    Route::get('purchase/success', 'PurchaseController@success');

    Route::post('orders', 'OrderController@store');


});


Route::group(['prefix' => 'user', 'middleware' => ['auth', 'no-customer']], function() {

    Route::put('customers/{customers}/deactivate', 'CustomerController@deactivate');
    Route::put('customers/{id}/activate', 'CustomerController@activate');
    Route::resource('customers', 'CustomerController');

    Route::put('employees/{id}/activate', 'EmployeeController@activate');
    Route::put('employees/{employees}/deactivate', 'EmployeeController@deactivate');
    Route::resource('employees', 'EmployeeController');

    Route::get('/', 'HomeController@index');

    Route::post('users/{users}/deactivate', 'UserController@deactivate');
    Route::post('users/{id}/activate', 'UserController@activate');

    Route::put('users/{users}', 'UserController@update');

    /*Route::get('orders/{status}', 'OrderController@index');*/
    Route::put('orders/{orders}', 'OrderController@deactivate');
    Route::resource('orders', 'OrderController');

    Route::put('products/{id}/activate', 'ProductController@activate');
    Route::put('products/{products}/deactivate', 'ProductController@deactivate');
    Route::resource('products', 'ProductController');

    Route::get('my-orders', 'HomeController@orders');
    Route::get('my-settings', 'HomeController@settings');
    Route::get('my-profile', 'HomeController@profile');
});

/*Route::group(['prefix' => 'user', 'middleware' => 'auth:employee'], function() {

    //Route::get('orders', 'OrdersController@index');
    Route::get('orders/confirmed', 'OrdersController@confirmed');
});*/

Route::resource('products', 'ProductController');

Route::get('cart', 'CartController@index');
Route::put('cart', 'CartController@update');
Route::delete('cart', 'CartController@destroy');

Route::controllers([
    'auth' => 'Auth\AuthController',
    //'password' => 'Auth\PasswordController',
]);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
