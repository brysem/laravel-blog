<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use SahusoftCom\EloquentImageMutator\EloquentImageMutatorTrait;

use Waran\Utilities\HelperUtility as Helper;

class Post extends Model
{
    use Sluggable, EloquentImageMutatorTrait;

    const STATUS_DRAFT = 'draft';
    const STATUS_PUBLISHED = 'published';

    protected $fillable = ['user_id', 'title', 'slug', 'content', 'cover_photo', 'status'];

    protected $appends = ['url'];

    protected $image_fields = ['cover_photo'];

    public function user()
    {
      return $this->belongsTo(\App\Models\User::class);
    }

    public function comments()
    {
      return $this->hasMany(\App\Models\Comment::class);
    }

    /**
     * Scope a query to only include published posts.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('status', self::STATUS_PUBLISHED);
    }

    public function getUrlAttribute()
    {
        return route('post.view', $this);
    }

    public function getStatusListAttribute()
    {
        return [
            self::STATUS_DRAFT => 'Draft',
            self::STATUS_PUBLISHED => 'Published'
        ];
    }

    public function getExcerptAttribute()
    {
        return Helper::shortenString($this->attributes['content'], 200);
    }

    public function getCreatedAtAttribute($value)
    {
        return carbon($value)->diffForHumans();
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
