<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponser;

    /**
     * Register new user
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $valid_credentials = $request->validated();
        $valid_credentials['password'] = bcrypt($valid_credentials['password']);

        $new_user = User::create($valid_credentials);

        $success['token'] = $new_user->createToken($new_user->email)->plainTextToken;
        $success['user'] = $new_user;

        return $this->successResponse('User register successfully.', $success);
    }

    /**
     * Login user
     */
    public function logIn(LoginRequest $request)
    {
        $valid_credentials = $request->validated();
//        $valid_credentials = $request->only(['email','password']);

        if (!Auth::attempt($valid_credentials)) {
            return $this->errorResponse('Unauthorised.', ['Unauthorised'], 401);
        }

        $user = Auth::user();

        // Delete previous user tokens
        $user->tokens()->delete();

        // Successfully login and new token created.
        $token = $user->createToken($user->email);

        // $success['name'] = $user->name;
        $success['token'] = $token->plainTextToken;
        $success['user'] = $user;

        return $this->successResponse('User login successfully.', $success);
    }

    /**
     * LogOut authorized user
     * (User must be authorized!!!)
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logOut(Request $request)
    {
        $user = Auth::user();

        $user->currentAccessToken()->delete();
//        $user->tokens()->where('id', $user->id)->delete();

        Auth::guard('web')->logout();
//        Auth::logout();

        return $this->successResponse('You are logged out!');

    }

}
