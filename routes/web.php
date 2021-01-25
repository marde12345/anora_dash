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

// Auth::routes(['verify' => true]);
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('vue', function () {
    return view('layouts.vue');
});

Route::prefix('')->name('root.')->group(base_path('routes/web_home.php'));

Route::prefix('dashboard')->name('dashboard.')->group(base_path('routes/web_dashboard.php'));

Route::prefix('admin')->name('admin.')->group(base_path('routes/web_admin.php'));

Route::prefix('st_user')->name('st_user.')->group(base_path('routes/web_st_user.php'));
