<?php
namespace Motwreen\Permissions;

use Illuminate\Support\Facades\Route;

class Permissions
{
    /**
     * @param array $options
     * @return void
     */
    public static function routes(array $options = [])
    {
    	$packageOptions = ['namespace' => '\Motwreen\Permissions\Http\Controllers', 'middleware' => ['web'],'prefix'=>'permissions','as'=>'permissions.'];
    	$options = array_merge($packageOptions,$options);
		Route::group($options, function() {
		    Route::resource('resources', 'ResourcesController');
		    Route::resource('resources.methods', 'ResourcesPermissionsController');
		    Route::resource('groups', 'PermissionsGroupController');
		});

    }
}
