<?php

$module_namespace = "Api\Auth\Controllers";

Route::group([
    'module' => 'auth',
    'namespace' => $module_namespace], function () {
    Route::post('/login', 'LoginController@login')->name('login');
    Route::post('/signup', 'LoginController@signUp')->name('signUp');

});
