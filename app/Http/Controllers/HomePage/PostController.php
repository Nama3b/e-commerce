<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    use CategoryResourceHelper, BrandResourceHelper;

    /**
     * @return Application|Factory|View
     */
    public function post(): Application|Factory|View
    {
        $categories = $this->getAllCategory();

        $brand_all = $this->getAllBrand();

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

        $popular_post = collect($this->getAllPost())->take(4)->toArray();
        $newest_post = collect($this->getAllPost())->orderby('created_at','desc')->take(4)->toArray();
        $suggest_post = collect($this->getAllPost())->random(4)->take(4)->toArray();

        return view('pages.post')->with(compact(
            'post',
            'categories',
            'brand_all',
            'popular_post',
            'newest_post',
            'suggest_post'
        ));
    }

    /**
     * @return array
     */
    public function getAllPost(): array
    {
        return Post::with(['images' => function ($query) {
            $query->whereImageType('POST');
        }])
            ->whereStatus('ACTIVE')
            ->wherePostType('NEWS')
            ->orderBy('created_at', 'desc')->take(8)->get()->toArray();
    }

}
