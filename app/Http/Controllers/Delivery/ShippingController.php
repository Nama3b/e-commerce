<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Member;
use App\Models\Shipping;
use App\Support\HandleComponentError;
use App\Support\HandleJsonResponses;
use App\Support\WithPaginationLimit;
use App\Transformers\Delivery\DetailShippingTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    use WithPaginationLimit, HandleJsonResponses, HandleComponentError;

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('shipping');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function list(Request $request): mixed
    {
        list($instance, $filter, $editor, $modal_size, $create) = $this->buildInstance($request);

        $option1 = Member::pluck('full_name', 'id');
        $option2 = Delivery::pluck('service_name', 'id');
        $option3 = Shipping::STATUS;

        $config = [
            "placeholder" => "Select multiple options..",
            "allowClear" => true
        ];
        return (new $instance)
            ->render('dashboard-pages.index', compact('option1', 'option2', 'option3', 'config', 'filter', 'editor', 'modal_size', 'create'));
    }

    /**
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function store(Request $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($request) {
            $status = (new Creator($request))->create();

            return optional($status)->id ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Shipping $shipping
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function edit(Shipping $shipping, Request $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($shipping, $request) {
            $status = (new Editor($request))->edit($shipping);

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Shipping $shipping
     * @param Request $request
     * @return JsonResponse|mixed
     */
    public function delete(Shipping $shipping, Request $request): mixed
    {
        return $this->withComponentErrorHandling(function () use ($shipping, $request) {
            $status = $shipping->delete();

            return $status ?
                $this->respondOk() :
                $this->respondBadRequest();
        });
    }

    /**
     * @param Shipping $shipping
     * @return JsonResponse|mixed
     */
    public function detail(Shipping $shipping): mixed
    {
        return $this->withComponentErrorHandling(function () use ($shipping) {

            return fractal()
                ->item($shipping)
                ->transformWith(new DetailShippingTransformer())
                ->respond();
        });
    }
}
