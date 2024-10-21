<?php

namespace App\Domain\Core\Services\RolesAndPermissions\Roles;

use App\Domain\Core\Enums\CorePermissions;
use App\Domain\Core\Services\RolesAndPermissions\Concerns\HasPermissionMap;
use App\Domain\Core\Services\RolesAndPermissions\RolesEnum;
use Spatie\Permission\Models\Role;

class WorkerRole
{
    use HasPermissionMap;

    protected array $permissions = [
        CorePermissions::class,
    ];

    public function execute()
    {
        /** @var Role $role */
        $role = Role::updateOrCreate(['name' => RolesEnum::worker()->value, 'guard_name' => 'web']);
        $role->givePermissionTo($this->getPermissionNames(CorePermissions::profile()->value));
    }
}
