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



// API for Android
/*Route::group(['prefix' => 'aip/v1/'], function() {
    // list available API routes
    Route::post('products', 'api\v1\ProductApiController@index');
});*/

// id could be a concatenated name and surname string identifier. Not yet implemented, so you can type-hint anything.
// Calling convention (example): store.dev/1/users

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {

    Route::post('customers/{customers}/deactivate', 'CustomerController@deactivate');
    Route::post('customers/{customers}/activate', 'CustomerController@activate');
    Route::resource('customers', 'CustomerController');

    Route::post('employees/{employees}/activate', 'EmployeeController@activate');
    Route::post('employees/{employees}/deactivate', 'EmployeeController@deactivate');
    Route::resource('employees', 'EmployeeController');

    Route::get('/', 'HomeController@index');

    Route::post('users/{users}/deactivate', 'UserController@deactivate');
    Route::post('users/{users}/activate', 'UserController@activate');
    Route::resource('users', 'UserController');

    /*Route::get('orders/{status}', 'OrderController@index');*/
    Route::resource('orders', 'OrderController');

    Route::post('products/{products}/activate', 'ProductController@activate');
    Route::post('products/{products}/deactivate', 'ProductController@deactivate');
    Route::resource('products', 'ProductController');

    Route::get('purchase', ['as' => 'purchase', 'uses' => 'PurchaseController@index']);
    Route::post('purchase', ['as' => 'purchase', 'uses' => 'PurchaseController@store']);
    Route::post('purchase/buy', 'PurchaseController@create');
    Route::get('purchase/success', 'PurchaseController@success');
    Route::get('my-orders', 'ActivityLogController@index');
    Route::get('user-settings', function() {
        return view('user.user-settings');
    });
});

/*Route::group(['prefix' => 'user', 'middleware' => 'auth:employee'], function() {

    //Route::get('orders', 'OrdersController@index');
    Route::get('orders/confirmed', 'OrdersController@confirmed');
});*/

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
