<?php


Route::prefix('backend')->middleware('isAdmin')->group(function () {
    Route::resources([
        'staff' => Backend\Admin\StaffController::class,
        'accountant' => Backend\Admin\AccountantController::class,
        'agent' => Backend\Admin\AgentController::class,

        // 'referral' => Backend\Admin\ReferralController::class,

        'partner' => Backend\Admin\PartnerController::class,
        'contact' => Backend\ContactController::class,
        'banner' => Backend\BannerController::class,
        'about' => Backend\AboutController::class,
        'ads' => Backend\Admin\HomeAdsController::class,
        'advertise' => Backend\Admin\AdvertiseController::class,
    ]);
    
    Route::get('backend/purchases', 'Backend\Admin\PurchaseController@index')->name('backend.purchase.index');

    Route::post('backend/agent/{status}/{id}', 'Backend\Admin\AgentController@activate')->name('agent.activate');
});

Route::get('backend/accountant/create', function () {
    abort(404);
});
Route::get('backend/accountant/{accountant}/edit', function () {
    abort(404);
});
Route::post('backend/accountant', function () {
    abort(404);
});
Route::delete('backend/accountant/{id}', function () {
    abort(404);
});

// Route::get('backend/level', 'Backend\Admin\LevelController@index')->name('level.index');

Route::prefix('backend')->middleware('accessProduct')->group(function () {
    // Admin & Staff
    Route::resources([
        'categories' => Backend\Product\CategoryController::class,
        'brands'     => Backend\Product\BrandController::class,
        'types'      => Backend\Product\ProductTypeController::class,
        'products'   => Backend\Product\ProductController::class,
    ]);
});

Route::middleware('isAccountant')->group(function () {
    // Route::resource('backend/bank', Backend\Admin\BankController::class);

    Route::get('/backend/bank', 'Backend\Admin\BankController@index')->name('bank.index');

    Route::get('backend/donations', 'Backend\Admin\DonationController@index')->name('backend.donation.index');

    Route::get('backend/topup/pending', 'Backend\Admin\TopupController@pending')->name('topup.pending');
    Route::get('backend/topup/history', 'Backend\Admin\TopupController@history')->name('topup.history');
    Route::post('backend/topup/{status}/{id}', 'Backend\Admin\TopupController@change')->name('topup.status');

    Route::get('backend/withdrawal/pending', 'Backend\Admin\WithdrawlController@pending')->name('withdrawal.pending');
    Route::get('backend/withdrawal/history', 'Backend\Admin\WithdrawlController@history')->name('withdrawal.history');
    Route::post('backend/withdrawal/{status}/{id}', 'Backend\Admin\WithdrawlController@change')->name('withdrawal.status');
    Route::get('withdrawal/identity/{id}', 'Backend\Admin\WithdrawlController@identity')->name('withdrawal.identity.show');

    Route::get('backend/invest/pending', 'Backend\Admin\InvestController@pending')->name('invest.pending');
    Route::get('backend/invest/history', 'Backend\Admin\InvestController@history')->name('invest.history');
    Route::post('backend/invest/{status}/{id}', 'Backend\Admin\InvestController@change')->name('invest.status');
});

// Customers

Route::middleware('accessUser')->group(function () {
    Route::resource('backend/user', Backend\Admin\UserController::class);
    Route::post('backend/user/{status}/{id}', 'Backend\Admin\UserController@activate')->name('user.activate');

    // Customer Tree
    Route::get('backend/customer-tree', 'Backend\Agent\UserController@tree')->name('backend.customer-tree'); // for agent
    Route::get('backend/customer-tree/agent/{id}', 'Backend\Admin\AgentController@tree')->name('backend.agent.customer-tree'); // for admin
    Route::delete('backend/customer-tree/delete/{id}', 'Backend\CustomerTreeController@destroy')->name('backend.customer-tree.delete');

    Route::get('backend/user-identity/pending', 'Backend\UserIdentityController@index')->name('user-identity.pending');
    Route::post('backend/identity/{status}/{id}', 'Backend\UserIdentityController@change')->name('user-identity.status');
});

// Notifications
Route::get('backend/view-all-notifications', 'Backend\NotificationController@index')->name('view.all-notifications');
Route::get('backend/mark-all-read-notifications', 'Backend\NotificationController@mark_all')->name('mark.all-read');

// Account Settings
Route::get('account/profile', 'Backend\ProfileController@index')->name('account.profile');
Route::get('account/setting', 'Backend\ProfileController@edit')->name('account.setting');
Route::post('account/setting', 'Backend\ProfileController@update')->name('account.update');

// User & Agent Error Fix
Route::get('/tree-leader-null', [App\Http\Controllers\UserFixController::class, 'tree_leader_null' ]);
Route::get('/tree-leader-fix', [App\Http\Controllers\UserFixController::class, 'tree_leader_fix' ]);

Route::get('/agent-null', [App\Http\Controllers\UserFixController::class, 'agent_null' ]);
Route::get('/agent-null-fix', [App\Http\Controllers\UserFixController::class, 'agent_null_fix' ]);

Route::get('/agent-error', [App\Http\Controllers\UserFixController::class, 'agent_error' ])->name('agent.error');
Route::get('/agent-fix/{id}', [App\Http\Controllers\UserFixController::class, 'agent_fix' ])->name('agent.fix.form');
Route::post('/agent-fix/{id}', [App\Http\Controllers\UserFixController::class, 'agent_fix_edit' ]);

// Bonus & Fine
Route::get('/backend/bonus-and-fine', 'Backend\Admin\BonusFineController@index')->name('backend.bonus-fine.index');
Route::post('/backend/bonus-and-fine', 'Backend\Admin\BonusFineController@create')->name('backend.bonus-fine.form');

Route::get('/backend/bonus/lists', 'Backend\Admin\BonusFineController@bonus_lists')->name('backend.bonus.lists');
Route::get('/backend/fine/lists', 'Backend\Admin\BonusFineController@fine_lists')->name('backend.fine.lists');
Route::get('/backend/bonus/history', 'Backend\Admin\BonusFineController@bonus_history')->name('backend.bonus.history');
Route::get('/backend/fine/history', 'Backend\Admin\BonusFineController@fine_history')->name('backend.fine.history');
