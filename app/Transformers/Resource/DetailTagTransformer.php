<?php

namespace App\Transformers\Resource;

use App\Models\Tag;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\TransformerAbstract;

class DetailTagTransformer extends TransformerAbstract
{
    /**
     * @param Tag $tag
     * @return array
     */
    #[ArrayShape([])] public function transform(Tag $tag): array
    {
        return [
            'reference_id' => $tag->reference_id,
            'name' => $tag->name,
            'tag_type' => $tag->tag_type,
        ];
    }
}
