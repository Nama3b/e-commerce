<?php

namespace App\Components\Auth;

use App\Models\Cart;
use App\Providers\RouteServiceProvider;
use App\Support\ResourceHelper\CartResourceHelper;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Components\Component;

class LoginHomeCreator extends Component
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


    /**
     * @return JsonResponse|RedirectResponse
     * @throws ValidationException
     */
    public function login(): JsonResponse|RedirectResponse
    {
        $this->validateLogin($this->request);

        $credentials = $this->request->only('email', 'password');

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

            $this->request->session()->put('auth.password_confirmed_at', time());

            return $this->sendLoginResponse($this->request);

        } else {
            throw ValidationException::withMessages([
                $this->username() => ['failed' => 'Email or password is incorrect!'],
            ]);
        }
    }
}
