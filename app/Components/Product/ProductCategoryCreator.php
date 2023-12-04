<?php

namespace App\Components\Product;

use App\Models\Brand;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use App\Support\ResourceHelper\ImageHandlerResourceHelper;
use App\Support\ResourceHelper\ProductResourceHelper;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Components\Component;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ProductCategoryCreator extends Component
{
    use ProductResourceHelper,
        CategoryResourceHelper,
        BrandResourceHelper,
        ImageHandlerResourceHelper;

    /**
     * @return Factory|View|Application
     */
    public function list(): Factory|View|Application
    {
        $data = ProductCategory::all()->toArray();

        $status = ProductCategory::STATUS;

        return view('dashboard-pages.Category')
            ->with(compact(
                'data',
                'status'
            ));
    }

    /**
     * @param $request
     * @return RedirectResponse
     */
    public function store($request): RedirectResponse
    {
        DB::table('product_category')->insert([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    /**
     * @param $request
     * @param $productCategory
     * @return RedirectResponse
     */
    public function edit($productCategory, $request): RedirectResponse
    {
        $productCategory = ProductCategory::findOrFail($productCategory);
        $productCategory->name = $request->input('name');
        $productCategory->status = $request->input('status');
        $productCategory->save();

        return redirect()->back()->with('success', 'Category updated successfully!');
    }

    /**
     * @param $productCategory
     * @return RedirectResponse
     */
    public function delete($productCategory): RedirectResponse
    {
        $productCategory = ProductCategory::find($productCategory);

        if (!$productCategory) {
            return redirect()->route('dashboard/product_category')->with('error', 'Cannot find a record!');
        }

        $productCategory->delete();

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }

}
