<?php

namespace App\Support\ResourceHelper;

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
        return session('cart', []);
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
