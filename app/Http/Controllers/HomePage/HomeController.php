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
        $product_categories = DB::table('product_category')->where('status','1')->orderby('id','desc')->take(6)->get();

        // get brand
        $brands = DB::table('brands')->where('status','1')->get();
        $brand_all = $brands->where('type', 'ALL')->take(6);
        $brand_sneaker = $brands->where('type', 'SNEAKER')->take(6);
        $brand_clothes = $brands->where('type', 'CLOTHES')->take(6);

        // get product
        $products = Product::with('brand', 'category', 'member', 'images')
            ->join('images','images.reference_id','=','products.id')
            ->where('images.image_type','PRODUCT')
            ->where('products.status','STOCKING')
            ->orderby('products.created_at','desc')->get();
        $product_sneakers = $products->where('category_id',1)->take(6)->toArray();
        $product_clothes = $products->where('category_id',2)->take(5)->toArray();
        $product_watches = $products->where('category_id',3)->take(5)->toArray();
        $product_best_seller = $products->take(6)->toArray();

        // get post
        $news = Post::with('images')
            ->join('images','images.reference_id','=','posts.id')
            ->where('images.image_type','POST')
            ->where('posts.status', 'ACTIVE')
            ->where('posts.post_type', 'NEWS')
            ->orderBy('posts.created_at', 'desc')->take(8)->get()->toArray();

        return view('pages.home')
            ->with(compact('products',
                'product_categories',
                'brand_all',
                'brand_sneaker',
                'brand_clothes',
                'product_sneakers',
                'product_clothes',
                'product_watches',
                'product_best_seller',
                'news'));
    }

    public function showByBrand($brand): Factory|View|Application
    {
        $brands = Product::whereBrandId($brand)
            ->limit(6)
            ->orderBy('id', 'desc')
            ->get();

        return view('pages.home')->with(compact('brands'));
    }

    public function showByCategory($category): Factory|View|Application
    {
        $categories = Product::whereCategoryId($category)
            ->limit(6)
            ->orderBy('id', 'desc')
            ->get();

        return view('pages.home')->with(compact('categories'));
    }

//    /**
//     * @return Application|Factory|View
//     */
//    public function products(): View|Factory|Application
//    {
//        list($a, $b) = self::all();
//        $count = $b;
//        arsort($count);
//        $product_category = collect();
//        foreach ($count as $key => $value) {
//            $cate = ProductCategory::find($key);
//            if ($cate) {
//                $cate->number = $value;
//                $product_category->add($cate);
//            }
//        }
//        $product = $a->get()->take(6);
//        $category_blog = $a->get()->take(5);
//
//        return view('layout.product')->with(compact('product', 'category_blog', 'product_category'));
//    }
//
//    /**
//     * @param $id
//     * @return Application|Factory|View
//     */
//    public function product_category($id): View|Factory|Application
//    {
//        list($a, $b) = self::all();
//        $count = $b;
//        arsort($b);
//        $product_category = collect();
//        foreach ($count as $key => $value) {
//            $cate = ProductCategory::find($key);
//            if ($cate) {
//                $cate->number = $value;
//                $product_category->add($cate);
//            }
//        }
//        $product = Product::with('ProductCategory')->where('products.category_id', $id)->where('products.status', 'STOCKING')->get()->take(6);
//        $category_blog = $a->get()->take(5);
//
//        return view('layout.product_category')->with(compact('product', 'product_category', 'category_blog'));
//    }
//
//    /**
//     * @param $id0
//     * @return Application|Factory|View
//     */
//    public function product_detail($id): View|Factory|Application
//    {
//        list($a, $b) = self::all();
//        $count = $b;
//        arsort($count);
//        $product_category = collect();
//        foreach ($count as $key => $value) {
//            $cate = ProductCategory::find($key);
//            if ($cate) {
//                $cate->number = $value;
//                $product_category->add($cate);
//            }
//        }
//        $product_detail = Product::with('ProductCategory')->where('news.id', $id)->get();
//        $category_blog = $a->get()->take(5);
//        $products_relate = $a->get()->take(3);
//        return view('layouts.news_detail')->with(compact('product_detail', 'product_category', 'category_blog', 'products_relate'));
//    }
//
//    public function search_product(Request $request)
//    {
//        list($a, $b) = self::all();
//        $count = $b;
//        arsort($count);
//        $product_category = collect();
//        foreach ($count as $key => $value) {
//            $cate = ProductCategory::find($key);
//            if ($cate) {
//                $cate->number = $value;
//                $product_category->add($cate);
//            }
//        }
//        $category = $a->get()->take(5);
//        $keyword = $request->keyword_submit;
//        $search = Product::with('ProductCategory')->where('products.title','like','%'.$keyword.'%')->where('status', 'PUBLIC')->take(6)->get();
//        return view('layouts.search_blog')->with(compact('search','product_category', 'category'));
//    }

}
