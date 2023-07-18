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
        $client = new Client([
            'base_uri' => 'https://google.com/recaptcha/api/',
            'time_out' => 2.0
        ]);

        $response = $client->post('siteverify', [
            'query' => [
                'secret' => env('RECAPTCHA_SITE_SECRET'),
                'response' => $value
            ]
        ]);

        return json_decode($response->getBody())->success;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Please ensure that you are a human.';
    }
}
