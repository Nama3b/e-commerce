<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CartResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use App\Support\ResourceHelper\CustomerFromSessionResourceHelper;
use App\Support\ResourceHelper\ProductResourceHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    use CategoryResourceHelper,
        BrandResourceHelper,
        ProductResourceHelper,
        CartResourceHelper,
        CustomerFromSessionResourceHelper;

    /**
     * @param Request $request
     * @return View|Factory|Application
     */
    public function products(Request $request): View|Factory|Application
    {
        $user = $this->customerFromSession($request);

        $cart = $this->myCart();
        $count_cart = $this->countCart();

        $products = $this->getProductImage();
        $categories = $this->getAllCategory();
        $brand_all = $this->getAllBrand();

        return view('pages.product')
            ->with(compact(
                'user',
                'cart',
                'count_cart',
                'products',
                'categories',
                'brand_all',
            ));
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function searchProduct(Request $request): Factory|View|Application
    {
        $user = $this->customerFromSession($request);

        $cart = $this->myCart();
        $count_cart = $this->countCart();

        $categories = $this->getAllCategory();
        $brand_all = $this->getAllBrand();

        $keyword = $request->input('keyword_submit');
        $searches = collect($this->getProductImage())->filter(function ($item) use ($keyword) {
            return false !== stristr($item['name'], $keyword);
        });

        return view('pages.product.search-product')
            ->with(compact(
                'user',
                'cart',
                'count_cart',
                'searches',
                'categories',
                'brand_all'
            ));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function productDetail($id): View|Factory|Application
    {
        $cart = $this->myCart();
        $count_cart = $this->countCart();

        $categories = $this->getAllCategory();
        $brand_all = $this->getAllBrand();

        $detail = collect($this->getProductImage())
            ->where('id', $id)
            ->take(1)->toArray();

        $products_relate = collect($this->getProductImage())
            ->where('category_id', '=', (int)implode(array_column($detail, 'category_id')))
            ->whereNotIn('id', $id)
            ->random(5)->toArray();

        $favorites = Product::with(['favorites' => function ($query) {
            $query->whereType('PRODUCT');
        }])
            ->where('id', $id)->get()->toArray();

        $count = OrderDetail::where('product_id', $id)->count('quantity');

        return view('pages.product.product-detail')
            ->with(compact(
                'cart',
                'count_cart',
                'categories',
                'brand_all',
                'detail',
                'products_relate',
                'favorites',
                'count'
            ));
    }

    /**
     * @param Request $request
     * @param $brand
     * @return Factory|View|Application
     */
    public function productByBrand(Request $request, $brand): Factory|View|Application
    {
        $user = $this->customerFromSession($request);

        $cart = $this->myCart();
        $count_cart = $this->countCart();

        $products = collect($this->getProductImage())
            ->where('brand_id', $brand)
            ->take(32)->toArray();

        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        return view('pages.product.product-by-brand')
            ->with(compact(
                'user',
                'cart',
                'count_cart',
                'products',
                'categories',
                'brand_all'
            ));
    }

    /**
     * @param Request $request
     * @param $category
     * @return Factory|View|Application
     */
    public function productByCategory(Request $request, $category): Factory|View|Application
    {
        $user = $this->customerFromSession($request);

        $cart = $this->myCart();
        $count_cart = $this->countCart();

        $products = collect($this->getProductImage())
            ->where('category_id', $category)
            ->take(32)->toArray();

        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        return view('pages.product.product-by-category')
            ->with(compact(
                'user',
                'cart',
                'count_cart',
                'products',
                'categories',
                'brand_all'
            ));
    }

}
