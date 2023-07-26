<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\Customer;
use App\Rules\ValidRecaptcha;
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
            'image' => 'nullable',
            'g-recaptcha-response' => ['required', new ValidRecaptcha()],
        ]);

//        $customer = $request->email;
//        event(new Registered($customer));

        Customer::create([
            'role_id' => 3,
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'full_name' => $request->input('full_name'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'birthday' => $request->input('birthday'),
            'image' => $request->input('image'),
        ]);

        return redirect()->back()->with('success', 'Create user successfully!');
    }
}
