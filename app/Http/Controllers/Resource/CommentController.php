<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    use WithPaginationLimit,
        HandleJsonResponses,
        HandleComponentError;

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('comment');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function list(Request $request): mixed
    {

    }

    /**
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function store(Request $request): mixed
    {

    }

    /**
     * @param $comment
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function delete($comment, Request $request): mixed
    {

    }

    /**
     * @param $comment
     * @return JsonResponse|mixed
     */
    public function detail($comment): mixed
    {

    }
}
