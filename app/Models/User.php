<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    private $DEFAULT_PHOTO_PROFILE = 'default_user.jpg';

    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'role', 'photo_profile_id'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $appends = [
        'avatar'
    ];
    protected $visible = [];

    public function getFullNameAttribute()
    {
        if (is_null($this->last_name)) {
            return "{$this->name}";
        }

        return "{$this->name} {$this->last_name}";
    }

    public function getRoleNameAttribute()
    {
        switch ($this->role) {
            case 'admin':
                $roleName = 'Administrator';
                break;

            case 'st_user':
                $roleName = 'Statistikan';
                break;

            default:
                $roleName = 'Pelanggan';
                break;
        }
        return $roleName;
    }

    public function getPhotoProfileAttribute()
    {
        if (is_null($this->photo_profile_id)) {
            return $this->DEFAULT_PHOTO_PROFILE;
        }

        return Image_uploaded::find($this->photo_profile_id)->name;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getAvatarAttribute()
    {
        return 'https://www.gravatar.com/avatar/' . md5(strtolower($this->email));
    }
    public function messagesTo()
    {
        return $this->hasOne(Message::class, 'to_id')->latest();
    }
    public function messagesFrom()
    {
        return $this->hasOne(Message::class, 'from_id')->latest();
    }
}
