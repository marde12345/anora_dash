<?php

use Illuminate\Support\Facades\Route;

Route::resource('job', 'JobController')->except(['index', 'show']);
