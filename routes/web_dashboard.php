<?php

use Illuminate\Support\Facades\Route;

// Auth::routes(['verify' => true]);
// Auth::routes();

Route::get('/', 'DashboardController@index')->name('home');

Route::get('/profile', 'Dashboard\ProfileController@index')->name('profile');
Route::put('/profile', 'Dashboard\ProfileController@update')->name('profile.update');
Route::post('/uploadimage', 'UploadImageController@uploadPhotoProfile')->name('profile.upload.image');

Route::resources([
    'user' => 'Dashboard\UserController',
    'userupgraderole' => 'Dashboard\UserUpgradeRoleController',
    'userchat' => 'Dashboard\MessageController',
]);

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/about', function () {
    $widget = [
        'title' => "About",
    ];
    return view('about', compact('widget'));
})->name('about');
