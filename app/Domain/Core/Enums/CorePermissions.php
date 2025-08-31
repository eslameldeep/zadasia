<?php

namespace App\Domain\Core\Enums;

use App\Domain\Core\Services\RolesAndPermissions\PermissionEnum;

/**
 * @method static self users()
* @method static self reviews()
* @method static self categories()
 * @method static self roles()
 * @method static self profile()
 
 * @method static self frontend()
 * @method static self chat()
 
 * @method static self currencies()
 * @method static self stocks()
 
 * @method static self stations_setup()
 * @method static self templates()
 * @method static self devices()
 * @method static self buckets()
 * @method static self units()
 * @method static self monitors()
 
 * @method static self settings()
 */
class CorePermissions extends PermissionEnum
{
    
}