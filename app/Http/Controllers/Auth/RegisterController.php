<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\Customer;
use App\Rules\ValidRecaptcha;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    use RegistersUsers,
        VerifiesEmails;

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function signupHome(Request $request): Application|Factory|View
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|unique:customers,phone_number|max:13',
            'birthday' => 'nullable',
            'image' => 'nullable',
        ]);

        $time_now = Carbon::now();
        Customer::create([
            'role_id' => 3,
            'email' => session('email_verify', []),
            'email_verified_at' => $time_now,
            'password' => Hash::make($request->input('password')),
            'full_name' => $request->input('full_name'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'birthday' => $request->input('birthday'),
            'image' => 'WebPage/img/home/logo.jpg',
        ]);

        session()->forget('email_verify');

        return view('pages.auth.login-body')
            ->with('success', 'Create user successfully!');
    }
}
