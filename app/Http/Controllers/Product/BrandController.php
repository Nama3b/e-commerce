<?php

namespace App\Http\Controllers\Product;

use App\Components\Brand\Creator;
use App\Components\Brand\Editor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\EditBrandRequest;
use App\Http\Requests\Product\StoreBrandRequest;
use App\Models\Brand;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use App\Transformers\Product\DetailBrandTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    use WithPaginationLimit, HandleJsonResponses, HandleComponentError;

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('product_category');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function list(Request $request): mixed
    {
        list($instance, $filter, $editor, $modal_size, $create) = $this->buildInstance($request);

        $config = [
            "placeholder" => "Select multiple options..",
            "allowClear" => true
        ];

        return (new $instance)
            ->render('dashboard-pages.brand-list', compact('config', 'filter', 'editor', 'modal_size', 'create'));
    }

    /**
     * @param StoreBrandRequest $request
     * @return JsonResponse|mixed
     */
    public function store(StoreBrandRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($request) {
            $status = (new Creator($request))->create();

            return optional($status)->id ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Brand $brand
     * @param EditBrandRequest $request
     * @return JsonResponse|mixed
     */
    public function edit(Brand $brand, EditBrandRequest $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($brand, $request) {
            $status = (new Editor($request))->edit($brand);

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Brand $brand
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function delete(Brand $brand, Request $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($brand, $request) {
            $status = $brand->delete();

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Brand $brand
     * @return JsonResponse|mixed
     */
    public function detail(Brand $brand): mixed
    {
        return $this->withComponentErrorHandling(function () use ($brand) {

            return fractal()
                ->item($brand)
                ->transformWith(new DetailBrandTransformer())
                ->respond();
        });
    }
}
