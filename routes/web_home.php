<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.landing.home', [
        'title' => 'ANORA | Your Data Solution'
    ]);
});

Route::get('/login', function () {
    return view('home.landing.login', [
        'title' => "Login | ANORA",
        // $errors=> req.flash("error")
    ]);
})->name('login');

Route::get('/register', function () {
    return view('home.landing.register', [
        'title' => 'Pendaftaran Baru | ANORA'
    ]);
})->name('register');

Route::get('/forgot', function () {
    return view('home.landing.forgot', [
        'title' => 'Lupa Kata Sandi | ANORA'
    ]);
})->name('forgot');

Route::get('/browse', function () {
    return view('home.landing.browse', [
        'title' => 'Pendaftaran Baru | ANORA'
    ]);
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
