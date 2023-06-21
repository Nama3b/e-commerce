<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use Darryldecode\Cart\Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    use CategoryResourceHelper, BrandResourceHelper;

    /**
     * @return Factory|View|Application
     */
    public function myCart(): Factory|View|Application
    {
        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        $carts = Cart::getContent();

        return view('pages.shopping.my-cart')
            ->with(compact(
                'categories',
                'brand_all'
            ));
    }

//    public function addToCart(Request $request): Factory|View|Application
//    {
//        \Cart::add([
//            'id' => $request->id,
//            'name' => $request->name,
//            'price' => $request->price,
//            'quantity' => $request->quantity,
//            'attributes' => array(
//                'image' => $request->image,
//            )
//        ]);
//        session()->flash('success', 'Product is added to cart successfully !');
//
//        return view('pages.shopping.my-cart');
//    }

    /**
     * @return Factory|View|Application
     */
    public function checkout(): Factory|View|Application
    {
        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        return view('pages.shopping.checkout')
            ->with(compact(
                'categories',
                'brand_all'
            ));
    }

    /**
     * @return Factory|View|Application
     */
    public function payment(): Factory|View|Application
    {
        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        return view('pages.shopping.payment')
            ->with(compact(
                'categories',
                'brand_all'
            ));
    }

    /**
     * @return Factory|View|Application
     */
    public function finishPayment(): Factory|View|Application
    {
        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        return view('pages.shopping.finish-payment')
            ->with(compact(
                'categories',
                'brand_all'
            ));
    }
}
