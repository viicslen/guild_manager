<?php

namespace App;

use emberlabs\GravatarLib\Gravatar;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function getAvatarAttribute() {
        /**
        $gravatar = new Gravatar();
        // example: setting default image and maximum size
        $gravatar->setDefaultImage($this->attributes['avatar'] ?? asset("storage/app/public/default-avatar.jpg"))
                    ->setAvatarSize(150);
        return $gravatar->buildGravatarURL($this->email);
        **/
        return $this->attributes['avatar'] ?? asset('storage/default-avatar.jpg');
    }

    public function characters() {
        return $this->hasMany('App\Character');
    }
}
