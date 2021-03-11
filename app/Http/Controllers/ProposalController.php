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
    public function create()
    {
        $widget = [
            'title' => "Buat Proposal",
            'services' => Job::SERVICES,
            'tools' => Job::TOOLS,
            'levels' => Job::LEVELS,
        ];

        return view('home/proposal_create', compact('widget'));
    }

    public function store(Request $request)
    {
        $job = new JobResource(Job::find($request->job_id));

        if (!in_array(Auth::user()->role, ['st_user', 'admin'])) {
            return redirect()->back()
                ->withError("Tidak memiliki akses untuk mengajukan proposal!");
        }

        if (Proposal::where('st_user_id', Auth::user()->id)->where('job_id', $request->job_id)->first()) {
            return redirect()->back()
                ->withError("Anda sudah mengajukan proposal pada sayembara ini!");
        }

        $request->merge(['bid_price' => str_replace('.', '', $request->bid_price)]);

        $validate = $request->validate([
            'g-recaptcha-response' => 'required|captcha',
            'bid_price' => 'required|lte:' . strval($job->open_price),
            'bid_duration' => 'required|lte:' . strval($job->duration),
        ]);
        unset($request['g-recaptcha-response']);

        $proposal = [
            'st_user_id' => Auth::user()->id,
            'status' => 'submitted',
            'is_seeder' => 0
        ] + $request->all();

        $createProposal = Proposal::create($proposal);

        return redirect()->route('job.show', [$job->id])
            ->with('success', 'Proposal berhasil diajukan! Silahkan tunggu hasilnya');
    }

    public function createProposal($job_id)
    {
        if (!in_array(Auth::user()->role, ['st_user', 'admin'])) {
            return redirect()->back()
                ->withError("Tidak memiliki akses untuk mengajukan proposal!");
        }

        // $st_user = new StUserResource(StUser::where('user_id', Auth::user()->id)->first());
        // $st_user = json_decode(json_encode($st_user));

        $job = new JobResource(Job::find($job_id));
        $job = json_decode(json_encode($job));

        $widget = [
            'title' => "Buat Proposal",
            'job' => $job,
            'services' => Job::SERVICES,
            'tools' => Job::TOOLS,
            'levels' => Job::LEVELS,
        ];

        return view('home/proposal_create', compact('widget'));
    }
}
