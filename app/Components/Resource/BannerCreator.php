<?php

namespace App\Components\Resource;

use App\Components\Component;
use App\Models\Banner;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BannerCreator extends Component
{

    /**
     * @return Factory|View|Application
     */
    public function list(): Factory|View|Application
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
     * @param $request
     * @return RedirectResponse
     */
    public function store($request): RedirectResponse
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
     * @param $request
     * @param $banner
     * @return RedirectResponse
     */
    public function edit($request, $banner): RedirectResponse
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
