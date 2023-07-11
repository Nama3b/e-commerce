<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Member;
use App\Models\Post;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CartResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use App\Support\ResourceHelper\ProductResourceHelper;
use App\Support\ResourceHelper\CustomerFromSessionResourceHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    use CategoryResourceHelper, BrandResourceHelper, ProductResourceHelper, CartResourceHelper, CustomerFromSessionResourceHelper;

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $user = $this->customerFromSession($request);

        $cart = $this->myCart();
        $count_cart = $this->countCart();

        $author = Member::with('posts')->whereId(array_column($this->getAllNews(),'author'))->get()->toArray();
        $author_name = implode((array_column($author,'full_name')));

        $categories = $this->getAllCategory();
        $brand_all = $this->getAllBrand();

        $brands = Brand::whereStatus(1)->get();
        $brand_sneaker = $brands->where('type', 'SNEAKER')->take(6);
        $brand_clothes = $brands->where('type', 'CLOTHES')->take(6);

        $products = $this->getProductImage();
        $product_sneakers = collect($this->getProductImage())->where('category_id', 1)->take(5)->toArray();
        $product_clothes = collect($this->getProductImage())->where('category_id', 2)->take(5)->toArray();
        $product_watches = collect($this->getProductImage())->where('category_id', 3)->take(5)->toArray();
        $product_best_seller = array_slice($this->getProductImage(), 0, 5);

        $news = $this->getNewsImage();

        return view('pages.home')
            ->with(compact('user',
                'cart',
                'count_cart',
                'author_name',
                'products',
                'categories',
                'brand_all',
                'brand_sneaker',
                'brand_clothes',
                'product_sneakers',
                'product_clothes',
                'product_watches',
                'product_best_seller',
                'news'
            ));
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
