<?php

namespace App\Domain\Core\Services\RolesAndPermissions\Roles;

use App\Domain\Core\Services\RolesAndPermissions\RolesEnum;
use Spatie\Permission\Models\Role;

class SuperAdminRole
{
    public function execute()
    {
        $role = Role::updateOrCreate(['name' => RolesEnum::super()->value, 'guard_name' => 'web']);
    }
}
