<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function signupHome(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|unique:customers,email|string|max:255',
            'password' => 'required|min:6|confirmed',
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|unique:customers,phone_number|max:13',
            'birthday' => 'nullable',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:10000',
        ]);

        DB::table('customers')->insert([
            'role_id' => 3,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'birthday' => $request->birthday,
            'avatar' => $request->avatar,
        ]);

        return redirect()->back()->with('success', 'Create user successfully!');
    }
}
