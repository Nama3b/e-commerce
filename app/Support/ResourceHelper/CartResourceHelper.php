<?php

namespace App\Support\ResourceHelper;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Session\SessionManager;
use Illuminate\Session\Store;

trait CartResourceHelper
{
    /**
     * @return Application|SessionManager|Store|mixed
     */
    public function myCart(): mixed
    {
        if (Auth()->guard('customer')->user()) {
            $cart = [];
            $carts = Cart::with(['customers', 'products'])
                ->where('customer_id', Auth()->guard('customer')->user()->id)
                ->get()->toArray();
            foreach ($carts as $item) {
                $products = Product::with([
                    'images' => function ($query) {
                        $query->whereImageType('PRODUCT');
                    }
                ])
                    ->where('id', $item['product_id'])
                    ->orderby('created_at', 'desc')->get()->toArray();

                $image = [];
                $images = array_column($products, 'images');
                foreach ($images as $value) {
                    $image[] = array_column($value, 'image', 'reference_id');
                }
                $quantity = $item['quantity'];
                $id = $item['id'];
                foreach ($products as $value1) {
                    foreach ($image as $value2) {
                        if ($value1['id'] == (int)implode(array_keys($value2))) {
                            $id = array_fill_keys(['id'], $id);
                            $qty = array_fill_keys(['quantity'], $quantity);
                            $img = array_fill_keys(['image'], implode($value2)) + $value1;
                            unset($img['id']);
                            unset($img['quantity']);

                            $cart[] = array_merge($id, $qty, $img);
                        }
                    }
                }
            }
        } else {
            $cart = session('cart', []);
        }

        return $cart;
    }

    /**
     * @return int
     */
    public function countCart(): int
    {
        $cart = $this->myCart();
        return array_sum(array_column($cart,'quantity'));
    }

}
