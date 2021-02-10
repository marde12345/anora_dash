<?php

namespace App\Http\Resources;

use App\Models\Message;
use App\Models\StUser;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if (!is_null(Auth::user())) {

            $to = [
                ['to_id', Auth::user()->id],
                ['from_id', $this->id]
            ];

            $message = Message::where([
                ['from_id', auth()->user()->id],
                ['to_id', $this->id]
            ])->orWhere($to)->latest()->first();


            $count = Message::where($to)->whereNull('read_at')->count();

            // $st_user = new StUserResource(StUser::where('user_id', $this->id)->first());
            // $st_user = json_decode(json_encode($st_user));
        }
        $photo = $this->getPhotoProfileAttribute();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'avatar' => $this->avatar,
            'photo' => $photo,
            'email' => $this->email,
            'role' => $this->role,
            // 'st_user' => $st_user ?? '',
            'from_id' => $message->from_id ?? '',
            'to_id' => $message->to_id ?? '',
            'content' => $message->content ?? '',
            'count' => $count ?? '',
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
            $photoProfile = User::getDefaultPhotoProfile();
        } else {
            // maka foto dari id
            $photoProfile = Image_uploaded::find($this->photo_profile_id)->name;
        }

        return asset('storage/images/PhotoProfile/300/' . $photoProfile);
    }
}
