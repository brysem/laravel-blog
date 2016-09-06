<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'title', 'content', 'email', 'ip'];

    public function post()
    {
      return $this->belongsTo(\App\Models\Post::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return carbon($value)->diffForHumans();
    }
}
