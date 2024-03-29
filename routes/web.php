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


Route::get('/login/google', 'AuthController@redirectToGoogleProvider');
Route::get('/login/google/callback', 'AuthController@handleProviderGoogleCallback');
Route::get('/post/blog', 'GoogleController@handlePost');
Route::get('/post/wp/{id}', 'PostController@postToWp');

Route::get('/homepage', 'AuthController@index')->name('homepage');
Route::get('/home', 'AuthController@index')->name('home');
Auth::routes();
