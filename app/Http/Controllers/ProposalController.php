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
        // dd($request->all());
        $validate = $request->validate([
            'g-recaptcha-response' => 'required|captcha',
            'name_job' => 'required',
            'description' => 'required',
            'input_file_url' => 'required|active_url',
            'open_price' => 'required|numeric|min:100000',
            'duration' => 'required|numeric|min:1',
        ]);
        unset($request['g-recaptcha-response']);

        $tool_need = ($request->tool_need) ? implode('|', $request->tool_need) : null;
        $service_need = ($request->service_need) ? implode('|', $request->service_need) : null;
        $open_price = str_replace('.', '', $request->open_price);

        if (Auth::user()->role != 'st_user') {
            return redirect()->back()
                ->withError("Tidak memiliki akses untuk mengajukan proposal!");
        }

        $st_user = StUser::where('user_id', Auth::user()->id)->first();

        if (Proposal::where('st_user_id', $st_user->id)->where('job_id', $request->job_id)->first()) {
            return redirect()->back()
                ->withError("Anda sudah mengajukan proposal pada sayembara ini!");
        }

        // $job = Job::create([
        //     'tool_need' => $tool_need,
        //     'service_need' => $service_need,
        //     'open_price' => $open_price,
        //     'status' => 'open',
        //     'user_id' => Auth::user()->id,
        //     'is_seeder' => 0,
        // ] + $request->all());

        // return redirect()->route('job.show', [$job->id])
        //     ->with('success', 'Proposal berhasil diajukan! Silahkan tunggu hasilnya');
    }

    public function createProposal($job_id)
    {
        if (Auth::user()->role != 'st_user' && Auth::user()->role != 'admin') {
            return redirect()->back()
                ->withError("Tidak memiliki akses untuk membuat proposal! Ingin mengajukan proposal? Upgrade akun saya menjadi statistikan difitur \"Jadikan saya mitra\"");
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
