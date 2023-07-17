<?php

namespace App\Support\ResourceHelper;

use App\Models\Post;

trait PostResourceHelper
{
    /**
     * @return mixed
     */
    public function getAllPost(): mixed
    {
        return Post::with(['customer', 'member', 'images' => function ($query) {
            $query->whereImageType('POST');
        }])
            ->whereStatus('ACTIVE')
            ->wherePostType('NEWS')
            ->orderBy('created_at', 'desc')->take(8)->get()->toArray();
    }

    /**
     * @return array
     */
    public function getPostImage(): array
    {
        $image = [];
        $images = array_column($this->getAllPost(), 'images');
        foreach ($images as $value) {
            $image[] = array_column($value, 'url', 'reference_id');
        }

        $post = [];
        foreach ($this->getAllPost() as $value1) {
            foreach ($image as $value2) {
                if ($value1['id'] == (int)implode(array_keys($value2))) {
                    $post[] = array_fill_keys(['url'], implode($value2)) + $value1;
                }
            }
        }

        return $post;
    }
}
