<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();
Route::prefix('dashboard')->group(function () {
    Route::get('', 'Auth\LoginController@showLoginForm')->name('login');
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('list', 'HomeController@listUsers')->name('list');

    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::put('profile', 'ProfileController@update')->name('profile.update');
});


Route::get('/about', function () {
    return view('about');
})->name('about');
