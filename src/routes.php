<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Motwreen\Permissions\Http\Controllers', 'middleware' => ['web'],'prefix'=>'permissions','as'=>'permissions.'], function() {
    Route::resource('resources', 'ResourcesController');
    Route::resource('resources.methods', 'ResourcesPermissionsController');
    Route::resource('groups', 'PermissionsGroupController');
});



//    Route::GET('groups/dataTable', 'GroupsCtrl@dataT');
//    Route::resource('groups', 'GroupsCtrl');

