<?php

namespace App\Http\Controllers\HomePage;

use App\Components\Home\HomeCreator;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show home page
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new HomeCreator($request))->index();
        });
    }

}
