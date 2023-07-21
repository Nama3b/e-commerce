<?php

namespace App\Support\ResourceHelper;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Collection;

trait BannerResourceHelper
{
    /**
     * @return Collection|array
     */
    private function getSneakerBanner(): Collection|array
    {
        return Banner::whereType('SNEAKER')->take(5)->orderBy('sort_no')->get();
    }

    /**
     * @return Collection|array
     */
    private function getClothesBanner(): Collection|array
    {
        return Banner::whereType('CLOTHES')->take(5)->orderBy('sort_no')->get();
    }
}
