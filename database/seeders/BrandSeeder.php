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
                'category_id' => '[1, 2]',
                'sort_no' => 1,
                'thumbnail_image' => 'WebPage/img/brand/adidas.webp'
            ],
            [
                'name' => 'Converse',
                'category_id' => '[1, 2]',
                'sort_no' => 2,
                'thumbnail_image' => 'WebPage/img/brand/converse.webp'
            ],
            [
                'name' => 'New Balance',
                'category_id' => '[1, 2]',
                'sort_no' => 3,
                'thumbnail_image' => 'WebPage/img/brand/new-balance.png'
            ],
            [
                'name' => 'Nike',
                'category_id' => '[1, 2]',
                'sort_no' => 4,
                'thumbnail_image' => 'WebPage/img/brand/nike.webp'
            ],
            [
                'name' => 'Gucci',
                'category_id' => '[1, 2]',
                'sort_no' => 5,
                'thumbnail_image' => 'WebPage/img/brand/gucci.png'
            ],
            [
                'name' => 'Supreme',
                'category_id' => '[1, 2]',
                'sort_no' => 6,
                'thumbnail_image' => 'WebPage/img/brand/supreme.png'
            ],
            [
                'name' => 'Bape',
                'category_id' => '[1, 2]',
                'sort_no' => 7,
                'thumbnail_image' => 'WebPage/img/brand/bape.png'
            ],
            [
                'name' => 'Vans',
                'category_id' => '[1, 2]',
                'sort_no' => 8,
                'thumbnail_image' => 'WebPage/img/brand/vans.webp'
            ],
            [
                'name' => 'Rolex',
                'category_id' => '[3]',
                'sort_no' => 9,
                'thumbnail_image' => 'WebPage/img/brand/Rolex.png'
            ],
            [
                'name' => 'Seiko',
                'category_id' => '[3]',
                'sort_no' => 10,
                'thumbnail_image' => 'WebPage/img/brand/seiko.png'
            ],
            [
                'name' => 'Patek Philippe',
                'category_id' => '[3]',
                'sort_no' => 11,
                'thumbnail_image' => 'WebPage/img/brand/patek phillip.png'
            ],
            [
                'name' => 'Omega',
                'category_id' => '[3]',
                'sort_no' => 12,
                'thumbnail_image' => 'WebPage/img/brand/omega.png'
            ],
            [
                'name' => 'Cartier',
                'category_id' => '[3]',
                'sort_no' => 13,
                'thumbnail_image' => 'WebPage/img/brand/cartier.webp'
            ],
        ]);
    }
}
