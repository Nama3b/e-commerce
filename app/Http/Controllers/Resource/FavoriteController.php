<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Favorite;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    use WithPaginationLimit,
        HandleJsonResponses,
        HandleComponentError;

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

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        Favorite::create([
            'reference_id' => $request->input('id'),
            'customer_id' => Auth()->guard('customer')->user()->id,
            'favorite_type' => $request->input('type'),
        ]);

        return redirect()->back()->with('success', 'Favorite added successfully!');

    }

    /**
     * @param $favorite
     * @param Request $request
     * @return RedirectResponse
     */
    public function edit($favorite, Request $request): RedirectResponse
    {
        $favorite = Favorite::findOrFail($favorite);
        $favorite->status = $request->input('status');
        $favorite->save();

        return redirect()->back()->with('success', 'Favorite updated successfully!');
    }
}
