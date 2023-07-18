<?php

namespace App\Http\Controller\Auth;


use App\Models\Auth\PasswordReset;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Password
{

    /**
     * The creating target request instance.
     *
     */
    protected Request $request;

    /**
     * Create new request instance.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $code
     * @return string
     */
    public function code($code = null): string
    {
        return $this->broker()->sendResetLink([
            'code' => strtoupper($this->request->input('code', $code))
        ]);
    }

    /**
     * @return mixed
     */
    public function reset(): mixed
    {
        $email = $this->makeEmail()->email;

        return $this->broker()->reset($this->credentials($email), function ($user, $password) {

            $this->resetPassword($user, $password);
        });

    }

    public function connect()
    {

        $email = $this->makeEmail()->email;

        return $this->broker()->reset($this->credentials($email), function ($user, $password) {

            $this->resetPassword($user, $password);
        });

    }

    /**
     * @param $email
     * @return array
     */
    protected function credentials($email): array
    {
        return array_merge($this->request->all(
            'password',
            'password_confirmation',
            'token'
        ), [
            'id' => $email
        ]);
    }

    /**
     * @return PasswordReset|Builder|Model
     */
    private function makeEmail(): Model|PasswordReset|Builder
    {
        $result = PasswordReset::whereEmail($this->request->input('id'))->firstOrFail();

        if (!Hash::check($this->request->input('token'), $result->token)) {
            throw new ModelNotFoundException;
        }
        return $result;
    }

    /**
     * @param $user
     * @param $password
     * @return void
     */
    protected function resetPassword($user, $password): void
    {

        $user->forceFill($this->buildForceFillData($user, $password))->save();
    }

    /**
     * @param $user
     * @param $password
     * @return array|Carbon[]
     */
    private function buildForceFillData($user, $password): array
    {
        $data = [
            'password' => bcrypt($password),
            'remember_token' => Str::random(60),
        ];

        return $user->email_verified_at ? $data : array_merge($data, [
            'email_verified_at' => now(),
        ]);

    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return PasswordBroker
     */
    public function broker(): PasswordBroker
    {
        return \Illuminate\Support\Facades\Password::broker();
    }

}
