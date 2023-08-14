<?php

namespace App\Support\ResourceHelper;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Collection;

trait BannerResourceHelper
{
    /**
     * Get banner with type sneaker
     *
     * @return Collection|array
     */
    private function getSneakerBanner(): Collection|array
    {
        return Banner::whereType('SNEAKER')->take(5)->orderBy('sort_no')->get();
    }

    /**
     * Get banner with type clothes
     *
     * @return Collection|array
     */
    private function getClothesBanner(): Collection|array
    {
        return Banner::whereType('CLOTHES')->take(5)->orderBy('sort_no')->get();
    }
}
