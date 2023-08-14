<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CartResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use App\Support\ResourceHelper\CustomerFromSessionResourceHelper;
use App\Support\ResourceHelper\ImageHandlerResourceHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    use CategoryResourceHelper,
        BrandResourceHelper,
        CartResourceHelper,
        CustomerFromSessionResourceHelper,
        ImageHandlerResourceHelper;

    /**
     * Show customer profile
     *
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

        return view('pages.customer-profile')
            ->with(compact(
               'cart',
               'count_cart',
               'user',
               'categories',
               'brand_all',
            ));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function updateCustomer(Request $request, $id): RedirectResponse
    {
        $customer = Customer::findOrFail($id);
        $customer->full_name = $request->input('full_name');
        $customer->password = $request->input('password');
        $customer->email = $request->input('email');
        $customer->address = $request->input('address');
        $customer->phone_number = $request->input('phone_number');
        $customer->birthday = $request->input('birthday');
        if ($request->hasFile('image')) {
            $customer->image = $this->imageHandler($request);
        }
        $customer->save();

        return redirect()->back()->with('success', 'Customer profile updated successfully');
    }
}
