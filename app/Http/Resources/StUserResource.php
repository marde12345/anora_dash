<?php

namespace App\Http\Resources;

use App\Models\Job;
use App\Models\Review;
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


    public function toArray($request)
    {
        $member_sejak = $this->created_at->isoFormat('MMMM Y');
        $photo_backcover = $this->getPhotoBackcoverAttribute();
        $user = new UserResource(User::find($this->user_id));
        $level = (int) $this->level / 20;
        $level = ($level > 4 ? 4 : $level);
        $level_statistisi = $this->getLevelStatistisi($level);

        $reviews = ReviewResource::collection(Review::where('to_id', $user->id)->get());
        $reviews = json_decode(json_encode($reviews));
        // dd($reviews);
        $star_review = [];
        foreach ($reviews as $review) {
            array_push($star_review, $review->star);
        }
        // dd(count($star_review));
        if (count($star_review)) {
            $avg_star_review = array_sum($star_review) / count($star_review);
        }

        return [
            'id' => $this->id,
            'user' => $user ?? '',
            'level' => $this->level,
            'cover_letter' => $this->cover_letter,
            'tools' => explode('|', $this->tools),
            'services' => explode('|', $this->services),
            'visitor_count' => $this->visitor,
            'photo_backcover' => $this->getPhotoBackcoverAttribute() ?? '',
            'st_user_namecode' => implode('_', [$this->id, $this->user_id]),
            'member_sejak' => $member_sejak ?? '',
            'level_statistisi' => $level_statistisi,
            'reviews' => $reviews ?? '',
            'avg_star_review' => $avg_star_review ?? 0,
            'count_star_review' => count($star_review),
            'link_profil' => config('custom.app_url') . '/statistisi/' . implode('_', [$this->id, $this->user_id]),
        ];
    }

    public function getLevelStatistisi($level)
    {
        if ($level < 21) {
            $level_statistisi = 'Statistisi Baru';
        } elseif ($level < 41) {
            $level_statistisi = 'Statistisi Pemula';
        } elseif ($level < 61) {
            $level_statistisi = 'Statistisi Menengah';
        } elseif ($level < 81) {
            $level_statistisi = 'Statistisi Berpengalaman';
        } elseif ($level >= 81) {
            $level_statistisi = 'Professional Statistisi';
        } else {
            $level_statistisi = 'Statistisi';
        }
        return $level_statistisi;
    }

    public function getPhotoBackcoverAttribute()
    {
        // Jika ada photo dari avatar
        if ($this->photo_backcover_url) {
            return $this->photo_backcover_url;
        }

        // Jika tidak ada photo backcover
        if (is_null($this->photo_backcover_id)) {
            // maka foto profile default
            $photoBackcover = User::getDefaultPhotoProfile();
        } else {
            // maka foto dari id
            $photoBackcover = Image_uploaded::find($this->photo_backcover_id)->name;
        }

        return asset('storage/images/PhotoBackcover/500/' . $photoBackcover);
    }
}
