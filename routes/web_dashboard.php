<?php

use Illuminate\Support\Facades\Route;

// Auth::routes(['verify' => true]);
// Auth::routes();

Route::get('/', 'DashboardController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/about', function () {
    return view('about');
})->name('about');
