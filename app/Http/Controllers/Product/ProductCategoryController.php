<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    use WithPaginationLimit,
        HandleJsonResponses,
        HandleComponentError;


    /**
     * @return Application|Factory|View
     * @throws Exception
     */
    public function list(): Application|Factory|View
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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        DB::table('product_category')->insert([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    /**
     * @param $productCategory
     * @param Request $request
     * @return RedirectResponse
     */
    public function edit($productCategory, Request $request): RedirectResponse
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
