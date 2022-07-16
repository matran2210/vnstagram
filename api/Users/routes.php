<?php

$module_namespace = "Api\Users\Controllers";

Route::group([
    'module' => 'user',
    'prefix' => 'users',
    'middleware' => 'auth:api', //nếu dùng basic auth thì là: auth_basic
    'namespace' => $module_namespace], function () {
    Route::get('', 'UserController@getAll')->name('getAll');
    Route::put('{uuid}', 'UserController@update')->name('update');
    Route::delete('{uuid}','UserController@delete')->name('delete');
});

