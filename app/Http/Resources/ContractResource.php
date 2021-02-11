<?php

namespace App\Http\Resources;

use App\Models\Done_job;
use App\Models\Job;
use App\Models\Payment;
use App\Models\StUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ContractResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request) + [
            'created_at_isoformat' => $this->created_at->isoFormat('dddd, D MMMM Y'),

            'user' => User::find($this->user_id),
            'st_user' => new StUserResource(StUser::find($this->st_user_id)),
            'job' => Job::find($this->job_id),
            'payment' => Payment::find($this->payment_id) ?? '',
            'done_job' => Done_job::find($this->done_job_id) ?? '',
        ];
    }
}
