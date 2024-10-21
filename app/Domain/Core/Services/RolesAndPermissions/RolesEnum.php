<?php

namespace App\Domain\Core\Services\RolesAndPermissions;

use Spatie\Enum\Enum;

/**
 * @method static self super()
 * @method static self admin()
 * @method static self client()
 * @method static self worker()
 **/
class RolesEnum extends Enum
{
    protected static function values()
    {
        return [
            'super' => 'Super Admin',
            'admin' => 'Admin',
            'client' => 'Client',
            'worker' => 'worker'
        ];
    }
}
