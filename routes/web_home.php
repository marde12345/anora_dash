<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    $widget = [
        'title' => "Your Data Solution",
    ];
    return view('home.home', compact('widget'));
});

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

Route::get('/browse', function () {
    $widget = [
        'title' => "Cari",
    ];
    return view('home.browse', compact('widget'));
})->name('browse');

Route::get('/about', function () {
    return view('home.landing.about', [
        'title' => 'Tentang Kami | ANORA'
    ]);
})->name('about');

Route::get('/statistisi', function () {
    return view('home.landing.statistisi-portofolio', [
        'title' => 'Portofolio Statistisi | ANORA'
    ]);
})->name('statistisi');

Route::get('/message', function () {
    return view('home.landing.message', [
        'title' => 'Kotak Pesan | ANORA'
    ]);
})->name('message');

Route::get('/profile', function () {
    return view('home.landing.profile', [
        'title' => 'Profile | ANORA'
    ]);
})->name('profile');

Route::get('/notification', function () {
    return view('home.landing.notification', [
        'title' => 'Notifikasi | ANORA'
    ]);
})->name('notification');
