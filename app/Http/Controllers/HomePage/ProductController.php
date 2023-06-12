<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @return View|Factory|Application
     */
    public function products(): View|Factory|Application
    {
        $products = $this->getAllProduct();

        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        return view('pages.product')->with(compact('products', 'categories', 'brand_all'));
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function search_product(Request $request): Factory|View|Application
    {
        $keyword = $request->keyword_submit;
        $search_item = Product::with('category', 'brand', 'images')
            ->join('brands', 'brands.id', '=', 'products.id')
            ->join('product_category', 'product_category.id', '=', 'products.id')
            ->where('brands.name', 'like', '%' . $keyword . '%')
            ->where('product_category.name', 'like', '%' . $keyword . '%')
            ->where('products.name', 'like', '%' . $keyword . '%')
            ->where('products.status', 'STOCKING' and 'STOCKOUT')->take(40)->get();

        return view('pages.product')->with(compact('search_item'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function productDetail($id): View|Factory|Application
    {
        $detail = Product::with('category', 'brand', 'images', 'member')
            ->join('images', 'images.reference_id', '=', 'products.id')
            ->where('images.image_type', 'PRODUCT')
            ->where('products.status', 'STOCKING' and 'STOCKOUT' and 'BANNED')
            ->take(1)->get()->toArray();

        $products_relate = Product::with('category', 'images')
            ->where('id', array_column($detail, 'category_id'))
            ->whereNotIn('id', array_column($detail, 'id'))
            ->take(5)->get();

        return view('pages.product-detail')->with(compact('detail', 'products_relate'));
    }

    /**
     * @param $brand
     * @return Factory|View|Application
     */
    public function productByBrand($brand): Factory|View|Application
    {
        $products = $this->getAllProduct();

        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        return view('pages.product-by-brand')->with(compact('products', 'categories', 'brand_all'));
    }

    /**
     * @param $category
     * @return Factory|View|Application
     */
    public function productByCategory($category): Factory|View|Application
    {
        $products = $this->getAllProduct();

        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        return view('pages.category.product-by-category')->with(compact('products', 'categories', 'brand_all'));
    }

    /**
     * @return Collection|array
     */
    private function getAllProduct(): Collection|array
    {
        return Product::with('brand', 'category', 'images', 'member')
            ->join('images', 'images.reference_id', '=', 'products.id')
            ->where('images.image_type', 'PRODUCT')
            ->where('products.status', 'STOCKING')
            ->orderBy('products.created_at', 'desc')
            ->take(40)->get();
    }

    /**
     * @return Collection|array
     */
    private function getAllCategory(): Collection|array
    {
        return ProductCategory::whereStatus(1)->take(10)->get();
    }

    /**
     * @return Collection|array
     */
    private function getAllBrand(): Collection|array
    {
        return Brand::whereStatus(1)->whereType('ALL')->take(6)->get();
    }
}
