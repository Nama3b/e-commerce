<?php

namespace App\Http\Controllers\Post;

use App\Components\Post\PostCreator;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('post');
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function list(Request $request): Application|Factory|View
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new PostCreator($request))->list();
        });
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new PostCreator($request))->store($request);
        });
    }

    /**
     * @param $post
     * @param Request $request
     * @return RedirectResponse
     */
    public function edit($post, Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($post, $request) {
            return (new PostCreator($request))->edit($post, $request);
        });
    }

    /**
     * @param $post
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete($post, Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($post, $request) {
            return (new PostCreator($request))->delete($post);
        });
    }
}
