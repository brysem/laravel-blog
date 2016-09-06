<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

function test(...$test) {
  dd($test);
}

Route::get('test', function() {
  $fruit = 'banana';
  $a = ($fruit ?: 'apple');
  dd($a);

  $output = `ls -al`;
  dd($output);

  $ip4 = '8.8.8.8';
  $ip6 = 'FE80:0000:0000:0000:0202:B3FF:FE1E:8329';
  $bip4 = inet_pton($ip4);
  $bip6 = inet_pton($ip6);

  dd([$bip4, $bip6, inet_ntop($bip4), inet_ntop($bip6)]);
});

Route::get('/', ['as' => 'index', 'uses' => 'BlogController@index']);

Route::post('post/{post}/comment', ['as' => 'post.comment', 'uses' => 'PostController@comment']);
Route::get('post/{post}', ['as' => 'post.view', 'uses' => 'PostController@view']);

Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::get('/home', 'HomeController@index');

Route::get('/posts', 'BlogController@index');

Route::group(['prefix' => 'admin', 'as' => 'admin::', 'middleware' => 'auth'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'AdminController@index']);

    Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
        Route::get('', ['as' => 'index', 'uses' => 'UserController@index']);
        Route::post('', ['as' => 'store', 'uses' => 'UserController@store']);
        Route::delete('', ['as' => 'delete', 'uses' => 'UserController@delete']);
        Route::get('{user}/edit', ['as' => 'edit', 'uses' => 'UserController@edit']);
        Route::put('{user}', ['as' => 'update', 'uses' => 'UserController@update']);
        Route::get('new', ['as' => 'create', 'uses' => 'UserController@create']);
    });

    Route::group(['prefix' => 'post', 'as' => 'post.'], function() {
        Route::get('', ['as' => 'index', 'uses' => 'PostController@admin']);
        Route::post('', ['as' => 'store', 'uses' => 'PostController@store']);
        Route::delete('', ['as' => 'delete', 'uses' => 'PostController@delete']);
        Route::get('{post}/edit', ['as' => 'edit', 'uses' => 'PostController@edit']);
        Route::put('{post}', ['as' => 'update', 'uses' => 'PostController@update']);
        Route::get('new', ['as' => 'create', 'uses' => 'PostController@create']);
    });

    Route::group(['prefix' => 'settings', 'as' => 'setting.'], function() {
        Route::get('', ['as' => 'index', 'uses' => 'SettingsController@index']);
        Route::put('', ['as' => 'update', 'uses' => 'SettingsController@update']);
    });
});
