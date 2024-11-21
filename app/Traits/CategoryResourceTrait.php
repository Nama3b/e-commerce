<?php

namespace App\Traits;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Collection;

trait CategoryResourceTrait
{
    /**
     * @return Collection|array
     */
    public function getAllCategory(): Collection|array
    {
        return ProductCategory::whereStatus(1)->take(10)->get();
    }
}
