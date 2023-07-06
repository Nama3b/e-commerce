<?php

namespace App\Transformers\Product;

use App\Models\ProductCategory;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\TransformerAbstract;

class DetailProductCategoryTransformer extends TransformerAbstract
{
    /**
     * @param ProductCategory $category
     * @return array
     */
    #[ArrayShape([])] public function transform(ProductCategory $category): array
    {
        return [
            'name' => $category->name,
            'status' => $category->status,
        ];
    }
}
