<?php

use App\Http\Controllers\Task;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::resource('tasks', Task::class);
    Route::get('/task', [Task::class, 'index'])
        ->name('task');
});
