<?php


// User
Route::get('/register', 'Auth\UserController@registerForm')->name('user.register');
Route::post('/register', 'Auth\UserController@register')->name('user.register.post');
Route::get('/login', 'Auth\UserController@loginForm')->name('user.login');
Route::post('/login', 'Auth\UserController@login')->name('user.login.post');
Route::get('/user-dashboard', 'Frontend\UserController@dashboard')->name('user.dashboard');
Route::post('/user/update', 'Frontend\UserController@update')->name('frontend.user.update');

// Agent
Route::get('/login/agent', 'Auth\AgentController@loginForm')->name('agent.login');
Route::post('/login/agent', 'Auth\AgentController@login')->name('agent.login.post');
Route::get('/agent-dashboard', 'Backend\AgentController@dashboard')->name('agent.dashboard');
Route::post('/agent/update', 'Backend\AgentController@update')->name('backend.agent.update');

// Admin & Staff
Route::get('/login/staff', 'Auth\AdminStaffController@loginForm')->name('adminstaff.login');
Route::post('/login/staff', 'Auth\AdminStaffController@login')->name('adminstaff.login.post');
Route::get('/staff-dashboard', 'Backend\AdminStaffController@dashboard')->name('adminstaff.dashboard');

Route::post('logout', 'HomeController@logout')->name('logout');
