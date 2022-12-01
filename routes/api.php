<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// API v1 routes

Route::group(['prefix' => 'v1' ], function () {
    // Auth
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);


//    Route::group(['middleware' => 'auth:sanctum'], function(){
        // Users
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/user/{id}', [UserController::class, 'getUser']);
//    });


    // Others
});
