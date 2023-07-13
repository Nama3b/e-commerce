<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class LoginHomeController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function loginHome(): Factory|View|Application
    {
        Auth()->guard('member')->logout();
        return view('auth.login');
    }
}
