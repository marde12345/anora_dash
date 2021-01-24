<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    private $DEFAULT_PHOTO_PROFILE = 'default_user.jpg';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'role', 'photo_profile_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    // notice that here the attribute name is in snake_case
    protected $appends = [];

    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = [];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        if (is_null($this->last_name)) {
            return "{$this->name}";
        }

        return "{$this->name} {$this->last_name}";
    }

    /**
     * Get the user's role name.
     *
     * @return string
     */
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

    /**
     * Get the user's photo profile.
     *
     * @return string
     */
    public function getPhotoProfileAttribute()
    {
        if (is_null($this->photo_profile_id)) {
            return $this->DEFAULT_PHOTO_PROFILE;
        }

        return Image_uploaded::find($this->photo_profile_id)->name;
    }

    /**
     * Set the user's password.
     *
     * @param string $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
