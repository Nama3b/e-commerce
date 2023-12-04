<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Post;
use App\Models\PostSaved;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CartResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use App\Support\ResourceHelper\CustomerFromSessionResourceHelper;
use App\Support\ResourceHelper\PostResourceHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostSavedController extends Controller
{
    use CategoryResourceHelper,
        BrandResourceHelper,
        CartResourceHelper,
        CustomerFromSessionResourceHelper,
        PostResourceHelper;

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function list(Request $request): Factory|View|Application
    {
        $cart = $this->myCart();
        $count_cart = $this->countCart();
        $user = $this->customerFromSession($request);
        $categories = $this->getAllCategory();
        $brand_all = $this->getAllBrand();

        $author = Member::with('posts')->whereId(array_column($this->getAllPost(),'author'))->get()->toArray();
        $author_name = implode((array_column($author,'full_name')));
        $author_avatar = implode((array_column($author,'image')));

        $data = collect($this->getPostImage())
            ->where('postsaved', '!=', null)
            ->toArray();
        $type = Post::POST_TYPE;

        return view('pages.saved-post')
            ->with(compact(
                'cart',
                'count_cart',
                'user',
                'categories',
                'brand_all',
                'author_name',
                'author_avatar',
                'data',
                'type'
            ));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        PostSaved::create([
            'reference_id' => $request->input('id_hidden'),
            'customer_id' => Auth()->guard('customer')->user()->id,
            'type' => $request->input('type'),
        ]);

        return redirect()->back()->with('success', 'Post saved successfully!');
    }

    /**
     * @param $post
     * @return RedirectResponse
     */
    public function edit($post): RedirectResponse
    {
        $post = PostSaved::find($post);

        if (!$post) {
            return redirect()->back()->with('error', 'Cannot find a record!');
        }

        $post->delete();

        return redirect()->back()->with('success', 'Post updated successfully!');
    }
}
