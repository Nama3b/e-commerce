<?php

namespace App\Components\Brand;

use App\Components\Common\BrandCommonClass;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class Creator extends BrandCommonClass
{

    /**
     * @param FormRequest $request
     */
    public function __construct(FormRequest $request)
    {
        parent::__construct($request);
    }

    /**
     * @return Model|Brand
     */
    public function create(): Model|Brand
    {
        return Brand::create($this->buildCreateData());
    }
}
