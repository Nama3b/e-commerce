<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            BrandSeeder::class,
            PaymentOptionSeeder::class,
            ProductCategorySeeder::class,
            MemberSeeder::class,
            CustomerSeeder::class,
            PostSeeder::class,
            ImageSeeder::class,
            TagSeeder::class
        ]);
    }
}
