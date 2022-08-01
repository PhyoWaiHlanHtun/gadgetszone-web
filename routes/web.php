<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('account.dashboard');

Route::group([], __DIR__.'/partials/auth.php');
Route::group([], __DIR__.'/partials/frontend.php');
Route::group([], __DIR__.'/partials/backend.php');

Route::get('/testing', function () {
    return view('backend.category.test');
});

Route::get('/test/{user}', 'Frontend\UserController@test');

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Route::get('hello', 'EmailController@hello');

Route::get('send', [TestController::class,'sendNotification']);

Route::get('/tree-leader-null', [App\Http\Controllers\UserFixController::class, 'tree_leader_null' ]);
Route::get('/tree-leader-fix', [App\Http\Controllers\UserFixController::class, 'tree_leader_fix' ]);

Route::get('/agent-null', [App\Http\Controllers\UserFixController::class, 'agent_null' ]);
Route::get('/agent-null-fix', [App\Http\Controllers\UserFixController::class, 'agent_null_fix' ]);

Route::get('/agent-error', [App\Http\Controllers\UserFixController::class, 'agent_error' ])->name('agent.error');
Route::get('/agent-fix/{id}', [App\Http\Controllers\UserFixController::class, 'agent_fix' ])->name('agent.fix.form');
Route::post('/agent-fix/{id}', [App\Http\Controllers\UserFixController::class, 'agent_fix_edit' ]);

Route::get('/withdrawal/amount/error', 'PaymentAmountFixController@withdrawal_error');
Route::get('/withdrawal/amount/fix', 'PaymentAmountFixController@withdrawal_fix');




