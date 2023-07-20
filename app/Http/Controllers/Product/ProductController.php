<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\ResourceHelper\BrandResourceHelper;
use App\Support\ResourceHelper\CategoryResourceHelper;
use App\Support\ResourceHelper\ProductResourceHelper;
use App\Support\WithPaginationLimit;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class ProductController extends Controller
{
    use WithPaginationLimit, HandleJsonResponses, HandleComponentError, ProductResourceHelper, CategoryResourceHelper, BrandResourceHelper;

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
        $data_sneaker = collect($this->getProductImage())->where('category_id', '==', '1');
        $data_clothes = collect($this->getProductImage())->where('category_id', '==', '2');;
        $data_watches = collect($this->getProductImage())->where('category_id', '==', '3');;
        $category = $this->getAllCategory();
        $brand = $this->getAllBrand();

        $status = Product::STATUS;

        return view('dashboard-pages.product')
            ->with(compact(
                'data',
                'data_sneaker',
                'data_clothes',
                'data_watches',
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
        $product = [];
        $product['category_id'] = $request->category_id;
        $product['brand_id'] = $request->brand_id;
        $product['creator'] = $request->creator;
        $product['name'] = $request->name;
        $product['description'] = $request->description;
        $product['price'] = $request->price;
        $product['quantity'] = $request->quantity;
        $product_id = DB::table('products')->insertGetId($product);

        $image['reference_id'] = $product_id;
        $image['url'] = 'WebPage/img/product/' . $request->url;
        $image['image_type'] = 'PRODUCT';
        DB::table('images')->insert($image);

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    /**
     * @param Product $product
     * @param Request $request
     * @return RedirectResponse
     */
    public function edit($product, Request $request): RedirectResponse
    {
        $product = Product::findOrFail($product);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->creator = $request->creator;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->status = $request->status;
        $product->save();

        $image['url'] = 'WebPage/img/product/'.$request->url;
        $image['image_type'] = 'PRODUCT';
        Image::whereReferenceId($request->id)->whereImageType('PRODUCT')->update($image);

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
