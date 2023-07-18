<?php

namespace App\Http\Requests\Auth;

//use App\Rules\ReCaptcha;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class ResetPasswordRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape([])] public function rules(): array
    {
        return [
            'code' => 'string|required|max:20|min:6|regex:/^(?=.*?[@])[a-zA-Z0-9_@]+$/|regex:/^\S*$/',
//            'g-recaptcha-response' => ['required', new ReCaptcha()]
        ];
    }

    /**
     * @return void
     */
    public function prepareForValidation(): void
    {
        $this->code = strtoupper($this->code);
    }

}
