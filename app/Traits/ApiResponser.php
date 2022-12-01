<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponser
{
    /**
     * Returns a successful response
     * @param int $http_code
     * @param string|null $message
     * @param array|string|null $data
     * @return JsonResponse
     */
    protected function successResponse(string|null $message = null, array|string|null $data = null, int $http_code = 200): JsonResponse
    {
        return $this->sendResponse(true, $message, $data, $http_code);
    }

    /**
     * Return an error JSON response.
     *
     * @param string|null $message
     * @param array|string|null $data
     * @param int $http_code
     * @return JsonResponse
     */
    protected function errorResponse(string|null $message = null, array|string|null $data = null, int $http_code = 404): JsonResponse
    {
       return $this->sendResponse(false, $message, $data, $http_code);
    }

    /**
     * @param bool $status
     * @param string|null $message
     * @param array|string|null $data
     * @param int $http_code
     * @return JsonResponse
     */
    private function sendResponse(bool $status, string|null $message, array|string|null $data, int $http_code): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ], $http_code);
    }
}
