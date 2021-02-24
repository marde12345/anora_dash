<?php

use Illuminate\Support\Facades\Route;

Route::get('/create_proposal/{job_id}', 'ProposalController@createProposal')->name('create_proposal');
