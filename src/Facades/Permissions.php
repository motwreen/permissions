<?php 
namespace Motwreen\Permissions\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Motwreen\Permissions\Permissions;
 */

class Permissions extends Facade
{
    protected static function getFacadeAccessor() { return 'permissions'; }	
}