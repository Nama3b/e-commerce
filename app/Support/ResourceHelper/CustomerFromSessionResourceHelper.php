<?php

namespace App\Support\ResourceHelper;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Session\SessionManager;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;

trait CustomerFromSessionResourceHelper
{
    /**
     * @return Application|SessionManager|Store|mixed
     */
    public function customerFromSession($request): mixed
    {
        if (Auth::guard('customer')->check()) {
            $user = Auth::guard('customer')->user();
        } else {
            $user = $request->session()->get('key', 'default');
        }

        return $user;
    }
}
