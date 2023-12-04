<?php

namespace App\Components\Auth;

use App\Models\Member;
use App\Support\ResourceHelper\CartResourceHelper;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use App\Components\Component;
use Symfony\Component\HttpFoundation\Response;

class LoginAdminCreator extends Component
{
    use AuthenticatesUsers,
        CartResourceHelper;


    /**
     * Login dashboard handle
     *
     * @return Response
     * @throws ValidationException
     */
    public function login(): Response
    {
        $this->validateLogin($this->request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($this->request)) {
            $this->fireLockoutEvent($this->request);

            return $this->sendLockoutResponse($this->request);
        }

        if (!optional(Member::where('email', $this->request->input('email'))->first())->status) {
            throw ValidationException::withMessages([
                $this->username() => ['failed' => 'Email or password is incorrect!'],
            ]);
        }

        if ($this->attemptLogin($this->request)) {
            $this->request->session()->put('auth.password_confirmed_at', time());

            return $this->sendLoginResponse($this->request);
        }

        $this->incrementLoginAttempts($this->request);

        return $this->sendFailedLoginResponse($this->request);
    }

}
