<?php

use Illuminate\Support\Facades\Route;

Route::get('/laporan', 'AdminController@generatePerjanjianKerjasama')->name('laporan');
Route::get('', 'AdminController@index')->name('root');

Route::get('/profile', 'AdminProfileController@index')->name('profile');
Route::put('/profile', 'AdminProfileController@update')->name('profile.update');

// Route::get('/list', 'AdminUserController@index')->name('user');
Route::resource('user', 'AdminUserController');
