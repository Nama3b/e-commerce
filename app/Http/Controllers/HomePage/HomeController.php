<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $meta_desc = "PRO.N - Buy the hottest sneakers including Adidas Yeezy and Retro Jordans, Supreme clothes, trading cards, collectibles, designer handbags and luxury ...";
        $meta_keywords = "sneaker, clothes, watches, buy sneaker, buy watches";
        $meta_title = "E-Commerce - Sneakers, Clothes, Watches";
        $url_canonical = $request->url();

        // get product category
        $categories = DB::table('product_category')->where('status', '1')->orderby('id', 'desc')->take(6)->get();

        // get brand
        $brands = DB::table('brands')->where('status', '1')->get();
        $brand_all = $brands->where('type', 'ALL')->take(6);
        $brand_sneaker = $brands->where('type', 'SNEAKER')->take(6);
        $brand_clothes = $brands->where('type', 'CLOTHES')->take(6);

        // get product
        $products = Product::with(['category', 'brand', 'member', 'images' => function ($query) {
            $query->whereImageType('PRODUCT');
        }])
            ->where('status', 'STOCKING')
            ->orderby('created_at', 'desc')->get();
        $product_sneakers = $products->where('category_id', 1)->take(6)->toArray();
        $product_clothes = $products->where('category_id', 2)->take(5)->toArray();
        $product_watches = $products->where('category_id', 3)->take(5)->toArray();
        $product_best_seller = $products->take(6)->toArray();

        // get post
        $news = Post::with(['images' => function ($query) {
            $query->whereImageType('POST')
                ->whereReferenceId('id');
        }])
            ->where('status', 'ACTIVE')
            ->where('post_type', 'NEWS')
            ->orderBy('created_at', 'desc')->take(8)->get()->toArray();

        // images
        $images = array_column($products,'images');
        $image_key = array_keys($images);
        foreach ($image_key as $value)
        {
            $image = implode(array_column($images[$value], 'url'));
        }

        return view('pages.home')
            ->with(compact('products',
                'categories',
                'brand_all',
                'brand_sneaker',
                'brand_clothes',
                'product_sneakers',
                'product_clothes',
                'product_watches',
                'product_best_seller',
                'news',
                'image'));
    }

}
