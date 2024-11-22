<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\Auth\LoginHomeService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Login home handle
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function login(Request $request): Response
    {
        $data = (new LoginHomeService($request))->LoginHome();

        if (isset($data['access_token'])) {
            return redirect(RouteServiceProvider::HOME);
        } else {
            throw ValidationException::withMessages([
                $this->username() => ['failed' => 'Email or password is incorrect!'],
            ]);
        }
    }
}
