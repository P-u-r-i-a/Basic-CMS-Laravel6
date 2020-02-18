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

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('/dashboard/posts', 'PostController')->middleware('auth');
Route::resource('/dashboard/categories', 'CategoryController')->middleware('auth');


Route::get('/', function () {
    return view('welcome');
});