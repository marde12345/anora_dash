<?php

namespace App\Http\Resources;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MessagesNotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'from' => User::findOrFail($this->from_id),
            'to' => User::findOrFail($this->to_id),
            'content' => $this->content,
            'created_at' => $this->created_at,
            'send_at' => $this->created_at->diffForHumans(),
            'read_at' => $this->read_at,
        ];
    }
}
