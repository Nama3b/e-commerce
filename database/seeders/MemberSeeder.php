<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('members')->insert([
            [
                'user_name' => 'member',
                'email' => 'member@gmail.com',
                'password' => Hash::make('member@123'),
                'full_name' => 'Le Thanh Long',
                'address' => 'Hanoi',
                'phone_number' => '09873829123',
                'identity_no' => '001200003891',
                'status' => 1
            ],
        ]);
    }
}
