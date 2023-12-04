<?php

namespace App\Components\Product;

use App\Models\Brand;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use App\Support\ResourceHelper\ImageHandlerResourceHelper;
use App\Support\ResourceHelper\ProductResourceHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Components\Component;
use Illuminate\Http\RedirectResponse;

class BrandCreator extends Component
{
    use BrandResourceHelper,
        CategoryResourceHelper,
        ImageHandlerResourceHelper;

    /**
     * @return Factory|View|Application
     */
    public function list(): Factory|View|Application
    {
        $data = Brand::get()->toArray();
        $category = $this->getAllCategory();
        $status = Brand::STATUS;

        return view('dashboard-pages.brand')
            ->with(compact(
                'data',
                'category',
                'status'
            ));
    }

    /**
     * @param $request
     * @return RedirectResponse
     */
    public function store($request): RedirectResponse
    {
        Brand::create([
            'name' => $request->input('name'),
            'category_id' => [(int)$request->input('category_id')],
            'image' => $this->imageHandler($request),
            'status' => $request->input('status'),
        ]);

        return redirect()->back()->with('success', 'Brand added successfully!');
    }

    /**
     * @param $request
     * @param $brand
     * @return RedirectResponse
     */
    public function edit($request, $brand): RedirectResponse
    {
        $brand = Brand::findOrFail($brand);
        $brand->name = $request->input('name');
        if ($request->hasFile('image')) {
            $brand->image = $this->imageHandler($request);
        }
        $brand->status = $request->input('status');
        $brand->save();

        return redirect()->back()->with('success', 'Brand updated successfully!');
    }

    /**
     * @param $brand
     * @return RedirectResponse
     */
    public function delete($brand): RedirectResponse
    {
        $brand = Brand::find($brand);

        if (!$brand) {
            return redirect()->route('dashboard/brand')->with('error', 'Cannot find a record!');
        }

        $brand->delete();

        return redirect()->back()->with('success', 'Brand deleted successfully!');
    }

}
