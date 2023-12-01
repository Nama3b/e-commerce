<?php

namespace App\Http\Controllers\Auth;

use App\Components\Auth\RegisterUserCreator;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers,
        VerifiesEmails;

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function signupHome(Request $request): Application|Factory|View
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new RegisterUserCreator($request))->Register();
        });
    }
}
