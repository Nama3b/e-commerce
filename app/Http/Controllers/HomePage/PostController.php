<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function post(Request $request): Application|Factory|View
    {
        $data = $this->getPostCommonData($request);

        $post = collect($this->getPostImage())
            ->where('status', 'ACTIVE')
            ->where('post_type', 'NEWS');

        $post_all = $post->take(10)->toArray();
        $popular_post = $post->take(4)->toArray();
        $newest_post = $post->sortByDesc('created_at')->take(4)->toArray();
        $suggest_post = $post->random(4)->take(4)->toArray();

        return view('pages.post')->with(array_merge($data, [
            'post_all' => $post_all,
            'popular_post' => $popular_post,
            'newest_post' => $newest_post,
            'suggest_post' => $suggest_post,
        ]));
    }

    /**
     * @param $id
     * @param Request $request
     * @return Factory|View|Application
     */
    public function postDetail($id, Request $request): Factory|View|Application
    {
        $data = $this->getPostCommonData($request);

        $post = collect($this->getPostImage())
            ->where('status', 'ACTIVE')
            ->where('post_type', 'NEWS');

        $posts = $post->where('id', $id)->toArray();
        $data['data'] = array_shift($posts);
        $data['data_latest'] = $post->take(5)->toArray();

        return view('pages.post.post-detail')->with($data);
    }

    /**
     * @param Request $request
     * @return array
     */
    private function getPostCommonData(Request $request): array
    {
        $user = $this->customerFromSession($request);
        $cart = $this->myCart();
        $count_cart = $this->countCart();

        $author = Member::with('posts')->whereId(array_column($this->getAllPost(), 'author'))->get()->toArray();
        $author_name = implode(array_column($author, 'full_name'));
        $author_avatar = implode(array_column($author, 'image'));

        $categories = $this->getAllCategory();
        $brand_all = $this->getAllBrand();
        $tags = $this->getTags();

        return compact('user', 'cart', 'count_cart', 'author_name', 'author_avatar', 'categories', 'brand_all', 'tags');
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
