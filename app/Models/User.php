<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
//        return asset(('storage/' . $value) ?: '/images/default-avatar.png');
        return asset($value ? "/storage/{$value}" : '/images/default-avatar.png');
    }

    public function getBannerAttribute($value)
    {
//        return asset(('storage/' . $value) ?: '/images/default-avatar.png');
        return asset($value ? "/storage/{$value}" : '/images/default-banner.png');
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::needsRehash($value)
            ? Hash::make($value) : $value;
    }

    public function timeline()
    {
        $follows = $this->follows()->pluck('id');

        return Whisp::whereIn('user_id', $follows)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->latest()
            ->paginate(50);

    }

    public function whisps()
    {
        return $this->hasMany(Whisp::class)->latest();
    }

    public function path($append = '')
    {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
