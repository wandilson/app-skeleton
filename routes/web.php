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


    Route::prefix('users')->group(function(){
        Route::get('/', 'UsersController@index')->name('users');
        Route::get('/create', 'UsersController@create')->name('users.create');
        Route::post('/store', 'UsersController@store')->name('users.store');
        Route::get('/{id}/edit', 'UsersController@edit')->name('users.edit');
        Route::get('/{id}/show', 'UsersController@show')->name('users.show');
        Route::put('/{id}/update', 'UsersController@update')->name('users.update');
        Route::any('/search', 'UsersController@search')->name('users.search');

        Route::delete('/{id}/delete', 'UsersController@destroy')->name('users.delete');
    });

    Route::prefix('acl')->namespace('Acl')->group(function(){
        Route::get('/permissions', 'PermissionController@index')->name('permission');
    });
});