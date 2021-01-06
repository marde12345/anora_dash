<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);
Route::get('/', 'Auth\LoginController@showLoginForm')->name('home');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/about', function () {
    return view('about');
})->name('about');
