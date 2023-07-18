<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controller\Auth\Password as PasswordReset;
use App\Exceptions\HandlesComponentException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\StorePasswordRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Password;


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
     * @param ResetPasswordRequest $request
     * @return JsonResponse
     */
    public function sendResetLinkEmail(ResetPasswordRequest $request): JsonResponse
    {
        try {
            $status = (new PasswordReset($request))->code();

            if ($status == Password::RESET_LINK_SENT) {
                return $this->message(trans($status))->respondOk();
            }

            return $this->message(trans($status))->respondBadRequest();
        } catch (Exception) {
            return $this->message(__('An unexpected error occurred. Please try again later.'))
                ->respondBadRequest();
        }

    }

    /**
     * @param StorePasswordRequest $request
     * @return mixed
     */
    public function reset(StorePasswordRequest $request): mixed
    {
        return $this->withErrorHandling(function () use ($request) {

            $status = (new PasswordReset($request))->reset();

            if ($status == Password::PASSWORD_RESET) {
                return $this->message(__($status))->respondOk();
            }

            return $this->message(__($status))->respondBadRequest();

        });
    }

}
