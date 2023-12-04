<?php

namespace App\Http\Controllers\Product;

use App\Components\Product\BrandCreator;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function list(Request $request): Application|Factory|View
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new BrandCreator($request))->list();
        });
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new BrandCreator($request))->store($request);
        });
    }

    /**
     * @param $brand
     * @param Request $request
     * @return RedirectResponse
     */
    public function edit(Request $request, $brand): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($request, $brand) {
            return (new BrandCreator($request))->edit($request, $brand);
        });
    }

    /**
     * @param Request $request
     * @param $brand
     * @return RedirectResponse
     */
    public function delete(Request $request, $brand): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($request, $brand) {
            return (new BrandCreator($request))->delete($brand);
        });
    }

}
