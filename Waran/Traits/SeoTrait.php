<?php

namespace Waran\Traits;

use Waran\Observers\SeoObserver;
use App\Models\Seo;
use Cache;

trait SeoTrait
{
    public function __construct()
    {
      parent::__construct();
      $this->fillable = array_merge($this->fillable, ['seo_title', 'seo_description', 'seo_keyword']);
    }

    /**
     * Hook into the Eloquent model events to create or
     * update the slug as required.
     */
    public static function bootSeo()
    {
        static::observe(app(SeoObserver::class));
    }

    public function seo()
    {
        return $this->hasOne(\App\Models\Seo::class, 'model_id')->where('model_name', short_class_name($this));
    }

    public function getMetaCleanAttribute()
    {
      return empty($this->seo->data) ? false : $this->seo->data;
    }

    public function getMetaAttribute()
    {

      if(empty($this->seo->data)) return false;
      $data = $this->seo->data;

      $variables = [
          '{name}',
          '{description}',
          '{title}'
      ];

      $values = [
          $this->name,
          $this->description_short,
          $this->title
      ];

      if(!empty($data->title)) $data->title = str_replace($variables, $values, $data->title);
      if(!empty($data->description)) $data->description = str_replace($variables, $values, $data->description);
      return $data;
    }

    public function getSeoTitleAttribute()
    {
        return (isset($this->meta_clean->title)) ? $this->meta_clean->title : '';
    }

    public function getSeoDescriptionAttribute()
    {
        return (isset($this->meta_clean->description)) ? $this->meta_clean->description : '';
    }

    public function getSeoKeywordAttribute()
    {
        return (isset($this->meta_clean->keyword)) ? implode(',', $this->meta_clean->keyword) : '';
    }
}
