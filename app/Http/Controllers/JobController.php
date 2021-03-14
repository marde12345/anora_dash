<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobResource;
use App\Http\Resources\ProposalResource;
use App\Models\Job;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $widget = [
            'title' => "Buat Pekerjaan",
            'services' => Job::SERVICES,
            'tools' => Job::TOOLS,
            'levels' => Job::LEVELS,
        ];

        return view('home/job_create', compact('widget'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        if (!in_array(Auth::user()->role, ['customer', 'admin'])) {
            return redirect()->back()
                ->withError("Tidak memiliki akses untuk membuat pekerjaan!");
        }

        $job = Job::create([
            'tool_need' => $tool_need,
            'service_need' => $service_need,
            'open_price' => $open_price,
            'status' => 'open',
            'user_id' => Auth::user()->id,
            'is_seeder' => 0,
        ] + $request->all());

        return redirect()->route('job.show', [$job->id])
            ->with('success', 'Sayembara berhasil dibuat! Silahkan tunggu statistikan mengikuti sayembara anda');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = new JobResource(Job::find($id));
        $job = json_decode(json_encode($job));

        $proposals = ProposalResource::collection(Proposal::where('job_id', $id)->get())->response()->getData();

        // dd($proposals);
        $widget = [
            'title' => "Detail Pekerjaan",
            'job' => $job,
            'proposals' => $proposals,

        ];

        return view('home.job_detail', compact('widget'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { }
}
