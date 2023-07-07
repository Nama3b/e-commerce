<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Customer;
use App\Models\Member;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
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
     * @return Response
     * @throws ValidationException
     */
    public function loginHome(LoginRequest $request): Response
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

        if (Auth::guard('customer')->attempt($arr)) {
            $request->session()->put('auth.password_confirmed_at', time());

            $request->session()->regenerate();

            $this->clearLoginAttempts($request);

            if ($response = $this->authenticated($request, $this->guard()->user())) {
                return $response;
            }

            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect()->intended('/home');
        } else {
            throw ValidationException::withMessages([
                $this->username() => ['failed' => 'Email or password is incorrect!'],
            ]);
        }

    }

    /**
     * @param LoginRequest $request
     * @return Response
     * @throws ValidationException
     */
    public function loginDashboard(LoginRequest $request): Response
    {
        $this->validateLogin($request);



        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (!optional(Member::where('email', $request->input('email'))->first())->status) {
            throw ValidationException::withMessages([
                $this->username() => ['failed' => 'Email or password is incorrect!'],
            ]);
        }

        if ($this->attemptLogin($request)) {
            $request->session()->put('auth.password_confirmed_at', time());

            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * @return Redirector|Application|RedirectResponse
     */
    protected function loggedOutDashboard(): Redirector|Application|RedirectResponse
    {
        return redirect('/dashboard/login');
    }
}
