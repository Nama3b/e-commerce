<?php

namespace App\Traits;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Collection;

trait BrandResourceTrait
{
    /**
     * @return Collection|array
     */
    public function getAllBrand(): Collection|array
    {
        return Brand::whereStatus(1)->orderBy('sort_no')->get();
    }
}
