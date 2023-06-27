<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Permission::query()->truncate();
        Permission::insert(
            $this->data()
        );
    }

    private function data(): array
    {
        $screen = [
            'ROLE',
            'NOTIFICATION',
            'ADMIN',
            'MEMBER',
            'CUSTOMER',
            'BRAND',
            'PRODUCT_CATEGORY',
            'PRODUCT',
            'POST',
            'ORDER',
            'COMMENT',
            'FAVORITE',
            'IMAGE',
            'TAG',
            'DASHBOARD'
        ];

        $action = [
            'CREATE',
            'VIEW',
            'EDIT',
            'DELETE'
        ];

        $data = [];
        $count = 1;
        foreach ($screen as $value) {
            foreach ($action as $value2) {
                $data[] = [
                    "id" => $count,
                    "name" => $value2 . '_' . $value,
                    "display_name" => $value . '_' . $value2,
                    "description" => $value . '_' . $value2
                ];
                $count += 1;
            }
        }
        return $data;
    }
}
