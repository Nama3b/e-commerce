<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CheckManagerPermission
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param $permissionNeedCheck
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permissionNeedCheck): mixed
    {
        $managerRole = $request->user();

        //if user role is admin handle next request
        if ($managerRole->role_id == Role::ROLE_SUPER_ADMIN_ID) {
            return $next($request);
        }
        if ($managerRole->role_id == Role::ROLE_ADMIN_ID) {
            return $next($request);
        }

        $managerPermissions = $this->getManagerPermissions($managerRole->role_id);

        if (!$managerPermissions->contains($permissionNeedCheck)) {
            return response()->json(['message' => trans('errors.you_do_not_have_permission')], 403);
        }
        return $next($request);
    }

    /**
     * Don't worry about performance issues. I have cached the entire model!
     * @param $roleId
     * @return Collection
     */
    protected function getManagerPermissions($roleId): Collection
    {

        $permissionRole = PermissionRole::where('role_id', $roleId)->pluck('permission_id');

        return Permission::whereIn('id', $permissionRole)->pluck('name');

    }
}
