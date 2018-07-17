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

Route::get('/','WelcomeController@welcome')->name('welcome');
Route::get('/info',function(){
    echo phpinfo();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'admin','middleware'=>'auth'],function () {
    Route::get('/songs', 'SongController@index')->name('songs');
    Route::post('/songs/create', 'SongController@store')->name('song.create');
    Route::post('/categories/create', 'CategoryController@store')->name('category.create');
    Route::get('/categories', 'CategoryController@index')->name('categories');

});

Route::get('/category/{uuid}', 'CategoryController@show')->name('category.show');
Route::get('/song/{uuid}', 'SongController@buy')->name('song.buy');
Route::get('/song/{uuid}/download', 'SongController@download')->name('song.download');

