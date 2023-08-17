<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerify;
use App\Mail\OrderSendMail;
use App\Providers\RouteServiceProvider;
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
        Mail::to($request->input('email'))->send(new EmailVerify());

        return view('pages.auth.notice', [
                'pageTitle' => __('Email Verification')
            ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function resend(Request $request): RedirectResponse
    {
        return redirect()->back()->with('success', 'Resend email successfully!');
    }
}
