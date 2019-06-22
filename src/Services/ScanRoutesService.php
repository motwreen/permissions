<?php
namespace Motwreen\Permissions\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

class ScanRoutesService
{
    protected $routes;


    public function getControllers()
    {
        return array_keys($this->getActionControllers());
    }

    protected function getActionControllers()
    {
        $routes = Route::getRoutes()->getRoutes();

        $routes = $this->filterRoutesOnAllowedMethods($routes);
        $routes = $this->filterRoutesOnPrefix($routes);
        $routes = $this->exclude_paths($routes);

        $i=0;
        $controllers = [];
        foreach ($routes as $route){
            $action = $route->getAction();
            if (array_key_exists('controller', $action)) {
                $_action = explode('@',$action['controller']);
                $controllers[$_action[0]][$i] =  $_action[1];
            }
            $i++;
        }
        return $controllers;
    }

    protected function filterRoutesOnAllowedMethods($routes)
    {
        $result=[];
        $allowed_methods= (array) config('permissions.routes.allowed_methods');
        foreach ($routes as $route)
            if(count(array_intersect($route->methods,$allowed_methods)))
                $result[]=$route;
        return $result;
    }

    protected function filterRoutesOnPrefix($routes)
    {
        $results = [];
        $prefixes  = (array) config('permissions.routes.prefixes');
        if(count($prefixes)==0)
            return $routes;

        foreach ($routes as $route)
            if(Str::is($prefixes,$route->uri()))
                $results[]=$route;

        return $results;
    }


    protected function exclude_paths($routes)
    {
        $exclude_paths  = (array) config('permissions.controllers.exclude_dirs');
        if(count($exclude_paths)==0)
            return $routes;

        $results = [];
        foreach ($routes as $route){
            $action = $route->getAction();
            if (array_key_exists('controller', $action)) {
                foreach ($exclude_paths as $path){
                    if(!Str::contains(strtolower($action['controller']),strtolower("\\$path\\"))) {
                        $results[] = $route;
                    }
                }
            }
        }
        return $results;

    }
}
