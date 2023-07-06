<?php

namespace App\Transformers\Resource;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\TransformerAbstract;

class DetailImageTransformer extends TransformerAbstract
{
    /**
     * @param Image $image
     * @return array
     */
    #[ArrayShape([])] public function transform(Image $image): array
    {
        return [
            'reference_id' => $image->reference_id,
            'url' => asset(Storage::url($image->url)),
            'tag_type' => $image->sort_no,
            'image_type' => $image->image_type,
        ];
    }
}
