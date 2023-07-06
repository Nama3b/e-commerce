<?php

namespace App\Transformers\Product;

use App\Models\Product;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\TransformerAbstract;

class DetailProductTransformer extends TransformerAbstract
{
    /**
     * @param Product $product
     * @return array
     */
    #[ArrayShape([])] public function transform(Product $product): array
    {
        return [
            'category_id' => $product->category_id,
            'brand_id' => $product->brand_id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'quantity' => $product->quantity,
            'status' => $product->status,
        ];
    }
}
