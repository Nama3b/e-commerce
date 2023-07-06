<?php

namespace App\Transformers\Post;

use App\Models\Post;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;

class ShowPostTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        'orderDetail'
    ];

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

    /**
     * @param Post $post
     * @return Collection
     */
    public function includeOrderDetail(Post $post): Collection
    {
        return $this->collection($post->member, new DetailMemberTransformer());
    }
}
