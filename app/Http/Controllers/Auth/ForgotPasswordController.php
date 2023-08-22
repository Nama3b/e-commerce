<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\HandlesComponentException;
use App\Http\Controllers\Controller;
use App\Mail\PasswordReset;
use App\Models\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;


class ForgotPasswordController extends Controller
{
    use HandlesComponentException;

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('pages.auth.forgot-password');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function verify(Request $request): RedirectResponse
    {
        $user = Customer::where('email', '=', $request->input('email'));
        if ($user->count() > 0) {
            $user = $user->get()->toArray();
            $email = array_shift($user)['email'];
            session(['email_verify_reset_password' => $email]);

            Mail::to($email)->send(new PasswordReset());

            return Redirect::back()->with('success', 'We just sent a link for reset password to your email address');
        } else {
            return Redirect::back()->with('error', 'Your email address is not exist!');
        }
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function reset(Request $request): Application|Factory|View
    {
        $email = session('email_verify_reset_password', []);

        return view('pages.auth.password-reset')->with(compact('email'));
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function change(Request $request): Application|Factory|View
    {
        $email = session('email_verify_reset_password', []);

        $user = Customer::where('email', '=', $email)->get()->toArray();
        $user_id = array_shift($user)['id'];

        $customer = Customer::findOrFail($user_id);
        $customer->password = Hash::make($request->input('password'));
        $customer->save();

        return view('pages.auth.login-body')
            ->with('success', 'Reset password successfully!');
    }

}
