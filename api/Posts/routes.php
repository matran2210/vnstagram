<?php

$module_namespace = "Api\Posts\Controllers";

Route::group([
    'module' => 'post',
    'prefix' => 'posts',
    'middleware' => 'auth:api', //nếu dùng basic auth thì là: auth_basic
    'namespace' => $module_namespace], function () {
    Route::get('', 'PostController@getAll')->name('getAll');
    Route::get('{uuid}', 'PostController@getById')->name('getById');
    Route::post('', 'PostController@create')->name('create');
    Route::put('{uuid}', 'PostController@update')->name('update');
    Route::delete('{uuid}','PostController@delete')->name('delete');
});

