<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\PaymentOption;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    use WithPaginationLimit, HandleJsonResponses, HandleComponentError;

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('delivery');
    }

    /**
     * @return Application|Factory|View
     */
    public function list(): Application|Factory|View
    {
        $data = Delivery::with(['payment', 'member'])->get()->toArray();

        $payment = PaymentOption::pluck('name', 'id');

        return view('dashboard-pages/delivery')
            ->with(compact(
                'data',
                'payment'
            ));
    }

    /**
     * @param Delivery $delivery
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function edit($delivery, Request $request): mixed
    {

    }
}
