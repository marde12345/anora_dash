<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'from_user' => new UserResource(User::find($this->from_id)),
            'to_user' => new UserResource(User::find($this->to_id)),
            'publish_at' => $this->created_at->diffForHumans(),
        ];
    }
}
