<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['api'])->group(function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');

    Route::post('register', 'RegistrationController@register');
    Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
    Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');
    Route::post('password/email', 'ForgotPasswordController@forgot');
    Route::post('password/reset', 'ForgotPasswordController@reset');

    Route::patch('user/profile', 'UserController@updateProfile');
});

Route::middleware('auth:api', 'throttle:60,1')->group(function () {

    Route::post('product', 'ProductsController@store');
    Route::delete('product/{id}', 'ProductsController@destroy');
    Route::get('putonproduct', 'ProductsController@putonproduct');
    Route::patch('product/{id}', 'ProductsController@update');
    Route::resource('product/comment', 'ProductCommentsController');

    Route::resource('order', 'OrdersController');
    Route::get('order/pay/{id}','OrdersController@pay');
    Route::get('orderbuy', 'OrdersController@buylist');
    Route::get('ordersell', 'OrdersController@selllist');

    Route::resource('order/comment', 'OrderCommentsController');
});

Route::get('product', 'ProductsController@index');
Route::get('product/random','ProductsController@random');
Route::get('product/{id}', 'ProductsController@show');
Route::get('newproduct', 'ProductsController@newproduct');
Route::get('productlist', 'ProductsController@searchproduct');

Route::get('user/info/{id}','UserController@userinfo');

Route::post('paypaycreate/{order_id}', 'PaypayController@create');
Route::post('paypaydetails/{order_id}', 'PaypayController@getdetails');
Route::post('paypaydelete', 'PaypayController@deleted');
Route::get('paypayrecreate/{id}', 'PaypayController@recreate');
