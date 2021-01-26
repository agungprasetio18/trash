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

    Route::post('/user/datatables', 'UserController@datatables')->name('user.datatables');

    Route::prefix('type')->name('type.')->group(function(){
        Route::view('/', 'type.index')->name('index');
        Route::post('/search', 'TypeController@search')->name('search');

        Route::prefix('trash')->name('trash.')->group(function (){
            Route::get('/', 'TypeController@trash')->name('index');
            Route::post('/datatables', 'TypeController@trashDatatables')->name('datatables');
            Route::post('/restore/{id}', 'TypeController@restore')->name('restore');
            Route::post('/remove/{id}', 'TypeController@remove')->name('remove');
            Route::get('/restoreAll', 'TypeController@restoreAll')->name('restoreAll');
            Route::get('/removeAll', 'TypeController@removeAll')->name('removeAll');
        });
    });

    Route::prefix('village')->name('village.')->group(function(){
        Route::view('/', 'village.index')->name('index');
        Route::post('/search', 'VillageController@search')->name('search');

        Route::prefix('trash')->name('trash.')->group(function (){
            Route::get('/', 'VillageController@trash')->name('index');
            Route::post('/datatables', 'VillageController@trashDatatables')->name('datatables');
            Route::post('/restore/{id}', 'VillageController@restore')->name('restore');
            Route::post('/remove/{id}', 'VillageController@remove')->name('remove');
            Route::get('/restoreAll', 'VillageController@restoreAll')->name('restoreAll');
            Route::get('/removeAll', 'VillageController@removeAll')->name('removeAll');
        });
    });

    Route::prefix('member')->name('member.')->group(function (){
		Route::post('/datatables', 'MemberController@datatables')->name('datatables');
		Route::post('/search', 'MemberController@search')->name('search');
	});


    Route::resource('user', 'UserController', ['expect' => ['show']]);
    Route::resource('member', 'MemberController', ['except' => ['show']]);
    
});

Route::middleware('guest')->group(function(){
    Route::view('/login', 'auth.login')->name('login');
});