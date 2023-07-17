<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery')->insert([
            [
                'creator' => '1',
                'payment_option_id' => '2',
                'service_name' => 'Economical',
                'delivery_fee' => '7',
                'delivery_time' => '2',
                'description' => '',
            ],
            [
                'creator' => '1',
                'payment_option_id' => '2',
                'service_name' => 'Fast',
                'delivery_fee' => '12',
                'delivery_time' => '1',
                'description' => '',
            ],
            [
                'creator' => '1',
                'payment_option_id' => '2',
                'service_name' => 'Express',
                'delivery_fee' => '15',
                'delivery_time' => '0.5',
                'description' => '',
            ],
            [
                'creator' => '1',
                'payment_option_id' => '1',
                'service_name' => 'Normal',
                'delivery_fee' => '5',
                'delivery_time' => '3',
                'description' => '',
            ],
        ]);
    }
}
