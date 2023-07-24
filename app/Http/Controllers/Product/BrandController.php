<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\EditBrandRequest;
use App\Models\Brand;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\ResourceHelper\ActionButtonResourceHelper;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use App\Support\WithPaginationLimit;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    use WithPaginationLimit,
        HandleJsonResponses,
        HandleComponentError,
        ActionButtonResourceHelper,
        BrandResourceHelper,
        CategoryResourceHelper;

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
        $image_name = '';
        if($request->hasFile('thumbnail_image'))
        {
            $destination_path = 'public/uploads/img';
            $image = $request->file('thumbnail_image');
            $image_name = $image->getClientOriginalName();
            $request->file('thumbnail_image')->storeAs($destination_path, $image_name);
        }

        Brand::create([
            'name' => $request->input('name'),
            'category_id' => [$request->input('category_id')],
            'thumbnail_image' => $image_name,
            'sort_no' => 1,
            'status' => $request->input('status'),
        ]);

        return redirect()->back()->with('success', 'Brand added successfully!');
    }

    /**
     * @param Brand $brand
     * @param EditBrandRequest $request
     * @return RedirectResponse
     */
    public function edit(Request $request, $brand): RedirectResponse
    {
        $brand = Brand::findOrFail($brand);
        $brand->name = $request->input('name');
        if ($request->input('thumbnail_image1')) {
            $brand->thumbnail_image = 'WebPage/img/brand/' . $request->input('thumbnail_image1');
        } else {
            $brand->thumbnail_image = $request->input('thumbnail_image');
        }
        $brand->status = $request->input('status');
        $brand->save();

        return redirect()->back()->with('success', 'Brand updated successfully!');
    }

    /**
     * @param Brand $brand
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
