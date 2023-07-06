<?php

namespace App\Transformers\Order;

use App\Models\OrderDetail;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\TransformerAbstract;

class DetailOrderDetailTransformer extends TransformerAbstract
{
    /**
     * @param OrderDetail $delivery
     * @return array
     */
    #[ArrayShape([])] public function transform(OrderDetail $delivery): array
    {
        return [
            'order_id' => $delivery->order_id,
            'product_id' => $delivery->product_id,
            'price' => $delivery->price,
            'quantity' => $delivery->quantity,
            'total_price' => $delivery->total_price,
        ];
    }
}
