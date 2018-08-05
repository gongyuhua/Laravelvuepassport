<?php

Route::get('/{any}', 'SinglePageController@index')->where('any', '.*');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
