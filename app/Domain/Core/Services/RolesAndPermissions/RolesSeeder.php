<?php

namespace App\Domain\Core\Services\RolesAndPermissions;

use App\Domain\Core\Enums\CorePermissions;
use App\Domain\Core\Services\RolesAndPermissions\Concerns\HasPermissionMap as ConcernsHasPermissionMap;
use App\Domain\Core\Services\RolesAndPermissions\Concerns\HasPermissionMap;
use App\Domain\Core\Services\RolesAndPermissions\Roles\ManagerRole;
use App\Domain\Core\Services\RolesAndPermissions\Roles\ClientRole;

use App\Domain\Core\Services\RolesAndPermissions\Roles\SuperAdminRole;
use App\Domain\Core\Services\RolesAndPermissions\Roles\WorkerRole;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    use ConcernsHasPermissionMap;

    protected array $roles = [
        SuperAdminRole::class,
        ManagerRole::class,
        ClientRole::class,
        WorkerRole::class,

    ];

    protected array $permissions = [
        CorePermissions::class,
    ];

    public function run()
    {
        $this->createPermissions();
        $this->seedRoles();
    }

    private function seedRoles()
{
        foreach ($this->roles as $role) {
            (new $role())->execute();
        }
    }
}
