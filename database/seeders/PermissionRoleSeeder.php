<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PermissionRole::query()->truncate();

        $roleAdmin = Role::whereId(1)->first();
        $permission = Permission::pluck('id')->toArray();

        $roleMember = Role::whereId(2)->first();
        $keyMember = ['BRAND' ,'PRODUCT_CATEGORY', 'PRODUCT', 'POST', 'ORDER', 'PAYMENT', 'IMAGE', 'COMMENT', 'TAG', 'FAVORITE'];
        foreach ($keyMember as $value) {
            $member[] = DB::table('permissions')->get()->filter(function ($item) use ($value) {
                return false !== stristr($item->description, $value);
            })->toArray();
        }

        $roleCustomer =  Role::whereId(3)->first();
        $keyCustomer = ['CUSTOMER', 'COMMENT', 'FAVORITE', 'ORDER'];
        foreach ($keyCustomer as $value) {
            $customer[] = DB::table('permissions')->get()->filter(function ($item) use ($value) {
                return false !== stristr($item->description, $value);
            })->toArray();
        }

        $roleAdmin->permissions()->sync($permission);
        $roleMember->permissions()->sync($member);
        $roleCustomer->permissions()->sync($customer);
    }
}
