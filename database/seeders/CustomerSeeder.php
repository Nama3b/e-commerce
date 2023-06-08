<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'email' => 'customer@gmail.com',
                'password' => Hash::make('customer@123'),
                'full_name' => 'Le Thanh Long',
                'address' => 'Hanoi',
                'phone_number' => '09873829543',
                'status' => 1
            ],
        ]);
    }
}
