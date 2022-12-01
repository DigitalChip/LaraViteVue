<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

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
            'users' => $users,
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
            'user' => $user
        ]);
    }

}
