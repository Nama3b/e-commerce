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
        return Post::with(['customer', 'member',
            'favorites' => function ($query) {
                $query->whereType('POST');
                if (Auth()->guard('customer')->user()) {
                    $query->whereCustomerId(Auth()->guard('customer')->user()->id);
                }
            },
            'postsaved' => function ($query) {
                if (Auth()->guard('customer')->user()) {
                    $query->whereCustomerId(Auth()->guard('customer')->user()->id);
                }
            },
            'images' => function ($query) {
                $query->whereImageType('POST');
            }
        ])
            ->orderBy('created_at', 'desc')->get()->toArray();
    }

    /**
     * @return array
     */
    public function getPostImage(): array
    {
        $image = [];
        $images = array_column($this->getAllPost(), 'images');
        foreach ($images as $value) {
            $image[] = array_column($value, 'image', 'reference_id');
        }

        $post = [];
        foreach ($this->getAllPost() as $value1) {
            foreach ($image as $value2) {
                if ($value1['id'] == (int)implode(array_keys($value2))) {
                    $post[] = array_fill_keys(['image'], implode($value2)) + $value1;
                }
            }
        }

        return $post;
    }
}
