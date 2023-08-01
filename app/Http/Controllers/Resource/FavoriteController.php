<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
            'reference_id' => $request->input('id_hidden'),
            'customer_id' => Auth()->guard('customer')->user()->id,
            'type' => $request->input('type'),
        ]);

        return redirect()->back()->with('success', 'Favorite added successfully!');
    }

    /**
     * @param $favorite
     * @return RedirectResponse
     */
    public function edit($favorite): RedirectResponse
    {
        $favorite = Favorite::find($favorite);

        if (!$favorite) {
            return redirect()->back()->with('error', 'Cannot find a record!');
        }

        $favorite->delete();

        return redirect()->back()->with('success', 'Favorite updated successfully!');
    }
}
