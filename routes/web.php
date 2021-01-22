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
    
});

Route::middleware('guest')->group(function(){
    Route::view('/login', 'auth.login')->name('login');
});