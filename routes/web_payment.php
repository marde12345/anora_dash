<?php

use Illuminate\Support\Facades\Route;

Route::get('/finish', 'PaymentController@finish')->name('finish');
Route::get('/unfinish', 'PaymentController@unfinish')->name('unfinish');
Route::get('/error', 'PaymentController@error')->name('error');
Route::get('/getRandomPayment', 'PaymentController@getRandomPayment')->name('createTransaction');

Route::post('/notif', 'PaymentController@handlingNotif')->name('notif');
