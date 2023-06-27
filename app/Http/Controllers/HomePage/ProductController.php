<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use App\Support\ResourceHelper\ProductResourceHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    use ProductResourceHelper, CategoryResourceHelper, BrandResourceHelper;

    /**
     * @return View|Factory|Application
     */
    public function products(): View|Factory|Application
    {
        $products = $this->getProductImage();

        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        return view('pages.product')
            ->with(compact('products', 'categories', 'brand_all'));
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function searchProduct(Request $request): Factory|View|Application
    {
        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        $keyword = $request->input('keyword_submit');
        $searches = collect($this->getProductImage())->filter(function ($item) use ($keyword) {
            return false !== stristr($item['name'], $keyword);
        });

        return view('pages.product.search-product')
            ->with(compact(
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
        $detail = collect($this->getProductImage())
            ->where('id', $id)
            ->take(1)->toArray();

        $products_relate = collect($this->getProductImage())
            ->where('category_id', '=', (int)implode(array_column($detail, 'category_id')))
            ->whereNotIn('id', $id)
            ->take(5)->toArray();

        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        return view('pages.product.product-detail')
            ->with(compact(
                'detail',
                'products_relate',
                'categories',
                'brand_all'
            ));
    }

    /**
     * @param $brand
     * @return Factory|View|Application
     */
    public function productByBrand($brand): Factory|View|Application
    {
        $products = collect($this->getProductImage())
            ->where('brand_id', $brand)
            ->take(32)->toArray();

        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        return view('pages.product.product-by-brand')
            ->with(compact(
                'products',
                'categories',
                'brand_all'
            ));
    }

    /**
     * @param $category
     * @return Factory|View|Application
     */
    public function productByCategory($category): Factory|View|Application
    {
        $products = collect($this->getProductImage())
            ->where('category_id', $category)
            ->take(32)->toArray();

        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        return view('pages.product.product-by-category')
            ->with(compact(
                'products',
                'categories',
                'brand_all'
            ));
    }

}
