<?php

namespace App\Http\Controllers\Product;

use App\Components\Product\ProductCreator;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('product');
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function list(Request $request): Application|Factory|View
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new ProductCreator($request))->list();
        });
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new ProductCreator($request))->store($request);
        });
    }

    /**
     * @param $product
     * @param Request $request
     * @return RedirectResponse
     */
    public function edit($product, Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($product, $request) {
            return (new ProductCreator($request))->edit($product, $request);
        });
    }

    /**
     * @param $product
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete($product, Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($product, $request) {
            return (new ProductCreator($request))->delete($product);
        });
    }
}
