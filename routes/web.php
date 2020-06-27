<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/app/unauthorized', function(){
    return view('dash.modules.includes.unauthorized');
})->name('unauthorized');
Route::get('/app/notfound', function(){
    return view('dash.modules.includes.notfound');
})->name('notfound');

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
    
        Route::get('/{id}/roles', 'Acl\UsersRolesController@index')->name('users.roles');
        Route::get('/{id}/roles/available', 'Acl\UsersRolesController@rolesAvailable')->name('users.roles.available');
        Route::get('/{id}/roles/{idRoles}/detach', 'Acl\UsersRolesController@rolesDetach')->name('users.roles.detach');
        Route::post('/{id}/roles', 'Acl\UsersRolesController@rolesAttach')->name('users.roles.attach');
    });

    Route::prefix('acl')->namespace('Acl')->group(function(){
        Route::prefix('roles')->group(function(){
            Route::get('/', 'RolesController@index')->name('roles');

            Route::get('/create', 'RolesController@create')->name('roles.create');
            Route::post('/store', 'RolesController@store')->name('roles.store');
            Route::get('/{id}/edit', 'RolesController@edit')->name('roles.edit');
            Route::get('/{id}/show', 'RolesController@show')->name('roles.show');
            Route::put('/{id}/update', 'RolesController@update')->name('roles.update');
            Route::any('/search', 'RolesController@search')->name('roles.search');

            Route::delete('/{id}/delete', 'RolesController@destroy')->name('roles.delete');

            /**
             * 1. Lista permissões da função
             * 2. Lista permissões disponiveis para função
             * 3. Remover permissão da função
             * 4. Add permissão ao função
             */
            Route::get('/{id}/permissions', 'RolesPermissionsController@index')->name('roles.permissions');
            Route::get('/{id}/permissions/available', 'RolesPermissionsController@permissionsAvailable')->name('roles.permissions.available');
            Route::get('/{id}/permissions/{idPermission}/detach', 'RolesPermissionsController@permissionsDetach')->name('roles.permissions.detach');
            Route::post('/{id}/permissions', 'RolesPermissionsController@permissionsAttach')->name('roles.permissions.attach');


        });

        Route::prefix('permissions')->group(function(){
            Route::get('/', 'PermissionController@index')->name('permissions');

            Route::get('/create', 'PermissionController@create')->name('permissions.create');
            Route::post('/store', 'PermissionController@store')->name('permissions.store');
            Route::get('/{id}/edit', 'PermissionController@edit')->name('permissions.edit');
            Route::get('/{id}/show', 'PermissionController@show')->name('permissions.show');
            Route::put('/{id}/update', 'PermissionController@update')->name('permissions.update');
            Route::any('/search', 'PermissionController@search')->name('permissions.search');

            Route::delete('/{id}/delete', 'PermissionController@destroy')->name('permissions.delete');
        });
    });
});