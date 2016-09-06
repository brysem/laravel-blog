<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['site_title', 'site_subtitle', 'blog_author', 'blog_comments', 'blog_pagination'];

    protected $casts = [
        'blog_author' => 'boolean',
        'blog_comments' => 'boolean'
    ];

    public function setBlogAuthorAttribute($value)
    {
        $this->attributes['blog_author'] = ($value == 'on') ? true : false;
    }

    public function setBlogCommentsAttribute($value)
    {
        $this->attributes['blog_comments'] = ($value == 'on') ? true : false;
    }
}
