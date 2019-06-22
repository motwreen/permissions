<?php

return [
    //Available Methods [routes,controllers];
    'scan_method'=>'routes',

    'routes'=>[
        //patterns accepted here
        'prefixes'=>['*'],
        'allowed_methods'=>["GET","HEAD","POST","PUT","PATCH","DELETE","OPTIONS"],
    ],

    'controllers'=>[
        'dir' => 'app/Http/Controllers',
        'exclude_dirs' => ['Auth'],
    ]
];
