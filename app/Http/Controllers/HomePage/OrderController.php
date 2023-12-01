<?php

namespace App\Http\Controllers\HomePage;

use App\Components\Home\OrderCreator;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Show list cart
     *
     * @param Request $request
     * @return Factory|View|Application
     */
    public function index(Request $request): Factory|View|Application
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new OrderCreator($request))->index();
        });

    }

    /**
     * Update product quantity after cancelled status order
     *
     * @param $order
     * @return RedirectResponse
     */
    public function edit($order): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($order) {
            return (new OrderCreator($order))->edit($order);
        });
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function addToCart(Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new OrderCreator($request))->addCart($request);
        });
    }

    /**
     * Update quantity
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateCart(Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new OrderCreator($request))->updateCart($request);
        });
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function removeFromCart(Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new OrderCreator($request))->removeCart($request);
        });
    }

    /**
     * Product select from cart to check out
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function productSelectedCheckout(Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new OrderCreator($request))->productCheckout($request);
        });
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function checkout(Request $request): Factory|View|Application
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new OrderCreator($request))->checkout($request);
        });
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateCheckout(Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new OrderCreator($request))->updateCheckout($request);
        });
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function removeFromCheckout(Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new OrderCreator($request))->removeCheckout($request);
        });
    }

    /**
     * Checkout handle
     *
     * @param Request $request
     * @return Factory|View|Application
     */
    public function checkoutAction(Request $request): Factory|View|Application
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new OrderCreator($request))->actionCheckout($request);
        });
    }

    /**
     * Show order status list
     *
     * @param Request $request
     * @return Factory|View|Application
     */
    public function orderStatus(Request $request): Factory|View|Application
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new OrderCreator($request))->orderStatus($request);
        });
    }
}
