<?php

namespace App\Http\Controllers\HomePage;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class LoginController
{
    /**
     * @return Factory|View|Application
     */
    public function loginHome(): Factory|View|Application
    {
        return view('auth.login');
    }
}
