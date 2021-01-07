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

    protected $appends = ['createdDate'];

    public function getCreatedDateAttribute() 
    {
        return $this->created_at->diffForHumans();
    }
}
