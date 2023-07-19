<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use WithPaginationLimit, HandleJsonResponses, HandleComponentError;

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
        $data_processing = collect($this->getOrder())->where('status','==','PROCESSING')->toArray();
        $data_delivering = collect($this->getOrder())->where('status','==','DELIVERING')->toArray();
        $data_completed = collect($this->getOrder())->where('status','==','COMPLETED')->toArray();
        $data_cancelled = collect($this->getOrder())->where('status','==','CANCELLED')->toArray();

        $status = Order::STATUS;

        return view('dashboard-pages.order')
            ->with(compact(
                'data',
                'data_processing',
                'data_delivering',
                'data_completed',
                'data_cancelled',
                'status'
            ));
    }

    /**
     * @param Order $order
     * @param Request $request
     * @return RedirectResponse
     */
    public function edit($order, Request $request): RedirectResponse
    {
        $order = Order::findOrFail($order);
        $order->status = $request->status;
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
