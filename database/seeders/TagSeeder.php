<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'reference_id' => '1',
                'creator' => '1',
                'name' => 'Fashion',
                'type' => 'POST',
            ],
            [
                'reference_id' => '2',
                'creator' => '1',
                'name' => 'Bhfyp',
                'type' => 'POST',
            ],
            [
                'reference_id' => '3',
                'creator' => '1',
                'name' => 'Love',
                'type' => 'POST',
            ],
            [
                'reference_id' => '4',
                'creator' => '1',
                'name' => 'Fashion blogger',
                'type' => 'POST',
            ],
            [
                'reference_id' => '5',
                'creator' => '1',
                'name' => 'Outfit',
                'type' => 'POST',
            ],
            [
                'reference_id' => '6',
                'creator' => '1',
                'name' => 'Photography',
                'type' => 'POST',
            ],
            [
                'reference_id' => '7',
                'creator' => '1',
                'name' => 'Fashionista',
                'type' => 'POST',
            ],
            [
                'reference_id' => '8',
                'creator' => '1',
                'name' => 'Shopping',
                'type' => 'POST',
            ],
            [
                'reference_id' => '8',
                'creator' => '1',
                'name' => 'Art',
                'type' => 'POST',
            ],
            [
                'reference_id' => '8',
                'creator' => '1',
                'name' => 'Model',
                'type' => 'POST',
            ],
            [
                'reference_id' => '4',
                'creator' => '1',
                'name' => 'Myself',
                'type' => 'POST',
            ],
            [
                'reference_id' => '3',
                'creator' => '1',
                'name' => 'Insta daily',
                'type' => 'POST',
            ],
            [
                'reference_id' => '2',
                'creator' => '1',
                'name' => 'Beauty',
                'type' => 'POST',
            ],
            [
                'reference_id' => '1',
                'creator' => '1',
                'name' => 'Moda',
                'type' => 'POST',
            ],
            [
                'reference_id' => '8',
                'creator' => '1',
                'name' => 'Fashion kids',
                'type' => 'POST',
            ],
            [
                'reference_id' => '8',
                'creator' => '1',
                'name' => 'Fashional addict',
                'type' => 'POST',
            ],
            [
                'reference_id' => '8',
                'creator' => '1',
                'name' => 'Weekend show',
                'type' => 'POST',
            ],
            [
                'reference_id' => '8',
                'creator' => '1',
                'name' => 'Fashion designer',
                'type' => 'POST',
            ],
        ]);
    }
}
