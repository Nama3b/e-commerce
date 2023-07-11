<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\PaymentOption;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CartResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use App\Support\ResourceHelper\CustomerFromSessionResourceHelper;
use App\Support\ResourceHelper\ProductResourceHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    use CategoryResourceHelper, BrandResourceHelper, ProductResourceHelper, CartResourceHelper, CustomerFromSessionResourceHelper;

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function index(Request $request): Factory|View|Application
    {
        $cart = $this->myCart();
        $count_cart = $this->countCart();
        $user = $this->customerFromSession($request);

        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        return view('pages.shopping.my-cart')->nest('cart','pages.product')
            ->with(compact(
                'cart',
                'count_cart',
                'user',
                'categories',
                'brand_all'
            ));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function addToCart(Request $request): RedirectResponse
    {
        $id = $request->productId_hidden;

        $products = collect($this->getProductImage())->filter(function ($item) use ($id) {
            return false !== stristr($item['id'], $id);
        })->toArray();
        $product_key = array_keys($products);
        $product_item = [];
        $i = -1;
        foreach ($product_key as $key) {
            $i++;
            $product_item[] = $products[$key];
        }

        $cartItems = session('cart', []);
        $quantity = $request->input('quantity', 1);

        if (isset($cartItems[$id])) {
            $cartItems[$id]['quantity'] += $quantity;
        } else {
            $cartItems[$id] = [
                'id' => $product_item[$i]['id'],
                'name' => $product_item[$i]['name'],
                'price' => $product_item[$i]['price'],
                'quantity' =>  $quantity,
                'url' => $product_item[$i]['url']
            ];
        }

        session(['cart' => $cartItems]);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateCart(Request $request): RedirectResponse
    {
        $cartItems = $this->myCart();

        $cartItems[$request->productId_hidden]['quantity'] = $request->input('quantity');

        session(['cart' => $cartItems]);

        return redirect()->back()->with('success', 'Cart updated successfully');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function removeFromCart(Request $request): RedirectResponse
    {
        $id = $request->productId_hidden;

        $cartItems = $this->myCart();

        if (isset($cartItems[$id])) {
            unset($cartItems[$id]);
            session(['cart' => $cartItems]);
        }


        return redirect()->back()->with('success', 'Product removed successfully');
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function checkout(Request $request): Factory|View|Application
    {
        $cart = $this->myCart();
        $count_cart = $this->countCart();
        $user = $this->customerFromSession($request);

        $payment_method = PaymentOption::pluck('name', 'id')->toArray();

        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        return view('pages.shopping.checkout')
            ->with(compact(
                'cart',
                'count_cart',
                'user',
                'payment_method',
                'categories',
                'brand_all'
            ));
    }

    public function checkoutAction(Request $request)
    {
        $cart = $this->myCart();
        $count_cart = $this->countCart();
        $user = $this->customerFromSession($request);

        $payment_method = PaymentOption::pluck('name', 'id')->toArray();

        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        return view('pages.shopping.finish-payment')
            ->with(compact(
                'cart',
                'count_cart',
                'user',
                'payment_method',
                'categories',
                'brand_all'
            ));
    }

    /**
     * @return Factory|View|Application
     */
    public function payment(): Factory|View|Application
    {
        $cart = $this->myCart();
        $count_cart = $this->countCart();

        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        return view('pages.shopping.payment')
            ->with(compact(
                'cart',
                'count_cart',
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
