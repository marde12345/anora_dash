<?php

use Illuminate\Support\Facades\Route;

Route::get('/create_proposal/{job_id}', 'JobController@createProposal')->name('create_proposal');
