<?php

namespace App\Services\Auth;

use App\Helpers\CartResourceHelper;
use App\Models\Customer;
use App\Services\ServiceBase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginHomeService extends ServiceBase
{
    use CartResourceHelper;

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
            $user = Auth()->guard('customer')->user();

            return $this->responseHandle($user);
        }

        return ['message' => __('login fail')];
    }
}
