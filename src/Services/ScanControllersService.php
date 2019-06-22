<?php
namespace Motwreen\Permissions\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ScanControllersService
{

    public function getControllers()
    {
        $exclude_paths  = (array) config('permissions.controllers.exclude_dirs');
        $path           = base_path(config('permissions.controllers.dir'));
        $files = File::allFiles($path);
        foreach ($files as $file) {
            $fileName = $this->prepareFileName($file);
            $exclude_paths = array_map('strtolower', $exclude_paths);
            if(!in_array(strtolower($file->getRelativePath()),$exclude_paths)){
                $result[] = str_replace('.php','',$fileName);
            }
        }
        return $result;
    }


    public function prepareFileName($file)
    {
        return ucfirst(str_replace('.php','',str_replace('/','\\',str_replace(base_path().'/','',$file->getPathname()))));

    }
}
