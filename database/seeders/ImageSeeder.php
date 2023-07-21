<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'reference_id' => '1',
                'url' => 'WebPage/img/product/sneaker01.avif',
                'sort_no' => 1,
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '2',
                'url' => 'WebPage/img/product/sneaker02.avif',
                'sort_no' => 1,
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '3',
                'url' => 'WebPage/img/product/sneaker03.avif',
                'sort_no' => 1,
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '4',
                'url' => 'WebPage/img/product/sneaker04.avif',
                'sort_no' => 1,
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '5',
                'url' => 'WebPage/img/product/sneaker05.avif',
                'sort_no' => 1,
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '6',
                'url' => 'WebPage/img/product/sneaker06.avif',
                'sort_no' => 1,
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '7',
                'url' => 'WebPage/img/product/clothes01.avif',
                'sort_no' => 1,
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '8',
                'url' => 'WebPage/img/product/clothes02.avif',
                'sort_no' => 1,
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '9',
                'url' => 'WebPage/img/product/clothes03.avif',
                'sort_no' => 1,
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '10',
                'url' => 'WebPage/img/product/clothes04.avif',
                'sort_no' => 1,
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '11',
                'url' => 'WebPage/img/product/clothes05.avif',
                'sort_no' => 1,
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '12',
                'url' => 'WebPage/img/product/clothes06.avif',
                'sort_no' => 1,
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '13',
                'url' => 'WebPage/img/product/watch01.avif',
                'sort_no' => 1,
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '14',
                'url' => 'WebPage/img/product/watch02.avif',
                'sort_no' => 1,
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '15',
                'url' => 'WebPage/img/product/watch03.avif',
                'sort_no' => 1,
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '16',
                'url' => 'WebPage/img/product/watch04.avif',
                'sort_no' => 1,
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '17',
                'url' => 'WebPage/img/product/watch05.avif',
                'sort_no' => 1,
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '18',
                'url' => 'WebPage/img/product/watch06.avif',
                'sort_no' => 1,
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => 1,
                'url' => 'WebPage/img/post/2022-3-7-hidden-gems-blog-hero-twitter-square-1200x1200.png',
                'sort_no' => 1,
                'image_type' => 'POST'
            ],
            [
                'reference_id' => '2',
                'url' => 'WebPage/img/post/NBA-FINALS-Summer23_EditorialsBlogThumb.jpg',
                'sort_no' => 1,
                'image_type' => 'POST'
            ],
            [
                'reference_id' => '3',
                'url' => 'WebPage/img/post/blog-header-8-1200x1200.jpg',
                'sort_no' => 1,
                'image_type' => 'POST'
            ],
            [
                'reference_id' => '4',
                'url' => 'WebPage/img/post/blog-thumbnail-13.jpg',
                'sort_no' => 1,
                'image_type' => 'POST'
            ],
            [
                'reference_id' => '5',
                'url' => 'WebPage/img/post/Pickoftheweek-3-10-22-banners-blog-hero-twitter-square-1200x1200.png',
                'sort_no' => 1,
                'image_type' => 'POST'
            ],
            [
                'reference_id' => '6',
                'url' => 'WebPage/img/post/Perfect-Fit-3-10-2022-blog-header-1200x1200.png',
                'sort_no' => 1,
                'image_type' => 'POST'
            ],
            [
                'reference_id' => '7',
                'url' => 'WebPage/img/post/The-Rip-03-14-22-blog-header-1200x1200.jpg',
                'sort_no' => 1,
                'image_type' => 'POST'
            ],
            [
                'reference_id' => '8',
                'url' => 'WebPage/img/post/THE_FLIP_MARCH-20221400x1400-Blog-1200x1200.jpg',
                'sort_no' => 1,
                'image_type' => 'POST'
            ],
        ]);
    }
}
