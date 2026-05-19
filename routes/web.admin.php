<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['role:admin|super-admin|staff']], function () {

    Route::middleware(['auth', 'verified'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            Route::get('/', [AdminController::class, 'index'])
                ->name('index');

            Route::resource('users', UserManagementController::class);

        });

});
