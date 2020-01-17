<?php

Route::get('/', 'HomeController@index');


Route::get('register', 'AuthController@register')->name('members.register');
Route::post('register', 'AuthController@postRegister')->name('members.register');

//我的专利
Route::resource('patents','PatentController');
//专利及监控
Route::resource('monitors','MonitorController');

Route::resource('electron-accounts', 'ElectronUserController');

Route::resource('patentSales', 'PatentSaleController');

//通知书
Route::get('notices','PatentNoticeController@index')->name('notices.index');
Route::get('notices/upload','PatentNoticeController@create')->name('notices.upload');
Route::post('notices','PatentNoticeController@store')->name('notices.upload');


//回收站
Route::resource('patentRecycles', 'PatentRecycleController');

Route::get('users', 'MemberController@index')->name('users.detail');
Route::post('users', 'MemberController@update')->name('users.update');
