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
        $timeNow = Carbon::now();
        $timeDif = $timeNow->diffInSeconds($this->created_at);
        if ($timeDif > 60) {
            $timeDif = $timeNow->diffInMinutes($this->created_at);
            if ($timeDif > 60) {
                $timeDif = $timeNow->diffInHours($this->created_at);
                if ($timeDif > 24) {
                    $timeDif = $timeNow->diffInDays($this->created_at);
                    $timeDif .= " hari yang lalu";
                } else {
                    $timeDif .= " jam yang lalu";
                }
            } else {
                $timeDif .= " menit yang lalu";
            }
        } else {
            $timeDif .= " detik yang lalu";
        }

        return [
            'id' => $this->id,
            'from' => User::findOrFail($this->from_id),
            'to' => User::findOrFail($this->to_id),
            'content' => $this->content,
            'created_at' => $this->created_at,
            'send_at' => $timeDif,
            'read_at' => $this->read_at,
        ];
    }
}
