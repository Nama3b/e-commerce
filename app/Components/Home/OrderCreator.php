<?php

namespace App\Components\Home;

use App\Mail\OrderSendMail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentOption;
use App\Models\Product;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CartResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use App\Support\ResourceHelper\CustomerFromSessionResourceHelper;
use App\Support\ResourceHelper\ProductResourceHelper;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Components\Component;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;

class OrderCreator extends Component
{
    use CategoryResourceHelper,
        BrandResourceHelper,
        ProductResourceHelper,
        CartResourceHelper,
        CustomerFromSessionResourceHelper;

    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $user = $this->customerFromSession($this->request);

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
     * @param $order
     * @return RedirectResponse
     */
    public function edit($order): RedirectResponse
    {

        $order = Order::with(['orderdetails'])->findOrFail($order);
        foreach ($order->toArray()['orderdetails'] as $item)
        {
            $product = Product::findOrFail($item['product_id']);
            $product->quantity = $product->quantity + $item['quantity'];
            $product->save();
        }

        $order->status = 'CANCELLED';
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }

    /**
     * @param $request
     * @return RedirectResponse
     */
    public function addCart($request): RedirectResponse
    {
        $id = (int)$request->input('productId_hidden');

        $products = collect($this->getProductImage())->filter(function ($item) use ($id) {
            return $item['id'] == $id;
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

        $user = Auth()->guard('customer')->user();
        if ($user) {

            $searches = collect($cartItems)->filter(function ($item) use ($id) {
                return $item['id'] == $id;
            })->toArray();
            if ($searches) {
                $cart = Cart::findOrFail((int)implode(array_column($searches, 'cart_id')));
                $cart->quantity += $quantity;
                $cart->save();
            } else {
                Cart::create([
                    'customer_id' => Auth()->guard('customer')->user()->id,
                    'product_id' => $product_item[$i]['id'],
                    'quantity' => $quantity
                ]);
            }
        } else {
            if (isset($cartItems[$id])) {
                $cartItems[$id]['quantity'] += $quantity;
            } else {
                $cartItems[$id] = [
                    'id' => $product_item[$i]['id'],
                    'name' => $product_item[$i]['name'],
                    'price' => $product_item[$i]['price'],
                    'quantity' => $quantity,
                    'image' => $product_item[$i]['image']
                ];
            }

            session(['cart' => $cartItems]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * @param $request
     * @return RedirectResponse
     */
    public function updateCart($request): RedirectResponse
    {
        $cartItems = Cart::findOrFail($request->input('productId_hidden'));
        $cartItems->quantity = $request->input('quantity');
        $cartItems->save();

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    /**
     * @param $request
     * @return RedirectResponse
     */
    public function removeCart($request): RedirectResponse
    {
        if (Auth()->guard('customer')->user()) {
            $cart = Cart::find($request->input('productId_hidden'));
            if (!$cart) {
                return redirect()->back()->with('error', 'Cannot find a record!');
            }

            $cart->delete();
        } else {
            $id = $request->input('productId_hidden');
            $cartItems = $this->myCart();

            if (isset($cartItems[$id])) {
                unset($cartItems[$id]);
                session(['cart' => $cartItems]);
            }
        }

        return redirect()->back()->with('success', 'Product removed successfully!');
    }

    /**
     * @param $request
     * @return Redirector|Application|RedirectResponse
     */
    public function productCheckout($request): Redirector|Application|RedirectResponse
    {
        $checkout = [];
        foreach ($this->selectedProduct($request) as $item){
            $checkout[] = array_shift($item);
        }

        session(['checkout' => $checkout]);

        return redirect('/checkout');
    }

    /**
     * @param $request
     * @return Factory|View|Application
     */
    public function checkout($request): Factory|View|Application
    {
        $user = $this->customerFromSession($request);

        $cart = $this->myCart();

        $checkout = session('checkout', []);

        $count_cart = $this->countCart();
        $payment_method = PaymentOption::pluck('name', 'id')->toArray();

        $categories = $this->getAllCategory();
        $brand_all = $this->getAllBrand();

        return view('pages.shopping.checkout')
            ->with(compact(
                'user',
                'cart',
                'checkout',
                'count_cart',
                'payment_method',
                'categories',
                'brand_all',
            ));
    }

    /**
     * @param $request
     * @return RedirectResponse
     */
    public function updateCheckout($request): RedirectResponse
    {
        $checkoutItems = session('checkout', []);

        $checkoutItems[$request->input('productId_hidden')]['quantity'] = $request->input('quantity');

        session(['checkout' => $checkoutItems]);

        return redirect()->back()->with('success', 'Checkout updated successfully!');
    }

    /**
     * @param $request
     * @return RedirectResponse
     */
    public function removeCheckout($request): RedirectResponse
    {
        $id = $request->input('productId_hidden');
        $checkoutItems = session('checkout', []);

        if (isset($checkoutItems[$id])) {
            unset($checkoutItems[$id]);
            session(['checkout' => $checkoutItems]);
        }

        return redirect()->back()->with('success', 'Product removed successfully!');
    }

    /**
     * @param $request
     * @return Factory|View|Application
     */
    public function actionCheckout($request): Factory|View|Application
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
        $order = Order::create([
            'customer_id' => Auth()->guard('customer')->user()->id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'notice' => $request->input('notice'),
            'total' => $request->input('total'),
            'created_at' => $time_now,
            'updated_at' => $time_now,
        ]);

        $checkout = session('checkout', []);

        foreach ($checkout as $checkout_item) {
            OrderDetail::create([
                'order_id' => $order['id'],
                'product_id' => $checkout_item['id'],
                'name' => $checkout_item['name'],
                'price' => $checkout_item['price'],
                'quantity' => $checkout_item['quantity'],
                'image' => $checkout_item['image'],
            ]);
            $product = Product::findOrFail($checkout_item['id']);
            $product->quantity = $product->quantity - $checkout_item['quantity'];
            $product->save();

            Cart::destroy($checkout_item['cart_id']);
        }

        Mail::to($order['email'])->send(new OrderSendMail($order));

        session()->forget('checkout');


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
     * @param $request
     * @return Factory|View|Application
     */
    public function orderStatus($request): Factory|View|Application
    {
        $cart = $this->myCart();
        $count_cart = $this->countCart();
        $user = $this->customerFromSession($request);
        $categories = $this->getAllCategory();
        $brand_all = $this->getAllBrand();

        $order = $this->getAllOrder();
        $status = Order::STATUS;

        return view('pages.shopping.order-status')
            ->with(compact(
                'cart',
                'count_cart',
                'user',
                'categories',
                'brand_all',
                'order',
                'status'
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
