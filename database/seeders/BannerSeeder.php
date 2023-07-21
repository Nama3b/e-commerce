<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            [
                'name' => 'adidas',
                'sort_no' => 1,
                'type' => 'SNEAKER',
                'thumbnail_image' => 'WebPage/img/banner/adidas-sneaker.webp'
            ],
            [
                'name' => 'new balance',
                'sort_no' => 2,
                'type' => 'SNEAKER',
                'thumbnail_image' => 'WebPage/img/banner/newbalance-sneaker.webp'
            ],
            [
                'name' => 'nike',
                'sort_no' => 3,
                'type' => 'SNEAKER',
                'thumbnail_image' => 'WebPage/img/banner/nike-sneaker.webp'
            ],
            [
                'name' => 'jordan',
                'sort_no' => 4,
                'type' => 'SNEAKER',
                'thumbnail_image' => 'WebPage/img/banner/jordan-sneaker.webp'
            ],
            [
                'name' => 'crocs',
                'sort_no' => 5,
                'type' => 'SNEAKER',
                'thumbnail_image' => 'WebPage/img/banner/crocs-sneaker.webp'
            ],
            [
                'name' => 'bags',
                'sort_no' => 1,
                'type' => 'CLOTHES',
                'thumbnail_image' => 'WebPage/img/banner/bags-clothes.webp'
            ],
            [
                'name' => 'shirts',
                'sort_no' => 2,
                'type' => 'CLOTHES',
                'thumbnail_image' => 'WebPage/img/banner/shirts-clothes.webp'
            ],
            [
                'name' => 'shorts',
                'sort_no' => 3,
                'type' => 'CLOTHES',
                'thumbnail_image' => 'WebPage/img/banner/shorts-clothes.webp'
            ],
            [
                'name' => 'shoes',
                'sort_no' => 4,
                'type' => 'CLOTHES',
                'thumbnail_image' => 'WebPage/img/banner/shoes-clothes.webp'
            ],
            [
                'name' => 'sunglasses',
                'sort_no' => 5,
                'type' => 'CLOTHES',
                'thumbnail_image' => 'WebPage/img/banner/sunglasses-clothes.webp'
            ],
        ]);
    }
}
