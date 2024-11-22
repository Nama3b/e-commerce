<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ServiceBase extends Controller
{
    /**
     * The creating target request instance.
     */
    protected Request|FormRequest $request;

    /**
     * Create new request instance.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function responseHandle($user): array
    {
        $token = $user->createToken('Personal Access Token');
        $plainTextToken = $token->plainTextToken;

        return [
            'access_token' => $plainTextToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                Carbon::now()->addHours(3)
            )->toDateTimeString()
        ];
    }
}
