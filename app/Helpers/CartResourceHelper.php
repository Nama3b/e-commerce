<?php

namespace App\Helpers;

use App\Models\Cart;

trait CartResourceHelper
{

    public function CartInitialize(): void
    {
        if (session('cart', [])) {
            $cart = session('cart', []);
            foreach ($cart as $cart_item) {
                Cart::updateOrCreate([
                    'customer_id' => Auth()->guard('customer')->user()->id,
                    'product_id' => $cart_item['id'],
                ], [
                    'quantity' => $cart_item['quantity'],
                ]);
            }
        }
    }
}
