<?php

namespace App\Domain\Core\Datatables;

use Spatie\Permission\Models\Role;
use App\Domain\Core\Services\RolesAndPermissions\RolesEnum;
use App\Support\Dashboard\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class RoleDatatable extends BaseDatatable
{
    public function query(): Builder
    {
        return Role::whereNotIn('name', RolesEnum::toValues())->withCount([
            'permissions', 'users',
        ]);
    }

    protected function columns(): array
    {
        return [
            Column::make('name')->title(__('Name')),
            Column::make('permissions_count')->title(__('Permissions Count')),
            Column::make('users_count')->title(__('Users Count')),
        ];
    }

    
    

}
