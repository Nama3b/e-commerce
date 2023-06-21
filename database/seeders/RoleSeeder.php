<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->truncate();;
        Role::create([
            'id' => 1,
            'name' => 'Super Admin',
            'code' => 'SuperAdmin'
        ]);
    }
}
