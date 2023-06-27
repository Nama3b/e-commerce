<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
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
        $keyMember = ['BRAND', 'PRODUCT_CATEGORY', 'PRODUCT', 'POST', 'ORDER', 'PAYMENT', 'IMAGE', 'COMMENT', 'TAG', 'FAVORITE', 'DASHBOARD'];
        foreach ($keyMember as $value) {
            $member[] = DB::table('permissions')->get()->filter(function ($item) use ($value) {
                return false !== stristr($item->description, $value);
            })->pluck('id')->toArray();
        }
        $memberCount = count($member);
        $members = [];
        for ($i = 0; $i < $memberCount; $i++) {
            $members = array_merge($members, $member[$i]);
        }

        $roleCustomer = Role::whereId(3)->first();
        $keyCustomer = ['CUSTOMER', 'COMMENT', 'FAVORITE', 'ORDER', 'DASHBOARD'];
        foreach ($keyCustomer as $value) {
            $customer[] = DB::table('permissions')->get()->filter(function ($item) use ($value) {
                return false !== stristr($item->description, $value);
            })->pluck('id')->toArray();
        }
        $customerCount = count($customer);
        $customers = [];
        for ($i = 0; $i < $customerCount; $i++) {
            $customers = array_merge($customers, $customer[$i]);
        }

        $roleAdmin->permissions()->sync($permission);
        $roleMember->permissions()->sync($members);
        $roleCustomer->permissions()->sync($customers);
    }
}
