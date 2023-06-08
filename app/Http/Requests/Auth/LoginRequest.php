<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class LoginRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array|string>
     */
    #[ArrayShape([])] public function rules(): array
    {
        return [
            'email'=> 'required|string|email',
            'password' => 'required|string|min:6|max:32',
        ];
    }
}
