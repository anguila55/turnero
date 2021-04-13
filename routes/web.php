<?php

Route::get('/', 'Web\SiteController@index')->name('site');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//Route::get('/', 'Web\HomeController@index')->name('home');
Route::get('home', 'Web\HomeController@index');

Route::group(['prefix' => 'user', 'as' => 'user::'], function () {
    Route::get('index', 'Web\UserController@index')->name('index');
    Route::put('update/{id}', 'Web\UserController@update')->name('update');
    Route::delete('delete/{id}', 'Web\UserController@delete')->name('delete');
    Route::post('create', 'Web\UserController@create')->name('create');
});

Route::group(['prefix' => 'branch', 'as' => 'branch::'], function () {
    Route::get('index', 'Web\BranchController@index')->name('index');
    Route::put('update/{id}', 'Web\BranchController@update')->name('update');
    Route::delete('delete/{id}', 'Web\BranchController@delete')->name('delete');
    Route::post('create', 'Web\BranchController@create')->name('create');
});

Route::group(['prefix' => 'schedule', 'as' => 'schedule::'], function () {
    Route::get('index/{branch_id}', 'Web\ScheduleController@index')->name('index');
    Route::put('update/{id}', 'Web\ScheduleController@update')->name('update');
    Route::delete('delete/{id}', 'Web\ScheduleController@delete')->name('delete');
    Route::post('create', 'Web\ScheduleController@create')->name('create');
});

Route::group(['prefix' => 'customer', 'as' => 'customer::'], function () {
    Route::get('index', 'Web\CustomerController@index')->name('index');
    Route::post('create', 'Web\CustomerController@create')->name('create');
    Route::post('schedule', 'Web\CustomerController@schedule')->name('schedule');
    Route::post('shift', 'Web\CustomerController@shift')->name('shift');
    Route::put('changeStatus/{status}', 'Web\CustomerController@changeStatus')->name('changeStatus');
});

Route::group(['prefix' => 'shift', 'as' => 'shift::'], function () {
    Route::get('index/', 'Web\ShiftController@index')->name('index');
    Route::put('update/{id}', 'Web\ShiftController@update')->name('update');
});
