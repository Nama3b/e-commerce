<?php

namespace App\Services\Auth;

use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use App\Services\ServiceBase;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginHomeService extends ServiceBase
{
    /**
     * @throws ValidationException
     */
    public function LoginHome(): array
    {
        $this->validateLogin($this->request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($this->request)) {
            $this->fireLockoutEvent($this->request);
            $this->sendLockoutResponse($this->request);
        }

        $customer = Customer::where('email', $this->request->input('email'))->first();

        if (!optional($customer)->status) {
            throw ValidationException::withMessages([
                $this->username() => ['failed' => 'Email or password is incorrect!']
            ]);
        }

        $credentials = $this->request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            $this->request->session()->put('auth.password_confirmed_at', time());

            Auth::guard('customer')->login($customer);

            $this->CartInitialize();

            return ['access_token' => true];
//            $user = $this->request->user();
//            return $this->responseHandle($user);
        }

        return ['message' => __('response.login_fail')];
    }

    private function responseHandle($user): array
    {
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addHours(3);
        $token->save();

        return [
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ];
    }
}
