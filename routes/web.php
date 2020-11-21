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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/category/store', 'CategoryController@store')->name('storeCategory');
Route::post('/category/update', 'CategoryController@update')->name('updateCategory');
Route::post('/category/destroy', 'CategoryController@destroy')->name('destroyCategory');

Route::post('/news/store', 'NewsController@store')->name('storeNews');
Route::post('/news/update', 'NewsController@update')->name('updateNews');
Route::post('/news/destroy', 'NewsController@destroy')->name('destroyNews');