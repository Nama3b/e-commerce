<?php

namespace App\Components\Auth;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use App\Components\Component;

class RegisterUserCreator extends Component
{
    /**
     * @return Factory|View|Application
     */
    public function Register(): Factory|View|Application
    {
        $this->request->validate([
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
            'password' => Hash::make($this->request->input('password')),
            'full_name' => $this->request->input('full_name'),
            'address' => $this->request->input('address'),
            'phone_number' => $this->request->input('phone_number'),
            'birthday' => $this->request->input('birthday'),
            'image' => 'WebPage/img/home/logo.jpg',
        ]);

        session()->forget('email_verify');

        return view('pages.auth.login-body')
            ->with('success', 'Create user successfully!');
    }
}
