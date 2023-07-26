<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use App\Support\ResourceHelper\ImageHandlerResourceHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    use BrandResourceHelper,
        CategoryResourceHelper,
        ImageHandlerResourceHelper;

    /**
     * @return Application|Factory|View
     */
    public function list(): Application|Factory|View
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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
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
     * @param $brand
     * @param Request $request
     * @return RedirectResponse
     */
    public function edit(Request $request, $brand): RedirectResponse
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
