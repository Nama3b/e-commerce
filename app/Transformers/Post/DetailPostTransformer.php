<?php

namespace App\Transformers\Post;

use App\Models\Post;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\TransformerAbstract;

class DetailPostTransformer extends TransformerAbstract
{
    /**
     * @param Post $post
     * @return array
     */
    #[ArrayShape([])] public function transform(Post $post): array
    {
        return [
            'author' => $post->author,
            'title' => $post->title,
            'content' => $post->content,
            'post_type' => $post->post_type,
            'status' => $post->status,
        ];
    }
}
