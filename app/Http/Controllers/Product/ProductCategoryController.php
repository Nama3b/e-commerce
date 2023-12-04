<?php

namespace App\Http\Controllers\Product;

use App\Components\Product\ProductCategoryCreator;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function list(Request $request): Application|Factory|View
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new ProductCategoryCreator($request))->list();
        });
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new ProductCategoryCreator($request))->store($request);
        });
    }

    /**
     * @param $productCategory
     * @param Request $request
     * @return RedirectResponse
     */
    public function edit($productCategory, Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($productCategory, $request) {
            return (new ProductCategoryCreator($request))->edit($productCategory, $request);
        });
    }

    /**
     * @param $productCategory
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete($productCategory, Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($productCategory, $request) {
            return (new ProductCategoryCreator($request))->delete($productCategory);
        });
    }
}
