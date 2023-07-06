<?php

namespace App\Transformers\Delivery;

use App\Models\Shipping;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\TransformerAbstract;

class DetailShippingTransformer extends TransformerAbstract
{
    /**
     * @param Shipping $shipping
     * @return array
     */
    #[ArrayShape([])] public function transform(Shipping $shipping): array
    {
        return [
            'delivery_id' => $shipping->delivery_id,
            'manager' => $shipping->manager,
            'shipping_code' => $shipping->shipping_code,
            'customer_name' => $shipping->customer_name,
            'shipping_delivery_address' => $shipping->shipping_delivery_address,
            'phone_number' => $shipping->phone_number,
            'shipping_delivery_time' => $shipping->shipping_delivery_time,
            'status' => $shipping->status,
        ];
    }
}
