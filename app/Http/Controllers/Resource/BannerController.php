<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\ImageHandlerResourceHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    use BrandResourceHelper,
        ImageHandlerResourceHelper;

    /**
     * @return Application|Factory|View
     */
    public function list(): Application|Factory|View
    {
        $data = Banner::get()->toArray();
        $type = Banner::TYPE;

        return view('dashboard-pages.banner')
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
        $count = count(Banner::all());
        Banner::create([
            'name' => $request->input('name'),
            'image' => $this->imageHandler($request),
            'sort_no' => $count + 1,
            'type' => $request->input('type'),
        ]);

        return redirect()->back()->with('success', 'Banner added successfully!');
    }

    /**
     * @param $banner
     * @param Request $request
     * @return RedirectResponse
     */
    public function edit(Request $request, $banner): RedirectResponse
    {
        $banner = Banner::findOrFail($banner);
        $banner->name = $request->input('name');
        if ($request->hasFile('image')) {
            $banner->image = $this->imageHandler($request);
        }
        $banner->type = $request->input('type');
        $banner->save();

        return redirect()->back()->with('success', 'Banner updated successfully!');
    }

    /**
     * @param $banner
     * @return RedirectResponse
     */
    public function delete($banner): RedirectResponse
    {
        $banner = Banner::find($banner);

        if (!$banner) {
            return redirect()->route('dashboard/banner')->with('error', 'Cannot find a record!');
        }

        $banner->delete();

        return redirect()->back()->with('success', 'Banner deleted successfully!');
    }

}
