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
    ],
    "google_driver" => [
        "folder" => [
            "posts" => '1EcgltgvQAKhJ0lzv4C4Xf9g0JbS-aoi7',
            "comments" => '1_Knw9ofGmE_Su96EIVwmy-QDT70jVnNz',
            "messages" => '1RSDwnGBPp9a9-AoniEMMeCUU7zH6zyI0'
        ]
    ]
];
