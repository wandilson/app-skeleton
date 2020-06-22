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

Route::prefix('app')->namespace('App')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
});