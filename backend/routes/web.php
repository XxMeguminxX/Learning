<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->name('register');