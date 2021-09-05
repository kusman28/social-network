<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Qirolab\Laravel\Reactions\Contracts\ReactableInterface;
use Qirolab\Laravel\Reactions\Traits\Reactable;

class Post extends Model implements ReactableInterface
{
    use Reactable;

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
