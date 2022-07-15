<?php

$module_namespace = "Api\Users\Controllers";

Route::group([
    'module' => 'user',
    'prefix' => 'users',
    'middleware' => 'auth:api',
    'namespace' => $module_namespace], function () {
    Route::get('', 'UserController@getAll')->name('getAll');

});

