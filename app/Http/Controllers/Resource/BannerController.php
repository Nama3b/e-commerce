<?php

namespace App\Http\Controllers\Resource;

use App\Components\Resource\BannerCreator;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function list(Request $request): Application|Factory|View
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new BannerCreator($request))->list();
        });
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new BannerCreator($request))->store($request);
        });
    }

    /**
     * @param $banner
     * @param Request $request
     * @return RedirectResponse
     */
    public function edit(Request $request, $banner): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($request, $banner) {
            return (new BannerCreator($request))->edit($request, $banner);
        });
    }

    /**
     * @param Request $request
     * @param $banner
     * @return RedirectResponse
     */
    public function delete(Request $request, $banner): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($request, $banner) {
            return (new BannerCreator($request))->delete($banner);
        });
    }

}
