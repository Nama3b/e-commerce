<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $time_now = Carbon::now();

        DB::table('customers')->insert([
            [
                'role_id' => 3,
                'email' => 'customer@gmail.com',
                'email_verified_at' => $time_now,
                'password' => Hash::make('customer@123'),
                'full_name' => 'Le Thanh Long',
                'address' => 'Hanoi',
                'phone_number' => '09873829543',
                'status' => 1
            ],
        ]);
    }
}
