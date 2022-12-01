<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait FailedValidationResponse
{
    /**
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $json = [
            'status' => false,
            'message' => null,
            'data' => $validator->errors()
        ];

        throw new HttpResponseException(response()->json($json, 422));
    }
}
