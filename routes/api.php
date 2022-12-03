<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ************************* API v1 routes *************************

Route::group(['prefix' => 'v1'], function () {

    // Auth (Custom RateLimit in RouteServiceProvider - set to 5 request in min)
    Route::middleware('throttle:auth')->group(function () {
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'logIn']);
    });

    // Logout authorized user only
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('/logout', [AuthController::class, 'logOut']);
    });

    // Users
    Route::middleware(['auth:sanctum'])->prefix('/users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{id}', [UserController::class, 'getUser'])->where(['id' => '[0-9]+']);
    });

    // Others
});
