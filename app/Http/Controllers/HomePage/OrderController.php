<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\PaymentOption;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CartResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use App\Support\ResourceHelper\CustomerFromSessionResourceHelper;
use App\Support\ResourceHelper\ProductResourceHelper;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    use CategoryResourceHelper, BrandResourceHelper, ProductResourceHelper, CartResourceHelper, CustomerFromSessionResourceHelper;

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function index(Request $request): Factory|View|Application
    {
        $user = $this->customerFromSession($request);

        $cart = $this->myCart();
        $count_cart = $this->countCart();

        $categories = $this->getAllCategory();
        $brand_all = $this->getAllBrand();

        return view('pages.shopping.my-cart')->nest('cart', 'pages.product')
            ->with(compact(
                'user',
                'cart',
                'count_cart',
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

        $cartItems = $this->myCart();
        $quantity = $request->input('quantity', 1);

        if (isset($cartItems[$id])) {
            $cartItems[$id]['quantity'] += $quantity;
        } else {
            $cartItems[$id] = [
                'id' => $product_item[$i]['id'],
                'name' => $product_item[$i]['name'],
                'price' => $product_item[$i]['price'],
                'quantity' => $quantity,
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

        return redirect()->back()->with('success', 'Cart updated successfully!');
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

        return redirect()->back()->with('success', 'Product removed successfully!');
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function checkout(Request $request): Factory|View|Application
    {
        $user = $this->customerFromSession($request);

        $cart = $this->myCart();
        $count_cart = $this->countCart();
        $payment_method = PaymentOption::pluck('name', 'id')->toArray();

        $categories = $this->getAllCategory();
        $brand_all = $this->getAllBrand();

        return view('pages.shopping.checkout')
            ->with(compact(
                'user',
                'cart',
                'count_cart',
                'payment_method',
                'categories',
                'brand_all'
            ));
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function checkoutAction(Request $request): Factory|View|Application
    {
        $user = $this->customerFromSession($request);
        $cart = $this->myCart();
        $count_cart = $this->countCart();
        $payment_method = PaymentOption::pluck('name', 'id')->toArray();
        $categories = $this->getAllCategory();
        $brand_all = $this->getAllBrand();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:13',
            'notice' => 'nullable|string|max:10000',
            'total' => 'required|integer',
        ]);

        $time_now = Carbon::now();

        $order = [];
        $order['customer_id'] = Auth()->guard('customer')->user()->id;
        $order['name'] = $request->name;
        $order['email'] = $request->email;
        $order['address'] = $request->address;
        $order['phone_number'] = $request->phone_number;
        $order['notice'] = $request->notice;
        $order['total'] = $request->total;
        $order['created_at'] = $time_now;
        $order['updated_at'] = $time_now;
        $order_id = DB::table('orders')->insertGetId($order);

        foreach ($cart as $cart_item) {
            $order_detail['order_id'] = $order_id;
            $order_detail['product_id'] = $cart_item['id'];
            $order_detail['name'] = $cart_item['name'];
            $order_detail['price'] = $cart_item['price'];
            $order_detail['quantity'] = $cart_item['quantity'];
            $order_detail['image'] = $cart_item['url'];
            DB::table('order_detail')->insert($order_detail);
        }

        session()->forget('cart');

        return view('pages.shopping.finish-payment')
            ->with(compact(
                'user',
                'cart',
                'count_cart',
                'payment_method',
                'categories',
                'brand_all'
            ))->with('success', 'Order successfully!');
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public
    function orderStatus(Request $request): Factory|View|Application
    {
        $cart = $this->myCart();
        $count_cart = $this->countCart();
        $user = $this->customerFromSession($request);
        $categories = $this->getAllCategory();
        $brand_all = $this->getAllBrand();

        $order = Order::with('orderdetails')->get();
        $order_processing = $this->getAllOrder()->where('status', 'PROCESSING');
        $order_delivering = $this->getAllOrder()->where('status', 'DELIVERING');
        $order_completed = $this->getAllOrder()->where('status', 'COMPLETED');
        $order_cancelled = $this->getAllOrder()->where('status', 'CANCELLED');

        return view('pages.shopping.order-status')
            ->with(compact(
                'cart',
                'count_cart',
                'user',
                'categories',
                'brand_all',
                'order',
                'order_processing',
                'order_delivering',
                'order_completed',
                'order_cancelled'
            ));
    }

    /**
     * @return Collection|array
     */
    public function getAllOrder(): Collection|array
    {
        return Order::with('orderdetails')
            ->where('customer_id', Auth()->guard('customer')->user()->id)
            ->orderBy('created_at', 'DESC')->get();
    }
}
