<?php

namespace App\Rules;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Validation\Rule;

class ValidRecaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     * @throws GuzzleException
     */
    public function passes($attribute, $value): bool
    {
        // Khởi tạo http client
        $client = new Client([
            'base_uri' => 'https://google.com/recaptcha/api/'
        ]);

        // Gửi dữ liệu đến cho google recaptcha xử lý
        $response = $client->post('siteverify', [
            'query' => [
                'secret' => env('RECAPTCHA_SITE_KEY'),
                'response' => $value
            ]
        ]);

        // Google reCaptcha trả về kết quả đúng/sai
        return json_decode($response->getBody())->success;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The validation error message.';
    }
}
