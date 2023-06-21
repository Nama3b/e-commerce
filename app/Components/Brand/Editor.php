<?php

namespace App\Components\Brand;

use App\Components\Common\BrandCommonClass;
use App\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;

class Editor extends BrandCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @param Brand $brand
     * @return bool
     */
    public function edit(Brand $brand): bool
    {
        return $brand->update($this->buildCreateData(true, $brand));
    }
}
