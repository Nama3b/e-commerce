<?php

namespace App\Transformers\Resource;

use App\Models\Comment;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\TransformerAbstract;

class DetailCommentTransformer extends TransformerAbstract
{
    /**
     * @param Comment $comment
     * @return array
     */
    #[ArrayShape([])] public function transform(Comment $comment): array
    {
        return [
            'reference_id' => $comment->reference_id,
            'customer_id' => $comment->customer_id,
            'content' => $comment->content,
            'comment_type' => $comment->comment_type,
            'status' => $comment->status,
        ];
    }
}
