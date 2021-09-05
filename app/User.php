<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Qirolab\Laravel\Reactions\Contracts\ReactsInterface;
use Qirolab\Laravel\Reactions\Traits\Reacts;

class User extends Authenticatable implements ReactsInterface
{
    use Notifiable, Reacts;

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

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    protected $appends = ['profileLink'];

    public function getProfileLinkAttribute()
    {
        return route('user.show', $this);
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    } 

    public function isNot($user)
    {
        return $this->id !== $user->id;
    }

    public function isFollowing($user)
    {
        return (bool) $this->following->where('id', $user->id)->count();
    }

    public function canFollow($user)
    {
        if(!$this->isNot($user)) {
            return false;
        }
        return !$this->isFollowing($user);
    }

    public function canUnFollow($user)
    {
        return $this->isFollowing($user);
    }
}
