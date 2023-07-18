<?php

namespace App\Http\Requests\Auth;

//use App\Rules\PasswordValid;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StorePasswordRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape([])] public function rules(): array
    {

        return [
            'token' => 'required',
            'id' => 'required|integer',
            'password' => ['required', 'max:50', 'min:7', 'confirmed', 'regex:/^\S*$/'],
//            'password' => ['required', 'max:50', 'min:7', 'confirmed', new PasswordValid(optional($this)->id), 'regex:/^\S*$/'],
        ];
    }


    /**
     * @return array
     */
    #[ArrayShape([])] public function messages(): array
    {
        return [
            'password:confirmed' => __('Please unify the input of the new password.'),
        ];
    }

}
