<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TagController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function list(): Application|Factory|View
    {
        $data = Tag::with('member')->get()->toArray();
        $type = Tag::TYPE;

        return view('dashboard-pages.tag')
            ->with(compact(
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
        $time_now = Carbon::now();
        Tag::create([
            'name' => $request->input('name'),
            'creator' => Auth()->guard('member')->user()->id,
            'type' => $request->input('type'),
            'created_at' => $time_now
        ]);

        return redirect()->back()->with('success', 'Tag added successfully!');
    }

    /**
     * @param $tag
     * @param Request $request
     * @return RedirectResponse
     */
    public function edit(Request $request, $tag): RedirectResponse
    {
        $tag = Tag::findOrFail($tag);
        $tag->name = $request->input('name');
        $tag->type = $request->input('type');
        $tag->save();

        return redirect()->back()->with('success', 'Tag updated successfully!');
    }

    /**
     * @param $tag
     * @return RedirectResponse
     */
    public function delete($tag): RedirectResponse
    {
        $tag = Tag::find($tag);

        if (!$tag) {
            return redirect()->route('dashboard/banner')->with('error', 'Cannot find a record!');
        }

        $tag->delete();

        return redirect()->back()->with('success', 'Tag deleted successfully!');
    }

}
