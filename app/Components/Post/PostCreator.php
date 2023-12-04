<?php

namespace App\Components\Post;

use App\Models\Image;
use App\Models\Member;
use App\Models\Post;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\ResourceHelper\ImageHandlerResourceHelper;
use App\Support\ResourceHelper\PostResourceHelper;
use App\Support\WithPaginationLimit;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Components\Component;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class PostCreator extends Component
{
    use WithPaginationLimit,
        HandleJsonResponses,
        HandleComponentError,
        PostResourceHelper,
        ImageHandlerResourceHelper;

    /**
     * @return Factory|View|Application
     */
    public function list(): Factory|View|Application
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
     * @param $request
     * @return RedirectResponse
     */
    public function store($request): RedirectResponse
    {
        $time_now = Carbon::now();

        $post = [];
        $post['author'] = $request->input('author');
        $post['title'] = $request->input('title');
        $post['content'] = $request->input('content');
        $post['post_type'] = $request->input('post_type');
        $post['created_at'] = $time_now;
        $post_id = DB::table('posts')->insertGetId($post);

        $image['reference_id'] = $post_id;
        $image['image'] = $this->imageHandler($request);
        $image['image_type'] = 'POST';
        DB::table('images')->insert($image);

        return redirect()->back()->with('success', 'Post added successfully!');
    }

    /**
     * @param $post
     * @param $request
     * @return RedirectResponse
     */
    public function edit($post, $request): RedirectResponse
    {
        $post = Post::findOrFail($post);
        $post->author = $request->input('author');
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->post_type = $request->input('post_type');
        $post->status = $request->input('status');
        $post->save();

        if($request->hasFile('image'))
        {
            $image['image'] = $this->imageHandler($request);
        }
        $image['image_type'] = 'POST';
        Image::whereReferenceId($request->input('id'))->whereImageType('POST')->update($image);

        return redirect()->back()->with('success', 'Post updated successfully!');
    }

    /**
     * @param $post
     * @return RedirectResponse
     */
    public function delete($post): RedirectResponse
    {
        $post = Post::find($post);

        if (!$post) {
            return redirect()->route('dashboard/post')->with('error', 'Cannot find a record!');
        }

        $post->delete();

        return redirect()->back()->with('success', 'Post deleted successfully!');
    }
}
