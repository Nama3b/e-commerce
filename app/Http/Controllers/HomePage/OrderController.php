<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use App\Support\ResourceHelper\ProductResourceHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    use CategoryResourceHelper, BrandResourceHelper, ProductResourceHelper;

    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        $cart = session('cart', []);

        return view('pages.shopping.my-cart')
            ->with(compact(
                'categories',
                'brand_all',
                'cart'
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
        $i = 0;
        foreach ($product_key as $key) {
            $i++;
            $product_item[] = $products[$key];
            dd($i);
        }
        dd($product_item[$i]);

        $cartItems = session('cart', []);
        $quantity = $request->input('quantity', 1);

        if (isset($cartItems[$id])) {
            $cartItems[$id]['quantity'] += $quantity;
        } else {
            $cartItems[$id] = [
                'name' => $product_item['name'],
                'price' => $product_item['price'],
                'quantity' =>  $quantity,
                'url' => $product_item['url']
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
        $cartItems = session('cart', []);

        foreach ($request->input('quantity') as $id => $quantity) {
            if (isset($cartItems[$id])) {
                $cartItems[$id]['quantity'] = $quantity;
            }
        }

        session(['cart' => $cartItems]);

        return redirect()->back()->with('success', 'Cart updated successfully');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function removeFromCart($id): RedirectResponse
    {
        $cartItems = session('cart', []);

        if (isset($cartItems[$id])) {
            unset($cartItems[$id]);
            session(['cart' => $cartItems]);
        }

        return redirect()->back()->with('success', 'Product removed successfully');
    }

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
