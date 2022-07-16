<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Các tham số cấu hình cho ứng dụng 
    |--------------------------------------------------------------------------
    |
    */

    'name' => env('APP_NAME', 'Laravel'), 
    'app_debug' => env('APP_DEBUG', 'Laravel'),
    "template_dir" => storage_path('templates'),
    "export_dir"   => storage_path('export'),
    "basic_auth" => [
        [
            "username"           => "sa123",
            "password"           => "vnstagram@123",
            "Authorization" => "Basic c2ExMjM6dm5zdGFncmFtQDEyMw=="
        ] 
    ]
];
