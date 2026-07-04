<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::resource('tasks', TaskController::class);
    Route::get('/task', [TaskController::class, 'index'])
        ->name('task');
});
