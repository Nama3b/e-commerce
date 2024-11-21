<?php

namespace App\Traits;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Collection;

trait BannerResourceTrait
{
    /**
     * Get banner with type sneaker
     *
     * @return Collection|array
     */
    public function getSneakerBanner(): Collection|array
    {
        return Banner::whereType('SNEAKER')->take(5)->orderBy('sort_no')->get();
    }

    /**
     * Get banner with type clothes
     *
     * @return Collection|array
     */
    public function getClothesBanner(): Collection|array
    {
        return Banner::whereType('CLOTHES')->take(5)->orderBy('sort_no')->get();
    }
}
