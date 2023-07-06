<?php

namespace App\Transformers\Order;

use App\Models\Order;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;

class DetailOrderTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        'orderDetail'
    ];

    /**
     * @param Order $order
     * @return array
     */
    #[ArrayShape([])] public function transform(Order $order): array
    {
        return [
            'customer_id' => $order->customer_id,
            'shipping_id' => $order->shipping_id,
            'name' => $order->name,
            'email' => $order->email,
            'address' => $order->address,
            'phone_number' => $order->phone_number,
            'notice' => $order->notice,
            'status' => $order->status
        ];
    }

    /**
     * @param Order $order
     * @return Collection
     */
    public function includeOrderDetail(Order $order): Collection
    {
        return $this->collection($order->orderdetails, new DetailOrderDetailTransformer());
    }
}
