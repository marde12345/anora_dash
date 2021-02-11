<?php

namespace App\Http\Resources;

use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $count = Message::where([
            ['from_id', $this->from_id],
            ['to_id', $this->to_id],
        ])->whereNull('read_at')->count();

        $created_at = Carbon::parse($this->created_at)->format('d-m-Y');

        return [
            'id' => $this->users->id,
            'name' => $this->users->name,
            'avatar' => $this->users->avatar,
            'from_id' => $this->from_id,
            'to_id' => $this->to_id,
            'from' => User::find($this->from_id),
            'to' => User::find($this->to_id),
            'content' => $this->content,
            'created_at' => $created_at,
            'time_dif' => $this->created_at->diffForHumans(),
            'count' => $count
        ];
    }
}
