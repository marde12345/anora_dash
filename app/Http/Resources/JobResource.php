<?php

namespace App\Http\Resources;

use App\Models\Job;
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
        // dd($this->getLevelNeed($this->level_need));
        return [
            'tool_need' => $this->getToolNeed($this->tool_need) ?? '-',
            'service_need' => $this->getServiceNeed($this->service_need) ?? '-',
            'level_need' => $this->getLevelNeed($this->level_need) ?? '-',
            'user' => new UserResource(User::find($this->user_id)),
            'approval_st_user' => new StUserResource(StUser::find($this->approval_st_user_id)),
            'proposals' => ProposalResource::collection(Proposal::where('job_id', $this->id)->get()),
            'created_at_time' => $this->created_at->diffForHumans(),
            'created_at_time_isoFormat' => $this->created_at->isoFormat('dddd, D MMMM Y'),
        ] + parent::toArray($request);
    }

    public function getToolNeed($tool_need)
    {
        $tools = explode('|', $tool_need);

        if (!is_null($tools)) {
            $temp = [];
            foreach ($tools as $tool) {
                if (array_key_exists($tool, Job::TOOLS)) {
                    array_push($temp, Job::TOOLS[$tool]);
                } else {
                    $tools_readable = implode(' - ', $tools);
                    return $tools_readable;
                }
            }
            $tools_readable = implode(' - ', $temp);
        } else {
            return '-';
        }

        return $tools_readable;
    }

    public function getServiceNeed($service_need)
    {
        $services = explode('|', $service_need);

        if (!is_null($services)) {
            $temp = [];
            foreach ($services as $service) {
                if (array_key_exists($service, Job::SERVICES)) {
                    array_push($temp, Job::SERVICES[$service]);
                } else {
                    $services_readable = implode(' - ', $services);
                    return $services_readable;
                }
            }
            $services_readable = implode(' - ', $temp);
        } else {
            return '-';
        }

        return $services_readable;
    }

    public function getLevelNeed($level_need)
    {
        if (array_key_exists($level_need, Job::LEVELS)) {
            $level_readable = Job::LEVELS[$level_need];

            return $level_readable;
        } else {
            return 'Semua level';
        }
    }
}
