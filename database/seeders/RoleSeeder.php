<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->truncate();

        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'Super Admin',
                'code' => 'SuperAdmin'
            ],
            [
                'id' => 2,
                'name' => 'Admin',
                'code' => 'Admin'
            ],
            [
                'id' => 3,
                'name' => 'Customer',
                'code' => 'Customer'
            ],
        ]);
    }
}
