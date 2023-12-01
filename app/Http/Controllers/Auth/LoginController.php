<?php

namespace App\Http\Controllers\Auth;

use App\Components\Auth\LoginAdminCreator;
use App\Components\Auth\LoginHomeCreator;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Login home handle
     *
     * @param LoginRequest $request
     * @return Response
     */
    public function loginHome(LoginRequest $request): Response
    {
        return $this->withErrorHandling(function () use ($request) {
            $data = (new LoginHomeCreator($request))->login();

            if (isset($data['access_token'])) {
                $res = $this->resSuccess($data, __("response.login_success"));
            } else {
                $res = $this->resMessage(__($data['message']), 401);
            }

            return $res;
        });
    }

    /**
     * Login home handle
     *
     * @param LoginRequest $request
     * @return Response
     */
    public function loginAdmin(LoginRequest $request): Response
    {
        return $this->withErrorHandling(function () use ($request) {
            $data = (new LoginAdminCreator($request))->login();

            if (isset($data['access_token'])) {
                $res = $this->resSuccess($data, __("response.login_success"));
            } else {
                $res = $this->resMessage(__($data['message']), 401);
            }

            return $res;
        });
    }


    /**
     * @return Redirector|Application|RedirectResponse
     */
    protected function loggedOut(): Redirector|Application|RedirectResponse
    {
        return redirect('/home');
    }
}
