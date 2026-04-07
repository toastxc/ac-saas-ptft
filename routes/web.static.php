<?php

use App\Http\Controllers\Web\StaticPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StaticPageController::class, 'home'])
    ->name('home');

Route::name('web.static.')->group(function () {
    Route::get('/about', [StaticPageController::class, 'about'])
        ->name('about');

    Route::get('/contact', [StaticPageController::class, 'contact'])
        ->name('contact');

    Route::get('/privacy', [StaticPageController::class, 'privacy'])
        ->name('privacy');

    Route::get('/terms-and-conditions', [StaticPageController::class, 'terms'])
        ->name('terms-and-conditions');

});
