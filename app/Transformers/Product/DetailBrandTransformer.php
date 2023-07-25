<?php

namespace App\Transformers\Product;

use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\TransformerAbstract;

class DetailBrandTransformer extends TransformerAbstract
{
    /**
     * @param Brand $brand
     * @return array
     */
    #[ArrayShape([])] public function transform(Brand $brand): array
    {
        return [
            'name' => $brand->name,
            'image' => asset(Storage::url($brand->image)),
            'status' => $brand->status,
        ];
    }
}
