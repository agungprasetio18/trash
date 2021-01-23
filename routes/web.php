<?php

use Illuminate\Support\Facades\Route;


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

Route::middleware('auth')->group(function(){

    Route::get('/', 'HomeController@index')->name('home');

    Route::post('/logout', 'Auth\AuthController@logout')->name('logout');

    Route::prefix('type')->name('type.')->group(function(){
        Route::view('/', 'type')->name('index');
        Route::post('/search', 'TypeController@search')->name('search');
    });

    Route::prefix('village')->name('village.')->group(function(){
        Route::view('/', 'village')->name('index');
        Route::post('/search', 'VillageController@search')->name('search');
    });


    
    
});

Route::middleware('guest')->group(function(){
    Route::view('/login', 'auth.login')->name('login');
});