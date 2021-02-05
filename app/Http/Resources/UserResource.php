<?php

namespace App\Http\Resources;

use App\Models\Message;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
{
    private $DEFAULT_PHOTO_PROFILE = 'default_user.jpg';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $to = [
            ['to_id', Auth::user()->id],
            ['from_id', $this->id]
        ];

        $message = Message::where([
            ['from_id', auth()->user()->id],
            ['to_id', $this->id]
        ])->orWhere($to)->latest()->first();


        $count = Message::where($to)->whereNull('read_at')->count();

        $photo = $this->getPhotoProfileAttribute();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'avatar' => $this->avatar,
            'photo' => $photo,
            'email' => $this->email,
            'role' => $this->role,
            'from_id' => $message->from_id ?? '',
            'to_id' => $message->to_id ?? '',
            'content' => $message->content ?? '',
            'count' => $count
        ];
    }

    public function getPhotoProfileAttribute()
    {
        // Jika ada photo dari avatar
        if ($this->photo_url) {
            return $this->photo_url;
        }

        // Jika tidak ada photo avatar
        if (is_null($this->photo_profile_id)) {
            // maka foto profile default
            $photoProfile = $this->DEFAULT_PHOTO_PROFILE;
        } else {
            // maka foto dari id
            $photoProfile = Image_uploaded::find($this->photo_profile_id)->name;
        }

        return asset('storage/images/PhotoProfile/300/' . $photoProfile);
    }
}
