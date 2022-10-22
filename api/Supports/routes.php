<?php

$module_namespace = "Api\Supports\Controllers";

Route::group([
    'module' => 'supports',
    'prefix' => 'supports',
    //'middleware' => 'auth:api', //nếu dùng basic auth thì là: auth_basic
    'namespace' => $module_namespace], function () {
    Route::get('download', 'SupportController@download')->name('download');
});

