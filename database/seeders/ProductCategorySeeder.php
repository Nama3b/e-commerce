<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_category')->insert([
            [
                'name' => 'Sneaker',
            ],
            [
                'name' => 'Clothes',
            ],
            [
                'name' => 'Watches',
            ],
            [
                'name' => 'Accessory',
            ],
        ]);
    }
}
