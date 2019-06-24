<?php
namespace Motwreen\Permissions\Facades;

use Illuminate\Support\Facades\Facade;
use Motwreen\Permissions\Permissions as PermissionsClass;
/**
 * @method static routes(array $options)
 * @see \Motwreen\Permissions\Permissions;
 */

class Permissions extends Facade
{
    protected static function getFacadeAccessor() { return PermissionsClass::class; }
}
