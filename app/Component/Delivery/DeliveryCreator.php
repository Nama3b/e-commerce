<?php

namespace App\Components\Delivery;

use App\Models\Delivery;
use App\Models\PaymentOption;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Components\Component;

class DeliveryCreator extends Component
{
    /**
     * @return Factory|View|Application
     */
    public function list(): Factory|View|Application
    {
        $data = Delivery::with(['payment', 'member'])->get()->toArray();

        $payment = PaymentOption::pluck('name', 'id');

        return view('dashboard-pages/delivery')
            ->with(compact(
                'data',
                'payment'
            ));
    }

}
