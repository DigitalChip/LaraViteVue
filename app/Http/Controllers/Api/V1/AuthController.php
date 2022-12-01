<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
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
//        if ($request->validator->fails()) {
////            Log::warning($validator->errors());
//            return $this->sendError('Validation Error!', $validator->errors());
//        }

        $valid_credentials = $request->validated();
        $valid_credentials['password'] = bcrypt($valid_credentials['password']);

        $new_user = User::create($valid_credentials);

        $success['token'] = $new_user->createToken($new_user->email)->plainTextToken;
//        $success['name'] = $new_user->name;
        $success['user'] = $new_user;

        return $this->successResponse('User register successfully.', $success );
    }

    /**
     * Login user
     */
    public function login(LoginRequest $request)
    {
        $valid_credentials = $request->validated();
//        $valid_credentials = $request->only(['email','password']);

        if (!Auth::attempt($valid_credentials)) {
            return $this->errorResponse('Unauthorised.', ['Unauthorised'],401);
        }

        $user = Auth::user();

        // Delete previous user tokens
        $user->tokens()->delete();
        // Successfully login and new token created.
        $success['token'] = $user->createToken($user->email)->plainTextToken;

//        $success['name'] = $user->name;
        $success['user'] = $user;

        return $this->successResponse('User login successfully.', $success);


    }
}
