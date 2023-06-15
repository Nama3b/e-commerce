<?php

namespace App\Support\ResourceHelper;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

trait ProductResourceHelper
{
    /**
     * @return Collection|array
     */
    public function getAllProducts(): Collection|array
    {
        return Product::with(['category', 'brand', 'member', 'images' => function ($query) {
            $query->whereImageType('PRODUCT');
        }])
            ->where('status', 'STOCKING')
            ->orderby('created_at', 'desc')->get();
    }

    /**
     * @return array
     */
    public function getProductImage(): array
    {
        $image = [];
        $images = array_column($this->getAllProducts()->toArray(), 'images');
        foreach ($images as $value) {
            $image[] = array_column($value, 'url', 'reference_id');
        }

        $products = [];
        foreach ($this->getAllProducts() as $value1) {
            foreach ($image as $value2) {
                if ($value1['id'] == (int)implode(array_keys($value2))) {
                    $products[] = array_fill_keys(['url'], implode($value2)) + $value1->toArray();
                }
            }
        }

        return $products;
    }
}
