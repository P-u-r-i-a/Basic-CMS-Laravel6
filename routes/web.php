<?php

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
Auth::routes();

Route::group([
    'middleware' => 'auth',
    'prefix' => 'dashboard'
], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('/posts', 'PostController')->except('show');
    Route::resource('/categories', 'CategoryController')->except('show');
    Route::resource('/media', 'MediaController')->except(['edit','show','update']);
    Route::get('/settings','SettingController@index')->name('settings.index');
    Route::put('/settings', 'SettingController@update')->name('settings.update');
});

Route::get('/', function () {
    return view('welcome');
});