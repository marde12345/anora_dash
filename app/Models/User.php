<?php

namespace App\Models;

use App\Http\Resources\MessagesNotificationResource;
use App\Http\Resources\UserNotificationResource;
use App\Http\Resources\UserUpgradeRoleResource;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    private const DEFAULT_PHOTO_PROFILE = 'default_user.jpg';
    private const DEFAULT_PASSWORD = 'anora12345';
    public const ROLES = ['customer' => 'Pelanggang', 'st_user' => 'Statistikan', 'admin' => 'Administrator'];


    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'role', 'photo_profile_id', 'photo_url', 'socialite_name', 'socialite_id', 'email_verified_at'
    ];
    protected $hidden = [
        'password', 'remember_token', 'socialite_name', 'socialite_id', 'email_verified_at'
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $appends = [
        'avatar'
    ];
    protected $guarded = []; //tambahkan baris ini

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
        // Jika ada photo dari avatar
        if ($this->photo_url) {
            return $this->photo_url;
        }

        // Jika tidak ada photo avatar
        if (is_null($this->photo_profile_id)) {
            // maka foto profile default
            $photoProfile = self::DEFAULT_PHOTO_PROFILE;
        } else {
            // maka foto dari id
            $photoProfile = Image_uploaded::find($this->photo_profile_id)->name;
        }

        return asset('storage/images/PhotoProfile/300/' . $photoProfile);
    }

    public function getCountMessageUnreadAttribute()
    {
        // $count = Message::where('to_id', $this->id)->whereNull('read_at')->count();
        $message_resource = MessagesNotificationResource::collection(
            Message::where('to_id', $this->id)
                ->whereNull('read_at')
                ->limit(3)
                ->get()
        );
        $res = json_decode(json_encode($message_resource));

        return $res;
    }

    public function getUserNotificationAttribute()
    {
        $count = UserUpgradeRoleResource::collection(UserUpgradeRole::where('from_id', 21)->get());
        $res = json_decode(json_encode($count));

        return $res;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getAvatarAttribute()
    {
        return 'https://www.gravatar.com/avatar/' . md5(strtolower($this->email));
    }

    // Per get an
    public static function getDefaultPassword()
    {
        return self::DEFAULT_PASSWORD;
    }

    public static function getDefaultPhotoProfile()
    {
        return self::DEFAULT_PHOTO_PROFILE;
    }

    public static function getRoles()
    {
        return self::ROLES;
    }

    public static function getUpgradeRoles($current_role)
    {
        switch ($current_role) {
            case 'customer':
                $next_role = 'st_user';
                break;

            default:
                $next_role = 'st_user';
                break;
        }

        return $next_role;
    }

    // Per message an
    public function messagesTo()
    {
        return $this->hasOne(Message::class, 'to_id')->latest();
    }
    public function messagesFrom()
    {
        return $this->hasOne(Message::class, 'from_id')->latest();
    }
}
