<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function createProposal($job_id)
    { 
        $proposal = Proposal::create([
            
        ]);
    }
}
