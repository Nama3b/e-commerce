<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PaymentOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_option')->insert([
            [
                'name' => 'Cash',
            ],
            [
                'name' => 'Banking',
            ],
            [
                'name' => 'Installment',
            ],
            [
                'name' => 'Other',
            ],
        ]);
    }
}
