<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class RouteController
{
    /**
     * Destroy member session after move out dashboard
     *
     * @return Factory|View|Application
     */
    public function login(): Factory|View|Application
    {
        Auth()->guard('member')->logout();
        return view('pages.auth.login-body');
    }
}
