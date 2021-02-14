<?php

namespace App\Http\Resources;

use App\Models\Proposal;
use App\Models\StUser;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
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
            'tool_need' => $this->tool_need ?? '-',
            'service_need' => $this->service_need ?? '-',
            'user' => new UserResource(User::find($this->user_id)),
            'approval_st_user' => new StUserResource(StUser::find($this->approval_st_user_id)),
            'proposals' => ProposalResource::collection(Proposal::where('job_id', $this->id)->get()),
            'created_at_time' => $this->created_at->diffForHumans(),
            'created_at_time_isoFormat' => $this->created_at->isoFormat('dddd, D MMMM Y'),
        ];
    }
}
