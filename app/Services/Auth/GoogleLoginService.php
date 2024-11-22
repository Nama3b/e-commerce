<?php

namespace App\Services\Auth;

use App\Helpers\CartResourceHelper;
use App\Http\Guards\CustomerGuard;
use App\Models\Cart;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use App\Services\ServiceBase;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginService extends ServiceBase
{
    use CartResourceHelper;

    /**
     * @return array
     */
    public function LoginHome(): array
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

            $this->CartInitialize();
            $user = Auth()->guard('customer')->user();

            return $this->responseHandle($user);
        }

        return ['message' => __('login fail')];
    }
}
