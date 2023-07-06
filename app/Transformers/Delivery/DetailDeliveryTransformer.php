<?php

namespace App\Transformers\Delivery;

use App\Models\Delivery;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\TransformerAbstract;

class DetailDeliveryTransformer extends TransformerAbstract
{
    /**
     * @param Delivery $delivery
     * @return array
     */
    #[ArrayShape([])] public function transform(Delivery $delivery): array
    {
        return [
            'creator' => $delivery->creator,
            'payment_option_id' => $delivery->payment_option_id,
            'service_name' => $delivery->service_name,
            'delivery_fee' => $delivery->delivery_fee,
            'delivery_time' => $delivery->delivery_time,
            'description' => $delivery->description,
        ];
    }
}
