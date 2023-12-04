<?php

namespace App\Components\Product;

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
use App\Components\Component;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ProductCreator extends Component
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
     * @param $request
     * @return RedirectResponse
     */
    public function store($request): RedirectResponse
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
     * @param $request
     * @return RedirectResponse
     */
    public function edit($product, $request): RedirectResponse
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
