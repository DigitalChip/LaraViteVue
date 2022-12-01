<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    use ApiResponser;

    /**
     * Get all users
     *
     * @return JsonResponse
     */
    public function index()
    {
        $users = User::all();

        return $this->successResponse(null, [
            'usersCount' => $users->count(),
            'users' => $users->jsonSerialize(),
        ]);
    }

    /**
     * Get user by ID
     *
     * @param int $id
     * @return JsonResponse
     */
    public function getUser(int $id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse('User not found', $e->getMessage());
        }

        return $this->successResponse(null, [
            'user' => $user->jsonSerialize(),
        ]);
    }

}
