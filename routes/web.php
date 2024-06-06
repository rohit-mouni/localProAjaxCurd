<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('home', 'index')->name('home');
    Route::get('send/notification', 'SendNotification')->name('send.notification');
    Route::get('show/user/list', 'userList')->name('user.list');
    Route::get('edit/user/list', 'editUserList')->name('edit.user.list');
    // Route::get('edit/user/list/{pageNo}','editUserList')->name('edit.user.list');

    // ----product routes----
    Route::get('add/product', 'addProduct')->name('product.add');
});

Route::controller(StripePaymentController::class)->group(function () {
    Route::get('stripe', 'stripe')->name('stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});
