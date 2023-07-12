<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreOrderDetailRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape([])] public function rules(): array
    {
        return [
            'order_id' => 'required',
            'product_id' => 'required',
            'price' => 'required|float',
            'quantity' => 'required|integer',
            'total_price' => 'required|float',
        ];
    }
}
