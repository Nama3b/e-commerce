<?php

namespace App\Services\Auth;

use App\Models\Member;
use App\Providers\RouteServiceProvider;
use App\Services\ServiceBase;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginDashboardService extends ServiceBase
{
    public function login(): Response|JsonResponse|Redirector|Application|RedirectResponse|\Symfony\Component\HttpFoundation\Response
    {
        $this->validateLogin($this->request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($this->request)) {
            $this->fireLockoutEvent($this->request);

            return $this->sendLockoutResponse($this->request);
        }

        $member = Member::where('email', $this->request->input('email'))->first();

        if (!optional($member)->status) {
            throw ValidationException::withMessages([
                $this->username() => ['failed' => 'Email or password is incorrect!'],
            ]);
        }

        $credentials = $this->request->only('email', 'password');

        if (Auth::guard('member')->attempt($credentials)) {
            $this->request->session()->put('auth.password_confirmed_at', time());

            Auth::guard('member')->login($member);

            return redirect(RouteServiceProvider::DASHBOARD);
        }

        $this->incrementLoginAttempts($this->request);

        return $this->sendFailedLoginResponse($this->request);
    }
}
