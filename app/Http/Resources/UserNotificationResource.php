<?php

namespace App\Http\Resources;

use App\Models\Message;
use Illuminate\Http\Resources\Json\JsonResource;

class UserNotificationResource extends JsonResource
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
            // "notifications"=>,
            "unread_messages" => Message::where('to_id', $this->id)->whereNull('read_at')->get(),
        ];
    }
}
