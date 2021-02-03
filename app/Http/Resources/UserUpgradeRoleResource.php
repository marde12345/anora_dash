<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserUpgradeRoleResource extends JsonResource
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
            'from_id' => User::findOrFail($this->from_id),
            'status' => $this->status,
            'description' => $this->description,
            // 'read_at' => $this->read_at
        ];
    }
}
