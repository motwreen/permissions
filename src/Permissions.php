<?php
namespace Motwreen\Permissions;

class Permissions
{
	public static function Routes(array $options = [])
    {
    	$packageOptions['namespace' => 'Motwreen\Permissions\Http\Controllers', 'middleware' => ['web'],'prefix'=>'permissions','as'=>'permissions.'];
    	$options = array_merge($options,$packageOptions)

		Route::group($options, function() {
		    Route::resource('resources', 'ResourcesController');
		    Route::resource('resources.methods', 'ResourcesPermissionsController');
		    Route::resource('groups', 'PermissionsGroupController');
		});
		
    }
}