<?php

namespace App\Support\ResourceHelper;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Collection;

trait CategoryResourceHelper
{
    /**
     * @return Collection|array
     */
    private function getAllCategory(): Collection|array
    {
        return ProductCategory::whereStatus(1)->take(10)->get();
    }
}
