<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\Auth\GoogleLoginService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|RedirectResponse
     */
    public function redirectToGoogle(): \Symfony\Component\HttpFoundation\RedirectResponse|RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * @param Request $request
     * @return Redirector|Application|RedirectResponse
     * @throws ValidationException
     */
    public function handleGoogleCallback(Request $request): Redirector|Application|RedirectResponse
    {
        $data = (new GoogleLoginService($request))->LoginHome();

        if (isset($data['access_token'])) {
            return redirect(RouteServiceProvider::HOME);
        } else {
            throw ValidationException::withMessages([
                $this->username() => ['failed' => 'Email or password is incorrect!'],
            ]);
        }
    }
}
