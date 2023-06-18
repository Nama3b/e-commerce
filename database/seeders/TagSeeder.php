<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'tag_type' => 'POST',
            ],
            [
                'reference_id' => '2',
                'creator' => '1',
                'name' => 'Bhfyp',
                'tag_type' => 'POST',
            ],
            [
                'reference_id' => '3',
                'creator' => '1',
                'name' => 'Love',
                'tag_type' => 'POST',
            ],
            [
                'reference_id' => '4',
                'creator' => '1',
                'name' => 'Fashion blogger',
                'tag_type' => 'POST',
            ],
            [
                'reference_id' => '5',
                'creator' => '1',
                'name' => 'Outfit',
                'tag_type' => 'POST',
            ],
            [
                'reference_id' => '6',
                'creator' => '1',
                'name' => 'Photography',
                'tag_type' => 'POST',
            ],
            [
                'reference_id' => '7',
                'creator' => '1',
                'name' => 'Fashionista',
                'tag_type' => 'POST',
            ],
            [
                'reference_id' => '8',
                'creator' => '1',
                'name' => 'Shopping',
                'tag_type' => 'POST',
            ],
            [
                'reference_id' => '8',
                'creator' => '1',
                'name' => 'Art',
                'tag_type' => 'POST',
            ],
            [
                'reference_id' => '8',
                'creator' => '1',
                'name' => 'Model',
                'tag_type' => 'POST',
            ],
            [
                'reference_id' => '4',
                'creator' => '1',
                'name' => 'Myself',
                'tag_type' => 'POST',
            ],
            [
                'reference_id' => '3',
                'creator' => '1',
                'name' => 'Insta daily',
                'tag_type' => 'POST',
            ],
            [
                'reference_id' => '2',
                'creator' => '1',
                'name' => 'Beauty',
                'tag_type' => 'POST',
            ],
            [
                'reference_id' => '1',
                'creator' => '1',
                'name' => 'Moda',
                'tag_type' => 'POST',
            ],
            [
                'reference_id' => '8',
                'creator' => '1',
                'name' => 'Fashion kids',
                'tag_type' => 'POST',
            ],
            [
                'reference_id' => '8',
                'creator' => '1',
                'name' => 'Fashional addict',
                'tag_type' => 'POST',
            ],
            [
                'reference_id' => '8',
                'creator' => '1',
                'name' => 'Weekend show',
                'tag_type' => 'POST',
            ],
            [
                'reference_id' => '8',
                'creator' => '1',
                'name' => 'Fashion designer',
                'tag_type' => 'POST',
            ],
        ]);
    }
}
