<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{

    /**
     * @return Factory|View|Application
     */
    public function detail(): Factory|View|Application
    {
        $member = Auth::guard('member')->user();

        return view('dashboard-pages.member-profile')
            ->with(compact(
                'member',
            ));
    }
}
