<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\LoginDashboardService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginDashboardController extends Controller
{
    /**
     * Login dashboard handle
     *
     * @param Request $request
     * @return Response
     */
    public function loginDashboard(Request $request): Response
    {
        return $this->withErrorHandling(function () use ($request) {
            $data = (new LoginDashboardService($request))->login();

            if (isset($data['access_token'])) {
                $response = $this->resSuccess($data, __("response.login_success"));
            } else {
                $response = $this->resMessage(__($data['message']), 423);
            }

            return $response;
        });
    }
}
