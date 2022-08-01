<?php


Route::get('/', 'Frontend\PageController@index')->name('frontend.index');
Route::get('/new', 'front\PageController@index')->name('frontend-new.index');
Route::get('/investment', 'Frontend\PageController@diginvest')->name('frontend.diginvest');

Route::get('/about-us', 'Frontend\PageController@about')->name('frontend.about');
Route::get('/contact-us', 'Frontend\PageController@contact')->name('frontend.contact');
Route::post('/contact-us', 'Frontend\PageController@createContact')->name('frontend.contact.create');

// Products
Route::get('/products', 'Frontend\ProductController@index')->name('frontend.products');
Route::get('/single-product/{id}', 'Frontend\ProductController@single')->name('frontend.single-product');

Route::middleware('activeUser')->group(function () {
    // Investment
    Route::get('/investment-form/{plan}', 'Frontend\InvestController@diginvestShow')->name('frontend.diginvest.show');
    Route::get('/investment-payment', 'Frontend\InvestController@showForm')->name('frontend.digiinvest.form');
    Route::post('/investment-payment', 'Frontend\InvestController@diginvestForm')->name('frontend.digiinvest.store');

    // Top Up
    Route::get('/top-up', 'Frontend\TopupController@index')->name('frontend.topup');
    Route::get('/top-up/payment', 'Frontend\TopupController@payment')->name('frontend.payment');
    Route::post('/top-up/payment', 'Frontend\TopupController@payment_store')->name('frontend.payment.store');

    // Withdrawal
    Route::get('/withdrawal', 'Frontend\WithdrawlController@index')->name('frontend.withdrawal');
    Route::post('/withdrawal', 'Frontend\WithdrawlController@store')->name('frontend.withdrawal.store');

    // Purchase
    Route::get('/purchase/{product}', 'Frontend\PurchaseController@index')->name('frontend.purchase');

    // Donation
    Route::get('/donate-to-ukarine-kids', 'Frontend\DonationController@donate')->name('frontend.ukarine');
    Route::get('/donate/payment', 'Frontend\DonationController@payment')->name('frontend.ukarine.payment');
    Route::post('/donate/payment', 'Frontend\DonationController@payment_store')->name('frontend.ukarine.payment.store');

    // User Identity
    Route::get('/user-identity/upload', 'Frontend\UserIdentityController@index')->name('user.identity.form');
    Route::post('/user-identity/upload', 'Frontend\UserIdentityController@store')->name('user.identity.store');
    Route::get('/user-identity/edit', 'Frontend\UserIdentityController@edit')->name('user.identity.edit');
    Route::post('/user-identity/update', 'Frontend\UserIdentityController@update')->name('user.identity.update');

    // User Dashboard Pagination
    Route::post('pagination/topup/fetch', 'Frontend\UserController@topup_fetch')->name('pagination.topup.fetch');
    Route::post('pagination/withdrawal/fetch', 'Frontend\UserController@withdrawl_fetch')->name('pagination.withdrawal.fetch');
    Route::post('pagination/purchase-history/fetch', 'Frontend\UserController@purchase_history_fetch')->name('pagination.purchase.history.fetch');
    Route::post('pagination/purchase-today/fetch', 'Frontend\UserController@purchase_today_fetch')->name('pagination.purchase.today.fetch');
    Route::post('pagination/investment/fetch', 'Frontend\UserController@investment_fetch')->name('pagination.investment.fetch');
    Route::post('pagination/donations/fetch', 'Frontend\UserController@donations_fetch')->name('pagination.donations.fetch');
});

Route::post('pagination/new-products/fetch', 'Frontend\PageController@new_fetch')->name('pagination.new-products.fetch');
Route::post('pagination/special-products/fetch', 'Frontend\PageController@special_fetch')->name('pagination.special-products.fetch');

// Privacy and Policy
Route::get('/privacy-and-policy', 'Frontend\PageController@privacy')->name('frontend.privacy');
