<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Home\HomeController@index');

/**
 * 前台 首页
 */
Route::group([ 'prefix' => 'home', 'middleware' => ['checkUserLogin'] ], function () {
    Route::get('/', 'Home\HomeController@index');
    Route::get('/test', 'Home\HomeController@test');
});

/**
 * 前台 登录
 */
Route::group([ 'prefix' => 'login'], function () {
    Route::get('/', 'Home\LoginController@index');
    Route::get('/dologin', 'Home\LoginController@dologin');
    Route::get('/index/{login_type?}', 'Home\LoginController@index')->name('login_type');
    Route::get('/logout', 'Home\LoginController@logout');
});

Route::get('/admin', 'Admin\HomeController@index');

