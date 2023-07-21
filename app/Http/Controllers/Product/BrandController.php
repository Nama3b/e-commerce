<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\EditBrandRequest;
use App\Models\Brand;
use App\Models\Image;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\ResourceHelper\ActionButtonResourceHelper;
use App\Support\WithPaginationLimit;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    use WithPaginationLimit, HandleJsonResponses, HandleComponentError, ActionButtonResourceHelper;

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('product_category');
    }

    /**
     * @return Application|Factory|View
     */
    public function list(): Application|Factory|View
    {
        $data = Brand::where('type', 'ALL')->get()->toArray();

        $data_sneaker = Brand::where('type', 'SNEAKER')->get()->toArray();
        $data_clothes = Brand::where('type', 'CLOTHES')->get()->toArray();

        $status = Brand::STATUS;

        return view('dashboard-pages.brand')
            ->with(compact(
                'data',
                'data_sneaker',
                'data_clothes',
                'status'
            ));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $image = $request->thumbnail_image;
        dd($image, $request);
        $file_name = time() . '.' . $image->getClientOriginalExtension();

        $img = Image::make($image->getRealPath());
        $img->stream();

        DB::table('brands')->insert([
            'name' => $request->input('name'),
            'thumbnail_image' => Storage::disk('local')->put('uploads/'.'/'.$file_name, $img, 'public'),
            'type' => $request->input('type'),
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
