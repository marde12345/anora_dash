<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class StUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    private $DEFAULT_PHOTO_PROFILE = 'default_user.jpg';


    public function toArray($request)
    {
        $photo_backcover = $this->getPhotoBackcoverAttribute();
        // $user = new UserResource(User::find($this->user_id));
        // $user = json_decode(json_encode($user));

        return [
            'id' => $this->id,
            // 'user' => $user,
            'level' => $this->level,
            'cover_letter' => $this->cover_letter,
            'tools' => explode('|', $this->tools),
            'services' => explode('|', $this->services),
            'visitor_count' => $this->visitor,
            'photo_backcover' => $photo_backcover,
        ];
    }

    public function getPhotoBackcoverAttribute()
    {
        // Jika tidak ada photo backcover
        if (is_null($this->photo_backcover_id)) {
            // maka foto profile default
            $photoBackcover = $this->DEFAULT_PHOTO_PROFILE;
        } else {
            // maka foto dari id
            $photoBackcover = Image_uploaded::find($this->photo_backcover_id)->name;
        }

        return asset('storage/images/PhotoBackcover/500/' . $photoBackcover);
    }
}
