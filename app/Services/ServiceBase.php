<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ServiceBase extends Controller
{
    /**
     * The creating target request instance.
     */
    protected Request|FormRequest $request;

    /**
     * Create new request instance.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

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
