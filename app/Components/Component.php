<?php

namespace App\Components;

use App\Helpers\CustomerFromSessionResourceHelper;
use App\Helpers\ImageHandlerResourceHelper;
use App\Support\WithFilterSupport;
use App\Support\WithPaginationLimit;
use App\Traits\BannerResourceTrait;
use App\Traits\BrandResourceTrait;
use App\Traits\CartResourceTrait;
use App\Traits\CategoryResourceTrait;
use App\Traits\PostResourceTrait;
use App\Traits\ProductResourceTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class Component
{
    /**
     * The creating target request instance.
     */
    protected Request|FormRequest $request;

    use WithPaginationLimit,
        WithFilterSupport,
        CategoryResourceTrait,
        BannerResourceTrait,
        BrandResourceTrait,
        ProductResourceTrait,
        PostResourceTrait,
        CartResourceTrait,
        ImageHandlerResourceHelper,
        CustomerFromSessionResourceHelper;

    /**
     * Create new request instance.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

}
