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
            'type' => $brand->type,
            'thumbnail_image' => asset(Storage::url($brand->thumbnail_image)),
            'status' => $brand->status,
        ];
    }
}
