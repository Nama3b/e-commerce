<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
     * @return Application|Factory|View
     */
    public function list(): Application|Factory|View
    {
        $data = $this->getOrder();

        $status = Order::STATUS;

        return view('dashboard-pages.order')
            ->with(compact(
                'data',
                'status'
            ));
    }

    /**
     * @param $order
     * @param Request $request
     * @return RedirectResponse
     */
    public function edit($order, Request $request): RedirectResponse
    {
        $order = Order::findOrFail($order);
        $order->status = $request->input('status');
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }

    /**
     * @return array
     */
    public function getOrder(): array
    {
        return Order::with(['customer', 'orderdetails'])->get()->toArray();
    }
}
