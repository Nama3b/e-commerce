<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Post;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CartResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use App\Support\ResourceHelper\CustomerFromSessionResourceHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    use CategoryResourceHelper, BrandResourceHelper, CartResourceHelper, CustomerFromSessionResourceHelper;

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function post(Request $request): Application|Factory|View
    {
        $user = $this->customerFromSession($request);

        $cart = $this->myCart();
        $count_cart = $this->countCart();

        $author = Member::with('posts')->whereId(array_column($this->getAllPost(),'author'))->get()->toArray();
        $author_name = implode((array_column($author,'full_name')));
        $author_avatar = implode((array_column($author,'avatar')));

        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        $tags = $this->getTags();

        $post_all = collect($this->getPostImage())->take(10)->toArray();
        $popular_post = collect($this->getPostImage())->take(4)->toArray();
        $newest_post = collect($this->getPostImage())->sortByDesc('created_at')->take(4)->toArray();
        $suggest_post = collect($this->getPostImage())->random(4)->take(4)->toArray();

        return view('pages.post')
            ->with(compact('user',
                'cart',
                'count_cart',
                'author_name',
                'author_avatar',
                'post_all',
                'categories',
                'brand_all',
                'popular_post',
                'newest_post',
                'suggest_post',
                'tags'
            ));
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function searchPost(Request $request): Factory|View|Application
    {
        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

        $tags = $this->getTags();

        $keyword = $request->input('keyword_submit');
        $searches = collect($this->getPostImage())->filter(function ($item) use ($keyword) {
            return false !== stristr($item['title'], $keyword);
        });

        return view('pages.post.search-post')
            ->with(compact(
                'searches',
                'categories',
                'brand_all',
                'tags',
                'searches'
            ));
    }

    /**
     * @return mixed
     */
    public function getAllPost(): mixed
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
    public function getPostImage(): array
    {
        $image = [];
        $images = array_column($this->getAllPost(), 'images');
        foreach ($images as $value) {
            $image[] = array_column($value, 'url', 'reference_id');
        }

        $post = [];
        foreach ($this->getAllPost() as $value1) {
            foreach ($image as $value2) {
                if ($value1['id'] == (int)implode(array_keys($value2))) {
                    $post[] = array_fill_keys(['url'], implode($value2)) + $value1;
                }
            }
        }

        return $post;
    }

    public function getTags(): array
    {
        return DB::table('tags')->orderBy('id','desc')->take(20)->get()->toArray();
    }
}
