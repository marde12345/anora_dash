<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobResource;
use App\Http\Resources\StUserResource;
use App\Models\Job;
use App\Models\Proposal;
use App\Models\StUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    public function createProposal($job_id)
    {
        if (Auth::user()->role != 'st_user') {
            return redirect()->back()
                ->withError("Tidak memiliki akses untuk membuat proposal! Ingin mengajukan proposal? Upgrade akun saya menjadi statistikan difitur \"Jadikan saya mitra\"");
        }

        $st_user = new StUserResource(StUser::where('user_id', Auth::user()->id)->first());
        $st_user = json_decode(json_encode($st_user));

        $job = new JobResource(Job::find($job_id));
        $job = json_decode(json_encode($job));
        dd($job);
    }
}
