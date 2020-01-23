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
Route::get('noticeUpload','PatentNoticeController@create')->name('noticeUpload');
Route::post('noticeUpload','PatentNoticeController@store')->name('noticeUpload');


//回收站
Route::resource('patentRecycles', 'PatentRecycleController');

Route::get('userDetail', 'MemberController@index')->name('users.index');
Route::put('userDetail', 'MemberController@modify')->name('users.modify');
//修改密码
Route::get('changePassword','MemberController@changePassword')->name('users.changePassword');
Route::post('changePassword','MemberController@putPassword')->name('users.putPassword');

Route::get('uploadPatent','PatentController@showUpload')->name('uploadPatent');
Route::post('uploadPatent','PatentController@import')->name('uploadPatent');
Route::get('downloadPatent','PatentController@download')->name('downloadPatent');
