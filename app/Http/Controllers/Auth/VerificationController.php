<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerify;
use App\Rules\ValidRecaptcha;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails, RedirectsUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Show the email verification notice.
     *
     * @param Request $request
     * @return RedirectResponse|View
     */
    public function show(Request $request): View|RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|unique:customers,email|string|max:255',
            'g-recaptcha-response' => ['required', new ValidRecaptcha()],
        ]);

        $success = '';
        $email = $request->input('email');

        session(['email_verify' => $email]);

        Mail::to($email)->send(new EmailVerify());

        return view('pages.auth.notice', [
                'pageTitle' => __('Email Verification')
            ])
            ->with(compact('email', 'success'))
            ->with('success', 'Send email verification successfully!');
    }

    /**
     * @param Request $request
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function resend(Request $request): Application|Factory|\Illuminate\Contracts\View\View
    {
        $email = $request->input('hidden_email');
        Mail::to($email)->send(new EmailVerify());

        session(['email_verify' => $email]);

        return view('pages.auth.notice', [
            'pageTitle' => __('Email Verification')
            ])
            ->with('email', $email)
            ->with('success', 'Resend email verification successfully!');
    }

    /**
     * @param Request $request
     * @return Factory|\Illuminate\Contracts\View\View|Application
     */
    public function register(Request $request): \Illuminate\Contracts\View\View|Factory|Application
    {
        $email = session('email_verify', []);

        return view('pages.auth.register')->with(compact('email'));
    }
}
