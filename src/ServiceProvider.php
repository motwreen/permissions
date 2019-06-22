<?php
namespace Motwreen\Permissions;

use \Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'Permissions');

        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/permissions'),
            __DIR__.'/migrations' => base_path('database/migrations'),
            __DIR__.'/config/permissions.php' => config_path('permissions.php'),

        ],'motwreen-permissions');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/permissions.php', 'permissions'
        );
    }

}
