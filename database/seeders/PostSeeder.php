<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time_now = Carbon::now();

        DB::table('posts')->insert([
            [
                'author' => 1,
                'title' => 'Xbox Mini Fridge: The #1 Selling Collectible in StockX History',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi doloremque dolorum iure libero minima mollitia sapiente similique tenetur. A asperiores dolorum eaque excepturi expedita incidunt quam repudiandae temporibus ut!',
                'post_type' => 'NEWS',
                'status' => 'ACTIVE',
                'created_at' => $time_now
            ],
            [
                'author' => 1,
                'title' => 'Xbox Mini Fridge: The Selling Collectible ',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi doloremque dolorum iure libero minima mollitia sapiente similique tenetur. A asperiores dolorum eaque excepturi expedita incidunt quam repudiandae temporibus ut!',
                'post_type' => 'NEWS',
                'status' => 'ACTIVE',
                'created_at' => $time_now
            ],
            [
                'author' => 1,
                'title' => 'Xbox Mini Fridge: Selling Collectible in StockX History',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi doloremque dolorum iure libero minima mollitia sapiente similique tenetur. A asperiores dolorum eaque excepturi expedita incidunt quam repudiandae temporibus ut!',
                'post_type' => 'NEWS',
                'status' => 'ACTIVE',
                'created_at' => $time_now
            ],
            [
                'author' => 1,
                'title' => 'Xbox Mini Fridge: The Selling Collectible StockX History',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi doloremque dolorum iure libero minima mollitia sapiente similique tenetur. A asperiores dolorum eaque excepturi expedita incidunt quam repudiandae temporibus ut!',
                'post_type' => 'NEWS',
                'status' => 'ACTIVE',
                'created_at' => $time_now
            ],
            [
                'author' => 1,
                'title' => 'The #1 Selling Collectible in StockX History',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi doloremque dolorum iure libero minima sapiente similique tenetur. A asperiores dolorum eaque excepturi expedita incidunt quam repudiandae temporibus ut!',
                'post_type' => 'NEWS',
                'status' => 'ACTIVE',
                'created_at' => $time_now
            ],
            [
                'author' => 1,
                'title' => 'Xbox Mini Fridge: The #1 Selling Collectible in StockX History',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi doloremque doloruo sapiente similique tenetur. A asperiores dolorum eaque excepturi expedita incidunt quam repudiandae temporibus ut!',
                'post_type' => 'NEWS',
                'status' => 'ACTIVE',
                'created_at' => $time_now
            ],
            [
                'author' => 1,
                'title' => 'Xbox Mini Fridge: The #1 Selling Collectible in StockX History',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi doloremque minima mollitia sapiente similique tenetur. A asperiores dolorum eaque excepturi expedita incidunt quam repudiandae temporibus ut!',
                'post_type' => 'NEWS',
                'status' => 'ACTIVE',
                'created_at' => $time_now
            ],
            [
                'author' => 1,
                'title' => 'Xbox Mini Fridge: The #1 Selling Collectible in StockX History',
                'content' => 'Lorem ipsum dolor sit amet elit. Animi doloremque dolorum iure libero minima mollitia sapiente similique tenetur. A asperiores dolorum eaque excepturi expedita incidunt quam repudiandae temporibus ut!',
                'post_type' => 'NEWS',
                'status' => 'ACTIVE',
                'created_at' => $time_now
            ],
        ]);
    }
}
