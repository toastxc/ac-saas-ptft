<?php

use App\Http\Controllers\BadgeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::resource('badges', BadgeController::class);
    Route::get('/badge', [BadgeController::class, 'index'])
        ->name('badge');
});
