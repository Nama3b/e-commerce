<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Cart;
use App\Models\Member;
use App\Models\Product;
use App\Providers\RouteServiceProvider;
use App\Support\ResourceHelper\CartResourceHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    use AuthenticatesUsers,
        CartResourceHelper;

    /**
     * @var string
     */
    protected string $redirectToHome = RouteServiceProvider::HOME;

    /**
     * @var string
     */
    protected string $redirectToDashboard = RouteServiceProvider::DASHBOARD;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Login home handle
     *
     * @param LoginRequest $request
     * @return Response
     * @throws ValidationException
     */
    public function loginHome(LoginRequest $request): Response
    {
        $this->validateLogin($request);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            if (session('cart', [])) {
                $cart = session('cart', []);
                foreach ($cart as $cart_item) {
                    Cart::updateOrCreate([
                        'customer_id' => Auth()->guard('customer')->user()->id,
                        'product_id' => $cart_item['id'],
                    ],[
                        'quantity' => $cart_item['quantity'],
                    ]);
                }
            }

            $request->session()->put('auth.password_confirmed_at', time());

            return $this->sendLoginResponse($request);

        } else {
            throw ValidationException::withMessages([
                $this->username() => ['failed' => 'Email or password is incorrect!'],
            ]);
        }
    }

    /**
     * Login dashboard handle
     *
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
    protected function loggedOut(): Redirector|Application|RedirectResponse
    {
        return redirect('/home');
    }
}
