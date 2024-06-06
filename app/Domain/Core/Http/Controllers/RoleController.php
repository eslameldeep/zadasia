<?php

namespace App\Domain\Core\Http\Controllers;

use App\Domain\Core\Http\Controllers\MainController;
use App\Support\Dashboard\Crud\WithDatatable;
use App\Support\Dashboard\Crud\WithDestroy;
use App\Domain\Core\Enums\CorePermissions;
use App\Support\Dashboard\Crud\WithForm;
use App\Support\Dashboard\Crud\WithStore;
use App\Support\Dashboard\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Core\Datatables\RoleDatatable;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class RoleController extends MainController
{
    use WithDatatable,  WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $name      = 'Role';
    protected string $path      = 'dashboard.core.roles';
    protected string $routes    = 'dashboard.core.roles';
    protected string $datatable = RoleDatatable::class;
    protected string $model = Role::class;
    protected array  $permissions = [CorePermissions::class, 'roles'];
    protected array $routeParameters = ['role'];
    protected array $routeList = [];



    protected function rules()
    {
        return [
            'name'        => 'required|string|max:191',
            'permissions' => 'nullable|array',
        ];
    }

    protected function storeAction(array $validated)
    {
        $permissions = Arr::pull($validated, 'permissions');
        $validated['guard_name'] = 'web';
        $role = Role::create($validated);
        $role->syncPermissions($permissions);
    }

    protected function updateAction(array $validated, Model $model)
    {
        $model->syncPermissions(Arr::pull($validated, 'permissions'));
        $model->update($validated);
    }
    /**
     * formData
     *
     * @param  mixed $model
     * @return array
     */
    protected function formData(?Model $model = null): array
    {
        $names = Permission::pluck('name')->toArray();
        $default = ['create', 'read', 'update', 'delete'];
        $group = ['other' => []];
        foreach ($names as $name) {
            $added = false;
            foreach ($default as $action) {
                if (Str::startsWith($name, $action . '_')) {
                    $groupName = Str::replaceFirst($action . '_', '', $name);
                    if (!isset($group[$groupName])) {
                        $group[$groupName] = [];
                    }
                    $group[$groupName][] = ['name' => $action, 'value' => $name];
                    $added = true;
                }
            }
            if (!$added) {
                $group['other'][] = ['name' => $name, 'value' => $name];
            }
        }

        return [
            'selectedPermissions' => $model?->permissions->pluck('name')->all() ?? [],
            'permissions'         => array_filter($group),
        ];
    }
}
