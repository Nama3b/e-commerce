<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use App\Support\ResourceHelper\ImageHandlerResourceHelper;
use App\Support\ResourceHelper\ProductResourceHelper;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class ProductController extends Controller
{
    use ProductResourceHelper,
        CategoryResourceHelper,
        BrandResourceHelper,
        ImageHandlerResourceHelper;

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('product');
    }

    /**
     * @return Application|Factory|View
     * @throws Exception
     */
    public function list(): Application|Factory|View
    {
        $data = $this->getProductImage();
        $category = $this->getAllCategory();
        $brand = $this->getAllBrand();

        $status = Product::STATUS;

        return view('dashboard-pages.product')
            ->with(compact(
                'data',
                'category',
                'brand',
                'status'
            ));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $time_now = Carbon::now();
        $product = [];
        $product['category_id'] = $request->input('category_id');
        $product['brand_id'] = $request->input('brand_id');
        $product['creator'] = $request->input('creator');
        $product['name'] = $request->input('name');
        $product['description'] = $request->input('description');
        $product['price'] = $request->input('price');
        $product['quantity'] = $request->input('quantity');
        $product['created_at'] = $time_now;
        $product_id = DB::table('products')->insertGetId($product);

        $image['reference_id'] = $product_id;
        $image['image'] = $this->imageHandler($request);
        $image['image_type'] = 'PRODUCT';
        DB::table('images')->insert($image);

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    /**
     * @param $product
     * @param Request $request
     * @return RedirectResponse
     */
    public function edit($product, Request $request): RedirectResponse
    {
        $product = Product::findOrFail($product);
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->creator = $request->input('creator');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->status = $request->input('status');
        $product->save();

        if($request->hasFile('image'))
        {
            $image['image'] = $this->imageHandler($request);
        }
        $image['image_type'] = 'PRODUCT';
        Image::whereReferenceId($request->input('id'))->whereImageType('PRODUCT')->update($image);

        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    /**
     * @param $product
     * @return RedirectResponse
     */
    public function delete($product): RedirectResponse
    {
        $product = Product::find($product);

        if (!$product) {
            return redirect()->route('dashboard/product')->with('error', 'Cannot find a record!');
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}
