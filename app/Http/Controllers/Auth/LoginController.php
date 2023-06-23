<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * @var string
     */
    protected string $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @param LoginRequest $request
     * @return Application|Factory|View
     * @throws ValidationException
     */
    public function login(LoginRequest $request): Response
    {
        $this->validateLogin($request);

        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if ($request->remember == trans('remember.Remember me')) {
            $remember = true;
        } else {
            $remember = false;
        }

        if (Auth::guard('member')->attempt($arr)) {
            return redirect('dashboard/home');
        } else {
            throw ValidationException::withMessages([
                $this->username() => ['failed' => 'Email or password is incorrect!'],
            ]);
        }

//        if (method_exists($this, 'hasTooManyLoginAttempts') &&
//            $this->hasTooManyLoginAttempts($request)) {
//            $this->fireLockoutEvent($request);
//
//            return $this->sendLockoutResponse($request);
//        }
//
//        if (!optional(Member::where('email', $request->input('email'))->first())->status) {
//            throw ValidationException::withMessages([
//                $this->username() => ['failed' => 'Email or password is incorrect!'],
//            ]);
//        }
//
//        if ($this->attemptLogin($request)) {
//            $request->session()->put('auth.password_confirmed_at', time());
//
//            return $this->sendLoginResponse($request);
//        }
//
//        $this->incrementLoginAttempts($request);

//        return $this->sendFailedLoginResponse($request);
    }

    /**
     * @param Request $request
     * @return Redirector|Application|RedirectResponse
     */
    protected function loggedOut(Request $request): Redirector|Application|RedirectResponse
    {
        return redirect('/dashboard/login');
    }
}
