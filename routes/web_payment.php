<?php

use Illuminate\Support\Facades\Route;

Route::get('/done', 'PaymentController@done')->name('done');
Route::get('/createTransaction', 'PaymentController@createTransaction')->name('createTransaction');
