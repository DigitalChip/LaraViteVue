<?php

namespace App\Http\Requests\Api;

use App\Traits\FailedValidationResponse;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    use FailedValidationResponse;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
//            'password' => Password::min(8)
//                    ->letters()
//                    ->mixedCase()
//                    ->numbers()
//                    ->symbols()
//                    ->uncompromised(),
            'password' => 'required|confirmed|min:3',
            'password_confirmation' => 'required',
        ];
    }

}
