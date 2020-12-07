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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', 'Auth\LoginController@logout');

Route::prefix('dashboard')->group(function () {
    Auth::routes();
    Route::get('/', 'Auth\LoginController@showLoginForm')->name('home');
});

Route::prefix('admin')->group(function () {
    Route::get('', 'AdminController@index')->name('admin.root');

    Route::get('/profile', 'AdminProfileController@index')->name('admin.profile');
    Route::put('/profile', 'AdminProfileController@update')->name('admin.profile.update');

    Route::get('/list', 'AdminController@listUsers')->name('admin.list');
});

Route::prefix('st_user')->group(function () { });


Route::get('/about', function () {
    return view('about');
})->name('about');
