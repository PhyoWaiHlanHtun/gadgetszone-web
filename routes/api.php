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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('staff', 'Api\StaffController@index');
Route::get('accountant', 'Api\AccountantController@index');
Route::get('agents', 'Api\AgentController@index');
Route::get('{type}/{id}/users', 'Api\UserController@agent');
Route::get('users', 'Api\UserController@admin');
Route::get('levels', 'Api\DataController@levels');
Route::get('referrals', 'Api\DataController@referrals');
Route::get('topups/{type}', 'Api\DataController@topup');
Route::get('invests/{type}', 'Api\DataController@invest');
Route::get('withdrawls/{type}', 'Api\DataController@withdrawal');
Route::get('donations', 'Api\DataController@donations');

Route::get('banks', 'Api\DataController@banks');
Route::get('bank/image/{id}', 'Api\DataController@bank_image');

Route::post('products', 'Api\ProductController@index')->name('products.api');
Route::get('single-product\{id}', 'Api\ProductController@single')->name('single.api');

Route::get('purchases', 'Api\DataController@purchases');


// App

Route::post('/register', 'Api\Auth\UserController@register');
Route::post('/login', 'Api\Auth\UserController@login');

Route::middleware('auth:api')->group(function () {
    Route::get('/profile', 'Api\Auth\UserController@profile')->name('api.user_profile');
    Route::post('/profile/update', 'Api\Auth\UserController@profile_edit')->name('api.user_profile.update');
    Route::get('/dashboard', 'Api\Auth\UserController@dashboard');
    Route::post('/logout', 'Api\Auth\UserController@logout');

    Route::get('/withdrawal/history', 'Api\HistoryController@withdrawal');
    Route::get('/topup/history', 'Api\HistoryController@topup');
    Route::get('/investment/history', 'Api\HistoryController@investment');
    Route::get('/today/purchase', 'Api\HistoryController@today_purchase');
    Route::get('/today/purchase/count', 'Api\HistoryController@today_purchase_count');
    Route::get('/purchase/history', 'Api\HistoryController@purchase');

    // Route::post('/topup', 'Api\PaymentController@topup');
    // Route::post('/withdrawal', 'Api\PaymentController@withdrawal');
    // Route::post('/investment', 'Api\PaymentController@investment');

    // Route::get('/purchase/{product}', 'Api\PurchaseController@index');
});

// Route::get('/payment-type/{type}', 'Api\PaymentController@types');
// Route::post('/donation', 'Api\PaymentController@donation');

Route::get('/home/ads', 'Api\HomeController@ads');
Route::get('/home/partners', 'Api\HomeController@partners');
Route::get('/home/banners', 'Api\HomeController@banners');

Route::get('/about-us', 'Api\AboutUsController@index');
// Route::get('/diginvest', 'Api\DigInvestController@index');

Route::get('/all-products', 'Api\ProductController@all_products');
Route::get('/new-products', 'Api\ProductController@new_products');
Route::get('/special-products', 'Api\ProductController@special_products');
Route::get('/product/{id}', 'Api\ProductController@show');
