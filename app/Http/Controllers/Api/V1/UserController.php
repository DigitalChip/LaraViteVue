<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json([
            'status' => 'ok',
            'usersCount' => $users->count(),
            'users' => $users->jsonSerialize()
        ]);
    }
}
