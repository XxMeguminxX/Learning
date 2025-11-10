<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\RegisteredUserController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', function (Request $request) {
    return response()->json(
        User::query()->select('id','name','email','created_at')->get()
    );
});

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->name('register')
    ->withoutMiddleware([\Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class]);
