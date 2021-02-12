<?php

namespace App\Http\Resources;

use App\Models\StUser;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ProposalResource extends JsonResource
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
            'st_user' => new StUserResource(StUser::find($this->st_user_id)),
        ];
    }
}
