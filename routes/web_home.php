<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('job', 'JobController');
Route::get('/job', 'HomeController@jobs')->name('job');
Route::prefix('job')->name('job.')->group(base_path('routes/web_job.php'));

Route::get('/browse', 'HomeController@browse')->name('browse');
Route::get('/browse_map', 'HomeController@browseMap')->name('browse_map');

Route::get('/contract/{barcode}', 'HomeController@contract')->name('contract');
Route::post('/contract', 'HomeController@contract_captha')->name('contract_captha');

Route::get('/statistisi/{name_code}', 'HomeController@statistisi')->name('statistisi');

Route::get('/login', function () {
    $widget = [
        'title' => "Login",
        // $errors=> req.flash("error")
    ];
    return view('home.login', compact('widget'));
})->name('login');

Route::get('/register', function () {
    $widget = [
        'title' => 'Pendaftaran Baru'
    ];
    return view('home.register', compact('widget'));
})->name('register');

Route::get('/forgot', function () {
    $widget = [
        'title' => "Lupa Kata Sandi",
    ];
    return view('home.forgot', compact('widget'));
})->name('forgot');

Route::get('/about', function () {
    $widget = [
        'title' => "Tentang Kami",
    ];
    return view('home.about', compact('widget'));
})->name('about');

Route::get('/message', function () {
    $widget = [
        'title' => "Kotak Pesan",
    ];
    return view('home.message', compact('widget'));
})->name('message');

Route::get('/profile', function () {
    $widget = [
        'title' => "FAK GURUNG DADI",
    ];
    return view('home.profile', compact('widget'));
})->name('profile');

Route::get('/notification', function () {
    $widget = [
        'title' => "Notifikasi",
    ];
    return view('home.notification', compact('widget'));
})->name('notification');
