<?php

namespace App\Http\Controllers\Post;

use App\Components\Post\Creator;
use App\Components\Post\Editor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\EditPostRequest;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use App\Transformers\Post\DetailPostTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use WithPaginationLimit, HandleJsonResponses, HandleComponentError;

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('post');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function list(Request $request): mixed
    {
        list($instance, $filter, $editor, $modal_size, $create) = $this->buildInstance($request);

        $option1 = Post::STATUS;
        $option2 = Post::POST_TYPE;

        $config = [
            "placeholder" => "Select multiple options..",
            "allowClear" => true
        ];
        return (new $instance)
            ->render('admin.pages.post', compact('option1', 'option2', 'config', 'filter', 'editor', 'modal_size', 'create'));
    }

    /**
     * @param StorePostRequest $request
     * @return JsonResponse|mixed
     */
    public function store(StorePostRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($request) {
            $status = (new Creator($request))->create();

            return optional($status)->id ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Post $post
     * @param EditPostRequest $request
     * @return JsonResponse|mixed
     */
    public function edit(Post $post, EditPostRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($post, $request) {
            $status = (new Editor($request))->edit($post);

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Post $post
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function delete(Post $post, Request $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($post, $request) {
            $status = $post->delete();

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Post $post
     * @return JsonResponse|mixed
     */
    public function detail(Post $post): mixed
    {
        return $this->withComponentErrorHandling(function () use ($post) {

            return fractal()
                ->item($post)
                ->transformWith(new DetailPostTransformer())
                ->respond();
        });
    }
}
