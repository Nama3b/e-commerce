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
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\NoReturn;

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

        $image_all = $this->getAllImages();

        return view('pages.product')
            ->with(compact('products', 'categories', 'brand_all', 'image'));
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
            ->where('products.status', 'STOCKING')->take(40)->get();

        return view('pages.product')->with(compact('search_item'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function productDetail($id): View|Factory|Application
    {
        $detail = Product::with(['category', 'brand', 'member', 'images' => function ($query) {
            $query->whereImageType('PRODUCT');
        }])
            ->where('id', $id)
            ->where('status', 'STOCKING')
            ->take(1)->get()->toArray();

        $image = $this->getImage();

        $products_relate = Product::with(['category', 'brand', 'member', 'images' => function ($query) {
            $query->whereImageType('PRODUCT');
        }])
            ->where('id', array_column($detail, 'category_id'))
            ->whereNotIn('id', array_column($detail, 'id'))
            ->take(5)->get()->toArray();

        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        return view('pages.product-detail')
            ->with(compact(
                'detail',
                'products_relate',
                'categories',
                'brand_all',
                'image'));
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

        return view('pages.brand.product-by-brand')->with(compact('products', 'categories', 'brand_all'));
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

        $all_image = $this->getAllImages();

        return view('pages.category.product-by-category')->with(compact('products', 'categories', 'brand_all', 'all_image'));
    }


    /**
     * @return Collection|array
     */
    private function getAllProduct(): Collection|array
    {
        return Product::with(['category', 'brand', 'member', 'images' => function ($query) {
            $query->whereImageType('PRODUCT');
        }])
            ->where('products.status', 'STOCKING')
            ->orderBy('products.created_at', 'desc')
            ->simplePaginate(40)->toArray();
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

    /**
     * @return string
     */
    private function getImage(): string
    {
        $image = '';
        $images = array_column($this->getAllProduct()['data'],'images');
        $image_key = array_keys($images);
        foreach ($image_key as $value)
        {
            $image = implode(array_column($images[$value], 'url'));
        }

        return $image;
    }

    private function getAllImages()
    {
        $image = [];
        $images = array_column($this->getAllProduct()['data'],'images');
        $image_key = array_keys($images);
        foreach ($image_key as $value)
        {
            $image[] = implode(array_column($images[$value], 'url'));
        }

        return $image;
    }
}
