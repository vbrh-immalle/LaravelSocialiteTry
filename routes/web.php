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

Route::get('login/github', 'OAuth\GitHubLoginController@redirectToProvider');
Route::get('login/github/callback', 'OAuth\GitHubLoginController@handleProviderCallback');

Route::get('login/google', 'OAuth\GoogleLoginController@redirectToProvider');
Route::get('login/google/callback', 'OAuth\GoogleLoginController@handleProviderCallback');