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


Route::get('/','IndexController@index');

Route::get('bargain ','indexController@bargain');
Route::get('supply','IndexController@supply');

Route::get('about','ArticleController@about');
Route::get('business','ArticleController@business');
Route::get('contact','ArticleController@contact');
Route::get('news/{type?}','ArticleController@news')->name('news');
Route::get('article/{id}','ArticleController@detail')->name('article.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
