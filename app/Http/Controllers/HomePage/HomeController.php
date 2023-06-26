<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Post;
use App\Models\ProductCategory;
use App\Support\ResourceHelper\ProductResourceHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    use ProductResourceHelper;

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $keyCustomer = ['CUSTOMER', 'COMMENT', 'FAVORITE', 'ORDER'];
        foreach ($keyCustomer as $value) {
            $customer[] = DB::table('permissions')->get()->filter(function ($item) use ($value) {
                return false !== stristr($item->description, $value);
            });
        }
        dd(collect($customer));
        $categories = ProductCategory::whereStatus(1)
            ->orderby('id', 'desc')->take(6)->get();

        $brands = Brand::whereStatus(1)->get();
        $brand_all = $brands->where('type', 'ALL')->take(6);
        $brand_sneaker = $brands->where('type', 'SNEAKER')->take(6);
        $brand_clothes = $brands->where('type', 'CLOTHES')->take(6);

        $products = $this->getProductImage();
        $product_sneakers = collect($this->getProductImage())->where('category_id', 1)->take(5)->toArray();
        $product_clothes = collect($this->getProductImage())->where('category_id', 2)->take(5)->toArray();
        $product_watches = collect($this->getProductImage())->where('category_id', 3)->take(5)->toArray();
        $product_best_seller = array_slice($this->getProductImage(), 0, 5);

        $news = $this->getNewsImage();

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
                'news'));
    }

    /**
     * @return array
     */
    public function getAllNews(): array
    {
        return Post::with(['images' => function ($query) {
            $query->whereImageType('POST');
        }])
            ->whereStatus('ACTIVE')
            ->wherePostType('NEWS')
            ->orderBy('created_at', 'desc')->take(8)->get()->toArray();
    }

    /**
     * @return array
     */
    public function getNewsImage(): array
    {
        $image = [];
        $images = array_column($this->getAllNews(), 'images');
        foreach ($images as $value) {
            $image[] = array_column($value, 'url', 'reference_id');
        }

        $news = [];
        foreach ($this->getAllNews() as $value1) {
            foreach ($image as $value2) {
                if ($value1['id'] == (int)implode(array_keys($value2))) {
                    $news[] = array_fill_keys(['url'], implode($value2)) + $value1;
                }
            }
        }

        return $news;
    }

    public function seo(Request $request)
    {
        $meta_desc = "PRO.N - Buy the hottest sneakers including Adidas Yeezy and Retro Jordans, Supreme clothes, trading cards, collectibles, designer handbags and luxury ...";
        $meta_keywords = "sneaker, clothes, watches, buy sneaker, buy watches";
        $meta_title = "E-Commerce - Sneakers, Clothes, Watches";
        $url_canonical = $request->url();

        return view('pages.home')
            ->with(compact('meta_desc',
                'meta_keywords',
                'meta_title',
                'url_canonical',
            ));
    }
}
