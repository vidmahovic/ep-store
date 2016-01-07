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

Route::get('/', 'HomeController@index');



// API for Android
/*Route::group(['prefix' => 'aip/v1/'], function() {
    // list available API routes
    Route::post('products', 'api\v1\ProductApiController@index');
});*/

// id could be a concatenated name and surname string identifier. Not yet implemented, so you can type-hint anything.
// Calling convention (example): store.dev/1/users
Route::group(['prefix' => '{id}', 'middleware' => 'auth'], function() {
    Route::resource('users', 'UserController');
    Route::post('users/{user}/deactivate', 'UserController@deactivate');
    Route::post('users/{user}/activate', 'UserController@activate');
    Route::resource('products', 'ProductController');
    Route::post('products/{product}/deactivate', 'ProductController@deactivate');
    Route::post('products/{product}/activate', 'ProductController@activate');
    Route::get('/cart', function() {
        return view('user.cart');
    });
    Route::get('/user-settings', function() {
        return view('user.user-settings');
    });
});



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
