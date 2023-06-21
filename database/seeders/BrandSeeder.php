<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                'name' => 'Adidas',
                'type' => 'ALL',
                'thumbnail_image' => 'WebPage/img/brand/adidas.webp'
            ],
            [
                'name' => 'Converse',
                'type' => 'ALL',
                'thumbnail_image' => 'WebPage/img/brand/converse.webp'
            ],
            [
                'name' => 'New Balance',
                'type' => 'ALL',
                'thumbnail_image' => 'WebPage/img/brand/new-balance.png'
            ],
            [
                'name' => 'Nike',
                'type' => 'ALL',
                'thumbnail_image' => 'WebPage/img/brand/nike.webp'
            ],
            [
                'name' => 'Gucci',
                'type' => 'ALL',
                'thumbnail_image' => 'WebPage/img/brand/gucci.png'
            ],
            [
                'name' => 'Supreme',
                'type' => 'ALL',
                'thumbnail_image' => 'WebPage/img/brand/supreme.png'
            ],
            [
                'name' => 'Vans',
                'type' => 'ALL',
                'thumbnail_image' => 'WebPage/img/brand/vans.webp'
            ],
            [
                'name' => 'Bape',
                'type' => 'ALL',
                'thumbnail_image' => 'WebPage/img/brand/adidas.webp'
            ],
            [
                'name' => 'adidas',
                'type' => 'SNEAKER',
                'thumbnail_image' => 'WebPage/img/brand/adidas-sneaker.webp'
            ],
            [
                'name' => 'newbalance',
                'type' => 'SNEAKER',
                'thumbnail_image' => 'WebPage/img/brand/newbalance-sneaker.webp'
            ],
            [
                'name' => 'nike',
                'type' => 'SNEAKER',
                'thumbnail_image' => 'WebPage/img/brand/nike-sneaker.webp'
            ],
            [
                'name' => 'jordan',
                'type' => 'SNEAKER',
                'thumbnail_image' => 'WebPage/img/brand/jordan-sneaker.webp'
            ],
            [
                'name' => 'crocs',
                'type' => 'SNEAKER',
                'thumbnail_image' => 'WebPage/img/brand/crocs-sneaker.webp'
            ],
            [
                'name' => 'bags',
                'type' => 'CLOTHES',
                'thumbnail_image' => 'WebPage/img/brand/bags-clothes.webp'
            ],
            [
                'name' => 'shirts',
                'type' => 'CLOTHES',
                'thumbnail_image' => 'WebPage/img/brand/shirts-clothes.webp'
            ],
            [
                'name' => 'shorts',
                'type' => 'CLOTHES',
                'thumbnail_image' => 'WebPage/img/brand/shorts-clothes.webp'
            ],
            [
                'name' => 'shoes',
                'type' => 'CLOTHES',
                'thumbnail_image' => 'WebPage/img/brand/shoes-clothes.webp'
            ],
            [
                'name' => 'sunglasses',
                'type' => 'CLOTHES',
                'thumbnail_image' => 'WebPage/img/brand/sunglasses-clothes.webp'
            ],
        ]);
    }
}
