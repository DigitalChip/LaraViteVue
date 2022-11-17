<?php

use App\Http\Controllers\Api\V1\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


// API v1 routes

Route::group(['prefix'=>'v1'], function (){

    Route::get('/users', [UserController::class, 'index']);

    Route::get('/user/{id}', function (Request $request, int $id) {
        $user = User::findOrFail($id);
        return response()->json([
            'status' => 'ok',
            'user' => $user->jsonSerialize()
        ]);
    });

});

