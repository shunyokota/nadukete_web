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

Route::get('/', 'ThemeController@index');
Route::post('/naming/{naming_id}/mark', 'NamingController@mark');
Route::get('/naming/{naming_id}/getTotalPoint', 'NamingController@getTotalPoint');
Route::post('/themes', 'ThemeController@create');
Route::get('theme/{theme_id}', 'ThemeController@detail');
Route::post('themes/{theme_id}/namings', 'NamingController@create');
Route::get('mypage', 'MypageController@index');
Route::get('mypage/themes', 'MypageController@themes');
Route::get('auth/twitter', 'Auth\AuthController@redirectToProvider');
Route::get('auth/twitter/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
