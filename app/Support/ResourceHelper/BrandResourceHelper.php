<?php

namespace App\Support\ResourceHelper;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Collection;

trait BrandResourceHelper
{
    /**
     * @return Collection|array
     */
    private function getAllBrand(): Collection|array
    {
        return Brand::whereStatus(1)->whereType('ALL')->take(6)->get();
    }
}
