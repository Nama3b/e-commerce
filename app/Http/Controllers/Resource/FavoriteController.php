<?php

namespace App\Http\Controllers\Resource;

use App\Components\Resource\FavoriteCreator;
use App\Http\Controllers\Controller;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('favorite');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function list(Request $request): mixed
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new FavoriteCreator($request))->list();
        });

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($request) {
            return (new FavoriteCreator($request))->store($request);
        });
    }

    /**
     * @param Request $request
     * @param $favorite
     * @return RedirectResponse
     */
    public function edit(Request $request, $favorite): RedirectResponse
    {
        return $this->withErrorHandling(function () use ($request, $favorite) {
            return (new FavoriteCreator($request))->edit($favorite);
        });
    }
}
