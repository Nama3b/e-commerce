<?php

namespace App\Components\Order;

use App\Models\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Components\Component;
use Illuminate\Http\RedirectResponse;

class OrderCreator extends Component
{
    /**
     * @return Factory|View|Application
     */
    public function list(): Factory|View|Application
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
     * @return array
     */
    public function getOrder(): array
    {
        return Order::with(['customer', 'orderdetails'])->get()->toArray();
    }

    /**
     * @param $order
     * @param $request
     * @return RedirectResponse
     */
    public function edit($order, $request): RedirectResponse
    {
        $order = Order::findOrFail($order);
        $order->status = $request->input('status');
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }
}
