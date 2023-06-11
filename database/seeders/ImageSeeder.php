<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'url' => 'WebPage/img/product/Air-Jordan-6-Retro-UNC-White-GS37.avif',
                'sort_no' => '1',
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '3',
                'url' => 'WebPage/img/product/img01 (1)40.avif',
                'sort_no' => '2',
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '4',
                'url' => 'WebPage/img/product/img01 (2)36.avif',
                'sort_no' => '3',
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '5',
                'url' => 'WebPage/img/product/img01 (3)36.avif',
                'sort_no' => '4',
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '6',
                'url' => 'WebPage/img/product/img01 (4)15.avif',
                'sort_no' => '5',
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '7',
                'url' => 'WebPage/img/product/img01 (5)42.avif',
                'sort_no' => '6',
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '8',
                'url' => 'WebPage/img/product/img01 (7)20.avif',
                'sort_no' => '7',
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '9',
                'url' => 'WebPage/img/product/img01 (8)6.avif',
                'sort_no' => '8',
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '10',
                'url' => 'WebPage/img/product/img0137.avif',
                'sort_no' => '9',
                'image_type' => 'PRODUCT'
            ],
            [
                'reference_id' => '1',
                'url' => 'WebPage/img/post/2022-3-7-hidden-gems-blog-hero-twitter-square-1200x1200.png',
                'sort_no' => '1',
                'image_type' => 'POST'
            ],
            [
                'reference_id' => '2',
                'url' => 'WebPage/img/post/NBA-FINALS-Summer23_EditorialsBlogThumb.jpg',
                'sort_no' => '2',
                'image_type' => 'POST'
            ],
            [
                'reference_id' => '3',
                'url' => 'WebPage/img/post/blog-header-8-1200x1200.jpg',
                'sort_no' => '3',
                'image_type' => 'POST'
            ],
            [
                'reference_id' => '4',
                'url' => 'WebPage/img/post/blog-thumbnail-13.jpg',
                'sort_no' => '4',
                'image_type' => 'POST'
            ],
            [
                'reference_id' => '5',
                'url' => 'WebPage/img/post/Pickoftheweek-3-10-22-banners-blog-hero-twitter-square-1200x1200.png',
                'sort_no' => '5',
                'image_type' => 'POST'
            ],
            [
                'reference_id' => '6',
                'url' => 'WebPage/img/post/Perfect-Fit-3-10-2022-blog-header-1200x1200.png',
                'sort_no' => '6',
                'image_type' => 'POST'
            ],
            [
                'reference_id' => '7',
                'url' => 'WebPage/img/post/The-Rip-03-14-22-blog-header-1200x1200.jpg',
                'sort_no' => '7',
                'image_type' => 'POST'
            ],
            [
                'reference_id' => '8',
                'url' => 'WebPage/img/post/THE_FLIP_MARCH-20221400x1400-Blog-1200x1200.jpg',
                'sort_no' => '8',
                'image_type' => 'POST'
            ],
        ]);
    }
}
