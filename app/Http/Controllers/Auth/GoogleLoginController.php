<?php

namespace App\Http\Controllers\Auth;

use App\Http\Guards\CustomerGuard;
use App\Models\Cart;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController
{
    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|RedirectResponse
     */
    public function redirectToGoogle(): \Symfony\Component\HttpFoundation\RedirectResponse|RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * @return Redirector|Application|RedirectResponse
     */
    public function handleGoogleCallback(): Redirector|Application|RedirectResponse
    {
        $googleUser = Socialite::driver('google')->user();
        $user = Customer::where('email', $googleUser->email)->first();

        if (!$user) {
            $user = Customer::create([
                'role_id' => 3,
                'full_name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => bcrypt('default_password'),
                'image' => $googleUser->avatar,
                'status' => 1
            ]);
        }

        $credentials = ['email' => $user->email, 'password' => $user->password];
        if ((new CustomerGuard())->attempt($credentials)) {
            Auth::guard('customer')->login($user);

            if (session('cart', [])) {
                $cart = session('cart', []);
                foreach ($cart as $cart_item) {
                    Cart::updateOrCreate([
                        'customer_id' => Auth()->guard('customer')->user()->id,
                        'product_id' => $cart_item['id'],
                    ], [
                        'quantity' => $cart_item['quantity'],
                    ]);
                }
            }
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
