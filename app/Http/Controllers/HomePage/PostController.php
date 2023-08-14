<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CartResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use App\Support\ResourceHelper\CustomerFromSessionResourceHelper;
use App\Support\ResourceHelper\PostResourceHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    use CategoryResourceHelper,
        BrandResourceHelper,
        CartResourceHelper,
        CustomerFromSessionResourceHelper,
        PostResourceHelper;

    /**
     * Show post home
     *
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
        $author_avatar = implode((array_column($author,'image')));

        $categories = $this->getAllCategory();
        $brand_all = $this->getAllBrand();

        $tags = $this->getTags();
        $post = collect($this->getPostImage())
            ->where('status','==','ACTIVE')
            ->where('post_type','==','NEWS');
        $post_all = $post->take(10)->toArray();
        $popular_post = $post->take(4)->toArray();
        $newest_post = $post->sortByDesc('created_at')->take(4)->toArray();
        $suggest_post = $post->random(4)->take(4)->toArray();

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
     * @param $id
     * @param Request $request
     * @return Factory|View|Application
     */
    public function postDetail($id, Request $request): Factory|View|Application
    {
        $user = $this->customerFromSession($request);
        $cart = $this->myCart();
        $count_cart = $this->countCart();

        $author = Member::with('posts')->whereId(array_column($this->getAllPost(),'author'))->get()->toArray();
        $author_name = implode((array_column($author,'full_name')));
        $author_avatar = implode((array_column($author,'image')));

        $categories = $this->getAllCategory();
        $brand_all = $this->getAllBrand();

        $post = collect($this->getPostImage())
        ->where('status','==','ACTIVE')
        ->where('post_type','==','NEWS');
        $posts = $post->where('id', $id)->toArray();
        $data = array_shift($posts);
        $data_latest = $post->take(5)->toArray();
        $tags = $this->getTags();

        return view('pages.post.post-detail')
            ->with(compact('user',
                'cart',
                'count_cart',
                'author_name',
                'author_avatar',
                'data',
                'data_latest',
                'categories',
                'brand_all',
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

        $post = collect($this->getPostImage())
            ->where('status','==','ACTIVE');
        $searches = $post->filter(function ($item) use ($keyword) {
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
     * @return array
     */
    public function getTags(): array
    {
        return DB::table('tags')->orderBy('id','desc')->take(20)->get()->toArray();
    }
}
