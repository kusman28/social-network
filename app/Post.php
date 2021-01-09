<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $appends = ['createdDate'];

    public function getCreatedDateAttribute() 
    {
        return $this->created_at->diffForHumans();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
