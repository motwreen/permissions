<?php
namespace Motwreen\Permissions\Services;

class ScanService
{

    public function getResourcesList($scanner=null)
    {
        $scanner = $scanner??config('permissions.scan_method');
        if($scanner == 'routes'){
            $scan = new ScanRoutesService;
            return $scan->getControllers();
        }

        $scan = new ScanControllersService;
        return $scan->getControllers();
    }

    public function getMethodsOfResource($controller)
    {
        $reflection = new \ReflectionClass($controller);
        $classMethods = [];
        foreach ($reflection->getMethods() as $method)
            if ($method->class == $controller)
                $classMethods[] = $method->name;

        return $classMethods;
    }
}
