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
Route::get('/info', 'HomeController@info')->name('info');
Route::get('/artist/create-directory', 'HomeController@createDirectory')->name('create-directory');


Route::get('/artist/upload', 'ShareController@upload')->name('artist/upload');
Route::post('/artist/upload', 'ShareController@uploadPost')->name('artist/upload');


Route::get('/track/{artist_id}/{id}/{trackName}', 'ShareController@viewTrack')->name('/track/{artist_id}/{id}/{trackName}');
