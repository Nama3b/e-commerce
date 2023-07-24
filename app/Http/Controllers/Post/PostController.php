<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Member;
use App\Models\Post;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\ResourceHelper\PostResourceHelper;
use App\Support\WithPaginationLimit;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    use WithPaginationLimit, HandleJsonResponses, HandleComponentError, PostResourceHelper;

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('post');
    }

    /**
     * @return Application|Factory|View
     */
    public function list(): Application|Factory|View
    {
        $data = $this->getPostImage();
        $data_news = collect($this->getPostImage())->where('post_type', '==', 'NEWS');
        $data_blog = collect($this->getPostImage())->where('post_type', '==', 'BLOG');
        $author = Member::with('posts')->whereId(array_column($this->getAllPost(),'author'))->get()->toArray();

        $type = Post::POST_TYPE;
        $status = Post::STATUS;

        return view('dashboard-pages.post')
            ->with(compact(
                'data',
                'data_news',
                'data_blog',
                'author',
                'type',
                'status'
            ));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $post = [];
        $post['author'] = $request->input('author');
        $post['title'] = $request->input('title');
        $post['content'] = $request->input('content');
        $post['post_type'] = $request->input('post_type');
        $post_id = DB::table('posts')->insertGetId($post);

        $image['reference_id'] = $post_id;
        $image['url'] = $request->input('url');
        $image['image_type'] = 'POST';
        DB::table('images')->insert($image);

        return redirect()->back()->with('success', 'Post added successfully!');
    }

    /**
     * @param Post $post
     * @param Request $request
     * @return RedirectResponse
     */
    public function edit(Post $post, Request $request): RedirectResponse
    {
        $post = Post::findOrFail($post);
        $post->author = $request->input('author');
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->post_type = $request->input('post_type');
        $post->status = $request->input('status');
        $post->save();

        $image['url'] = 'WebPage/img/post/'.$request->input('url');
        $image['image_type'] = 'POST';
        Image::whereReferenceId($request->id)->whereImageType('POST')->update($image);

        return redirect()->back()->with('success', 'Post updated successfully!');
    }

    /**
     * @param Post $post
     * @return RedirectResponse
     */
    public function delete(Post $post): RedirectResponse
    {
        $post = Post::find($post);

        if (!$post) {
            return redirect()->route('dashboard/post')->with('error', 'Cannot find a record!');
        }

        $post->delete();

        return redirect()->back()->with('success', 'Post deleted successfully!');
    }
}
