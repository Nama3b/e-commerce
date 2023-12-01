<?php

namespace App\Http\Controllers\Order;

use App\Components\Order\OrderCreator;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('order');
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function list(Request $request): Application|Factory|View
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new OrderCreator($request))->list();
        });
    }

    /**
     * @param $order
     * @param Request $request
     * @return RedirectResponse
     */
    public function edit($order, Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($order, $request) {
            return (new OrderCreator($request))->edit($order, $request);
        });
    }

}
