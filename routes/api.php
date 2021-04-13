<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['as' => 'api::'], function () {

    Route::group(['prefix' => 'auth', 'as' => 'auth::'], function () {
        Route::post('login', 'Api\AuthController@login')->name('login');
        Route::post('logout', 'Api\AuthController@logout')->name('logout');
        Route::put('change-password', 'Api\AuthController@change')->name('change-password');
        Route::post('forgot-password', 'Api\AuthController@forgot')->name('forgot-password');
        Route::post('reset-password', 'Api\AuthController@reset')->name('reset-password');
    });

    Route::group(['prefix' => 'user', 'as' => 'user::'], function () {
        Route::post('create', 'Api\UserController@create')->name('create');
        Route::put('update', 'Api\UserController@update')->name('update');
        Route::delete('delete/{id}', 'Api\UserController@delete')->name('delete');
        Route::get('get', 'Api\UserController@get')->name('get');
    });
});
