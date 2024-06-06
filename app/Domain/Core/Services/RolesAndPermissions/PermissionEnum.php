<?php

namespace App\Domain\Core\Services\RolesAndPermissions;

use Illuminate\Routing\Controller;
use Spatie\Enum\Enum;

class PermissionEnum extends Enum
{
    public function create(): string
    {
        return 'create_' . $this->value;
    }

    public function read(): string
    {
        return 'read_' . $this->value;
    }

    public function update(): string
    {
        return 'update_' . $this->value;
    }

    public function delete(): string
    {
        return 'delete_' . $this->value;
    }

    public static function names($key_name = null ): array
    {
        $names = [];
        $exclude = static::singlePermissions();
        $specificKeys = static::specifyKeys();

        foreach (static::toValues() as $value) {
            if ($key_name != null && $key_name != $value){
                    continue;
            }    
            if (in_array($value, $exclude, true)) {
                $names[] = $value;
                continue;
            }

            $keys = in_array($value, array_keys($specificKeys), true) ? $specificKeys[$value] : ['create', 'read', 'update', 'delete'];

            foreach ($keys as $ability) {
                $names[] = $ability . '_' . $value;
            }
        }

        return $names;
    }

    /**
     * @param  string  $ability  ['create', 'read', 'update', 'delete']
     * @param  null  $guard
     * @return bool
     */
    public function can(string $ability, $guard = null): bool
    {
        return auth($guard)->user()?->can($this->{$ability}()) ?? false;
    }

    /**
     * @param  string  $ability  ['create', 'read', 'update', 'delete']
     * @param  Controller  $controller
     * @param  array  $methods
     */
    public function middleware(string $ability, Controller $controller, array $methods = []): void
    {
        $controller->middleware(['permission:' . $this->{$ability}])->only($methods);
    }

    /**
     * @param  Controller  $controller
     */
    public function resource(Controller $controller): void
    {
        $controller->middleware(['permission:' . $this->create()])->only(['create', 'store']);
        $controller->middleware(['permission:' . $this->read()])->only(['index', 'show']);
        $controller->middleware(['permission:' . $this->update()])->only(['edit', 'update']);
        $controller->middleware(['permission:' . $this->delete()])->only(['destroy']);
    }

    public static function singlePermissions(): array
    {
        return [];
    }

    public static function specifyKeys(): array
    {
        return [];
    }
}
