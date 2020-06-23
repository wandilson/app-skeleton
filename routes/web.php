<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');


/**
 * Toda aplicação restrita deve ficar dentro do prefixo e namespace App
 */
Auth::routes();

Route::prefix('dash')->namespace('Dash')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');

    Route::get('/users', 'UsersController@index')->name('users');
    Route::get('/users/create', 'UsersController@create')->name('users.create');
    Route::post('/users/store', 'UsersController@create')->name('users.store');

    Route::prefix('acl')->namespace('Acl')->group(function(){
        Route::get('/permissions', 'PermissionController@index')->name('permission');
    });
});