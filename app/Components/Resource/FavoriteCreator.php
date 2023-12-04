<?php

namespace App\Components\Resource;

use App\Models\Banner;
use App\Models\Favorite;
use App\Models\Product;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Components\Component;
use Illuminate\Http\RedirectResponse;

class FavoriteCreator extends Component
{
    use WithPaginationLimit,
        HandleJsonResponses,
        HandleComponentError;

    /**
     * @return Factory|View|Application
     */
    public function list(): Factory|View|Application
    {
        $data = Product::get()->toArray();
        $favorite = Favorite::TYPE;

        return view('dashboard-pages.favorite')
            ->with(compact(
                'data',
                'favorite'
            ));
    }

    /**
     * @param $request
     * @return RedirectResponse
     */
    public function store($request): RedirectResponse
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
