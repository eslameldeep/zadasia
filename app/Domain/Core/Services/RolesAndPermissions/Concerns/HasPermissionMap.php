<?php

namespace App\Domain\Core\Services\RolesAndPermissions\Concerns;

use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;

trait HasPermissionMap
{
    public function getPermissionNames($key_name = null): array
    {
        return array_map(function ($permission) use ($key_name) {
            return class_exists($permission) && method_exists($permission, 'names')
                ? $permission::names($key_name) : $permission;
        }, $this->permissions);
    }

    protected function createPermissions(string $guard = 'web'): void
    {
        foreach (Arr::flatten($this->getPermissionNames()) as $permission) {
            Permission::updateOrCreate(['name' => $permission, 'guard_name' => $guard]);
        }
    }
}
